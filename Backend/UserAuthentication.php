<?php

include "../storage/sql_connect.php";

require '../Backend/UserAuthenticationData.php'; 


if (isset($_POST['submit'])) {
    $username = isset($_POST['userName']) ? $mysqli->real_escape_string($_POST['userName']) : '';
    $password = $_POST['password'];

    $storedPassword = getUserInfo($mysqli,$username);
    if (password_verify($password,$storedPassword)){
        session_start();
        $_SESSION['userName'] = $username; 
        header("Location: ../Frontend/base.html");
        exit();
    }
    else if($storedPassword.include("userWrongs")){
        session_start();
        $_SESSION['userWrongs'] =  true;
        header("Location: ../Frontend/index.php");
        exit();
    }
    else{
        session_start();
        $_SESSION['passwordWrongs'] =  true;
        header("Location: ../Frontend/index.php");
        exit();
    }
    $mysqli->close();
}

?>