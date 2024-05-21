<nav class="navbar navbar-light bg-dark sticky-top  p-2 position-relative ">
        <div class="container-fluid">
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation" style="--bs-navbar-toggler-icon-bg: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.75)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e&quot;);">
            <span class="navbar-toggler-icon"></span>
        </button>

          <a  class="navbar-brand" href="../../../main pages/index.php">
            <img src="../../assets/img/logo/white logo.svg" >
          </a>
          <div class="d-flex ">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="d-lg-flex d-none align-items-center justify-content-between me-5 ">
                <input class="form-control me-2" name="search" type="search" placeholder="Rechercher" aria-label="Search">
                <button type="submit"><i class="fa-solid fa-magnifying-glass text-white" style="cursor: pointer;"></i></button>
              </form>
              <a type="button"  data-bs-toggle="collapse" href="#userCollapse" role="button" aria-expanded="false" aria-controls="collapseExample" class="user">
                <?php include_once("../backend/profileImages.php") ?>
                <img src="<?php echo $paths[strtoupper(substr($user->getNom(), 0, 1))]; ?>" class="w-100 rounded-circle   user__icon" alt="">
              </a>
              <?php include_once("../backend/connectedUser.php"); ?>
              <div class="collapse" id="userCollapse" style="position: absolute; top:80%; right:1%;">
              <div class="card card-body p-0">
                <h2 class="fw-normal p-3 fs-5">Bonjour,<span> <?php echo $user->getNom().' '.$user->getPrenom(); ?> !</h2>
                <hr class="m-1">
                <nav class="p-0">
                    <ul class="list-unstyled m-0 p-0">
                    <li  class=" border-dark m-0 p-0 rounded-top "><a class="text-decoration-none text-dark d-block p-3" href="../user/manage.php"><i class="fa-solid fa-user"></i> Gérer votre compte</a></li>
                      <hr class="m-1">
                      <li class="  m-0 p-0 rounded-bottom"><a class="text-decoration-none text-dark d-block p-3 " href="../backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Se déconnecter</a></li>
                    </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>

        
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h2 class="fw-semibold">
      ClubXtreme
    </h2>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mt-5 p-0">
    <nav class="p-0 ">
        <ul class="list-unstyled text-center p-0">
          <li class="link p-0">
            <div >
              <div class="fs-5 text-dark fw-light text-decoration-none border d-block m-auto p-3">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="d-flex justify-content-between align-items-center  " >
                    <input class="form-control me-2 b-1" name="search" type="search" placeholder="Rechercher" aria-label="Search">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass text-black" style="cursor: pointer;"></i></button>
                </form>
              </div>
            </div>
          </li>
          <li class="link  p-0 "><a href="../dashboard/dashboard.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-house"></i> Tableau de bord</a></li>
          <li class="link p-0 "><a href="../members/members.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-users"></i> Membres</a></li>
          <li class="link  p-0 "><a href="../events/events.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-calendar"></i> Evénements</a></li>
          <li class="link  p-0 "><a href="../transactions/transactions.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-money-bill-transfer"></i> Transactions</a></li>
          <li class="link  p-0 "><a href="../trainingsessions/trainingsessions.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-rectangle-list"></i> Séances d'entrainements</a></li>
          <li class="link  p-0 "><a href="../reports/reports.php" class="fs-5 text-dark fw-light text-decoration-none border d-block p-3"><i class="fa-solid fa-flag"></i> Rapports</a></li>
        </ul>
    </nav>
  </div>
</div>