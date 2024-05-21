<?php 
session_start(); 
if(! isset($_SESSION['loggedin'])){
  $_SESSION['loggedin'] = false;
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
        <h1 class="fs-1 fw-bold mt-5 text-center pb-5">A Propos de ClubXtreme</h1>
        <div class="row mt-5 m-auto ">
            <div class="col-lg-5 col-md-6 col-12  m-auto">
                <img src="../Images/pexels-victorfreitas-841130.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-5 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Notre mission</h2>
                <p class="fs-6 mt-3">À ClubXtreme, notre mission est de promouvoir la passion pour le sport et de créer un environnement accueillant où chacun peut s'épanouir, se développer et s'engager dans une vie sportive saine et épanouissante. Nous croyons en l'importance du sport pour le bien-être physique, mental et social de nos membres, et nous nous engageons à offrir des programmes et des services de qualité pour répondre à leurs besoins.</p>
            </div>
        </div>
        <div class="row  m-auto mt-5 pt-5">
            <div class="col-lg-5 col-md-6 col-12  m-auto">
                <h2 class="fw-bold fs-3">Nos Valeurs</h2>
                <p class="fs-6 mt-3">Chez ClubXtreme nous sommes guidés par des valeurs fondamentales qui définissent notre identité et notre façon de travailler. Nous croyons en :
                    <ul class="fw-normal ms-2">
                        <li>L'esprit d'équipe et la camaraderie</li>
                        <li>Le respect et l'intégrité</li>
                        <li>La passion et l'engagement</li>
                        <li>L'excellence et le dépassement de soi</li>
                    </ul>
            </p>
            </div>
            <div class="col-lg-5 col-md-6 col-12  m-auto">
                <img src="../Images/pexels-julia-larson-6456180.jpg" class="w-100" alt="">
            </div>
        </div>
        <div class="row mt-5 pt-5">
            <h2 class="fs-2 text-center mb-5">Nos Entraineurs</h2>
            <div class="col-lg-3 col-md-6 col-12 m-auto trainers mt-5">
                <img src="../Images/front-view-fit-man-posing-while-wearing-tank-top-with-crossed-arms.jpg" class="object-fit-cover w-100 " alt="">
                <h3 class="text-center fw-bold mt-3 fs-5">Jack Reacher</h3>
                <h4 class="text-center fw-light mt-3 fs-5">Coach de Karaté</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-12 m-auto trainers mt-5">
                <img src="../Images/pexels-shvetsa-4587383.jpg" class=" w-100 object-fit-cover " alt="">
                <h3 class="text-center fw-bold mt-3 fs-5">Laura Priston</h3>
                <h4 class="text-center fw-light mt-3 fs-5">Coach de Yoga</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-12 m-auto trainers mt-5">
                <img src="../Images/pexels-cottonbro-4754130.jpg" class="w-100 object-fit-cover " alt="">
                <h3 class="text-center fw-bold mt-3 fs-5">Frank Castle</h3>
                <h4 class="text-center fw-light mt-3 fs-5">Coach de Box</h4>
            </div>
        </div>
</div>
<?php include("../components/footer.php") ?>
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/navbarTransparency.js"></script>
</body>
</html>