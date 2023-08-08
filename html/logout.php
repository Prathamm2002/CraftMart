<?php
// (K) Start session
session_start();

// (L) Include User class and configuration
// require_once "User.php"; // Make sure to replace "User.php" with the actual path to your User class file
require_once "../database.php"; // Make sure to replace "config.php" with the actual path to your configuration file

// (M) Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // (N) Clear session data
    unset($_SESSION['user_id']);

    // (P) Unset JWT token from session
    unset($_SESSION['jwt_token']);
    
    session_destroy();
}

// (O) Redirect user to login page
header("Location: index.php"); // Replace "login.php" with the actual path to your login page
exit();
?>
