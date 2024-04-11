<?php
//existing database
$mysqli = new mysqli("localhost", "sys", "laundry", "138users", 3307);

//checking if there's a connection made with the database, else, connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>