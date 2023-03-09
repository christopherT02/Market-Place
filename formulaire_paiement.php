<?php

include "header.php";


//$ID = isset($_POST["ID_article"])? $_POST["ID_article"]: "";
$ID = $_GET["ID_article"];


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

    $SQL= "SELECT * FROM article";
 
    $resultat=mysqli_query($connexion, $SQL);

    while ($data = mysqli_fetch_assoc($resultat))

      {
      	  	if($ID == $data["ID_article"])
      	  	{
      	  		$montant = $data["Prix"];
      	  	}
        
      }
      ?>

      <center>
      	
      
      <br><br><br><br><br><br>
      <form>
					<table border="1">
						<tr>
							<td>Montant à payer</td>
							<td> <?php echo $montant."€";  ?> </td>
						</tr>
						<tr>
							<td>A payer par</td>
							<td>
								<input type="radio" name="type_carte" value="MasterCard">MasterCard<br>
								<input type="radio" name="type_carte" value="Visa">Visa<br>
								<input type="radio" name="type_carte" value="AmericanExpress">American Express<br>
							</td>
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


		//Si une carte de credit est selectionnée
		$card= isset($_POST["carte"])? $_POST["carte"] : "";

		//Affichage
	}
include "moitie_bas.php";


?>