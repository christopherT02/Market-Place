<?php



$numero_carte=$_POST['numCard'];
$nom_proprietaire=$_POST['nomCard'];
$type_carte=$_POST['type_carte'];
$date_exp=$_POST['date'];
$ccv=$_POST['ccv'];
$montant_a_payer=$_POST["montant_a_payer"];

	$Nom_base ="Market Place";
	$Endroit ='localhost';
	$Nom_utilisateur ='root' ;
	$MDP ="";


$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);


    if (!$connexion) {
      die("Échec de la connexion : " . mysqli_connect_error());
    }
 




    $requete_sql= "SELECT * FROM banque";
 	$tout_bon=false;
    $resultat=mysqli_query($connexion, $requete_sql);
    while ($data = mysqli_fetch_assoc($resultat))
      {
            if(($numero_carte == $data['Num_carte']) && ($nom_proprietaire == $data['Nom_Proprietaire']) && ($type_carte == $data['Type_Carte']) && ($date_exp == $data['Date_Exp']) && ($ccv == $data['CCV']))
            {

            	$tout_bon=true;
            	$solde_payeur = $data['Solde']-$montant_a_payer;
            	
            	if($solde_payeur<0)
            	{
            		$tout_bon=false;
            	}
            }
        
      }



if($tout_bon == true) //achat peut etre effectué
{
	$sql = "UPDATE banque SET solde = {$solde_payeur} WHERE banque.Num_carte = '$numero_carte'";
	mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($connexion));


    $requete_sql2= "SELECT * FROM panier";
    $resultat2=mysqli_query($connexion, $requete_sql2);

	while ($data = mysqli_fetch_assoc($resultat2))
    {
		$sql2 = "DELETE FROM panier WHERE panier.ID_numero_article = {$data['ID_numero_article']}"; // on vide le panier
	}
	        mysqli_query($connexion, $sql2) or die('Erreur SQL !'.$sql2.'<br>'.mysqli_error($connexion));

		header('Location: http://localhost/Market-Place/Accueil.php'); //creer une nouvelle fenetre pour le recap


}
else //pas de montre pour bibi
{
	header('Location: http://localhost/Market-Place/formulaire_paiement.php');
}






mysqli_close($connexion);







?>