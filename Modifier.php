<?php
	$ID_a_modif=$_GET['ID'];
	echo "ID ".$ID_a_modif;
	include "header_vendeur.php";
?>
<?php
	
	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";

	$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
	$trouve = mysqli_select_db($connexion,$Nom_base);
	$requete = "SELECT * FROM article WHERE ID_article = '$ID_a_modif'";
	$resultat=mysqli_query($connexion, $requete);
	while ($data=mysqli_fetch_assoc($resultat)) {

?>
		<div id= "Section">
			<br>

			<center>
		<form action="Enregistrer.php" method="post">

		<h3>Modifier un Article</h3>
		<table border="1" align="center">
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom" value="<?php echo $data['Nom']?>"></td>
			</tr>
			<tr>
				<td>Prix</td>
				<td><input type="number" name="prix" value="<?php echo $data['Prix']?>"></td>
			</tr>

			<tr>
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $data['Description']?>" style="height: 100px;"></td>
			</tr>
			
			<tr>
				<td>Rarete</td>
				<td><input type="number" name="rarete" value="<?php echo $data['Rarete']?>"></td>
			</tr>

			<tr>
				<td>Quantite</td>
				<td><input type="number" name="quantite" value="<?php echo $data['Quantite']?>"></td>
			</tr>

			<tr>
				<td><input type="hidden" name="ID" value="<?php echo $data['ID_article']?>"></td>
				<td><input type="submit" name="submit" value="Modifier"></td>
			</tr>
		</table>
	</form>
			</center>

			
        <br>
<?php

}
include "moitie_bas.php"
?>