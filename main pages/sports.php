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
        <h1 class="fs-1 fw-bold mt-2 text-center pb-2">Nos Sports</h1>
        <div class="row mt-4 m-auto " id="football">
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/lars-bo-nielsen-xewH-utuFYA-unsplash.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Football</h2>
                <p class="fs-6 mt-3">Le club offre des entraînements réguliers dispensés par des entraîneurs expérimentés. Les membres ont également la possibilité de participer à des matchs amicaux et à des tournois locaux et régionaux.</p>
            </div>
        </div>
        <hr>
        <div class="row  m-auto mt-4 pt-3" id="volley">
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Volley ball</h2>
                <p class="fs-6 mt-3">Pour les amateurs de volleyball, le club propose des séances d'entraînement hebdomadaires, des matchs amicaux contre d'autres clubs et des compétitions locales. Les membres ont également accès à des installations de qualité pour pratiquer et améliorer leurs compétences.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/jannes-glas-0NaQQsLWLkA-unsplash.jpg" class="w-100" alt="">
            </div>
        </div>
        <hr>
        <div class="row mt-4 m-auto " id="cyclisme">
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/markus-spiske-WUehAgqO5hE-unsplash.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Cyclisme</h2>
                <p class="fs-6 mt-3">Le club organise des sorties cyclistes régulières, adaptées à différents niveaux de compétence. Des événements spéciaux, tels que des randonnées cyclistes et des défis de longue distance, sont également organisés pour les membres passionnés de cyclisme.</p>
            </div>
        </div>
        <hr>
        <div class="row  m-auto mt-4 pt-3" id="musculation">
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Musculation</h2>
                <p class="fs-6 mt-3">Pour les amateurs de musculation, le club offre un accès à une salle de musculation bien équipée avec des équipements modernes. Des entraîneurs professionnels sont disponibles pour fournir des conseils et des programmes d'entraînement personnalisés.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/sven-mieke-Lx_GDv7VA9M-unsplash.jpg" class="w-100" alt="">
            </div>
        </div>
        <hr>
        <div class="row mt-4 m-auto " id="kickboxing">
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/pablo-rebolledo-h8sl-oNcat0-unsplash.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Kick boxing</h2>
                <p class="fs-6 mt-3">Les membres du club peuvent participer à des séances d'entraînement de kickboxing dirigées par des instructeurs qualifiés. Les sessions comprennent des exercices de conditionnement physique, des techniques de combat et des combats simulés pour améliorer les compétences et la forme physique.</p>
            </div>
        </div>
        <hr>
        <div class="row  m-auto mt-4 pt-3" id="natation">
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Natation</h2>
                <p class="fs-6 mt-3">Le club propose des cours de natation pour tous les niveaux, des débutants aux nageurs expérimentés. Les membres ont accès à des piscines intérieures et extérieures, ainsi qu'à des séances d'entraînement supervisées par des instructeurs certifiés.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/guy-kawasaki-2q3JHgR2MK8-unsplash.jpg" class="w-100" alt="">
            </div>
        </div>
        <hr>
        <div class="row mt-4 m-auto  " id="course">
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/steven-lelham-atSaEOeE8Nk-unsplash.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Course</h2>
                <p class="fs-6 mt-3">Les passionnés de course à pied peuvent rejoindre le club pour des sessions d'entraînement hebdomadaires, des courses en groupe et des événements de course organisés. Des conseils d'entraînement personnalisés et des plans de course sont également disponibles pour les membres.</p>
            </div>
        </div>
        <hr>
        <div class="row  m-auto mt-4 pt-3" id="minifoot">
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Mini Foot</h2>
                <p class="fs-6 mt-3">Le club propose des matchs de mini-football réguliers dans des installations adaptées. Les membres peuvent former des équipes et participer à des tournois locaux et régionaux pour tester leurs compétences et leur esprit d'équipe.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/jeffrey-f-lin-ymVaGKsBQXM-unsplash.jpg" class="w-100" alt="">
            </div>
        </div>
        <hr>
        <div class="row  m-auto mt-4 pt-3" id="basketball">
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/basketball.jpg" class="w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">BasketBall</h2>
                <p class="fs-6 mt-3">
                Le club propose des séances d'entraînement de basketball régulières, dirigées par des entraîneurs expérimentés. Les membres ont l'occasion de développer leurs compétences en dribble, en tir et en jeu d'équipe lors de ces séances. De plus, le club participe à des tournois locaux et régionaux, offrant aux membres la possibilité de mettre en pratique leurs compétences dans des matchs compétitifs. Les installations modernes du club comprennent des terrains de basketball intérieurs et extérieurs, offrant un environnement idéal pour les membres de tous niveaux pour pratiquer et s'améliorer.
                </p>
            </div>
        </div>
        <hr>
        <div class="row mt-4 m-auto " id="skating">
            <div class="col-lg-8 col-md-6 col-12 m-auto">
                <h2 class="fw-bold fs-3">Skating</h2>
                <p class="fs-6 mt-3">Pour les adeptes du patin à roulettes ou du patinage en ligne, le club offre des sessions d'entraînement dirigées par des instructeurs expérimentés. Les membres ont accès à des pistes de patinage intérieures et extérieures pour pratiquer et améliorer leurs compétences.</p>
            </div>
            <div class="col-lg-4 col-md-6 col-12  m-auto">
                <img src="../Images/gallery images/douglas-bagg-vS0p2OnshVE-unsplash.jpg" class="w-100" alt="">
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