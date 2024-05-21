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
<?php
include_once("../backend/Update.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not empty
    $emptyFields = false;
    foreach ($_POST as $key => $value) {
        if (empty(trim($value))) {
            $emptyFields = true;
            break; // Exit the loop early if any empty field is found
        }
    }
    if (!$emptyFields) {
        include_once("../backend/Save.php");
        if(isset($_POST['dateDeNaissance'])) {
            $date = new DateTime($_POST['dateDeNaissance']) ;
        }
        $memberToSave = new Membre(1000 ,
            1000,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['motDePasse'],
            $date,
            $_POST['numDeTelephone']
        );

        $saved = saveMember($memberToSave);
        if($saved){
            echo "<script>alert('membre sauvegardé avec succes');</script>";
        }
        else{
            // If update fails
            echo "<script>alert('Informations saisie invalide');</script>";
        }
        
    } else {
        // If info are wrong
        echo "<script>alert('Entrez vos infos correctememt');</script>";
    }
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
        <main class="col-lg-9 col-12 m-auto   mt-5 ">
        <form class="p-3" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nom" class="mb-3">Nom</label>
                    <input type="text" name="nom" class="form-control"  >
                </div>
                <div class="col-6">
                    <label for="prenom" class="mb-3">Prenom</label>
                    <input type="text" name="prenom" class="form-control"  >
                    
                </div>
                <div class="col-12 col-md-6">
                    <label for="email" class="mb-3">Adresse email</label>
                    <input type="email" name="email" class="form-control"  >
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 col-md-6">
                    <label for="numDeTelephone" class="mb-3">Numéro de telephone</label>
                    <input type="tel" name="numDeTelephone"  class="form-control"  >
                </div>
                <div class="col-12 col-md-6">
                    <label for="dateDeNaissance" class="mb-3">Date de naissance</label>
                    <input type="date" name="dateDeNaissance"  class="form-control"  >
                </div>
                <div class="col-12 col-md-6">
                    <label for="motDePasse" class="mb-3">Mot de passe</label>
                    <input type="password" name="motDePasse"  class="form-control"  >
                </div>
                <div class="col-12 col-md-6">
                    <label for="motDePasseConfirmation" class="mb-3">Confirmer le mot de passe</label>
                    <input type="password" name="motDePasseConfirmation"   class="form-control"  >
                </div>
            </div>
            <button type="submit" class=" btn btn-warning  fw-bold">Ajouter membre</button>
         </form>
        </main>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>