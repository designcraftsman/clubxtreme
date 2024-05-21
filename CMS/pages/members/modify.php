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
        if (!$emptyFields and $_POST['motDePasse'] and $_POST['motDePasseConfirmation']) {
            include_once("../backend/Load.php");
            include_once("../backend/endecryption.php");
            $membres = loadMembers();
            $id = decryptId($_GET['id'], $key);
            foreach ($membres as $membre ):
                if($membre->getIdMembre() == $id):
                    $memberToUpdate = $membre ;
                    break; 
                endif;
            endforeach ;
            $memberToUpdate->setNom($_POST['nom']);
            $memberToUpdate->setPrenom($_POST['prenom']);
            if(isset($_POST['dateDenaissance'])) {
                $memberToUpdate->setDateDeNaissance(new DateTime($_POST['dateDenaissance']));
            }
            $memberToUpdate->setMotDePasse($_POST['motDePasse']);
            $memberToUpdate->setNumDeTelephone($_POST['numeroDeTelephone']);
            $updated = updateMember($memberToUpdate);
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
<?php include_once "../components/navbar.php";?>
      <div class="container-fluid m-0 p-0 ">
        <div class="row m-0 p-0">
        <?php include_once "../components/asidenav.php";
        include_once("../backend/Load.php");
        include_once("../backend/endecryption.php");
        $membres = loadMembers();
        $id = decryptId($_GET['id'], $key);
        foreach ($membres as $membre ):
            if($membre->getIdMembre() == $id):
                $memberToUpdate = $membre ;
                break; 
            endif;
        endforeach ;
        ?>
        
        <main class="col-lg-9 col-12 m-auto   mt-5 ">
        <form class="p-3" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?id='.encryptId($membre->getIdMembre(), $key); ?>">
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <label for="nom" name="nom" class="mb-3">Nom</label>
                    <input type="text" name="nom" class="form-control"  name="nom" class="form-control" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : $memberToUpdate->getNom(); ?>" >
                </div>
                <div class="col-12 col-md-6">
                    <label for="nom" class="mb-3">Prenom</label>
                    <input type="text" name="prenom" class="form-control" type="text" name="nom" class="form-control" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : $memberToUpdate->getPrenom(); ?>" >                    
                </div>
                <div class="col-12 ">
                    <label for="lieu" class="mb-3">Adresse email</label>
                    <input type="email"  name="email" class="form-control"  value="<?php echo isset($_POST['email']) ? $_POST['email'] : $memberToUpdate->getEmail(); ?>" > 
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-6">
                    <label for="description" class="mb-3">Date de naissance</label>
                    <input type="date" name="dateDenaissance"   class="form-control"   value="<?php echo isset($_POST['dateDenaissance']) ? $_POST['dateDenaissance'] : $memberToUpdate->getDateDeNaissance()->format('Y-m-d'); ?>" > 
                </div>
                <div class="col-6">
                    <label for="description" class="mb-3">Numero de tel</label>
                    <input type="tel" name="numeroDeTelephone"   class="form-control"   value="<?php echo isset($_POST['numeroDeTelephone']) ? $_POST['numeroDeTelephone'] : $memberToUpdate->getNumDeTelephone(); ?>" > 
                </div>
                <div class="col-12 col-md-6">
                    <label for="description" class="mb-3">Mot de passe</label>
                    <input type="password" name="motDePasse"   class="form-control"  value="<?php echo isset($_POST['motDePasse']) ? $_POST['motDePasse'] : $memberToUpdate->getMotDePasse(); ?>" >  
                </div>
                <div class="col-12 col-md-6">
                    <label for="description" class="mb-3">Confirmer le mot de passe</label>
                    <input type="password" name="motDePasseConfirmation"   class="form-control"  value="<?php echo isset($_POST['motDePasseConfirmation']) ? $_POST['motDePasseConfirmation'] : $memberToUpdate->getMotDePasse(); ?>" > 
                </div>
            </div>
            <button type="submit" class=" btn btn-warning  fw-bold">Enregistrer les modifications</button>
         </form>
        </main>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>