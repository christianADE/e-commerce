<!doctype html>
<html lang="fr" data-bs-theme="auto">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <link rel="stylesheet" href="style-index.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>
    <?php
    if (isset($title)) {
      echo htmlspecialchars($title);
    } else {
      echo "Emglow-Togo";
    }
    ?>
  </title>
</head>
<body>
  <?php require 'mode_lumiere.php'; ?>
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
            <?php if ($_SERVER['SCRIPT_NAME'] === "./index.php"): endif ?>
            <a class="nav-link active" aria-current="page" href="./index.php">Articles</a>
          </li>
          <li class="nav-item">
            <?php if ($_SERVER['SCRIPT_NAME'] === './categories.php'): endif ?>
            <a class="nav-link active" href="./categories.php">Categories</a>
          </li>
          <li class="nav-item">
            <?php if ($_SERVER['SCRIPT_NAME'] === './partenaires.php'): endif ?>
            <a class="nav-link active" href="./partenaires.php" aria-current="page">Partenaires</a>
          </li>
          <li class="nav-item">
            <?php if ($_SERVER['SCRIPT_NAME'] === './vendre.php'): endif ?>
            <a class="nav-link active" href="./vendre.php" aria-current="page">Vendre</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="articles" class="container" style="margin-top: 80px;">
    <!-- Ajouter la barre de recherche ici -->
    <div class="row mb-4">
      <div class="col">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Rechercher..." aria-label="Rechercher">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <?php
      $file = './Fake_BDD/products.txt';
      if (file_exists($file)) {
          $products = file($file, FILE_IGNORE_NEW_LINES);
          $products = array_reverse($products); // Inverser l'ordre des produits

          foreach ($products as $product) {
              list($nom_produit, $prix_produit, $photo_url) = explode('|', $product);
      ?>
      <div class="col">
        <div class="product-card">
          <figure class="figure">
            <img src="<?php echo htmlspecialchars($photo_url); ?>" class="figure-img img-fluid rounded" alt="<?php echo htmlspecialchars($nom_produit); ?>">
            <figcaption class="figure-caption">
              <div class="product-name"><?php echo htmlspecialchars($nom_produit); ?></div>
              <div class="product-price"><?php echo htmlspecialchars($prix_produit); ?> f CFA</div>
              <button class="buy-button">Acheter</button>
            </figcaption>
          </figure>
        </div>
      </div>
      <?php
          }
      }
      ?>
    </div>
  </section>

  <?php require 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
