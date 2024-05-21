<?php
session_start(); 

// Initialize loggedin session variable if not set
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
}

include_once("../backend/Load.php");
include_once("../backend/Save.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email, password, and other required fields are set and not empty
    if (
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["motDePasse"]) && !empty($_POST["motDePasse"]) &&
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["prenom"]) && !empty($_POST["prenom"]) &&
        isset($_POST["dateDeNaissance"]) && !empty($_POST["dateDeNaissance"]) &&
        isset($_POST["termes"]) &&
        isset($_POST["numDeTelephone"]) && !empty($_POST["numDeTelephone"])
    ) {
        // Retrieve data from the form
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motDePasse = $_POST["motDePasse"];
        $dateDeNaissance = new DateTime($_POST["dateDeNaissance"]); // Convert string to DateTime
        $numDeTelephone = $_POST["numDeTelephone"];

        // Create a new user object
        $newUser = new Utilisateur(1000, $nom, $prenom, $email, $motDePasse, $dateDeNaissance, $numDeTelephone);

        // Save the user
        if (saveUser($newUser)) {
            // Set a cookie with the user's email upon successful registration
            setcookie("user_email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day in seconds

            // Login success
            echo "<script>alert('Votre compte a été bien créé');</script>";
            $_SESSION["loggedin"] = true;
            $_SESSION["user"] = $newUser;
            header("Location: ./ ");
            exit;
        } else {
            // If registration fails
            echo "<script>alert('Informations invalides ou Compte déjà existant');</script>";
        }
    } else {
        // If any required field is empty
        echo "<script>alert('Veuillez remplir tous les champs requis');</script>";
    }
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
<div class="container ">
    <div class="row p-1 d-flex flex-column   align-items-center">
        <div class="col-lg-6 col-md-10 col-12 text-center m-auto ">
            <img src="../images/logo.png"  class="m-auto w-50 " alt="logo">
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="p-z  col-lg-6 col-md-10 col-12 shadow ">
            <div class="row d-flex justify-content-between ">
                <div class="mb-3 col-12 col-sm-6">
                    <label for="prenom" class="form-label k">
                        Prénom
                    </label>
                    <input type="text" name="prenom" class="form-control" id="prenom" >
                </div>
                <div class="mb-3  col-12 col-sm-6">
                    <label for="nom" class="form-label">   
                    Nom
                    </label>
                    <input type="text" name="nom" class="form-control" id="nom">
                </div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">   
                Date de naissance
                </label>
                <input type="date" name="dateDeNaissance" class="form-control" id="date">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">   
                Numéro de telephone
                </label>
                <input type="tel" name="numDeTelephone" class="form-control" id="numDeTelephone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">   
                Email
                </label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">   
                Mot de passe
                </label>
                <input type="password" name="motDePasse" class="form-control" id="password">
            </div>
            <div class=" form-check d-flex justify-content-between     align-items-center ">
                <div class="mb-3 col-7 d-flex align-items-start ">
                    <input type="checkbox" class="form-checkbox-input m-1" name="termes" id="terms">
                    <label for="terms">J'accepte <a href="#" class="text-info m-1">les termes et les conditions d'utulisations.</a></label>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg mb-3 fw-bold fs-6 ">Créer compte</button>
            </div>
            <a href="login.php" class="btn-lg btn-transparent border-2 border  btn w-100 fs-6 fw-bold ">Vous avez déjà un compte?</a>
        </form>
    </div>
</div>
</body>
<script src="../javascript/heroImageAlternator.js"></script>
<script src="../javascript/subscriptionPlans.js"></script>
<script src="../node_modules/bootstrap/js/index.esm.js"></script>
<script src="../node_modules/bootstrap/js/index.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/navbarTransparency.js"></script>
</body>
</html>