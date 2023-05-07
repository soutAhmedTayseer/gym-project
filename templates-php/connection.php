<?php
$servername = "localhost";
$username = "root";
$password = "manager";
$dbname = "gym";
$port = "3308";
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error)
    die("Connection failed!");
?>