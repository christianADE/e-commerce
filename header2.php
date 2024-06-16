
<title>
      <?php
      if (isset($title)){
        echo $title;
      }
      else{
        echo "Emglow-Togo";
      }
      ?>
</title>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <h3>
        <img src="./images/LOGO-removebg-preview.png" style="width: 50px;" alt="">
    <a class="navbar-brand">Emglow-Togo</a></h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <?php
          if ($_SERVER['SCRIPT_NAME'] === "./index.php"): endif?>
          <a class="nav-link active" aria-current="page" href="./index.php">Articles</a>
        </li>
        <li class="nav-item">
          <?php 
          if ($_SERVER['SCRIPT_NAME'] === './categories.php'): endif ?>
          <a class="nav-link active" href="./categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <?php
          if($_SERVER['SCRIPT_NAME'] === './partenaires.php') ?>
          <a class="nav-link active" href="./partenaires.php" aria-current="page">Partenaires</a>
        </li>
        <li class="nav-item">
          <?php 
          if($_SERVER['SCRIPT_NAME'] === './vendre.php') ?>
          <a class="nav-link active" href="./vendre.php" aria-current="page">Vendre</a>
        </li>
        <i class="bi bi-cart4"></i>
      </ul>
    </div>
  </div>
</nav>