<!-- header.php -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <h3>
      <img src="./images/LOGO-removebg-preview.png" style="width: 50px;" alt="">
      <a class="navbar-brand">Emglow-Togo</a>
    </h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php') echo 'active'; ?>" aria-current="page" href="./index.php">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/categories.php') echo 'active'; ?>" href="./categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/partenaires.php') echo 'active'; ?>" href="./partenaires.php">Partenaires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/vendre.php') echo 'active'; ?>" href="./vendre.php">Vendre</a>
        </li>
        <li class="nav-item">
          <i class="bi bi-cart4"></i>
        </li>
      </ul>
      <!-- Supprimer ce formulaire de recherche -->
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
