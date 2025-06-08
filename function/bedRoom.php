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

// get all details room() , used in booking page and rooms manager
function getAllRooms() {
    $conn = createDB();
    $sqlRooms = "SELECT
                    rt.room_type_id,
                    rt.room_type,
                    rt.price,
                    rt.bed_type_id,
                    bt.type AS bed_type_name
                FROM
                    room_types rt
                LEFT JOIN
                    bed_types bt ON rt.bed_type_id = bt.bed_type_id
                ORDER BY
                    rt.room_type_id ASC";
                    
    $resultRooms = $conn->query($sqlRooms);
    $rooms = [];
    
    if ($resultRooms->num_rows > 0) {
        while ($row = $resultRooms->fetch_assoc()) {
            $rooms[$row['room_type_id']] = [
                'id'          => (int)$row['room_type_id'],
                'room_type'   => $row['room_type'],
                'price'       => (float)$row['price'],
                'bed_type_id' => (int)$row['bed_type_id'],
                'bed_type'    => $row['bed_type_name'],
                'facilities'  => []
            ];
        }
    }
    
    if (empty($rooms)) {
        $conn->close();
        return [];
    }
    
    $sqlFacilities = "SELECT facility_id, room_type_id, name FROM facilities";
    $resultFacilities = $conn->query($sqlFacilities);
    
    if ($resultFacilities->num_rows > 0) {
        while ($row = $resultFacilities->fetch_assoc()) {
            $roomId = $row['room_type_id'];
            
            // Check if this facility belongs to one of the rooms we fetched.
            // we must get the id and name facility for tags
            if (isset($rooms[$roomId])) {
                $rooms[$roomId]['facilities'][] = [
                    'id'   => (int)$row['facility_id'],
                    'name' => $row['name']
                ];
            }
        }
    }
    
    $conn->close();
    return array_values($rooms);
}

function updateRoom($roomId, $roomType, $price, $bed_type_id, $facilities) {
    $conn = createDB();
    $conn->begin_transaction();

    try {
        // UPDATE VALUES IN TABLE ROOM_TYPES
        $stmtUpdateRoom = $conn->prepare("UPDATE room_types SET room_type = ?, price = ?, bed_type_id = ? WHERE room_type_id = ?");
        $stmtUpdateRoom->bind_param("siii", $roomType, $price, $bed_type_id, $roomId);
        $stmtUpdateRoom->execute();
        $stmtUpdateRoom->close();


        // UPDATE VALUES IN TABLE FACILITIES
        // update flow = delete all, insert all
        $stmtDeleteFacilities = $conn->prepare("DELETE FROM facilities WHERE room_type_id = ?");
        $stmtDeleteFacilities->bind_param("i", $roomId);
        $stmtDeleteFacilities->execute();
        $stmtDeleteFacilities->close();

        // check and submit facilities
        if (!empty($facilities) && is_array($facilities)) {
            $stmtInsertFacilities = $conn->prepare("INSERT INTO facilities (room_type_id, name) VALUES (?, ?)");
            foreach ($facilities as $facility) {
                $facilityName = $facility['name'];
                $stmtInsertFacilities->bind_param("is", $roomId, $facilityName);
                $stmtInsertFacilities->execute();
            }
            $stmtInsertFacilities->close();
        }

        $conn->commit();
        $conn->close();
        return [true, "Room updated successfully."];

    } catch (Exception $e) {
        $conn->rollback();
        $conn->close();
        return [false, "Database error during update: " . $e->getMessage()];
    }
}

// DELETE ROOM
function deleteRoom($roomId) {
    $conn = createDB();
    $stmt = $conn->prepare("DELETE FROM room_types WHERE room_type_id = ?");
    $stmt->bind_param("i", $roomId);
    
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $stmt->close();
        $conn->close();
        return [true, "Room deleted successfully."];
    } else {
        $error = $stmt->error;
        $stmt->close();
        $conn->close();
        return [false, "Failed to delete room: " . $error];
    }
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

// BED TYPE UPDATE ; parameter is assoc_array contain ['id'] and ['name']
function updateBedTypes($submittedBedTypes) {
    $conn = createDB();
    $conn->begin_transaction();

    try {
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
            $deleteStmt = $conn->prepare("DELETE FROM bed_types WHERE bed_type_id = ?");
            foreach ($idsToDelete as $id) {
                $deleteStmt->bind_param("i", $id);
                $deleteStmt->execute();
            }
            $deleteStmt->close();
        }


        $updateStmt = $conn->prepare("UPDATE bed_types SET type = ? WHERE bed_type_id = ?");
        $insertStmt = $conn->prepare("INSERT INTO bed_types (type) VALUES (?)");

        foreach ($submittedBedTypes as $bedType) {
            $id = $bedType['id'];
            $name = $bedType['name'];

            // Check if it's a new item (id starts with 'new_')
            if (strpos($id, 'new_') === 0) {
                // insert
                $insertStmt->bind_param("s", $name);
                $insertStmt->execute();
            } else {
                // update
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