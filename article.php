<?php
session_start();                       // WARNING : NE PAS EFFACER CETTE LIGNE
include('helpers/magasinHelper.php');  // WARNING : NE PAS EFFACER CETTE LIGNE


//je crée mon tableau des produits (il sera utile...)
$articles = chargerFichier('./data/products.json');
//je crée mon tableau de commentaires
$comms = chargerFichier('./data/avis.json');
//J'ajoute mes commentaires dans le tableau des produits


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>The Computer Shop</title>
    <link rel="stylesheet" href="./assets/site/style.css">
    <link rel="stylesheet" href="./assets/site/page_article.css">
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

if(isset($_POST["reference"])){
    $article = $_POST["reference"];
    //article
        echo"
        <div class='productsContainer'>
        <div class='article'>
                <div class='articleImg'>
                    <img src='".$articles[$article]["imageUrl"]."' alt=''>
                </div>
                <div class='articleInfo'>
                    <h1>".$articles[$article]["titre"]."</h1>
                    <h2>".$articles[$article]["prix"]."€</h2>
                    <p>".$articles[$article]["description"]."</p>
                </div>
        </div>
    </div>";
    
    echo "<a class='product_to_cart'href='./ajoutPanier.php?reference=".$article."'>Ajouter au panier</a>";
    echo "<div class='avis_container'>
    <h1>Avis (".calculeMoyenne($comms,$article)."/10)</h1>
    ";
    $avis = filtreCommentaires($comms,$article);
    foreach($avis as $commentaire){
        afficheCommentaire($commentaire);
    }
    echo "</div>";

    echo"<div id='similaires_container'>
    <h1>Produits similaires</h1>
    <div id='similaires'>";
    foreach($articles as $key=> $content){
        if($articles[$article]["type"] == $content["type"] && $article !=$key ){
            afficheArticleSimilaire($content, $key);
        }
    }
    echo "</div></div>";

} else {
    //aucune référence donnée
}

?>

</body>
</html>
