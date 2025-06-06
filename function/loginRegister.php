<?php
require_once 'db.php'; 
session_start();


function register($email, $password, $fullName){
    $conn = createDB();
    
    // check is already added
    $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($row = $result->fetch_assoc()) {
        // email already added...
        $conn->close();
        return [false, "Email is already added, please use another email"];

    } else {
        // add account to DB
        $stmt = $conn->prepare("INSERT INTO users (email, password, name) VALUES (?,?,?)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt-> bind_param("sss",$email, $password, $fullName);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        if($affectedRows > 0){
            return [true, ""];
        }else{
            return [false, "Account register is failed"];
        }
    }
    $conn->close();
}

// Connect to DB and check credentials
function login($email, $password, $remember = false){
    $conn = createDB();
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["email"] = $email;

            if ($remember) {
                // Generate a secure random token
                $token = bin2hex(random_bytes(16)); 
                
                // Save token in DB for this user
                $stmt2 = $conn->prepare("UPDATE users SET login_token = ? WHERE user_id = ?");
                $stmt2->bind_param("si", $token, $user['user_id']);
                $stmt2->execute();

                // Set cookie with token, expires in 30 days
                setcookie("rememberme", $token, time() + (86400 * 30), "/", "", true, true);
            }
            return [true, ""];
        } else {
            // incorrect password
            return [false,"incorrect password"];
        }
    } else {
        // email not found
        return [false, "your email and password didnt match"];
    }
}

function checkLogin(){
    if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
        return [true,$_SESSION['user_id']];
    }else{
        // check cookie
        if(isset($_COOKIE["rememberme"])){
            $token = $_COOKIE["rememberme"];
            $conn = createDB();
            $stmt = $conn->prepare("SELECT user_id, email FROM users WHERE login_token = ?");
            $stmt->bind_param("s",$token);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            if($row = $result->fetch_assoc()){
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["email"] = $row["email"];
                return [true, $_SESSION["user_id"]];
            }else{
                // not logged in
                return [false,""];
            }
        };
    }
    return false;
}

function logout(){
    session_destroy();
    unset($_SESSION["user_id"]);
    unset($_SESSION["email"]);
    setcookie("rememberme", "", time()-3600, "/", "", true, true);
}


?>