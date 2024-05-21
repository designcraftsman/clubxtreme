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
    <style>

        .gallery-img {
            position: relative;
            overflow: hidden;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .gallery-img img ,.gallery-img div{
            display: block;
            width: 100%;
            height: 30vw;
            object-fit: cover;
        }
        .gallery-img div{
            min-height: 30vw;
            height: auto !important;
        }

    </style>
</head>
<body id="gallery-page-body">
<?php include("../components/nav.php") ?>
<h1 class="m-4 pb-2 text-center">Notre gallerie</h1>
<?php include_once("../components/gallery.php") ?>
<div class="container" style="max-width: 100%;">
    <!--
        <h1 class="fs-1 fw-bold mt-5 text-center pb-2">Bienvenu a notre gallerie</h1>
        <div class="row  m-auto mt-2 pt-2">
            <div class="col-6 col-sm-3 gallery-img"><img src="../Images/gallery images/geert-pieters-AfgJpWQH4lw-unsplash.jpg" alt="gallery image"></div>
            <div class="col-6 col-sm-3 gallery-img"><img src="../Images/gallery images/filip-mroz--WgTWXb4nh4-unsplash.jpg" alt="gallery image"></div>
            <div class="col-12 col-sm-6 gallery-img"><img src="../Images/gallery images/max-winkler-UFIZodJgScQ-unsplash.jpg" alt="gallery image"></div>
        </div>
        <div class="row  m-auto mt-2 pt-2">
            <div class="col-6 col-sm-7 gallery-img"><img src="../Images/gallery images/nguyen-thu-hoai-47AcOFo90lE-unsplash.jpg" alt="gallery image"></div>
            <div class="col-6 col-sm-5 gallery-img"><img src="../Images/gallery images/rob-wingate-2Qf2_k0Q5T0-unsplash.jpg" alt="gallery image"></div>
        </div>
        <div class="row  m-auto mt-2 pt-2">
            <div class="col-12 col-sm-3 gallery-img"><img src="../Images/gallery images/geert-pieters-AfgJpWQH4lw-unsplash.jpg" alt="gallery image"></div>
            <div class="col gallery-img">
                <div class="p-4" style="border: 2px solid black;">
                    <h3>Compétitions de Foot</h3> <hr>
                    <p class="fs-6">Une compétition de football est bien plus qu'un simple événement sportif. 
                        C'est une célébration de la passion, de la camaraderie et de la compétition saine.
                        Des équipes venues de différents horizons se réunissent sur le terrain, chacune 
                        représentant non seulement son club ou son pays, mais aussi l'esprit du jeu lui-même.
                    </p>
                </div>
            </div>
            <div class="col gallery-img"><img src="../Images/gallery images/max-winkler-UFIZodJgScQ-unsplash.jpg" alt="gallery image"></div>
        </div>
        <div class="row  m-auto mt-2 pt-2">
            <div class="col-12 gallery-img" style="height: auto;">
                <div class="p-4" style="border: 2px solid black; ">
                    <h3>Notre philosophie</h3> <hr>
                    <p class="fs-6">
                    Au cœur de notre philosophie se trouve la conviction que le sport va au-delà de la simple compétition ; 
                    c'est un outil puissant pour le développement personnel et la cohésion sociale. Nous promouvons des 
                    valeurs telles que le respect, l'intégrité et la résilience, en enseignant à nos membres à relever 
                    les défis avec grâce et détermination. Notre équipe d'entraîneurs est dédiée à cultiver le talent 
                    et à encourager un état d'esprit axé sur la croissance, incitant les athlètes à repousser leurs limites
                    et à viser l'excellence dans tout ce qu'ils entreprennent. Au-delà du domaine sportif, nous nous 
                    engageons à avoir un impact positif dans notre communauté, en organisant des programmes et des 
                    initiatives de sensibilisation qui promeuvent la santé, le bien-être et la responsabilité sociale.
                    À travers notre dévouement indéfectible à notre philosophie, nous aspirons à inspirer une nouvelle
                    génération d'athlètes qui incarnent les principes de l'athlétisme, du leadership et du service aux
                    autres.
                    </p>
                </div>
            </div>
        </div>
        <div class="row m-auto mt-2 pt-2">
            <div class="col-12 col-sm-6 gallery-img"><img src="../Images/gallery images/max-winkler-UFIZodJgScQ-unsplash.jpg" alt="gallery image"></div>
            <div class="col-12 col-sm-3 gallery-img"><img src="../Images/gallery images/jeffrey-f-lin-ymVaGKsBQXM-unsplash.jpg" alt="gallery image"></div>
            <div class="col-12 col-sm-3 gallery-img"><img src="../Images/gallery images/lars-bo-nielsen-xewH-utuFYA-unsplash.jpg" alt="gallery image"></div>
        </div>
        <div class="row  m-auto mt-2 pt-2">
            <div class="col-6 col-sm-3 gallery-img"><img src="../Images/gallery images/sven-mieke-Lx_GDv7VA9M-unsplash.jpg" alt="gallery image"></div>
            <div class="col-6 col-sm-3 gallery-img"><img src="../Images/gallery images/izuddin-helmi-adnan-ndxwXAt0jpg-unsplash.jpg" alt="gallery image"></div>
            <div class="col-12 col-sm-6 gallery-img"><img src="../Images/gallery images/jannes-glas-0NaQQsLWLkA-unsplash.jpg" alt="gallery image"></div>
        </div>
    -->
    </div>

<?php include("../components/footer.php") ?>
<script>
    const imgContent = document.querySelectorAll('.img-content-hover');

function showImgContent(e) {
  for(var i = 0; i < imgContent.length; i++) {
    x = e.pageX;
    y = e.pageY;
    imgContent[i].style.transform = `translate3d(${x}px, ${y}px, 0)`;
  }
};

document.addEventListener('mousemove', showImgContent);
</script>
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/navbarTransparency.js"></script>
</body>
</html>