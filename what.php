#!/usr/local/php5/bin/php-cgi
<?php
$servername = "cecs-db01.coe.csulb.edu";
$username = "cecs470o11";
$password = "suxoh4";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
