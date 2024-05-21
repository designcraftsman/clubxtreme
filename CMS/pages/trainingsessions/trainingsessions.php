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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not empty

    if (isset($_POST['search']) and !empty($_POST['search'])) {
        include_once("../backend/Load.php");
        $search = $_POST['search'];
        $sceanceEntrainements = loadSeanceEntrainements();
        $sceanceEntrainementsResultat= [];
        foreach ($sceanceEntrainements as $sceanceEntrainement):
            if($sceanceEntrainement->getDate() == $search or $sceanceEntrainement->getEntraineur()->getNom() == $search or $sceanceEntrainement->getEntraineur()->getPrenom() == $search or $sceanceEntrainement->getEntraineur()->getNom().' '.$sceanceEntrainement->getEntraineur()->getPrenom()  == $search or $sceanceEntrainement->getExercices()== $search  ):
                $sceanceEntrainementsResultat[] = $sceanceEntrainement;
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
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <?php include_once "../components/asidenav.php";?>
            <main class="col-lg-9 col-12 m-auto mt-0">
            <h1 class="fw-bold text-center fs-2 p-1 m-1 headersAnimation">Scéances d'entrainements</h1>
            <div class="table-responsive">
                <table class="table table-primary   mt-4 table-responsive componentsAnimation">
                    <thead>
                            <tr>
                                <th scope="col" class="col-2">Id</th>
                                <th scope="col" class="col-2">Coach</th>
                                <th scope="col" class="col-2">Exercices</th>
                                <th scope="col" class="col-2">Date</th>
                                <th scope="col" class="col-2">Heure</th>
                                <th scope="col" class="col"><a href="add.php" class="btn btn-warning fw-bold">Ajouter une séance</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include_once("../backend/Load.php");
                                include_once("../backend/endecryption.php");
                                if(isset($sceanceEntrainementsResultat)):
                                    $sessions = $sceanceEntrainementsResultat;
                                else :
                                    $sessions = loadSeanceEntrainements();
                                endif;
                                
                                foreach($sessions as $session):
                            ?>
                            <tr class="align-middle">
                                <td><?php echo $session->getId(); ?></td>
                                <td><?php echo $session->getEntraineur()->getNom().' '.$session->getEntraineur()->getNom(); ?></td>
                                <td><?php echo $session->getExercices(); ?></td>
                                <td><?php echo $session->getDate()->format('d m Y'); ?></td>
                                <td><?php echo $session->getDate()->format('h m').' GTM'; ?></td>
                                <td>
                                    <div class="dropdown col-2 m-auto">
                                        <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis fa-xl"></i>
                                        </a>
                                        <ul class="dropdown-menu text-center p-0" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item border p-2 " href="./view.php?id=<?php echo encryptId($session->getId(), $key); ?>"><i class="fa-solid fa-circle-info"></i> Consulter</a></li>
                                            <?php if($_SESSION["position"] == "personnelAdministratif" OR $_SESSION["position"] == "admin" OR $_SESSION["position"]=="entraineur"): ?><li><a class="dropdown-item border p-2" href="./modify.php?id=<?php echo encryptId($session->getId(), $key); ?>"><i class="fa-solid fa-pencil"></i> Modifier</a></li> <?php endif; ?>
                                                <?php if($_SESSION["position"] == "personnelAdministratif" OR $_SESSION["position"] == "admin" OR $_SESSION["position"]=="entraineur"): ?><li>
                                                <a type="button" class="dropdown-item border p-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $session->getId(); ?>" ><i class="fa-solid fa-trash"></i> Supprimer</a>
                                            </li><?php endif;?>
                                        </ul>
                                    </div>
                                </td>
                                <div class="modal fade" id="exampleModal<?php echo $session->getId(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Voulez vous vraiment supprimer cette séance ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <a href="delete.php?id=<?php echo encryptId($session->getId(), $key); ?>" type="button" class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>