<?php 

//On prends les articles 
//du coup on se connecte

$Nom_base ="basetest";
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

//on récupère



include "header.php";
echo "ICI FIN DU PREMIER PHP";


?>

<h1>Liste des articles</h1>
<section>

<?php while ($data = mysqli_fetch_assoc($resultat)) { ?>


	<article>

		<h1><a href="Article.php?ID=1"> <?php echo $data["Nom"];  ?> </a>   </h1>
		
		<div><?php echo $data["Description"];  ?></div>
		
	</article>

<?php  } ?>

</section> 
<?php 
include "moitie_bas.php";

 ?>





