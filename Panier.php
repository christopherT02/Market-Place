<?php 

include "header.php";




?>


<center>
	<h2>Votre Panier</h2>


	<table cellspacing="30">

		<tr>

			<th scope="col">Image</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>
			<th scope="col">Description</th>
			<th scope="col">Quantité</th>
		</tr>

		<?php 
		$Sous_total=0;
		$Nom_base ="Market Place";
		$Endroit ='localhost';
		$Nom_utilisateur ='root' ;
		$MDP ="";
		$Nouveau_total=0;

		$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
		$trouve = mysqli_select_db($connexion,$Nom_base);
		$requete = "SELECT * FROM panier, article WHERE article.ID_article = panier.ID_article";
		$resultat=mysqli_query($connexion, $requete);
		?>

		<?php 


		while ($data = mysqli_fetch_assoc($resultat)) { 
			?>



			<tr align="center">


				<td>  <img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :50%; width : 50%;"></td> 
				<td> <h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3></td> 
				<td> <p><?php echo $data["Prix_panier"]."€";?></p></td> 
				<td> <p><?php echo $data["Description"];?></p></td> 
				<td> <p><?php echo $data["Quantite_panier"];?></p></td> 

				<?php $Sous_total = $data["Prix_panier"]+$Sous_total; ?>

				<?php if($data["Rarete"]==3){?>
					
			<td><a href="supprimer_article.php?ID_article=<?php echo $data["ID_article"];?>">
				<img src="supp.png" style="height :35%; width : 35%;">
			 </a></h3></td> 
					

				<?php  } ?>
			</tr>
		<?php  } ?> 

<?php  $NV=$_GET['Sous_tota'];?>
	</table>
	<form method="post" action="Calcul_total.php">
	<table>
		<tr>
			<td>-Code Promo- ("Manololebest") -</td>
			<td><input type="text" id="code" name="CodePromo"></td>
			</td>
		</tr>

		<tr>
			<td>--Sous Total--</td>
			<td><?php  echo $Sous_total ; ?></td>
			<td><input type="hidden" name="Sous_total"  value="<?php echo $Sous_total ; ?>"></td>
		</tr>


		<tr>
			<td>- TOTAL -</td>
			<td><?php  echo $Sous_total ; ?></td>
			<td><input type="hidden"  name="Total" value="<?php echo $Sous_total ; ?>"></td>
		
		</tr>
		
	</table>

	
	<br>

		<input type="submit" value=" Total " class="plus_de_choix">
		<br>
</form>
	
		        <h2><?php  echo $NV ; ?></h2>
		        <br>
			<a href="formulaire_paiement.php?total=<?php echo $NV;?>"><button type="button" class="plus_de_choix" >Payer</button></a>
 <br>
 <br>


</center>




<?php
include "moitie_bas.php";

?>



