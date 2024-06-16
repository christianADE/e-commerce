<?php
// Initialisation de la session
session_start();

// Vérifier si l'utilisateur est déjà connecté avec un cookie
$email = isset($_COOKIE['utilisateur']) ? $_COOKIE['utilisateur'] : '';

// Redirection si l'utilisateur est déjà connecté
if (!empty($email)) {
    header("Location: vendre.php");
    exit();
}

// Traitement du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hacher le mot de passe pour la sécurité

        // Enregistrer l'utilisateur dans un fichier
        $file = './users.txt';
        $user_data = $email . '|' . $password . PHP_EOL;
        file_put_contents($file, $user_data, FILE_APPEND);

        // Si "Se souvenir de moi" est coché, définir un cookie
        if (isset($_POST['box'])) {
            setcookie('utilisateur', $email, time() + 60*60*24*30); // Cookie valable 30 jours
        }

        // Redirection vers la page de vente
        header("Location: vendre.php");
        exit();
    } else {
        $error_message = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inscription</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="text-center">Inscription</h1>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="inscrire.php" method="post">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Votre email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="box" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>
