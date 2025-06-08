<?php 

require_once "db.php";

function addNewRoom($roomType, $price, $bed_type_id, $facilities) {
    $conn = createDB();
    $conn->begin_transaction();
    try {
        // insert new room
        $stmtRoom = $conn->prepare("INSERT INTO room_types (room_type, price, bed_type_id) VALUES (?, ?, ?)");
        $stmtRoom->bind_param("sdi", $roomType, $price, $bed_type_id);
        $stmtRoom->execute();

        // get the room_type_id
        $new_room_id = $conn->insert_id;
        $stmtRoom->close();

        // to check add room type is failed or not
        if ($new_room_id == 0) {
            throw new Exception("Failed to create the new room in the database.");
        }

        // add facility
        if (!empty($facilities) && is_array($facilities)) {
            $stmtFacilities = $conn->prepare("INSERT INTO facilities (room_type_id, name) VALUES (?, ?)");
            foreach ($facilities as $facility) {
                $facilityName = $facility['name']; 
                $stmtFacilities->bind_param("is", $new_room_id, $facilityName);
                $stmtFacilities->execute();
            }
            $stmtFacilities->close();
        }

        $conn->commit();
        $conn->close();
        return [true, "Room added successfully."];

    } catch (Exception $e) {
        $conn->rollback();
        $conn->close();
        return [false, "Database error: " . $e->getMessage()];
    }
}

// get all details room()
function getAllRooms() {
    $conn = createDB();
    $sql = "SELECT
                rt.room_type_id,
                rt.room_type,
                rt.price,
                rt.bed_type_id,
                bt.type AS bed_type_name,
                GROUP_CONCAT(f.name SEPARATOR ',') AS facilities
            FROM
                room_types rt
            LEFT JOIN
                bed_types bt ON rt.bed_type_id = bt.bed_type_id
            LEFT JOIN
                facilities f ON rt.room_type_id = f.room_type_id
            GROUP BY
                rt.room_type_id";
    $result = $conn->query($sql);

    $rooms = [];
    if ($result->num_rows > 0) {
        // Loop through each row of the result set
        while ($row = $result->fetch_assoc()) {
            // Convert the comma-separated string of facilities back into an array.
            // If there are no facilities, it becomes an empty array.
            $facilitiesArray = isset($row['facilities']) ? explode(',', $row['facilities']) : [];

            $rooms[] = [
                'id' => $row['room_type_id'],
                'room_type' => $row['room_type'],
                'price' => $row['price'],
                'bed_type' => $row['bed_type_name'],
                'bed_type_id' => $row['bed_type_id'],
                'facilities' => $facilitiesArray
            ];
        }
    }

    $conn->close();
    return $rooms;
}

// for prefilled type (manage bedtypes, and add new room)
function getAllBedTypes(){
    $conn = createDB();
    $sql = "SELECT bed_type_id, type FROM bed_types";
    $result = $conn->query($sql);
    
    $bedTypes = [];
    if ($result->num_rows > 0) {
        // Fetch each row and add it to the array
        while($row = $result->fetch_assoc()) {
            $bedTypes[] = [
                'id' => $row['bed_type_id'],
                'name' => $row['type']
            ];
        }
    }
    $conn->close();
    return $bedTypes;
}

// this function receive array of string which are the types, and will check from database, in table bed_types(bed_type_id, type),
function updateBedTypes($submittedBedTypes) {
    $conn = createDB();

    // Start a transaction
    $conn->begin_transaction();

    try {
        // --- 1. Handle DELETES ---

        // get existing id in database
        $existingIdsResult = $conn->query("SELECT bed_type_id FROM bed_types");
        $existingIds = [];
        while ($row = $existingIdsResult->fetch_assoc()) {
            $existingIds[] = $row['bed_type_id'];
        }

        // get submitted id
        $submittedIds = [];
        foreach ($submittedBedTypes as $bedType) {
            // Check if the ID is numeric (not a 'new_...' temporary ID)
            if (is_numeric($bedType['id'])) {
                $submittedIds[] = $bedType['id'];
            }
        }

        // get all existing_id that is not submitted   (means to be deleted)
        $idsToDelete = array_diff($existingIds, $submittedIds);
        if (!empty($idsToDelete)) {
            // Prepare a single DELETE statement
            $deleteStmt = $conn->prepare("DELETE FROM bed_types WHERE bed_type_id = ?");
            foreach ($idsToDelete as $id) {
                $deleteStmt->bind_param("i", $id);
                $deleteStmt->execute();
            }
            $deleteStmt->close();
        }


        // --- 2. Handle INSERTS and UPDATES ---
        $updateStmt = $conn->prepare("UPDATE bed_types SET type = ? WHERE bed_type_id = ?");
        $insertStmt = $conn->prepare("INSERT INTO bed_types (type) VALUES (?)");

        foreach ($submittedBedTypes as $bedType) {
            $id = $bedType['id'];
            $name = $bedType['name'];

            // Check if it's a new item (id starts with 'new_')
            if (strpos($id, 'new_') === 0) {
                // It's an INSERT
                $insertStmt->bind_param("s", $name);
                $insertStmt->execute();
            } else {
                // It's an UPDATE
                $updateStmt->bind_param("si", $name, $id);
                $updateStmt->execute();
            }
        }

        $updateStmt->close();
        $insertStmt->close();

        // If all queries were successful, commit the changes
        $conn->commit();
        $conn->close();
        return [true, "Bed types updated successfully."];

    } catch (Exception $e) {
        // If any query fails, roll back all changes
        $conn->rollback();
        $conn->close();
        return [false, "An error occurred: " . $e->getMessage()];
    }
}




?>