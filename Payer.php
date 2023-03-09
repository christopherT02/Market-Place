<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paiement</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<div id=wrapper>
		<div id="Titre_Bouton">
			<header>
				<h1 >Market Place<img src="Logo1.png" alt="logo"></h1>
			</header>
			<center>
				<nav>
				<div id="navigation">

						<a href="Accueil.html"><button type="button" class="Bouton_de_navigation" >Accueil</button></a>
						<a href="Tout Parcourir.html"><button type="button" class="Bouton_de_navigation" >Tout Parcourir</button></a>
						<a href="Notification.html"><button type="button" class="Bouton_de_navigation" >Notifications</button></a>
						<a href="Panier.html"><button type="button" class="Bouton_de_navigation">Panier</button></a>
						<a href="Compte.html"><button type="button" class="Bouton_de_navigation" >Votre Compte</button></a>

					</div>
				</nav>
			</center>
		</div>

<div id= "Section">
	<h1>Formulaire de paiement</h1>
	<center>
		<div id="CardFormulaire">
		<form action="creditCard.php" method="post">
	<table border="1">
		<tr>
			<td>Montant à payer</td>
			<td><input type="number" step="0.01" name="amount"></td>
		</tr>
		<tr>
			<td>A payer par</td>
			<td>
				<input type="radio" name="carte" value="MasterCard">MasterCard<br>
				<input type="radio" name="carte" value="Visa">Visa<br>
				<input type="radio" name="carte" value="AmericanExpress">American Express<br>
				<input type="radio" name="carte" value="Paypal">Paypal<br>
			</td>
		</tr>
		<tr>
			<td>Numéro de carte</td>
			<td><input type="text" name="numCard" maxlength="16" pattern="[0-9]{16}" required></td>
			<!--<td><input type="number" name="numCard" pattern="2" maxlength="2" required autofocus></td>-->
		</tr>
		<tr>
			<td>Date</td>
			<td><input type="month" name="dateExp"></td>
		</tr>
		<tr>
			<td>CVV</td>
			<td><input type="text" name="cvv" maxlength="3" pattern="[0-9]{3}" placeholder="Max 3 chiffres" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="button1" value="Soumettre">
			</td>
		</tr>
	</table>
	</form>
	</div>
	<br>
	</center>
	
</div>
<div>	

	<center>
		<footer>
			<small >

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.676039463009!2d2.311456815779748!3d48.86438767928812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fd057e0796b%3A0x869c701a06413597!2sPont%20Alexandre%20III%20%26%20Port%20des%20Champs-%C3%89lys%C3%A9es%2C%2075008%20Paris!5e0!3m2!1sfr!2sfr!4v1677530249342!5m2!1sfr!2sfr" width="400" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

			 <p>Contactez nous via ce num 

				<a href="mailto:coucou@ici.com">contact@ici.com</a>
			 </p></small>

			</footer>
		</center>
</div>
</body>
</html>
