<?php


	$ID_a_modif=$_GET['ID'];
  $nom_a_modif=$_GET['nom'];
  $prix_a_modif=$_GET['prix'];
  $description_a_modif=$_GET['description'];
  $rarete_a_modif=$_GET['rarete'];
  $quantite_a_modif=$_GET['quantite'];
	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";
    $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);

    if (!$connexion)
     { die("Échec de la connexion : " . mysqli_connect_error());}

    $requete_sql= "SELECT * FROM article";
    $resultat=mysqli_query($connexion, $requete_sql);
    $sql = "UPTADE article 
        SET Nom='$nom_a_modif',
        Prix='$prix_a_modif',
        Description='$description_a_modif',
        Rarete='$rarete_a_modif',
        Quantite='$quantite_a_modif'
        WHERE ID_article='$ID_a_modif'";
         mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
         echo "FAIIIT";


      mysqli_close($connexion);
      header('Location: http://localhost/Market-Place/Gestion_des_articles.php');


?>