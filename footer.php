<link rel="stylesheet" href="style.css">

<div class="fixed-bottom">
    <?php 
    require_once './fonction/compteur.php';
    ajouter_vue();
    $vues = afficher_vues();
    ?>
    <footer>
        <div class="alert alert-success">
            il y a <?= $vues?> visite<?php if($vues >1): ?>s<?php endif; ?> sur le site /\
            &copy; copyright Emglow || version beta 2.2.0 || tout droits reserves
        </div>
    </footer>
</div>
