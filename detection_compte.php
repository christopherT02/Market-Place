<?php

$mail_recherche = isset($_POST["mail"])? $_POST["mail"]: "";

$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";

$mail_trouve = false;

//  Connexion

$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
// On recherche le nom de la base

$trouve = mysqli_select_db($connexion,$Nom_base);


//$motrecherche="V5";

// si le bouton Rechercher est cliqué
  if ($trouve) {

    $SQL= "SELECT mail FROM compte";
 
    $resultat=mysqli_query($connexion, $SQL);

    while ($data = mysqli_fetch_assoc($resultat))
      {
      	  	if($mail_recherche == $data['mail'])
      	  	{
      	  		$mail_trouve=true;
      	  	}
        
      }
      if($mail_trouve)
      {
      	      	echo "Vous avez deja un compte :".$mail_recherche."<br>";

      }
      else
      {
      	header('Location: http://localhost/Market-Place/formulaire_inscription.html');
      }


  }
mysqli_close($connexion);


//header("Location: Recherche.html?tableau=$tableau");
//exit();

 ?>