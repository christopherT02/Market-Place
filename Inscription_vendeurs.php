<?php
	include "header_vendeur.php"
?>
		<div id= "Section">
			<br>

			<center>
		<form action="remplissage_formulaire.php" method="post">

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
				<td>Numéro</td>
				<td><input type="number" name="numero"></td>
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
				<td>Marque représenté</td>
				<td><input type="text" name="marque"></td>
			</tr>

			<tr>
				<td>Adresse du siège social</td>
				<td><input type="text" name="adresse"></td>
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
include "moitie_bas.php"
?>



