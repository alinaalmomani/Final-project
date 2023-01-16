<?php
// Start the session
session_start();

// Destroy the current session
if (session_destroy()) {
    // Redirect to the login page
    header("Location: login.php");
}
?>