<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../database.php'; // Make sure this path is correct for your database connection script

// Get the PetID from the query string
$petID = $_GET['petID'];

// Prepare the SQL statement using a prepared statement
$stmt = $conn->prepare("SELECT * FROM Pets WHERE PetID = ?");
$stmt->bind_param("i", $petID); // Bind "i" for integer type
$stmt->execute();

// Get the result
$result = $stmt->get_result();
$row = $result->fetch_assoc();

header('Content-Type: application/json'); // Set the header to output JSON
if ($row) {
    echo json_encode($row); // Return full pet details as JSON
} else {
    echo json_encode(["error" => "Pet not found"]); // Return error if not found
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
