<?php


function affichePodium($produits, $comms){
    $notes = [];
   
    foreach($produits as $key => $value){
        $somme=0;
        $nb=0;
        foreach($comms["commentaires"] as $comm){
     
            if($key ==$comm['reference']){
                $nb = $nb+1;
                $somme = $somme + $comm["note"];
            }
        }
        if($nb>0){
            $notes[$key]= round(($somme/$nb)*10)/10;
        }
    }
    arsort($notes);
    $premier = $produits[array_keys($notes)[0]];
    $deuxieme = $produits[array_keys($notes)[1]];
    $troisieme = $produits[array_keys($notes)[2]];
    echo "
    <div class='podium_container'>
        <h1>Podium des meilleures notes</h1>
        <div class='gagnants'>
            ";

    //repêchage du code/css des produits similaires        
    echo "<div class='similaire second podium_winner'>
    <form action='./article.php' method='post'>
                <button name='reference' value='".array_keys($notes)[1]."'>".$deuxieme['titre']." (".$notes[array_keys($notes)[1]]."/10)</button>
                </form>
    <img src='".$deuxieme["imageUrl"]."'>
    </div>";      
    
    echo "<div class='similaire premier podium_winner'>
    <form action='./article.php' method='post'>
                <button name='reference' value='".array_keys($notes)[0]."'>".$premier['titre']." (".$notes[array_keys($notes)[0]]."/10)</button>
                </form>
    <img src='".$premier["imageUrl"]."'>
    </div>";  

    echo "<div class='similaire troisieme podium_winner'>
    <form action='./article.php' method='post'>
                <button name='reference' value='".array_keys($notes)[2]."'>".$troisieme['titre']." (".$notes[array_keys($notes)[2]]."/10)</button>
                </form>
    <img src='".$troisieme["imageUrl"]."'>
    </div>";  

    echo"
        
        </div>
        <img id='podium' src='./assets/site/podium.png'>
    </div>";
}
function afficheRandom($articles){
    $article = array_keys($articles)[rand(0,sizeof($articles)-1)];
    //article
        echo"
        <div class='productsContainer random'>
        <h1>Article au hasard</h1>
        <div class='article'>
                <div class='articleImg'>
                    <img src='".$articles[$article]["imageUrl"]."' alt=''>
                </div>
                <div class='articleInfo'>
                <form action='./article.php' method='post'>
                <button name='reference' value='".$article."'>".$articles[$article]['titre']."</button>
                </form>
                    <h2>".$articles[$article]["prix"]."€</h2>
                    <p>".$articles[$article]["description"]."</p>
                </div>
        </div>
    </div>";
    echo "<a class='product_to_cart'href='./ajoutPanier.php?reference=".$article."'>Ajouter au panier</a>";
   
}
?>