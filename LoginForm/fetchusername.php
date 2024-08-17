<?php
session_start(); // Ensure the session is continued

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // This assumes the login process has set $_SESSION['username']
} else {
    $username = 'Guest';
}
?>