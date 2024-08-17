<?php
session_start(); // Start the session at the beginning of the script
include '../database.php';

// Sanitize input data
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$userIP = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

// Prepare and execute the query to authenticate the user and fetch the admin status
$stmt = $conn->prepare("SELECT Password, Admin FROM Users WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Use password_verify to check the entered password against the stored hash
    if (password_verify($password, $user['Password'])) {
        // Authentication successful
        $_SESSION['username'] = $username; // Set the username in the session
        $_SESSION['admin'] = $user['Admin']; // Set the admin status in the session

        // Insert login record with IP address into the database
        $insertStmt = $conn->prepare("INSERT INTO LoginRecords (Username, LoginDate, LoginTime, IPAddress) VALUES (?, CURDATE(), CURTIME(), ?)");
        $insertStmt->bind_param("ss", $username, $userIP);
        $insertStmt->execute();
        $insertStmt->close();

        echo "Login successful. Redirecting to home page...";
        header("Refresh:3; url=../index.php");
    } else {
        // Authentication failed
        echo "Invalid username or password. Redirecting to login page...";
        header("Refresh:3; url=login.html");
    }
} else {
    // User not found
    echo "Invalid username or password. Redirecting to login page...";
    header("Refresh:3; url=login.html");
}

$stmt->close();
$conn->close();
?>
