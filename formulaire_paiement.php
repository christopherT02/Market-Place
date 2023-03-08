<?php
	//Si le boutton est cliqué
	if (isset($_POST["button1"])){
		//montant à payer
		$montant=isset($_POST["amount"])? $_POST["amount"]:"";
		if(empty($montant)){
			$montant=0.0;
		}

		//Si une carte de credit est selectionnée
		$card= isset($_POST["carte"])? $_POST["carte"] : "";

		//Affichage
		echo "<br> Le montant à payer est: ". $montant;
		echo "<br> A payer par: ".$card;
	}
?>