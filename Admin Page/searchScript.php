<?php
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

// Get the PetID from the query string
$petID = $_GET['petID'];

// Prepare the SQL statement using a prepared statement
$stmt = $conn->prepare("SELECT * FROM Pets WHERE PetID = ?");
$stmt->bind_param("i", $petID); // bind "i" for integer type
$stmt->execute();

// Get the result
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {

    echo "<div class='header'>"; 
    echo "<h3>Name</h3>";
    echo "<h3>Species</h3>";
    echo "<h3>Photo</h3>";
    echo "<h3></h3>";
    echo "</div>";

    echo "<div class='result'>";

    echo "<div class='field'>";
    echo "<h3>" . htmlspecialchars($row['Name']) . "</h3>";
    echo "</div>";

    echo "<div class='field'>";
    echo "<p>" . htmlspecialchars($row['Species']) . "</p>";
    echo "</div>";

    echo "<div class='result-pet-image'>";
    echo "<img src='" . htmlspecialchars($row['image_path']) . "'>";
    echo "</div>";

    // Other details
    echo "<div class='edit-btns'>";
    echo "<button class='edit-pet-btn btn ' data-petid='" . $row['PetID'] . "'>Edit</button>";
    echo "</div>";
    echo "</div>";

} else {
    echo "<p>Pet not found.</p>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
