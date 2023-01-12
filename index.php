<?php
session_start();                       // WARNING : NE PAS EFFACER CETTE LIGNE
include('helpers/magasinHelper.php');  // WARNING : NE PAS EFFACER CETTE LIGNE
include('helpers/indexHelper.php'); 

$produits = chargerFichier('./data/products.json');
$comms = chargerFichier('./data/avis.json');

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


<?php

    $page = rand(0,1);

    if($page){
        affichePodium($produits, $comms);
    } else {
        afficheRandom($produits);
    }

?>


</body>
</html>
