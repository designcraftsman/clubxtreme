<?php 
session_start(); 
include_once("../backend/Check.php");

if(! isset($_SESSION['loggedin'])){
  $_SESSION['loggedin'] = false;
}
if(!isset($_COOKIE['user_email']) and ! $_SESSION['loggedin'] ){
  header("Location: ../index.php");
  exit;
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not empty

    if (isset($_POST['search']) and !empty($_POST['search'])) {
        include_once("../backend/Load.php");
        $search = $_POST['search'];
        $membres = loadMembers();
        $membresResult= [];
        foreach ($membres as $membre):
            if($membre->getIdMembre() == $search or $membre->getNom() == $search or $membre->getPrenom() == $search or $membre->getNom().' '.$membre->getPrenom()  == $search or $membre->getNumDeTelephone() == $search or  $membre->getEmail() == $search  ):
                $membresResult[] = $membre;
                break; 
            endif;
        endforeach;  
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClubXtreme - Admin dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../css/style.css">
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

    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <?php include_once("../components/asidenav.php"); ?>
            <?php 
                include_once("../backend/Count.php");
                include_once("../backend/Load.php");
                
                if(isset($membresResult)):
                    $membres = $membresResult;
                else :
                    $membres = loadMembers();
                endif;
                $totalMembres = count($membres);
                // Selecting the last 10 subscribers
                $nouveauxAbonnees = array_slice($membres, max(0, $totalMembres - 10));
            ?>
            <main class="col-lg-9 col-12 m-auto mt-5">
                <h1 class="text-dark fs-3 fw-bold headersAnimation">Tableau de bord</h1>
                <h2 class="fw-light fs-5">Ce mois</h2>
                <div class="row mt-4 justify-content-between p-2 mt-lg-0 componentsAnimation">
                    <div class="col-12 col-sm-3  bg-warning p-3 text-center rounded-4 m-2">
                        <h3 class="fs-4 fw-light"><span class="tounrnamentsIcon"><i class="fa-solid fa-trophy"></i></span> Tournois</h3>
                        <h4 class="fs-4 fw-bold"><?php echo countEvenements(); ?></h4>
                    </div>
                    <div class="col-12 col-sm-3 bg-warning p-3 text-center rounded-4 mt-lg-0 m-2">
                        <h3 class="fs-4 fw-light"><span class="tounrnamentsIcon"><i class="fa-solid fa-calendar"></i></span> Evénements</h3>
                        <h4 class="fs-4 fw-bold"><?php echo countTournois(); ?></h4>
                    </div>
                    <div class="col-12 col-sm-3  bg-warning  p-3 text-center rounded-4 mt-lg-0 m-2">
                        <h3 class="fs-4 fw-light"><span class="tounrnamentsIcon"><i class="fa-solid fa-money-bill-transfer"></i></span> Transactions</h3>
                        <h4 class="fs-4 fw-bold"><?php echo countTransactions(); ?></h4>
                    </div>
                </div>                
                <h2 class="fw-bold  text-center fs-2 p-1 m-1 headersAnimation">Nouveaux abonnés</h2>
                <h3 class="fw-light text-center fs-5 headersAnimation">Découvrez les derniers membres du club</h3>
                <div class="table-responsive">
                <table class="table table-primary   mt-4 table-responsive componentsAnimation">
                    <thead>
                            <tr>
                                <th scope="col" class="col-3 fw-bold">Id</th>
                                <th scope="col" class="col-3 fw-bold">Nom complet</th>
                                <th scope="col" class="col-3 fw-bold">Email</th>
                                <th scope="col" class="col-3 fw-bold">Téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nouveauxAbonnees as $membre) : ?>
                                <tr>
                                    <td><?php echo $membre->getIdMembre(); ?></td>
                                    <td><?php echo $membre->getNom() . " " . $membre->getPrenom(); ?></td>
                                    <td><?php echo $membre->getEmail(); ?></td>
                                    <td><?php echo "+212 " . $membre->getNumDeTelephone(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>