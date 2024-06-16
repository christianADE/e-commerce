<?php
session_start();

// Vérification de l'utilisateur
$email = isset($_COOKIE['utilisateur']) ? $_COOKIE['utilisateur'] : null;
if (!$email) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page d'inscription
    header("Location: inscrire.php");
    exit();
}

// Vérifier l'existence de l'utilisateur dans le fichier
$users_file = './Fake_BDD/users.txt';
$users = file($users_file, FILE_IGNORE_NEW_LINES);
$is_logged_in = false;
foreach ($users as $user) {
    list($stored_email, $stored_password) = explode('|', $user);
    if ($stored_email === $email) {
        $is_logged_in = true;
        break;
    }
}

if (!$is_logged_in) {
    header("Location: inscrire.php");
    exit();
}

$title = "Vendre";
require 'header2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom_produit']) && isset($_POST['prix_produit']) && isset($_FILES['photo'])) {
        $nom_produit = htmlspecialchars($_POST['nom_produit']);
        $prix_produit = htmlspecialchars($_POST['prix_produit']);
        $photo = $_FILES['photo'];

        // Vérifier les erreurs de téléchargement
        if ($photo['error'] === UPLOAD_ERR_OK) {
            $upload_dir = './images/articles/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $upload_file = $upload_dir . basename($photo['name']);
            if (move_uploaded_file($photo['tmp_name'], $upload_file)) {
                $photo_url = $upload_file;
                $file = './Fake_BDD/products.txt';
                $product = $nom_produit . '|' . $prix_produit . '|' . $photo_url . PHP_EOL;
                file_put_contents($file, $product, FILE_APPEND);
                $success_message = "Produit soumis avec succès!";
            } else {
                $error_message = "Erreur lors du téléchargement du fichier.";
            }
        } else {
            $error_message = "Erreur lors du téléchargement du fichier.";
        }
    } else {
        $error_message = "Tous les champs sont obligatoires.";
    }
}
?>

<style>
    body{
        margin-top:7%;
    }
</style>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #f8f9fa; margin-top: 7%;">
    <div class="container mt-5">
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <h1 class="text-center"><?php echo $title; ?></h1>
        <form action="vendre.php" method="POST" class="form-group" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label">Choisir la photo du produit</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="nom_produit" class="form-label">Entrez le nom de votre produit</label>
                <input type="text" name="nom_produit" id="nom_produit" class="form-control" required>
            </div>
            <div class="mb-3">
                <select name="categories" id="categories" aria-placeholder="Choisir">
                    <option value="" disabled selected>Choisir une Categorie</option>
                    <option value="electricite">Electricité</option>
                    <option value="electronique">Electronique</option>
                    <option value="automobile">Automobile</option>
                    <option value="sante">Santé</option>
                    <!-- Ajoutez d'autres options si nécessaire -->
                </select>
            </div>

            <div class="mb-3">
                <label for="prix_produit" class="form-label">Entrez le prix de votre produit</label>
                <input type="number" name="prix_produit" id="prix_produit" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>
