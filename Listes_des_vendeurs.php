<?php
	include "header_vendeur.php"
?>
	<div id= "Section">
		
    	<center>
    		<br>
			<h2>Listes des vendeurs</h2>
			<table border="2">
				<div id= "Entete">
				<tr>
					<td>Logo de la marque</td>
					<td>ID_vendeur</td>
					<td>Nom</td>
					<td>Prenom </td>
					<td>Mail</td>
					<td>Pseudo</td>
        		</tr>
        		</div>
			
			<?php 
			 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
			$Nom_base ="Market Place";
			$Endroit ='localhost';
			$Nom_utilisateur ='root' ;
			$MDP ="";

			$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
			$trouve = mysqli_select_db($connexion,$Nom_base);
			$requete = "SELECT * FROM vendeur";
			$resultat=mysqli_query($connexion, $requete);
			while ($data=mysqli_fetch_assoc($resultat)) {
				echo "<tr>";?>
				<td><img src=<?php echo $data['Image_de_fond']?>> </td>
			<?php 
				echo "<td>".$data['ID_vendeur']."</td>";
				echo "<td>".$data['Nom']."</td>";
				echo "<td>".$data['Prenom']."</td>";
				echo "<td>".$data['Mail']."</td>";
				echo "<td>".$data['Pseudo']."</td>";
				echo "</tr>";
			}
			?>
			</table>
			<br>
			<a href="Inscription_vendeurs.php"><button type="button" class="plus_de_choix" >Ajouter un vendeur</button></a>
			<br>
			<br>
		</center>



<?php
include "moitie_bas.php"
?>