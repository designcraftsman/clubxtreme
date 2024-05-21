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
        if (!$emptyFields ) {
            include_once("../backend/Load.php");
            include_once("../backend/endecryption.php");
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            if(isset($_POST['dateDenaissance'])) {
                $user->setDateDeNaissance(new DateTime($_POST['dateDenaissance']));
            }
            $user->setNumDeTelephone($_POST['numeroDeTelephone']);
            $updated = updateUser($user);
            if($updated){
                echo "<script>alert('mise a jour avec succes');</script>";
            }
            else{
                // If update fails
                echo "<script>alert('Informations de mise a jour invalide');</script>";
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

<?php include "../components/navbar.php"; ?>
      <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0 ">
        <?php include "../components/asidenav.php"; ?>
          <main class="col-lg-9 col-12 m-auto    mt-5 p-3">
            <div  class="userInfo row ">
                <div class="col-lg-3 col-10 m-auto text-center mb-5">
                    <?php include_once("../backend/profileImages.php") ?>
                    <img src="<?php echo $paths[strtoupper(substr($user->getNom(), 0, 1))]; ?>" class="img-fluid rounded-circle m-auto personnal-space-profile-img" >
                </div>
            </div>
            <form class=" col-lg-9 col-12 m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2 class="fw-semibold fs-5 text-center"> Espace <?php echo $_SESSION['position'] ; ?></h2>
                    <h2 class="fw-semibold fs-5 text-center"> Gérer vos informations personnelles</h2>
                    <hr>
                    <div class="row mb-3">
                    <?php include_once("../backend/connectedUser.php"); ?>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <label for="nom" class="mb-3">Nom</label>
                            <input type="text" name="nom" class="form-control" value="<?php echo $user->getNom(); ?>">
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <label for="prenom" class="mb-3">Prenom</label>
                            <input type="text" name="prenom" class="form-control"value="<?php echo $user->getPrenom(); ?>" > 
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <label for="dateDeNaissance" class="mb-3">Date de naissance</label>
                            <input type="date" name="dateDeNaissance" class="form-control" value="<?php echo $user->getDateDeNaissance()->format('Y-m-d'); ?>" >
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <label for="numeroDeTelephone" class="mb-3">Numero de téléphone</label>
                            <input type="text" name="numeroDeTelephone" class="form-control" value="<?php echo $user->getNumDeTelephone(); ?>" >
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-warning  fw-bold">Enregistrer Les modifications</button>
                </form>
          </main>
        </div>
      </div>
</body>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>