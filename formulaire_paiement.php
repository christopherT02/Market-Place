	<?php

	include "header.php";

    $total=$_GET['total'];
	//$ID = isset($_POST["ID_article"])? $_POST["ID_article"]: "";
	$montant_final=0;

	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";


	//  Connexion

	$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
	// On recherche le nom de la base

	$trouve = mysqli_select_db($connexion,$Nom_base);
	$mail_trouve=false;

	//$motrecherche="V5";



	// si le bouton Rechercher est cliqué
	if ($trouve) {

		$SQL= "SELECT * FROM panier";

		$resultat=mysqli_query($connexion, $SQL);

		while ($data = mysqli_fetch_assoc($resultat))

		{

				$montant_final = $montant_final + $data["Prix_panier"];
		}
		?>

		<center>


			<br><br><br><br><br><br>
			<form action="transaction_paiement_immediat.php" method="post">
				<table border="1">
					<tr>
						<td>Montant à payer</td>
						<td> <?php 
						echo $total."€";  ?> </td>
					</tr>
					<tr>
						<td>Carte acceptée  <br> <img src="mastercard.png" alt="MasterCard" style="height :20%; width : 20%;"> <img src="visa.png" alt="Visa" style="height :20%; width : 20%;"> <img src="american_express.png" alt="AmericanExpress" style="height :20%; width : 20%;"></td>
						<td>
							<input type="radio" name="type_carte" value="MasterCard">MasterCard<br>
							<input type="radio" name="type_carte" value="Visa">Visa<br>
							<input type="radio" name="type_carte" value="AmericanExpress">American Express<br>
						</td>
					</tr>
							<tr>
								<td>Nom présent sur la carte</td>
								<td><input type="text" name="nomCard" required></td>
							</tr>
							<tr>
								<td>Numéro de carte</td>
								<td><input type="text" name="numCard" maxlength="16" pattern="[0-9]{16}" placeholder="code à 16 chiffres" required></td>
								<!--<td><input type="number" name="numCard" pattern="2" maxlength="2" required autofocus></td>-->
							</tr>
							<tr>
								<td>Date d'expiration (saisir jj = 01)</td>
								<td><input type="date" id="start" name="date"
       							value="00-00-00"
       							min="2023-04-01" max="2050-01-01"></td>
							</tr>
							<tr>
								<td>CVV</td>
								<td><input type="text" name="cvv" maxlength="3" pattern="[0-9]{3}" placeholder="code à 3 chiffres" required></td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="submit" name="button1" value="Soumettre">
								</td>
							</tr>


					</table>
				</form>
				<br><br><br><br><br><br>
			</center>






			<?php



			//Affichage
		}
		include "moitie_bas.php";


	?>