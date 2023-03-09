<style type="text/css">.dg-addToCartFormGrid { margin-bottom:25px; }
.dg-addToCartFormGrid svg {
  width: 20px;
  height: 20px;
  vertical-align: middle;
  fill: currentColor;
  display:inline-block;  
  // display:none !important;
}
.dg-addToCartFormGrid button {
  // background:#FF8900 !important;
  // color:#FFFFFF !important;
}
@media screen and (max-width: 600px) {
  .dg-addToCartFormGrid svg { display:none; }
  .dg-addToCartFormGrid button { font-size:10px; }
}
La partie // display:none !important; est masquée car en css les // devant un attribut permet de ne pas l’interpréter. Vous pouvez enlever les // de cette ligne pour supprimer l’icône du panier. De plus si vous souhaitez changer l’icône du panier regardez la vidéo ça sera plus simple.

De la même manière vous allez vous 2 autres lignes:

// background:#FF8900 !important;
// color:#FFFFFF !important;</style>






<?php 

include "header.php";
$ID_r= $_GET["ID_article"]; 

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
<?php while ($data = mysqli_fetch_assoc($resultat)) { ?>

	<?php if($data["ID_article"]==$ID_r){?>
		<article>

			<td>
				<div class="article">
					<img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :25%; width : 25%;">
					<h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3>
					<p><?php echo $data["Prix"]."€";?></p>
					<p><?php echo $data["Description"];?></p>

				</div>
			</td>


			<form action="remplissage_panier.php" method="post" class="dg-addToCartFormGrid" >  
				<div style="min-height:50px;">
					<select style="margin-bottom:10px;font-size:12px;width:100%;max-width:100%;{% unless product.variants.size > 1 %}display:none;{% endunless %}" name="quantite" id="productSelect-{{ section.id }}" class="product-variants product-variants-{{ section.id }}">
						{{ product.variants.size }}
						{% for variant in product.variants %}
						{% if variant.available %}
						<option {% if variant == product.selected_or_first_available_variant %} selected="selected" {% endif %}  data-sku="quantite" value="4">
							Quantité : 4
						</option>    
						<option {% if variant == product.selected_or_first_available_variant %} selected="selected" {% endif %}  data-sku="quantite" value="3">
							Quantité : 3
						</option>    
						<option {% if variant == product.selected_or_first_available_variant %} selected="selected" {% endif %} data-sku="quantite" value="2">
							Quantité : 2
						</option>    
						<option {% if variant == product.selected_or_first_available_variant %} selected="selected" {% endif %}  data-sku="quantite" value="1">
							Quantité : 1
						</option>    

						{% endif %}
						{% endfor %}
					</select>
				</div>
				<div style="display:none;">  
					<input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
					<input type="hidden" name="ID_article" value="<?php echo $ID_r; ?>">
				</div>
				<button type="submit" name="add" class="btn addToCart add-cart-secondary" style="width:100%;">
					<!-- vous pouvez changer cette ligne pour supprimer ou changer le panier -->
					<svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-cart" viewBox="0 0 37 40"><path d="M36.5 34.8L33.3 8h-5.9C26.7 3.9 23 .8 18.5.8S10.3 3.9 9.6 8H3.7L.5 34.8c-.2 1.5.4 2.4.9 3 .5.5 1.4 1.2 3.1 1.2h28c1.3 0 2.4-.4 3.1-1.3.7-.7 1-1.8.9-2.9zm-18-30c2.2 0 4.1 1.4 4.7 3.2h-9.5c.7-1.9 2.6-3.2 4.8-3.2zM4.5 35l2.8-23h2.2v3c0 1.1.9 2 2 2s2-.9 2-2v-3h10v3c0 1.1.9 2 2 2s2-.9 2-2v-3h2.2l2.8 23h-28z"></path></svg>

					<span id="addToCartText-{{ section.id }}">Ajouter au panier</span>
				</button>

			</form>

			

		</article>
		<br>
	<?php } ?>
<?php } ?>
<?php mysqli_close($connexion); ?>

<?php 
include "moitie_bas.php";

?>


