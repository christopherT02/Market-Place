<?php
	session_start();
	$mail_recup=$_SESSION['Mail2'] ;
	$id_session=session_id();
	include "header_vendeur.php"
?>
	<div id= "Section">
		
    	<center>
    		<br>
			<h2>Votre Compte Vendeur</h2>
			<table border="2">
				<div id= "Entete">
				<tr>
					<td>Logo de la marque </td>
			
			<?php 
			 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
			$Nom_base ="Market Place";
			$Endroit ='localhost';
			$Nom_utilisateur ='root' ;
			$MDP ="";

			$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
			$trouve = mysqli_select_db($connexion,$Nom_base);
			$requete = "SELECT * FROM vendeur WHERE vendeur.Mail='$mail_recup'";
			$resultat=mysqli_query($connexion, $requete);

			while ($data=mysqli_fetch_assoc($resultat)) { ?>
				<td><img src=<?php echo $data['Image_de_fond']?>> </td></tr>
				<tr><td>ID_vendeur</td> 
				<?php echo "<td>".$data['ID_vendeur']."</td>"; ?></tr>
				<tr><td>Nom</td> 
				<?php echo "<td>".$data['Nom']."</td>";  ?></tr>
				<tr><td>Prenom</td> 
				<?php echo "<td>".$data['Prenom']."</td>"; ?></tr>
				<tr><td>Mail</td> 
				<?php echo "<td>".$data['Mail']."</td>"; ?></tr>
				<tr><td>Pseudo</td> 
				<?php echo "<td>".$data['Pseudo']."</td>"; ?></tr>
				</div>
			<?php

			}
			?>
			</table>
			<br>
			<a href="Accueil.php"><button type="button" class="plus_de_choix" >Deconnexion</button></a>
			<br>
			<br>
		</center>



<?php
include "moitie_bas.php"
?>