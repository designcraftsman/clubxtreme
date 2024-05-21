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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body >
<?php include("../components/nav.php") ?>
<div class="container-fluid p-2 eventsImgContainer m-auto d-flex justify-content-center ">
            <h1 class="text-center fw-bolder text-white m-auto display-5">Evénements A Venir</h1>
        </div>
<div class="container d-flex align-items-center justify-content-evenly p-3 flex-wrap ">
        <div class="card m-3" style="width: 20rem; ">
        <img class="card-img-top object-fit-cover " src="../Images/pexels-runffwpu-3039888.jpg" style="height:200px;" alt="Card image cap object-fit-cover ">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-5 mb-3">Marathon 5km</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="fs-6"><i class="fa-solid fa-calendar-days"></i> 21 Fevrier 2024</p>
            <p class="fs-6"><i class="fa-solid fa-location-dot"></i> ClubXtreme</p>
            </div>
            <a href="#" class="btn btn-primary w-100 border fw-bold rounded-3 bg-warning">Participer</a>
        </div>
        </div>
        

        <div class="card m-3" style="width: 20rem; ">
        <img class="card-img-top object-fit-cover " src="../Images/pexels-runffwpu-3039888.jpg" style="height:200px;" alt="Card image cap object-fit-cover ">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-5 mb-3">Marathon 5km</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="fs-6"><i class="fa-solid fa-calendar-days"></i> 21 Fevrier 2024</p>
            <p class="fs-6"><i class="fa-solid fa-location-dot"></i> ClubXtreme</p>
            </div>
            <a href="#" class="btn btn-primary w-100 border fw-bold rounded-3 bg-warning">Participer</a>
        </div>
        </div>

        <div class="card m-3" style="width: 20rem; ">
        <img class="card-img-top object-fit-cover " src="../Images/pexels-runffwpu-3039888.jpg" style="height:200px;" alt="Card image cap object-fit-cover ">
        <div class="card-body">
            <h5 class="card-title fw-bold fs-5 mb-3">Marathon 5km</h5>
            <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="fs-6"><i class="fa-solid fa-calendar-days"></i> 21 Fevrier 2024</p>
            <p class="fs-6"><i class="fa-solid fa-location-dot"></i> ClubXtreme</p>
            </div>
            <a href="#" class="btn btn-primary w-100 border fw-bold rounded-3 bg-warning">Participer</a>
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