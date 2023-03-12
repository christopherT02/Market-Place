<?php

	$ID_a_modif=$_POST['ID'];
  $nom_a_modif=$_POST['nom'];
  $prenom_a_modif=$_POST['prenom'];
  $mail_a_modif=$_POST['mail'];
  $pseudo_a_modif=$_POST['pseudo'];

  echo "REGARDE ".$nom_a_modif;

	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";
    $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);

    if (!$connexion)
     { die("Échec de la connexion : " . mysqli_connect_error());}

    $requete_sql= "SELECT * FROM vendeur";
    $resultat=mysqli_query($connexion, $requete_sql);
    $vendeur_trouver = false;
    while ($data = mysqli_fetch_assoc($resultat))
      {
          if($ID_a_modif == $data['ID_vendeur'])
          {
            $vendeur_trouver = true;
          }
    
      }

    if($vendeur_trouver == true)
    {
      $sql = "UPDATE vendeur SET Nom = '$nom_a_modif',Prenom = '$prenom_a_modif', Mail='$mail_a_modif',Pseudo = '$pseudo_a_modif' WHERE vendeur.ID_vendeur=$ID_a_modif"; 
        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
    }
      
      mysqli_close($connexion);
      header('Location: http://localhost/Market-Place/Gestion_des_vendeurs.php');


?>