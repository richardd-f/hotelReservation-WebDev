<?php 
require_once "db.php";

function getAllUserData() {
    $conn = createDB();
    $sql = "SELECT user_id, name, email, isAdmin FROM users";
    $result = $conn->query($sql);

    $allUsers = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Add the user's data to our array
            $allUsers[] = $row;
        }
    }
    $conn->close();
    return $allUsers;
}

?>