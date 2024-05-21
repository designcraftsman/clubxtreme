<?php
session_start();
// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE['user_email'])) {
    setcookie('user_email', '', time()-42000, '/');
}

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../../../main pages/index.php");
exit;
?>
