<?php


	$ID_a_supp=$_GET['ID'];
	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";
    $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);

    if (!$connexion)
     { die("Échec de la connexion : " . mysqli_connect_error());}

    $requete_sql= "SELECT * FROM article";
    $resultat=mysqli_query($connexion, $requete_sql);
    while ($data = mysqli_fetch_assoc($resultat))
      {
      	
      	 $sql = "DELETE FROM article WHERE article.ID_article = '$ID_a_supp' ";
	       mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
      	
      }

      mysqli_close($connexion);
      header('Location: http://localhost/Market-Place/Gestion_des_articles.php');


?>
