<?php
include '../database.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["petPhoto"])) {
    // Sanitize and assign input data
    $petName = filter_var($_POST["petName"], FILTER_SANITIZE_STRING);
    $species = filter_var($_POST["species"], FILTER_SANITIZE_STRING);
    $age = filter_var($_POST["age"], FILTER_VALIDATE_INT);
    $sex = filter_var($_POST["sex"], FILTER_SANITIZE_STRING);
    $weight = filter_var($_POST["weight"], FILTER_VALIDATE_FLOAT);
    $color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);
    $spayedNeutered = isset($_POST["spayed-neutered"]) ? 1 : 0;
    $comments = isset($_POST["comments"]) ? filter_var($_POST["comments"], FILTER_SANITIZE_STRING) : '';

    // Handle the date input and formatting
    $intakeDate = $_POST['intake-date'];
    $dateObject = DateTime::createFromFormat('Y-m-d', $intakeDate);
    if ($dateObject && $dateObject->format('Y-m-d') === $intakeDate) {
        $formattedDate = $dateObject->format('Y-m-d');
    } else {
        die('Invalid date format. Please use YYYY-MM-DD.');
    }

    // Correct `sex` value to match ENUM in the database
    $sex = strtolower($sex) === "male" ? "Male" : (strtolower($sex) === "female" ? "Female" : "Unknown");

    // Proceed with file upload
    $target_dir = "../photos/";
    $base_filename = basename($_FILES["petPhoto"]["name"]);
    $safe_filename = preg_replace("/[^a-zA-Z0-9.]/", "_", $base_filename);
    $target_file = $target_dir . $safe_filename;

    // Validate and move the uploaded file
    if (move_uploaded_file($_FILES["petPhoto"]["tmp_name"], $target_file)) {
        // Prepare the SQL statement to insert the pet details into the Pets table
        $stmt = $conn->prepare("INSERT INTO Pets (Name, Species, Age, Sex, Weight, Color, SpayedNeutered, IntakeDate, image_path, Comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        // Bind the parameters and execute the statement
        if ($stmt->bind_param("ssisssisss", $petName, $species, $age, $sex, $weight, $color, $spayedNeutered, $formattedDate, $target_file, $comments) && $stmt->execute()) {
            echo "New pet created successfully. Image uploaded.";
            // Redirect back to the admin page
            header("refresh:5;url=admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "Invalid request";
}

// Close the database connection
$conn->close();
?>
