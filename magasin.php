<?php
session_start();                       // WARNING : NE PAS EFFACER CETTE LIGNE
include('helpers/magasinHelper.php');  // WARNING : NE PAS EFFACER CETTE LIGNE


//je crée mon tableau des produits

$produits = chargerFichier('./data/products.json');

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>The Computer Shop</title>
        <link rel="stylesheet" href="assets/site/style.css">
    </head>

    <body>
    <nav>
    <div class="topNav">
        <figure class="logo">
        <img class="logoImg" src="./assets/site/logo-white.png" alt="">
        </figure>

        <h1 class="baseline">We take care of your feet</h1>
    </div>
    <div class="bottomNav">
    <div class="leftLinks">
        <a href="./index.php">Acceuil</a>
        <a href="./magasin.php">Le shop</a>
        <a href="">Nos magasins</a>
        <a href="">Nous contacter</a>
        </div>

        <div class="rightLinks">
            <a href="./visuPanier.php">
                <img src="./assets/site/pannier.svg" alt="panier"></img>
                <p>Panier</p>
            </a>
        </div>
    </div>
</nav>

    <div class='productsContainer'>
<?php

foreach ($produits as $key => $produit) {
    afficheProduit($produit,$key);
}
?>
</div>
    </body>
</html>
