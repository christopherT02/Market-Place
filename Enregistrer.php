<?php

	$ID_a_modif=$_POST['ID'];
  $nom_a_modif=$_POST['nom'];
  $prix_a_modif=$_POST['prix'];
  $description_a_modif=$_POST['description'];
  $rarete_a_modif=$_POST['rarete'];
  $quantite_a_modif=$_POST['quantite'];

  echo "REGARDE ".$nom_a_modif;

	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";
    $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);

    if (!$connexion)
     { die("Échec de la connexion : " . mysqli_connect_error());}

    $requete_sql= "SELECT * FROM article";
    $resultat=mysqli_query($connexion, $requete_sql);
    $article_trouver = false;
    while ($data = mysqli_fetch_assoc($resultat))
      {
          if($ID_a_modif == $data['ID_article'])
          {
            $article_trouver = true;
          }
    
      }

    if($article_trouver == true)
    {
      $sql = "UPDATE article SET Nom = '$nom_a_modif',Prix = $prix_a_modif, Description='$description_a_modif',Rarete = $rarete_a_modif, Quantite = $quantite_a_modif  WHERE article.ID_article=$ID_a_modif"; 
        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
    }
      
      mysqli_close($connexion);
      header('Location: http://localhost/Market-Place/Gestion_des_articles.php');


?>