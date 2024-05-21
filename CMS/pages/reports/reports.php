
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
        $rapports = loadRapports();
        $rapportsResult= [];
        foreach ($rapports as $rapport):
            if($rapport->getIdTapport() == $search or $rapport->getDate() == $search or $rapport->getDestinataire()->getNom() == $search or $rapport->getContenu()==$search or $rapport->getAuteur()->getNom() == $search):
                $rapportsResult[] = $rapport;
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
            <h1 class="fw-bold text-center fs-2 p-1 m-1 headersAnimation">Rapports</h1>
            <div class="table-responsive">
                <table class="table table-primary   mt-4 table-responsive componentsAnimation">
                    <thead>
                            <tr>
                                <th scope="col" class="col-2">Id rapport</th>
                                <th scope="col" class="col-2">Date</th>
                                <th scope="col" class="col-2">Auteur</th>
                                <th scope="col" class="col-2">Contenu</th>
                                <th scope="col" class="col-2">Destinataire</th>
                                <th scope="col" class="col"><a href="add.php" class="btn  btn-warning  fw-bold">Rédiger un rapport</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include_once("../backend/endecryption.php");
                                include_once("../backend/Load.php");
                                $rapports = loadRapports();
                                if(isset($rapportsResult)):
                                    $rapports = $rapportsResult;
                                else :
                                    $rapports = loadRapports();
                                endif;

                                foreach($rapports as $rapport):
                            ?>
                            <tr class="align-middle">
                                <td><?php echo $rapport->getIdTapport(); ?></td>
                                <td><?php echo $rapport->getDate()->format('Y-m-d'); ?></td>
                                <td><?php echo $rapport->getAuteur()->getNom(); ?></td>
                                <td><?php echo $rapport->getContenu(); ?></td>
                                <td><?php echo $rapport->getDestinataire()->getNom(); ?></td>
                                <td >
                                    <div class="dropdown col-2 m-auto" >
                                        <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink<?php echo $rapport->getIdTapport(); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis fa-xl"></i>
                                        </a>
                                        <ul class="dropdown-menu text-center p-0" aria-labelledby="dropdownMenuLink<?php echo $rapport->getIdTapport(); ?>">
                                            <li><a class="dropdown-item border p-2 " href="./view.php?id=<?php echo encryptId($rapport->getIdTapport(), $key); ?>"><i class="fa-solid fa-circle-info"></i> Consulter</a></li>
                                            <?php if($_SESSION["position"] == "personnelAdministratif" OR $_SESSION["position"] == "admin"): ?><li><a type="button" class="dropdown-item border p-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $rapport->getIdTapport(); ?>" ><i class="fa-solid fa-trash"></i> Supprimer</a></li><?php endif; ?>
                                        </ul>
                                    </div>
                                </td>
                                <div class="modal fade" id="exampleModal<?php echo $rapport->getIdTapport(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Voulez vous vraiment supprimer ce rapport ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                <a href="delete.php?id=<?php echo encryptId($rapport->getIdTapport(), $key); ?>" type="button" class="btn btn-danger">Supprimer</a>
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