<?php 
session_start(); 
if(! isset($_SESSION['loggedin'])){
  $_SESSION['loggedin'] = false;
}
if(isset($_COOKIE['user_email']) and$_SESSION['loggedin'] ){
  include_once('../backend/Load.php');
  include_once("../backend/Check.php");

  $users = loadUsers();
  foreach($users as $user):
    if($user->getEmail() == $_COOKIE['user_email']):
      $_SESSION["loggedin"] = true;
      $_SESSION["user"] = $user;
      $connectedUser = $user;
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
    <title>ClubXtreme - Admin dashboard</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- favicon -->
    <link rel="icon" href="../../../Images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../Images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../Images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../Images/favicon.png">
    <link rel="manifest" href="../../../Images/favicon.png">
    <meta name="theme-color" content="#ffffff">
  </head>
<body>

<?php include_once '../components/navbar.php';?>
      <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0 ">
        <?php include_once '../components/asidenav.php';?>
          <main class="col-lg-9 col-12 m-auto    mt-5">
            <h1 class="fs-1 fw-bold text-center"> Gérer votre compte</h1>
            <div class="row mt-5 m-auto">
                <div class="col-lg-5 col-md-5 col-12 border rounded m-auto  mb-3 ">
                    <a href="personnelinfo.php" class="text-decoration-none d-flex p-3 align-items-center justify-content-between text-dark ">
                        <div class="text-start d-flex justify-content-between  align-items-center">
                            <span ><i class="fa-solid fa-user fa-xl"></i></span> 
                            <div class="ms-3">
                                <h2 class="fs-5 m-0">Infos peronnelles</h2>
                                <p class="m-0">Gérer vos informations telles que votre date de naissance et votre nom</p>
                            </div>
                        </div>
                        <span ><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                </div>
                <div class="col-lg-5 col-md-5 col-12 border rounded mb-3 ">
                <a href="password.php" class="text-decoration-none d-flex p-3 align-items-center justify-content-between text-dark ">
                        <div class="text-start d-flex justify-content-between  align-items-center">
                            <span ><i class="fa-solid fa-lock fa-xl"></i></span> 
                            <div class="ms-3">
                                <h2 class="fs-5 m-0">Securité</h2>
                                <p class="m-0">Changer le mot de passe de votre compte</p>
                            </div>
                        </div>
                        <span ><i class="fa-solid fa-chevron-right"></i></span>
                </a>
                </div>
                
            </div>
          </main>
        </div>
      </div>
</body>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script></html>