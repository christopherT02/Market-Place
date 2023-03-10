<?php

$mail_recherche = isset($_POST["mail"])? $_POST["mail"]: "";
$mdp_recherche = isset($_POST["mdp"])? $_POST["mdp"]: "";


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
echo "mdp recup : ".$mdp_recherche . " et mail recup ".$mail_recherche;
  if ($trouve) {

    $SQL= "SELECT * FROM compte";
 
    $resultat=mysqli_query($connexion, $SQL);

    while ($data = mysqli_fetch_assoc($resultat))
      {
      	  	if($mail_recherche == $data['Mail'])
      	  	{
      	  		if($mdp_recherche == $data['Mot_de_Passe'])
      	  		{
      	  			$mail_trouve=true;
      	  			$type_de_compte=$data['Type_de_Compte'];

      	  		}
      	  	}
        
      }
      
      if($mail_trouve)
      {
      	if($type_de_compte=='1') //client
      	{
      		header('Location: http://localhost/Market-Place/Accueil.php');
      	}
      	elseif($type_de_compte=='2') //admin
      	{
      		header('Location: http://localhost/Market-Place/Accueil.php');
      	}
      	else
      	{
      		header('Location: http://localhost/Market-Place/Accueil.php');
      	}
      }
      else
      {
		header('Location: http://localhost/Market-Place/Compte.php');
      }
      

  }
mysqli_close($connexion);


//header("Location: Recherche.html?tableau=$tableau");
//exit();

 ?>