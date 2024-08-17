<?php
// Include the database connection
include '../database.php';
// Check if status is set in the POST request

// Check if status and applicationID are set in the POST request

if (isset($_POST['status']) && isset($_POST['applicationID'])) {
    $status = $_POST['status'];
    $applicationID = (int)$_POST['applicationID']; // Cast to integer if it is an integer in the database
    $stmt = $conn->prepare("UPDATE AdoptionApplications SET ApplicationStatus = ? WHERE ApplicationID = ?");
    $stmt->bind_param("si", $status, $applicationID);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Record updated successfully.";
            // Redirect back to the admin page
            header("refresh:5;url=admin.php");
        } else {
            echo "No records updated. Application ID may not exist or already has the status {$status}.";
            // Redirect back to the admin page
            header("refresh:5;url=admin.php");
        }
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Status or ApplicationID not set in POST request.";
    // Redirect back to the admin page
    header("refresh:5;url=admin.php");
}

$conn->close();
?>