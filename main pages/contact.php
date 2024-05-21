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
<body >
<?php include("../components/nav.php") ?>
    <div class="container">
        <h1 class="fs-1 text-center fw-bold mt-5">NOUS CONTACTER</h1>
        <div class="row mt-5 p-3">
            <div class="col-lg-5 col-md-6 col-12 m-auto">
                <p class="fs-6 fw-semibold ">Les commentaires de nos membres et sympathisants sont importants pour nous et nous nous engageons à maintenir les niveaux de service client les plus élevés possibles.</p>
                <p class="fs-6 fw-normal">Pour nous aider à mieux communiquer avec vous, veuillez nous communiquer votre nom complet, votre numéro de téléphone, votre adresse e-mail et votre adresse postale chaque fois que vous nous contactez par e-mail ou par courrier. Capitalisez sur les fruits à portée de main.</p>
            </div>
            <div class="col-lg-5 col-md-6 col-12 p-2">
                <form >
                <div class="mb-3 row m-auto ">
                    <div class="col-6 m-auto">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" >
                    </div>
                    <div class="col-6 m-auto">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="prenom" >
                    </div>
                </div>
                <div class="mb-3 row  m-auto">
                    <div class="col-6 m-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" >
                    </div>
                    <div class="col-6 m-auto">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="telephone" >
                    </div>
                </div>
                <div class="row m-auto ">
                    <label for="message " class=" mb-2">Message</label>
                    <div class="m-auto col-12">
                        <textarea  id="message"  class="w-100 border-0 p-2 " rows="5"></textarea>
                    </div>
                </div>
                <div class="row m-auto mt-3 ">
                    <button type="submit" class="btn-lg btn m-auto col-12 btn-secondary fw-bold">Envoyer</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once("../components/footer.php") ?>
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/navbarTransparency.js"></script>
</body>
</html>