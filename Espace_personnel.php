<?php
	include "header.php"
?>
		<div id= "Section">
			<br>

			<center>
				<form action="detection_compte.php" method="post">

		<h3>Connexion</h3>
		<table border="2" align="center">
			
			<tr>
				<td align="center">  Mail  </td>
				<td> <input type="email" name="mail"></td>
			</tr>
			<tr>
				<td align="center">  Mot de passe </td>
				<td> <input type="password" name="mdp"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value="Valider">
				</td>
			</tr>
		</table>
		<p>Pas de compte? <a href="formulaire_inscription.php">Inscrivez-vous!</a></p>
	</form>
			</center>

			
        <br>

<?php
include "moitie_bas.php"
?>