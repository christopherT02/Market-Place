<?php
	include "header_vendeur.php"
?>
		<div id= "Section">
			<br>

			<center>
		<form action="Ajouter_article.php" method="post">

		<h3>Ajouter un Article</h3>
		<table border="1" align="center">
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Prix</td>
				<td><input type="number" name="prix"></td>
			</tr>

			<tr>
				<td>Description</td>
				<td><input type="text" name="description" style="height: 100px;"></td>
			</tr>
			
			<tr>
				<td>Rarete</td>
				<td><input type="number" name="rarete"></td>
			</tr>

			<tr>
				<td>Quantite</td>
				<td><input type="number" name="quantite"></td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Valider">
				</td>
			</tr>
		</table>
	</form>
			</center>

			
        <br>

<?php

$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";


$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);
// On recherche le nom de la base


    $name_renseigne=isset($_POST["nom"])? $_POST["nom"] : "";
    $prix_renseigne=isset($_POST["prix"])? $_POST["prix"] : "";
    $description_renseigne=isset($_POST["description"])? $_POST["description"] : "";
    $rarete_renseigne=isset($_POST["rarete"])? $_POST["rarete"] : "";
    $quantite_renseigne=isset($_POST["quantite"])? $_POST["quantite"] : "";


    $erreur="";
    if($name_renseigne==""){
    $erreur.="Le champ nom est vide. <br>";
    }
    if($prix_renseigne==""){
    $erreur.="Le champ prenom est vide. <br>";
    }
    if($description_renseigne==""){
    $erreur.="Le champ mail est vide. <br>";
    }
    if($rarete_renseigne==""){
    $erreur.="Le champ mdp est vide. <br>";
    }
    if($quantite_renseigne==""){
    $erreur.="Le champ pseudo est vide. <br>";
    }

    if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
    }
 


    if($erreur==""){


    $requete_sql= "SELECT * FROM article";
 
    $resultat=mysqli_query($connexion, $requete_sql);
    $article_existant=false;
    while ($data = mysqli_fetch_assoc($resultat))
      {
            if($name_renseigne == $data['Nom'])
            {
                $article_existant=true;
            }
        
      }


    if($article_existant)
    {
        header('Location: http://localhost/Market-Place/Gestion_des_articles.php');
    }
    else
    {
        $sql = "INSERT INTO article (ID_article, Nom, Prix, Description,Rarete,Image_1,Image_2,Image_3,Quantite) VALUES (NULL,'$name_renseigne', '$prix_renseigne','$description_renseigne','$rarete_renseigne','/','/','/','$quantite_renseigne')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
        header('Location: http://localhost/Market-Place/Accueil_vendeur.php');

    }
       

    }
    
mysqli_close($connexion);




include "moitie_bas.php"
?>
