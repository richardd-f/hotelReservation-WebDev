<?php 
require_once "db.php";

$loginStatus = checkLogin();
if($loginStatus){
    $getStatus = getUserInformation($loginStatus[1]); //index 0 boolean, index 1 = user_id
    if($getStatus){
        $userInfo = $getStatus[1];
    }
}

function getUserInformation($userId){
    $conn = createDB();
    $stmt = $conn->prepare("SELECT name, phone_number, address, birthdate, gender, email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($row = $result->fetch_assoc()){
        return [true,$row];
    }else{
        return [false,""];
    }
    $conn->close();
}

function saveUserInfo($userId, $name, $email, $phone, $address, $birthdate, $gender){
    $conn = createDB();
    $stmt = $conn->prepare("UPDATE users SET name=?, phone_number=?, address=?, birthdate=?, gender=?, email=? WHERE user_id=?");
    $stmt->bind_param("ssssssi", $name, $phone, $address, $birthdate, $gender, $email, $userId);

    if (!$stmt->execute()) {
        return [false, $stmt->error];
    }else{
        return [true, ""];
    }
    $affectedRows = $stmt->affected_rows;
    $stmt->close();
    $conn->close();
}


?>