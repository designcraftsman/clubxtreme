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
    include_once("../backend/Check.php");
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
        if (!$emptyFields && $_POST['newPassword'] == $_POST['confirmPassword'] && checkIfPasswordValid($user->getEmail(),$_POST['newPassword']) ) {
            include_once("../backend/Load.php");
            include_once("../backend/endecryption.php");
            $user->setMotDePasse($_POST['newPassword']);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
        <div class="row m-0 p-0">
            <?php include "../components/asidenav.php"; ?>
            <?php include_once("../backend/connectedUser.php"); ?>
            <main class="col-lg-9 col-12 m-auto mt-5">
                <form class="m-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2 class="fw-semibold fs-5 text-center"> Changer votre mot de passe</h2>
                    <hr class="m-4">
                    <div class="row mb-4">
                    <div class="col">
                            <label for="oldPassword" class="mb-3">Mot de passe ancien</label>
                            <div class="input-group">
                            <input type="password" id="oldPassword" name="oldPassword" class="form-control" value="<?php echo $user->getMotDePasse(); ?>">

                                <button class="btn btn-warning btn-outline-secondary" type="button"
                                    onclick="togglePasswordVisibility('oldPassword')">
                                    <i class="bi bi-eye btn-warning"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <label for="newPassword" class="mb-3">Nouveau mot de passe</label>
                            <div class="input-group">
                                <input type="password" id="newPassword" name="newPassword" class="form-control"
                                    >
                                <button class="btn btn-warning btn-outline-secondary" type="button"
                                    onclick="togglePasswordVisibility('newPassword')">
                                    <i class="bi bi-eye btn-warning"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <label for="confirmPassword" class="mb-3">Confirmer le nouveau mot de passe</label>
                            <div class="input-group">
                                <input type="password" id="confirmPassword" name="confirmPassword"
                                    class="form-control">
                                <button class="btn btn-warning btn-outline-secondary" type="button"
                                    onclick="togglePasswordVisibility('confirmPassword')">
                                    <i class="bi bi-eye btn-warning"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning fw-bold">Enregistrer</button>
                </form>
            </main>
        </div>
    </div>
<script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
  </script>
</body>

<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</html>