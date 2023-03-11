<?php
	include "header_vendeur.php"
?>
	<div id= "Section">
		
    	<center>
    		<br>
			<h2>Gestions des articles</h2>
			<table border="2">
				<div id= "Entete">
				<tr>
					<td>Logo de la marque</td>
					<td>ID_article</td>
					<td>Nom</td>
					<td>Prix </td>
					<td style="width: 200px;">Description</td>
					<td>Rarete</td>
					<td>Quantite</td>
					<td style="width: 70px;">Option 1</td>
					<td style="width: 75px;">Option 2</td>
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
			$requete = "SELECT * FROM article";
			$resultat=mysqli_query($connexion, $requete);
			while ($data=mysqli_fetch_assoc($resultat)) {
				echo "<tr>";?>
				<td><img src=<?php echo $data['Image_1']?>> </td>
				<?php 
				echo "<td>".$data['ID_article']."</td>";
				echo "<td>".$data['Nom']."</td>";
				echo "<td>".$data['Prix']." €"."</td>";
				echo "<td>".$data['Description']."</td>";
				echo "<td>".$data['Rarete']."</td>";
				echo "<td>".$data['Quantite']."</td>";?>
				<td><a href="Modifier.php?ID=<?php echo $data['ID_article']?>"> Modifier</a></td>
				<td><a href="Supprimer_article_personne.php?ID=<?php echo $data['ID_article']?>"> Supprimer</a></td>
				<?php
				echo "</tr>";
			}
			?>
			</table>
			<br>
			<a href="Ajouter_article.php"><button type="button" class="plus_de_choix" >Ajouter un article</button></a>
			<br>
			<br>
		</center>



<?php
include "moitie_bas.php"
?>