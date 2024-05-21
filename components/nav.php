<nav class="navbar lora navbar-expand-lg " id="nav"  data-bs-theme="light"> <!-- Added text-white class here -->
    <div class="container-fluid">
        <a class="navbar-brand" href="../main pages/"><img src="../images/logo.png" width="120"  alt="logo"></a>
        <button class="navbar-menu-btn navbar-toggler" style="border: 0;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header bg-orange ">
                <h5 class="offcanvas-title text-black" id="offcanvasNavbarLabel "><img src="../Images/logo.png" width="120"  alt="logo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item ms-3">
                        <a class="nav-link active" aria-current="page" href="../main pages/index.php">Home</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sports
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="../main pages/sports.php#football">Football</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#basketball">Basketball</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#kickboxing">kickBoxing</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#course">Jogging</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#musculation">Musculation</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#skating">Skating</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#natation">Natation</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#minifoot">mini Foot</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#volley">Volley Ball</a></li>
                            <li><a class="dropdown-item" href="../main pages/sports.php#cyclisme">Cyclisme</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="../main pages/index.php#Abonnements">Abonnements</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="../main pages/gallery.php">Gallerie</a>
                    </li>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../main pages/about.php">About us</a></li>
                            <li><a class="dropdown-item" href="../main pages/contact.php">Contact us</a></li>
                            <li><a class="dropdown-item" href="#">What we Offer</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item ms-2 l ">
                        
                        <?php 
                                if($_SESSION["loggedin"] ){
                                    ?> <a class="nav-link active" id="signin-btn" aria-current="page" href="../CMS/index.php">My App</a> <?php
                                }
                                else{
                                    ?> <a class="nav-link active" id="signin-btn" aria-current="page" href="../main pages/login.php">Login</a> <?php
                                }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
  </div>
</nav>
