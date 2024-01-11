<?php
// views/logout.php
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']); // Remove user info from session
}
session_destroy(); // Destroy the session

// Redirect to the login page
header('Location: login.php');
exit;
?>
