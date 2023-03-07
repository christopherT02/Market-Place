<?php 

include "header.php";

//
$ID_r= $_GET["ID"];

echo $ID_r ; 

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

$requete = "SELECT * FROM article WHERE ID_r ='1'" ; 
//on exécute la requête

$resultat=mysqli_query($connexion, $requete);

$article = mysqli_fetch_assoc($resultat);

//ICI C'EST UN ARTICLE A LA FOIS

//on vérifie si article est vide 

if(!$article)
{
	//pas d'article
	http_response_code(404);
	
	exit ; 
}
$titre = $article["Nom"];

echo "ICI FIN DU PREMIER PHP";


?>

<h1>Liste des articles</h1>


	<article>

		<h1> <?php echo $article["Nom"];  ?> </h1>
		
		<div><?php echo $article["Description"];  ?></div>
		
	</article>


<?php 
include "moitie_bas.php";

 ?>






<?php
include "header.php";

// On récupère l'ID de l'article à afficher
$ID_r = mysqli_real_escape_string($connexion, $_GET["ID"]);

// On se connecte à la base de données
$Nom_base = "basetest";
$Endroit = 'localhost';
$Nom_utilisateur = 'root';
$MDP = '';

$connexion = mysqli_connect($Endroit, $Nom_utilisateur, $MDP, $Nom_base);

// On vérifie si la connexion a réussi
if (!$connexion) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// On écrit la requête SQL pour récupérer l'article correspondant
$requete = "SELECT * FROM article WHERE ID_r ='$ID_r'";

// On exécute la requête et on récupère l'article
$resultat = mysqli_query($connexion, $requete);
$article = mysqli_fetch_assoc($resultat);

// On vérifie si l'article a été trouvé
if (!$article) {
    // Pas d'article trouvé, on renvoie une erreur 404
    http_response_code(404);
    exit;
}

$titre = $article["Nom"];

// On affiche le titre de la page et l'article
?>

<h1><?php echo $titre; ?></h1>

<article>
    <h1><?php echo $article["Nom"]; ?></h1>
    <div><?php echo $article["Description"]; ?></div>
</article>

<?php
include "moitie_bas.php";

// On ferme la connexion à la base de données
mysqli_close($connexion);
?>
