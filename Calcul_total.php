
<?php 


$Sous_total=$_POST['Sous_total'];

$Codepromo = $_POST['CodePromo'];


	if($Codepromo == "AYA70") { // Vérifier si le code promo est correct
		$Nouveau_total = $Sous_total - ($Sous_total * (70/100)); // Calculer le nouveau total avec la réduction
	} else {
		$Nouveau_total = $Sous_total; // Pas de réduction appliquée
	}
	
 header('Location: http://localhost/Market-Place/Panier.php?Sous_tota='.$Nouveau_total);

?>

