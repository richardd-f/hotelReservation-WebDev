<?php 
require_once "db.php";
function getUserInformation($userId){
    $conn = createDB();
    $stmt = $conn->prepare("SELECT name, phone_number, address, birthdate, gender FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if($row = $result->fetch_assoc()){
        return [true,$row];
    }else{
        return [false,""];
    }
}

?>