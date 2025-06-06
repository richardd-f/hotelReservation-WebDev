<?php 

require_once "db.php";

function getAllBedRooms(){
    // get img, room type (as room name), price, property
    $conn = createDB();
    $stmt = $conn->prepare("SELECT room_type, ");
}



?>