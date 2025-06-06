<?php 
function createDB(){
    $conn = mysqli_connect("localhost", "root", "", "grandiaresort");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        return $conn;
    }
}

function clearDB($conn){
    mysqli_close($conn);
}


?>