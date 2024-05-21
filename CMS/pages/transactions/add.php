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
        <form class="p-3 ">
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <label for="lieu" class="mb-3">Id membre</label>
                    <input type="date" name="lieu" class="form-control" >
                </div>
                <div class="col-12 col-md-6">
                    <label for="sport" class="mb-3">Type d'abonnment</label>
                <select class="form-select m-0" aria-label="sport">
                    <option selected>normal</option>
                    <option value="1">premium</option>

                </select>  
                </div>
                <div class="col-12 col-md-6">
                    <label for="lieu" class="mb-3">Date</label>
                    <input type="date" name="lieu" class="form-control"  >
                </div>
            </div>
            <div class="row mb-5">
                
                    <label for="amount" class="mb-3">Montant</label>
                    <div class="input-group">
                    <input type="text" name="amount" class="form-control" aria-label="Dirham amount">
                    <span class="input-group-text">dh</span>
                </div>
            </div>
            <button type="submit" class=" btn btn-warning  fw-bold">Enregistrer transaction</button>
         </form>
        </main>
        </div>
 <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>