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
    <title>ClubXtreme - Admin dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
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

<nav class="navbar navbar-light bg-dark sticky-top  p-2">
        <div class="container-fluid">
          <a class="navbar-brand">
            <img src="../assets/img/logo/white logo.svg" width="185" >
          </a>
          <div class="d-flex ">
              <form class="d-lg-flex d-none align-items-center justify-content-between me-5 ">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                <i class="fa-solid fa-magnifying-glass text-white"></i>
              </form>
              <a type="button" href="user.php" class="user">
                <img src="../../assets/img/logo/review3.jpg" class="w-100 rounded-circle   user__icon" alt="">
              </a>
          </div>
        </div>
</nav>
      <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0 ">
        <nav class="col-2 bg-secondary d-lg-flex flex-column asideNavbar  p-0 d-none   ">
            <ul class="list-unstyled d-flex flex-column  align-items-start  p-4  pt-5  ps-5 ">
              <li class="link mb-4 text-start  "><a href="dashboard.php" class="fs-5 text-dark fw-bold text-decoration-none "><i class="fa-solid fa-house"></i> Tableau de bord</a></li>
              <li class="link mb-4 text-start  "><a href="members/members.php" class="fs-5 fw-light text-dark text-decoration-none "><i class="fa-solid fa-users"></i> Membres</a></li>
              <li class="link mb-4 "><a href="events/events.php" class="fs-5 text-dark fw-light text-decoration-none "><i class="fa-solid fa-calendar"></i> Evénements</a></li>
              <li class="link mb-4"><a href="transactions/transactions.php" class="fs-5 text-dark fw-light text-decoration-none "><i class="fa-solid fa-money-bill-transfer"></i> Transactions</a></li>
              <li class="link mb-4"><a href="trainingsessions/trainingsessions.php" class="fs-5 text-dark fw-light text-decoration-none "><i class="fa-solid fa-rectangle-list"></i> Séances d'entrainements</a></li>
              <li class="link mb-4"><a href="reports/reports.php" class="fs-5 text-dark fw-light text-decoration-none "><i class="fa-solid fa-flag"></i> Rapports</a></li>
            </ul>
            <div class="bg-dark mt-auto text-center p-3 ">
              <a href="../../../main pages/index.php" class=" text-decoration-none  fs-5 text-white  fw-bold" ><i class="fa-solid fa-right-from-bracket"></i> Se deconnecter</a>
            </div>
          </nav>
          <main class="col-lg-9 col-12 m-auto    mt-5">
                <form class=" m-auto ">
                    <div class="row mb-5">
                        <div class="col">
                            <label for="lieu" class="mb-3">Ancien mot de passe</label>
                            <input type="password" name="lieu" class="form-control" value="fayz">
                        </div>
                        <div class="col">
                            <label for="sport" class="mb-3">Nouveau mot de passe</label>
                            <input type="password" name="lieu" class="form-control"value="oussama" > 
                        </div>
                        <div class="col">
                            <label for="lieu" class="mb-3">Confirmer le nouveau mot de passe</label>
                            <input type="password" name="lieu" class="form-control"  >
                        </div>
                    </div>
                    
                    <button type="submit" class=" btn btn-warnings  fw-bold">Enregistrer</button>
                </form>
           
          </main>
        </div>
      </div>
</body>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>