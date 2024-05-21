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
        $transactions = loadTransactions();
        $transactionsResultat= [];
        foreach ($transactions as $transaction):
            if($transaction->getId_transaction() == $search or $transaction->getDate() == $search or $transaction->getMontant() == $search or $transaction->getMembre()->getIdMembre() == $search or $transaction->getMembre()->getNom() == $search or  $transaction->getMembre()->getPrenom() == $search or  $transaction->getMembre()->getNom().' '.$transaction->getMembre()->getPrenom()  == $search or $transaction->getType()== $search  ):
                $transactionsResultat[] = $transaction;
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
            <h1 class="fw-bold text-center fs-2 p-1 m-1 headersAnimation">Transaction</h1>
            <div class="table-responsive">
                <table class="table table-primary   mt-4 table-responsive componentsAnimation">
                    <thead>
                            <tr>
                                <th scope="col" class="col-2">Id transaction</th>
                                <th scope="col" class="col-2">Id membre</th>
                                <th scope="col" class="col-2">Montant (dh)</th>
                                <th scope="col" class="col-2">Date</th>
                                <th scope="col" class="col-2">Type</th>
                                <th scope="col" class="col"><a href="./add.php" class="btn btn-warning fw-bold">Ajouter une transaction</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include_once("../backend/Load.php");
                                include_once("../backend/endecryption.php");
                                if(isset($transactionsResultat)):
                                    $transactions = $transactionsResultat;
                                else:
                                    $transactions = loadTransactions();
                                endif;
                                foreach($transactions as $transaction):
                            ?>
                            <tr class="align-middle">
                                <td><?php echo $transaction->getId_transaction(); ?></td>
                                <td><?php echo $transaction->getMembre()->getIdMembre(); ?></td>
                                <td><?php echo $transaction->getMontant(); ?></td>
                                <td><?php echo $transaction->getDate()->format('Y-m-d'); ?></td>
                                <td><?php echo $transaction->getType(); ?></td>
                                <td>
                                    <div class="dropdown col-2 m-auto">
                                        <a class="btn btn-secondary " href="#" role="button" id="dropdownMenuLink<?php echo $transaction->getId_transaction(); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis fa-xl"></i>
                                        </a>
                                        <ul class="dropdown-menu text-center p-0" aria-labelledby="dropdownMenuLink<?php echo $transaction->getId_transaction(); ?>">
                                            <li><a class="dropdown-item border p-2 " href="./view.php?id=<?php echo encryptId($transaction->getId_transaction(), $key); ?>"><i class="fa-solid fa-circle-info"></i> Consulter</a></li>
                                        </ul>
                                    </div> 
                                </td>
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
</html>