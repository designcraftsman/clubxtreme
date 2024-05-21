<?php
session_start(); 
include_once("../backend/Load.php");
include_once("../backend/Check.php");
// check if a cookie has been set
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
// if user is not logged in, redirect to login page
if(! $_SESSION['loggedin']){
    header("Location:./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClubXtreme</title>
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="payment-page-body" >
    <?php include_once("../components/nav.php"); ?>
    <div class="m-2 m-md-4">
        <?php include_once("../components/payment.php"); ?>
    </div>
</body>
<script>
    var container = document.querySelector('.container');

    function setPaymentMode(mode){
    if(mode === 'cash'){
        container.classList.add('cash-selected');
        container.classList.remove('card-selected');
    } else {
        container.classList.add('card-selected');
        container.classList.remove('cash-selected');
    }
    }
</script>
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/navbarTransparency.js"></script>
</body>
</html>