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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign variables
    $petID = $_POST['PetID'];
    $name = $_POST['Name'];
    $species = $_POST['Species'];
    $age = $_POST['Age'];
    $sex = $_POST['Sex'];
    $weight = $_POST['Weight'];
    $color = $_POST['Color'];
    $spayedNeutered = $_POST['SpayedNeutered'];
    // Convert SpayedNeutered to integer 1 or 0
    $spayedNeutered = ($spayedNeutered === "Yes") ? 1 : 0;
    $intakeDate = $_POST['IntakeDate'];
    $comments = $_POST['Comments'];

    // Prepare an update statement
    $sql = "UPDATE Pets SET 
                Name = ?, 
                Species = ?, 
                Age = ?, 
                Sex = ?, 
                Weight = ?, 
                Color = ?, 
                SpayedNeutered = ?, 
                IntakeDate = ?, 
                Comments = ? 
            WHERE PetID = ?";

    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement as strings or integers
    $stmt->bind_param("ssssdsssis", 
        $name, 
        $species, 
        $age, 
        $sex, 
        $weight, 
        $color, 
        $spayedNeutered,
        $intakeDate, 
        $comments, 
        $petID);


    // Execute the prepared statement
    if($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
