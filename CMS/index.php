<?php 
session_start(); 
include_once("../backend/Check.php");

if(! isset($_SESSION['loggedin'])){
  $_SESSION['loggedin'] = false;
}

if(isset($_COOKIE['user_email']) and$_SESSION['loggedin'] ){
  include_once('../backend/Load.php');
  $users = loadUsers();
  foreach($users as $user):
    if($user->getEmail() == $_COOKIE['user_email']):
      $_SESSION["loggedin"] = true;
      $_SESSION["user"] = $user;
      $_SESSION["position"] = checkUser($user);
      break;
    endif;
  endforeach;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php 
    if(isset($_SESSION['loggedin'] )){
        header("Location: ./pages/dashboard/dashboard.php");
        exit;
    }   
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <a  class="navbar-brand mx-auto text-center w-100" href="../../../main pages/index.php" >
                            <img src="../Images/logo.png" width="185" class="m-auto" >
                        </a>
                        <h1 class="card-title text-center mb-4">Access Denied</h1>
                        <p class="card-text text-center">You need to be logged in to access this page.</p>
                        <div class="text-center">
                            <button onclick="goBack()" class="btn btn-primary mr-2">Go Back</button>
                            <button onclick="goToLogin()" class="btn btn-warning">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Link Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }

        function goToLogin() {
            window.location.href = '../main pages/login.php';
        }
    </script>
</body>
</html>
