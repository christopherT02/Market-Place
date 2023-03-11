                <?php 

    $ID = $_POST["ID_article"];
    $quantite = $_POST["quantite"];


    $Nom_base ="Market Place";
    $Endroit ='localhost';
    $Nom_utilisateur ='root' ;
    $MDP ="";


$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);


    if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
    }
 




    $requete_sql= "SELECT * FROM article";
 
    $resultat=mysqli_query($connexion, $requete_sql);
    while ($data = mysqli_fetch_assoc($resultat))
      {
            if($ID == $data['ID_article'])
            {
                $prix=$data['Prix'];
            }
        
      }

    $requete_sql_2= "SELECT * FROM panier";
 
    $type_article_deja_ajoute = false;
    $resultat2=mysqli_query($connexion, $requete_sql_2);
    while ($data = mysqli_fetch_assoc($resultat2))
      {
            if($ID == $data['ID_article'])
            {
                $prix_panier=$data['Prix_panier'];
                $quantite_panier=$data['Quantite_panier'];
                $type_article_deja_ajoute = true;
                $ID_panier=$data['ID_numero_article'];
            }
        
      }


if($type_article_deja_ajoute == true)
{
    $sql = "UPDATE panier SET prix_panier = $prix_panier+($quantite * $prix), Quantite_panier = $quantite_panier+$quantite WHERE panier.ID_numero_article = $ID_panier";
    mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
}

        
else
{
    $prix_final=$prix*$quantite;
        $sql = "INSERT INTO panier (ID_numero_article,ID_article,Prix_panier,Quantite_panier) VALUES (NULL,'$ID', '$prix_final','$quantite')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));

}

    
    
mysqli_close($connexion);

header('Location: http://localhost/Market-Place/Articles.php');
            ?>