<?php

// prend en paramètre le nom d'un fichier (au format JSON) à charger
// retourne un tableau associatif
// Question : $nomFichier est : un tableau, une chaine de caractère, ou un entier ? Si c'est un tableau que contient il ?
function chargerFichier($nomFichier) {
    $json = file_get_contents($nomFichier);
    return json_decode($json, true);
}

// prend en paramètre un produit
// affiche le code html permettant l'affichage du produit
// Question : $produit est : un tableau, une chaine de caractère, ou un entier ? Si c'est un tableau que contient il ? un tableau avec les attributs de chaque article
// Et reference ? la d'ou il viens
function afficheProduit($produit, $reference) {
        echo 
        "
            <div class='product'>
                <div class='productImg'>
                    <img src='".$produit['imageUrl']."' alt=''>
                </div>
                <div class='productInfo'>
                
                <form action='./article.php' method='post'>
                <button name='reference' value='".$reference."'>".$produit['titre']."</button>
                </form>
            
                    <p>".$produit['description']."</p>
                </div>
                <div class='productCta'>
                    <h2>".$produit['prix']."€</h2>
                    <a href='./ajoutPanier.php?reference=".$reference."'><img src='./assets/site/buy.png' alt='buy'></a>
                </div>
            </div>
        
        ";
    

}

// prend en paramètre un comentaire
// Affiche le code html permettant l'affichage d'un commentaire
// Question : $avis : un tableau, une chaine de caractère, ou un entier ? Si c'est un tableau que contient il ?
function afficheCommentaire($avis) {
    echo "
    <div class='avis'>
        <h3>".$avis["auteur"].", le ".$avis["date"]." (".$avis["note"]."/10)</h3>
        <p>".$avis["avis"]."</p>
    </div>";
}

// Prend en paramètre un produit
// Affiche le code HTML permettant d'afficher le bloc correspondant au produi similaire
// Question : $produit est : un tableau, une chaine de caractère, ou un entier ? Si c'est un tableau que contient il ?
function afficheArticleSimilaire($produit, $reference) {
    // TODO
    echo "<div class='similaire'>
    <form action='./article.php' method='post'>
                <button name='reference' value='".$reference."'>".$produit['titre']."</button>
                </form>
    <img src='".$produit["imageUrl"]."'>
    </div>";
}

// prend en paramètre un tableau indicé de commentaires
// retourne la moyenne des notes relative aux avis associés à cette référence
function calculeMoyenne($comms,$reference) {
    $somme=0;
    $nb=0;
    foreach($comms["commentaires"] as $comm){
     
        if($reference ==$comm['reference']){
            $nb = $nb+1;
            $somme = $somme + $comm["note"];
        }
    }
    if($nb>0){
        return round(($somme/$nb)*10)/10;
    } else {
        return "?";
    }
}

//récupère les commentaires lié au produit
function filtreCommentaires($comms, $reference){
    $filtre = [];
    foreach($comms["commentaires"] as $comm){
     
        if($reference ==$comm['reference']){
            array_push($filtre, $comm);
        }
    }
    return $filtre;
}
//retourne le nombre d'articles dans le panier
function nbArticles(){
    $total=0;
    foreach($_SESSION["panier"] as $key => $nb){
        $total = $total + $nb;
    }
    echo $total;
}

//retourne le prix total
function total($articles){
    $total=0;
    foreach($_SESSION["panier"] as $key => $nb){
        $total = $total + ($nb* $articles[$key]["prix"]);
    }
    echo $total;
}



//----------------------------------------------------------------------------------------
// WARNING : ne pas modifier ces lignes
//----------------------------------------------------------------------------------------

if(isset($_SESSION['panier']) == false)
    $_SESSION['panier'] = [];
$panier = $_SESSION["panier"];

?>
