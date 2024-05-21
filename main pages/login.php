<?php
session_start(); 
$_SESSION['loggedin'] = false;
include_once("../backend/Load.php");
include_once("../backend/Check.php");
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password are set and not empty
    if (isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        // Retrieve email and password from the form
        $email = $_POST["email"];
        $password = $_POST["password"];

        $users = loadUsers();
        foreach ($users as $user) {
            if ($user->getEmail() == $email && $user->getMotDePasse() == $password) {
                // Login success
                $_SESSION["loggedin"] = true;
                $_SESSION["user"] = $user;
                $_SESSION["position"] = checkUser($user);
                // Set a cookie with the user's email
                setcookie("user_email", $email, time() + (86400 * 30 * 365), "/"); // 86400 = 1 day in seconds

                header("Location: ./ "); // Redirect to dashboard or homepage
                echo "<script>alert('Login avec succes');</script>";
                exit; // Stop further execution
            }
        }
        // If login fails
        echo "<script>alert('Invalid email or password');</script>";
    } else {
        // If email or password is empty
        echo "<script>alert('Please enter both email and password');</script>";
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
    <div class="row p-1 d-flex flex-column   align-items-center ">
        <div class="col-lg-6 col-md-10 col-12 text-center m-auto ">
            <img src="../images/logo.png"  class="m-auto w-50 " alt="logo">
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="p-4 col-lg-6 col-md-10 col-12 shadow">
            <div class="mb-3">
                <label for="email" class="form-label ">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>  
                    </span> 
                     Email
                </label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill m-0 p-0" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg> 
                    </span>     
                Mot De Passe</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3 form-check  p-1 d-flex justify-content-between align-items-center ">
                <a href="#" class="text-info fw-lighter fs-6">Mot de passe oublié?</a>
                <button type="submit" class="btn btn-secondary btn-lg  fw-bold fs-6">Se connecter</button>
            </div>
            <a href="register.php" class="btn-lg btn-transparent border-2 border  btn w-100 fs-6 fw-bold ">Vous n'avez pas un compte?</a>
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