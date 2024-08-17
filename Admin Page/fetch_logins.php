<?php
// fetch_logins.php

// Include the database connection
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$dbUsername = "u104394458_paradisepet";
$dbPassword = "Petparadise2";
$dbName = "u104394458_paradisepet";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the last five login records based on the greatest LoginID
$sql = "SELECT 
            Username, LoginDate, LoginTime, IPAddress
        FROM LoginRecords
        ORDER BY LoginID DESC
        LIMIT 5";

$result = $conn->query($sql);
$logins = [];

if ($result->num_rows > 0) {
    // Gather data into an array
    while($row = $result->fetch_assoc()) {
        $logins[] = [
            "username" => htmlspecialchars($row["Username"]),
            "loginDate" => htmlspecialchars($row["LoginDate"]),
            "loginTime" => htmlspecialchars($row["LoginTime"]),
            "ipAddress" => htmlspecialchars($row["IPAddress"])
        ];
    }
}
// Close connection
$conn->close();

// Set header to output JSON
header('Content-Type: application/json');

// Output the JSON data
echo json_encode($logins);
?>
