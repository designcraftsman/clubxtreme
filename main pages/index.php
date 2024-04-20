<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClubXtreme</title>
    <!-- fontawesome icons -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- favicon -->
    <link rel="icon" href="../Images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../Images/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Images/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Images/favicon.png">
    <link rel="manifest" href="../Images/favicon.png">
    <meta name="theme-color" content="#ffffff">
    <!-- icons , fonts-->
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

<section id="hero-section" >
    <div class="background-image">
    </div>
    
    <div class="content ">
        <h1>ClubXtreme</h1>
        <p>La nouvelle solution de gestion des clubs sportifs</p>
        <ul>
          <li><i class="bi bi-check"></i>Surveiller et analyser toutes les données d'entraînement.</li>
          <li><i class="bi bi-check"></i>Gérer et comprendre vos membres a l'aide de notre solution.</li>
          <li><i class="bi bi-check"></i>Enregistrer et surveiller toute transaction grace a notre systeme de gestion des finance.</li>
        </ul>
        <a href="#">Get now <i class="bi bi-arrow-right-short"></i> </a>
    </div>
</section>
<?php include_once("../components/subscriptionPlans.php"); ?>



<div class="rect4"></div>
<section id="Solutions" class="container py-5 reveal">
  <div class="row">
    <h1>La Solution Complète pour Votre Club</h1>
    <div class="col-lg-4">
      <h2>Application web avec un CMS</h2>
      <p>Créez un site web intelligent en quelques minutes avec le CMS.</p>
    </div>
    <div class="col-lg-4">
      <h2>Inscription des Membres</h2>
      <p>Inscrivez les membres avec un formulaire personnalisé et conservez tous les dossiers d'adhésion en ligne.</p>
    </div>
    <div class="col-lg-4">
      <h2>Paiements en Ligne</h2>
      <p>Collectez les paiements pour les cotisations et les frais de match en utilisant toutes les principales cartes de crédit et de débit.</p>
    </div>
    <div class="col-lg-4">
      <h2>Gestion des Équipes</h2>
      <p>Donnez aux entraîneurs des outils numériques pour gérer leurs matchs, leurs joueurs et leurs parents en ligne.</p>
    </div>
    <div class="col-lg-4">
      <h2>Compétitions</h2>
      <p>Mettez à jour les calendriers, les résultats, les statistiques de match et les classements de la ligue en utilisant les applications mobiles de Pitchero.</p>
    </div>
    <div class="col-lg-4">
      <h2>Technologie de Suivi</h2>
      <p>Optimisez les performances de votre équipe grâce à notre technologie de suivi avancée, permettant une analyse précise des mouvements et des données des joueurs.</p>
    </div>

  </div>
</section>

<div class="bounce">
  <img src="../Images/yellow circle.png" alt="Red Circle">
</div>

<section class="Tutoial mb-5 reveal">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <video autoplay playsinline muted loop style="width: 100%; max-width: 100%; height: auto;">
          <source src="../Images/tutorial.mp4" style="object-fit: contain; overflow:clip;" type="video/mp4">
        </video>
      </div>
      <div class="col-12 col-md-6 tuto--descrtiption p-5">
        <h1 >Organisation & Planification</h1>
        <hr>
        <ul>
          <li>Planifiez toutes vos séances d'entrainement d'équipe et d'entrainement individuel</li>
          <hr>
          <li>Bâtissez votre plan d'entrainement en fonction de votre philosophie</li>
          <hr>
          <li>Ayez un aperçu global des activités se déroulant dans votre club</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="Tutoial reveal">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 tuto--descrtiption" >
        <h1>Communication</h1>
        <hr>
        <ul>
          <li>Partagez votre préparation de match ou d'entrainement</li>
          <hr>
          <li>Donnez des instructions claires évitant toute confusion possible</li>
          <hr>
          <li>Gardez l'ensemble des communications en un seul endroit</li>
        </ul>
      </div>
      <div class="col-12 col-md-6">
        <video autoplay playsinline muted loop style="width: 100%; max-width: 100%; height: auto;">
          <source src="../Images/tutorial2.mp4" style="object-fit: contain; overflow:clip;" type="video/mp4">
        </video>
      </div>
    </div>
  </div>
</section>

<?php include_once("../components/carousel.php") ?>
<?php include("../components/trainers.php") ?>
<?php include_once("../components/footer.php") ?>
<!-- my scripts -->
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../javascript/navbarTransparency.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="../javascript/smoothScrolling.js"></script>
<!-- external scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
