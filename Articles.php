 <?php 
 include "header.php";
//On prends les articles 
//du coup on se connecte

 $Nom_base ="Market Place";
 $Endroit ='localhost';
 $Nom_utilisateur ='root' ;
 $MDP ="";


//  Connexion

 $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
// On recherche le nom de la base

 $trouve = mysqli_select_db($connexion,$Nom_base);

//on écrit ce qu'on veut faire 

 $requete = "SELECT * FROM article ";

//on exécute la requête

 $resultat=mysqli_query($connexion, $requete);
 ?>

 <center>
 
 <h1>Liste des articles</h1>

	
 <div id="Les_articles">
 	<table cellspacing="30">
 		<thead>
 		<tr>
 		
 			<th scope="col">Nom</th>

 			<th scope="col">Description</th>
 			<th scope="col">Prix</th>
 			<th scope="col">Image</th>
 		</tr>	
 		

 	<h2>1-Articles rares</h2>
<?php ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
while ($data = mysqli_fetch_assoc($resultat)) { ?>
	<?php if($data["Rarete"]==1){?>
		

 			<tr><th scope="row"> <a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></th>

 				<td><?php echo $data["Description"];?> </td>
 				<td><?php echo $data["Prix"];?> </td>
 		    </tr>
 		<?php  } ?>	
 		<?php  } ?>	

    </thead>
 	</table>
 </div>
 


 <?php mysqli_close($connexion); 

 //Nouvelle collection pour la deuxième table
 ?>

 <?php 
 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
  $Nom_base ="Market Place";
 $Endroit ='localhost';
 $Nom_utilisateur ='root' ;
 $MDP ="";

 $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);
 $trouve = mysqli_select_db($connexion,$Nom_base);
 $requete = "SELECT * FROM article ";
 $resultat=mysqli_query($connexion, $requete);
 ?>

  <div id="Les_articles">
 	<table cellspacing="30">
 		<thead>
 		<tr>
 		
 			<th scope="col">Nom</th>

 			<th scope="col">Description</th>
 			<th scope="col">Prix</th>
 			<th scope="col">Image</th>
 		</tr>	
 		

 	<h2>2-Articles haut de gamme</h2>
<?php while ($data = mysqli_fetch_assoc($resultat)) { ?>
	<?php if($data["Rarete"]==2){?>
		

 			<tr><th scope="row"> <a href="Article.php?ID=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></th>

 				<td><?php echo $data["Description"];?> </td>
 				<td><?php echo $data["Prix"];?> </td>
 		    </tr>
 		<?php  } ?>	
 		<?php  } ?>	

    </thead>
 	</table>
 </div>


 


 <?php 

 ///ARTICLES DE Rarete 3 DONC REGULIERS 
  $Nom_base ="Market Place";
 $Endroit ='localhost';
 $Nom_utilisateur ='root' ;
 $MDP ="";

 $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
 $trouve = mysqli_select_db($connexion,$Nom_base);
 $requete = "SELECT * FROM article ";
 $resultat=mysqli_query($connexion, $requete);
 ?>

  <div id="Les_articles">
 	<table cellspacing="30">
 		<thead>
 		<tr>
 		
 			<th scope="col">Nom</th>

 			<th scope="col">Description</th>
 			<th scope="col">Prix</th>
 			<th scope="col">Image</th>
 		</tr>	
 		

 		<h2>3-Articles réguliers</h2>
<?php while ($data = mysqli_fetch_assoc($resultat)) { ?>
	<?php if($data["Rarete"]==3){?>


 			<tr><th scope="row"> <a href="Article.php?ID=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></th>

 				<td><?php echo $data["Description"];?> </td>
 				<td><?php echo $data["Prix"];?> </td>
 		    </tr>
 		<?php  } ?>	
 		<?php  } ?>	

    </thead>
 	</table>
 </div>
 </center>




 <?php 
 include "moitie_bas.php";

 ?>





