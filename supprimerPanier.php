<?php
session_start();                     // WARNING : NE PAS EFFACER CETTE LIGNE
include("helpers/magasinHelper.php");// WARNING : NE PAS EFFACER CETTE LIGNE


$refProduit = $_GET["reference"];

// Je vérifie si le panier existe
// Je vérifie si la référence est dans le panier

// Je teste la quantité. si q = 1, je supprime la référence
// sinon je décrémente la quantité

if(isset($_SESSION["panier"]) && isset($_SESSION["panier"][$refProduit])){
    if($_SESSION["panier"][$refProduit]>1){
        $panier = $_SESSION["panier"];
        $panier[$refProduit] = $panier[$refProduit] -1;
    }else{
        unset($panier[$refProduit]);
    }
}







// Pas de code à vous après cette ligne
$_SESSION['panier'] = $panier; // WARNING : NE PAS EFFACER CETTE LIGNE


header('Location:./visuPanier.php'); // je retourne voir le panier
?>