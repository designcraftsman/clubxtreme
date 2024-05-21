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
        include_once("../backend/Load.php");
        include_once("../backend/endecryption.php");
        $sceances = loadSeanceEntrainements();
        $id = decryptId($_GET['id'], $key);
        foreach ($sceances as $sceance):
            if($sceance->getId() == $id):
                $sceanceToUpdate = $sceance;
                break; 
            endif;
        endforeach;
        if(isset($sceanceToUpdate)):
        $sceanceToUpdate->setLieu($_POST['lieu']);
        $idEntraineur = $_POST['entraineur'];
        $entraineurs = loadTrainers();
        foreach ($entraineurs as $entraineur) {
            if ($entraineur->getIdEntraineur() == $idEntraineur) {
                $sceanceToUpdate->setEntraineur($entraineur);
                break;
            }
        }
        $sceanceToUpdate->setExercices($_POST['exercices']); // Fixed typo here
        if(isset($_POST['date'])) {
            $sceanceToUpdate->setDate(new DateTime($_POST['date']));
        }
        $updated = updateSeanceEntrainement($sceanceToUpdate);
        if($updated){
            echo "<script>alert('mise a jour avec succes');</script>";
        }
        else{
            // If update fails
            echo "<script>alert('Informations de mise a jour invalide');</script>";
        }
        endif;    
    } else {
        // If info are wrong
        echo "<script>alert('Entrez des infos correcte');</script>";
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
        <?php 
                include_once("../backend/Load.php");
                include_once("../backend/endecryption.php");
                $sessions = loadSeanceEntrainements();
                $id = decryptId($_GET['id'], $key);
                foreach ($sessions as $session ):
                    if($session->getId() == $id):
                        $sessionToUpdate = $session ;
                        break; 
                    endif;
                endforeach;
            ?>
        <main class="col-lg-9 col-12 m-auto   mt-5 ">
        <form class="p-3 " method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?id='.encryptId($sessionToUpdate->getId(), $key); ?>">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="coach" class="mb-3">Entraineur</label>
                    <select  class="mb-3 form-select" aria-label="Default select example" name="entraineur" id="entraineur">
                    <?php 
                        $trainers = loadTrainers();
                        foreach($trainers as $trainer):
                    ?>
                        
                        <option <?php if($trainer->getIdEntraineur() == $sessionToUpdate->getEntraineur()->getIdEntraineur() ){echo "selected"; }  ?> value="<?php echo $trainer->getIdEntraineur(); ?>"><?php echo $trainer->getNom().' '.$trainer->getPrenom().' | '.$trainer->getSpecialite(); ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="exercices" class="mb-3">Exercices</label>
                    <input type="text" name="exercices"  class="form-control"  value="<?php echo isset($_POST['exercices']) ? $_POST['exercices'] : $sessionToUpdate->getExercices(); ?>">
                </div>
                <div class="col-12 col-md-6">
                    <label for="exercices" class="mb-3">Lieu</label>
                    <input type="text" name="lieu"  class="form-control"  value="<?php echo isset($_POST['lieu']) ? $_POST['lieu'] : $sessionToUpdate->getLieu(); ?>">
                </div>
                <div class="col-6">
                    <label for="date" class="mb-3">Date</label>
                    <input type="date" name="date"  class="form-control"  value="<?php echo isset($_POST['date']) ? $_POST['date'] : $sessionToUpdate->getDate()->format('Y-m-d'); ?>">
                </div>
                <div class="col-6">
                    <label for="heure" class="mb-3">Heure</label>
                    <input type="time" name="heure"  class="form-control"  value="<?php echo isset($_POST['heure']) ? $_POST['heure'] : $sessionToUpdate->getDate()->format('H:i'); ?>">
                </div>
            </div>
            <button type="submit" class=" btn btn-warning  fw-bold">Enregistrer les modifications</button>
         </form>
        </main>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>