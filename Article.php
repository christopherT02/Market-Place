<?php 

include "header.php";
$ID_r= $_GET["ID_article"];
echo $ID_r ; 

//On prends les articles 
//du coup on se connecte
// On se connecte à la base de données
$Nom_base = "Market Place";
$Endroit = 'localhost';
$Nom_utilisateur = 'root';
$MDP = '';

$connexion = mysqli_connect($Endroit, $Nom_utilisateur, $MDP, $Nom_base);

// On vérifie si la connexion a réussi
if (!$connexion) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// On recherche le nom de la base

$trouve = mysqli_select_db($connexion,$Nom_base);

//on écrit ce qu'on veut faire 

$requete = "SELECT * FROM article  " ; 
//on exécute la requête

$resultat=mysqli_query($connexion, $requete);



 

?>

<h1>Article</h1>
<?php while ($article = mysqli_fetch_assoc($resultat)) { ?>

<?php if($article["ID_article"]==$ID_r){?>
	<article>

		<h1> <?php echo $article["Nom"];  ?> </h1>
		
		<div><?php echo $article["Description"];  ?></div>


		<a href="formulaire_paiement.php?ID_article=<?php echo $ID_r;?>"><?php echo $ID_r;?> </a>

	</article>
	<br>
<?php } ?>
<?php } ?>
<?php mysqli_close($connexion); ?>

<?php 
include "moitie_bas.php";

 ?>


