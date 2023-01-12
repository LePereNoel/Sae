<?php
session_start(); // WARNING : NE PAS EFFACER CETTE LIGNE
include("helpers/magasinHelper.php");


$refProduit = $_GET["reference"];

if(!isset($_SESSION["panier"])){
    $_SESSION["panier"] = [];
}

// Je vérifie que mon panier existe, sinon je le crée
// Rappel : le panier est une entrée dans le tableau associatif $_SESSION avec la clef "panier"
// Cette entrée constitue un tableau associatif dont les clefs sont les références des produits et les valeurs les quantités associées
if(isset($_SESSION["panier"][$refProduit])){
    $_SESSION["panier"][$refProduit] = $_SESSION["panier"][$refProduit]+1 ;
} else {
    $_SESSION["panier"][(string)$refProduit] = 1;
}
// Je vérifie que ma référence est déjà présente dans le panier. 
// si oui j'augmente la quantité
// sinon j'ajoute le produit dans le panier









// Pas de code à vous après cette ligne

///$_SESSION['panier'] = $panier; // WARNING : NE PAS EFFACER CETTE LIGNE



header('Location:magasin.php'); // Je retourne voilr le panier
?>