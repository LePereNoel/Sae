<?php
session_start();                       // WARNING : NE PAS EFFACER CETTE LIGNE
include('helpers/magasinHelper.php');  // WARNING : NE PAS EFFACER CETTE LIGNE

$articles = chargerFichier('./data/products.json');


?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>The Computer Shop</title>
        <link rel="stylesheet" href="assets/site/style.css">
    </head>

    <body>
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
    </div>
</nav>
<div id="panier">
    <div class="items">
        <h1>Votre panier</h1>
        <table>
            <thead>
                <tr>
                    
                    <td>Désignation</td>
                    <td>P.U. TTC</td>
                    <td>Quantité</td>
                    <td id='TTC'>Total TTC</td>
                </tr>
                </thead>
                <?php
                    foreach($_SESSION['panier'] as $key => $value){
                        echo "<tr><td class='desc'><img src='".$articles[$key]["imageUrl"]."'>".$articles[$key]["titre"]."</td><td>".$articles[$key]["prix"]."</td><td class='quantite'>".$value."<a href='./supprimerPanier.php?reference=".$key."'><img src='./assets/site/rmProduct.png'></a></td><td class='prix'>".$value*$articles[$key]["prix"]."</td>";
                    }
                ?>
            
        </table>
    </div>
    <div class="panier_total">
        <h1>RECAPITULATIF</h1>
        <table>
        <tr><td>Panier (<?php nbArticles(); ?> article(s)):</td><td class="prix"> <?php total($articles); ?> €</td></tr>
        <tr><td>Livraison: </td><td class="prix">GRATUIT</td></tr>
        
        </table>
        <div id="after"></div>
        <div id="panierTotal">
            <h3>TOTAL: </h3>
            <h2><?php total($articles); ?> €</h2>
        </div> 
        <a href="">PAIEMENT</a>
        <p>Mode de paiement</p>
        <img src="./assets/site/paiement.png">
    </div>
</div>
    </body>
</html>
