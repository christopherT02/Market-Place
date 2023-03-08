<?php 

$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";


$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);
// On recherche le nom de la base


    $name_renseigne=isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom_renseigne=isset($_POST["prenom"])? $_POST["prenom"] : "";
    $mail_renseigne=isset($_POST["mail"])? $_POST["mail"] : "";
    $adresse_renseigne=isset($_POST["adresse"])? $_POST["adresse"] : "";
    $mdp_renseigne=isset($_POST["mdp"])? $_POST["mdp"] : "";


    $erreur="";
    if($name_renseigne==""){
    $erreur.="Le champ nom est vide. <br>";
    }
    if($prenom_renseigne==""){
    $erreur.="Le champ prenom est vide. <br>";
    }
    if($mail_renseigne==""){
    $erreur.="Le champ mail est vide. <br>";
    }
    if($mdp_renseigne==""){
    $erreur.="Le champ mdp est vide. <br>";
    }
    if($adresse_renseigne==""){
    $erreur.="Le champ type de compte est vide. <br>";
    }

    if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
    }
 


    if($erreur==""){


    $requete_sql= "SELECT * FROM compte";
 
    $resultat=mysqli_query($connexion, $requete_sql);
    $compte_existant=false;
    while ($data = mysqli_fetch_assoc($resultat))
      {
            if($mail_renseigne == $data['Mail'])
            {
                $compte_existant=true;
            }
        
      }


    if($compte_existant)
    {
        header('Location: http://localhost/Market-Place/Compte.html');
    }
    else
    {
        $sql = "INSERT INTO client (ID, Nom, Prenom,Adresse, Mail) VALUES (NULL,'$name_renseigne', '$prenom_renseigne','$adresse_renseigne','$mail_renseigne')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
        $sql = "INSERT INTO compte (Mail,Mot_de_Passe,Type_de_Compte) VALUES ('$mail_renseigne','$mdp_renseigne','1')";

        mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));
        header('Location: http://localhost/Market-Place/Accueil.html');

    }
       

    }
    
mysqli_close($connexion);

 ?>