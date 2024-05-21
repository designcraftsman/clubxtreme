<?php
session_start(); // Start the session
include_once("../backend/Load.php");
include_once("../backend/Check.php");

// Check if email and password are set and not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    // Retrieve email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    $users = loadUsers();
    $loggedIn = false;
    foreach ($users as $user) {
        if ($user->getEmail() == $email && $password == $user->getMotDePasse()) {
            // Login success
            $_SESSION["loggedin"] = true;
            $_SESSION["user"] = $user;
            $_SESSION["position"] = checkUser($user);
            $loggedIn = true;
            break;
        }
    }

    if ($loggedIn) {
        // Redirect to dashboard or homepage
        header("Location: ./index.php");
        exit(); // Stop further execution
    } else {
        // If login fails, set error message and redirect back to login page
        $_SESSION["error"] = "Invalid email or password";
        header("Location: ./login.php");
        exit(); // Stop further execution
    }
} else {
    // If email or password is empty, set error message and redirect back to login page
    $_SESSION["error"] = "Please enter both email and password";
    header("Location: ./login.php");
    exit(); // Stop further execution
}
?>
