<?php 

include "header.php";

?>


 <center>
        <h2>Votre Panier</h2>
       
        	
    <table cellspacing="30">
       
        	<tr>
        		<th scope="col">ID</th>
        		<th scope="col">Image</th>
        		<th scope="col">Nom</th>
        		<th scope="col">Prix</th>
        		<th scope="col">Description</th>
        		<th scope="col">Quantité</th>
        	</tr>

<?php 
 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";

$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
$trouve = mysqli_select_db($connexion,$Nom_base);
$requete = "SELECT * FROM panier, article WHERE article.ID_article = panier.ID_article";
$resultat=mysqli_query($connexion, $requete);
?>
     
<?php 


while ($data = mysqli_fetch_assoc($resultat)) { ?>
       

        <tr align="center">
            
              <td> <?php echo $data["ID_article"]?></td>
                <td>  <img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :50%; width : 50%;"></td> 
                 <td> <h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3></td> 
                 <td> <p><?php echo $data["Prix_panier"]."€";?></p></td> 
                 <td> <p><?php echo $data["Description"];?></p></td> 
                 <td> <p><?php echo $data["Quantite_panier"];?></p></td> 
                 
              
         
          <?php if($data["Rarete"]==3){?>
          <td><button type="button" name="B">Retirer du panier</button></td> 
          
           <?php  } ?>
      </tr>
<?php  } ?> 
    
 </table>
 </center>
    


<?php

include "moitie_bas.php";

 ?>


