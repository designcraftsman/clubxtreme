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
    <?php 
    include_once("../backend/Load.php");
    include_once("../backend/endecryption.php");
    $membres = loadMembers();
    $id = decryptId($_GET['id'], $key);
    foreach ($membres as $membre ):
        if($membre->getIdMembre() == $id):
            $memberToView = $membre ;
            break; 
        endif;
    endforeach ;
    
    $participations = loadParticipationsParMembre($memberToView->getIdMembre());
    $transactions = loadTransactionsParMembre($memberToView->getIdMembre());
    if($memberToView):
    ?>
      <div class="container-fluid m-0 p-0 ">
        <div class="row m-0 p-0">
        <?php include_once "../components/asidenav.php";?>

        <main class="col-12 col-lg-9 p-5 mt-0">
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Id:</strong> <?php echo $memberToView->getIdMembre(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Nom:</strong> <?php echo $memberToView->getNom(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Prenom:</strong> <?php  echo $memberToView->getprenom(); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Date de nassance:</strong> <?php echo $memberToView->getDateDeNaissance()->format("d/m/Y"); ?>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    <strong class="text-decoration-underline">Participant au événements:</strong> 
                    <ul class="list-unstyled ">
                        <?php foreach($participations as $participation): ?>
                            <li><?php echo $participation->getNom(); ?> </li>
                        <?php endforeach;?>
                    </ul>
                </p>
                <p class=" fs-5  m-auto mb-3 ">
                    </p>
                    <strong class="text-decoration-underline ">Transactions effectuées:</strong> 
                    <ul class="list-unstyled ">
                        <?php foreach($transactions as $transaction): ?>
                            <li><?php echo $transaction->getMontant()." ( ".$transaction->getDate()->format('d/m/Y')." )" ; ?> </li>
                        <?php endforeach;?>
                    </ul>    
                
            </main>

        </div>
        <?php  endif; ?>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>