
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
<?php include_once "../components/navbar.php";?>
      <div class="container-fluid m-0 p-0 ">
        <div class="row m-0 p-0">
        <?php include_once "../components/asidenav.php";?>
        <?php 
            include_once("../backend/Load.php");
            include_once("../backend/endecryption.php");
            $sceancesEntrainements = loadSeanceEntrainements();
            $id = decryptId($_GET['id'], $key);
            foreach ($sceancesEntrainements as $sceancesEntrainement ):
                if($sceancesEntrainement->getId() == $id):
                    $sceancesEntrainementToView = $sceancesEntrainement ;
                    break; 
                endif;
            endforeach ;
        ?>
        <main class="col-lg-9 col-12     p-5   mt-0">
            <div class=" fs-5 row m-auto mb-3">
                <div class="fw-bold text-decoration-underline col-4">Id: </div>
                <div class="col-7"><?php echo $sceancesEntrainementToView->getId(); ?></div>
            </div>
            <div class=" fs-5 row m-auto mb-3">
                <div class="fw-bold text-decoration-underline col-4">Coach: </div>
                <div class="col-7"><?php echo $sceancesEntrainementToView->getEntraineur()->getnom().' '.$sceancesEntrainementToView->getEntraineur()->getPrenom(); ?></div>
            </div>
            <div class="fs-5 row m-auto mb-3">
                <div class=" col-4 text-decoration-underline fw-bold">Exerices: </div>
                <div class="col-7">
                    <?php echo $sceancesEntrainementToView->getExercices(); ?>
                </div>
            </div> 
            <div class="fs-5 row m-auto mb-3">
                <div class=" text-decoration-underline fw-bold col-4">Date: </div>
                <div class="col-7"><?php echo $sceancesEntrainementToView->getDate()->format('d/m/Y'); ?></div>
            </div>
            <div class="fs-5 row m-auto mb-3">
                <div class=" text-decoration-underline fw-bold col-4">Heure: </div>
                <div class="col-7"><?php echo $sceancesEntrainementToView->getDate()->format('h : m'); ?> GMT</div>
            </div>
        </main>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>