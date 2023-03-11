<?php
	include "header_vendeur.php"
?>
		<div id= "Section">
			<br>

			<center>
		<form action="Inscription_vendeurs.php" method="post">

		<h3>Ajouter un Vendeur</h3>
		<table border="1" align="center">
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td><input type="text" name="prenom"></td>
			</tr>

			<tr>
				<td>Mail</td>
				<td><input type="text" name="mail"></td>
			</tr>
			
			<tr>
				<td>Mot de Passe</td>
				<td><input type="password" name="mdp"></td>
			</tr>

			<tr>
				<td>Pseudo</td>
				<td><input type="text" name="pseudo"></td>
			</tr>

			<tr>
				<td>Marque représenté</td>
				<td><input type="text" name="marque"></td>
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
    $prenom_renseigne=isset($_POST["prenom"])? $_POST["prenom"] : "";
    $mail_renseigne=isset($_POST["mail"])? $_POST["mail"] : "";
    $mdp_renseigne=isset($_POST["mdp"])? $_POST["mdp"] : "";
    $pseudo_renseigne=isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $marque_renseigne=isset($_POST["marque"])? $_POST["marque"] : "";


    $erreur="";
    if($name_renseigne==""){
    $erreur.="Le champ nom est vide. <br>";
    }
    if($prenom_renseigne==""){
    $erreur.="Le champ prenom est vide. <br>";
    }
    if($mail_renseigne==""){
    $erreur.="Le champ mail est vide. <br>";
    }
    if($mdp_renseigne==""){
    $erreur.="Le champ mdp est vide. <br>";
    }
    if($pseudo_renseigne==""){
    $erreur.="Le champ pseudo est vide. <br>";
    }

    if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
    }
 


    if($erreur==""){


    $requete_sql= "SELECT * FROM compte";
 
    $resultat=mysqli_query($connexion, $requete_sql);
    $compte_existant=false;
    while ($data = mysqli_fetch_assoc($resultat))
      {
            if($mail_renseigne == $data['Mail'])
            {
                $compte_existant=true;
            }
        
      }


    if($compte_existant)
    {
        header('Location: http://localhost/Market-Place/Compte.html');
    }
    else
    {
        $sql = "INSERT INTO vendeur (ID_vendeur, Nom, Prenom, Mail,Pseudo,Image_de_fond) VALUES (NULL,'$name_renseigne', '$prenom_renseigne','$mail_renseigne','$pseudo_renseigne','$marque_renseigne')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
        $sql = "INSERT INTO compte (Mail,Mot_de_Passe,Type_de_Compte) VALUES ('$mail_renseigne','$mdp_renseigne','3')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
        header('Location: http://localhost/Market-Place/Accueil_vendeur.php');

    }
       

    }
    
mysqli_close($connexion);




include "moitie_bas.php"
?>
