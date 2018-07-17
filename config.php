<?php
$servername = "localhost";
$username = "nileshta_car";
$password = "carinventory";
$dbname = "nileshta_carinventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
