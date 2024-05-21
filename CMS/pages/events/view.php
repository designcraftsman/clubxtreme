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
            $evenements = loadEvenemets();
            $id = decryptId($_GET['id'], $key);
            foreach ($evenements as $evenement ):
                if($evenement->getIdEvenement() == $id):
                    $evenementToView = $evenement ;
                    break; 
                endif;
            endforeach ;
        ?>
        <?php if($evenementToView) : ?>
            <main class="col-12 col-lg-9 p-5 mt-0">
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Id:</strong> <?php echo $evenementToView->getIdEvenement(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Evénement:</strong> <?php echo $evenementToView->getNom(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Date:</strong> <?php  echo $evenementToView->getDate()->format("d m Y"); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Lieu:</strong> <?php echo $evenementToView->getLieu(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Heure:</strong> <?php echo $evenementToView->getdate()->format("H:i"); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline ">Description:</strong> <?php echo $evenementToView->getDescription(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline ">Participant:</strong> 
                    <ul>
                            <?php 
                                $participants = loadParticipantsByEventName($evenementToView->getNom());
                                foreach($participants as $participant):
                            ?>
                                <li><?php echo $participant->getNom().' '.$participant->getPrenom(); ?> </li>
                            <?php endforeach; ?>
                    </ul>
                </p>
            </main>
        <?php endif; ?>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>