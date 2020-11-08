<?php

$host = "localhost";
$user = "root";
$pwd = "2412933bacho";
$dbName = "manuchari";

// create connection
$conn = new mysqli ($host, $user, $pwd, $dbName);

// check connection
if($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}