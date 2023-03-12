<?php
	session_start();
	$mail_recup=$_SESSION['Mail2'] ;
	$id_session=session_id();
	include "header_admin.php"
?>
	<div id= "Section">
		
    	<center>
    		<br>
			<h2>Votre Compte Admin</h2>
			<table border="2">
				<div id= "Entete">
        		
			
			<?php 
			 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
			$Nom_base ="Market Place";
			$Endroit ='localhost';
			$Nom_utilisateur ='root' ;
			$MDP ="";

			$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
			$trouve = mysqli_select_db($connexion,$Nom_base);
			$requete = "SELECT * FROM administrateur WHERE administrateur.Mail='$mail_recup'";
			$resultat=mysqli_query($connexion, $requete);

			while ($data=mysqli_fetch_assoc($resultat)) { ?>
				<tr><td>ID_admin</td> 
				<?php echo "<td>".$data['ID_admin']."</td>"; ?></tr>
				<tr><td>Nom</td> 
				<?php echo "<td>".$data['Nom']."</td>";  ?></tr>
				<tr><td>Prenom</td> 
				<?php echo "<td>".$data['Prenom']."</td>"; ?></tr>
				<tr><td>Mail</td> 
				<?php echo "<td>".$data['Mail']."</td>"; ?></tr>
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