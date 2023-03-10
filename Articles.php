 <?php 
 include "header.php";
 include "Calcul_total.php"
//On prends les articles 
//du coup on se connecte

 $Nom_base ="Market Place";
 $Endroit ='localhost';
 $Nom_utilisateur ='root' ;
 $MDP ="";


//  Connexion

 $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
// On recherche le nom de la base

 $trouve = mysqli_select_db($connexion,$Nom_base);

//on écrit ce qu'on veut faire 

 $requete = "SELECT * FROM article ";

//on exécute la requête

 $resultat=mysqli_query($connexion, $requete);
 ?>
 <style type="text/css">

   .article {
      text-align: center;
  }

  .article img {
      display: block;
      margin: 0 auto;
  }

  .article h3, .article p {
      display: inline-block;
      vertical-align: top;
      margin: 0;
      padding-left: 10px;
  }
</style>

<center>

   <h1>Liste des articles</h1>
   <h2>1-Articles rares</h2>




   <div id="Les_articles">
    <table cellspacing="30">
        <thead>

<?php ///ARTICLES DE TYPE 2 DONC HAUTS DE GAMME 
while ($data = mysqli_fetch_assoc($resultat)) { ?>
    <?php if($data["Rarete"]==1){?>

            <td>
                <div class="article">
                  <img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :25%; width : 25%;">
                  <h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3>
                  <p><?php echo $data["Prix"]."€";?></p>
                  <p><?php echo $data["Description"];?></p>

              </div>
          </td>




  <?php  } ?> 
<?php  } ?> 

</thead>
</table>
</div>



<?php mysqli_close($connexion); 

 //Nouvelle collection pour la deuxième table
?>


<?php 
 ///ARTICLES DE Rarete 2 DONC HAUTS DE GAMME 
$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";

$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP,$Nom_base);
$trouve = mysqli_select_db($connexion,$Nom_base);
$requete = "SELECT * FROM article ";
$resultat=mysqli_query($connexion, $requete);
?>



        <h2>2-Articles haut de gamme</h2><div id="Les_articles">
    <table cellspacing="30">
        <thead>
            
<?php ///ARTICLES DE TYPE 2 DONC HAUTS DE GAMME 
while ($data = mysqli_fetch_assoc($resultat)) { ?>
    <?php if($data["Rarete"]==2){?>

        <tr>
            <td>
                <div class="article">
                  <img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :25%; width : 25%;">
                  <h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3>
                  <p><?php echo $data["Prix"]."€";?></p>
                  <p><?php echo $data["Description"];?></p>

              </div>
          </td>
      </tr>

      

      
  <?php  } ?> 
<?php  } ?> 

</thead>
</table>
</div>





<?php 

 ///ARTICLES DE Rarete 3 DONC REGULIERS 
$Nom_base ="Market Place";
$Endroit ='localhost';
$Nom_utilisateur ='root' ;
$MDP ="";

$connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
$trouve = mysqli_select_db($connexion,$Nom_base);
$requete = "SELECT * FROM article ";
$resultat=mysqli_query($connexion, $requete);
?>



        <h2>3-Articles réguliers</h2>
       <div id="Les_articles">
    <table cellspacing="30">
        <thead>
            
<?php ///ARTICLES DE TYPE 2 DONC HAUTS DE GAMME 
while ($data = mysqli_fetch_assoc($resultat)) { ?>
    <?php if($data["Rarete"]==3){?>

        <tr>
            <td>
                <div class="article">
                  <img src=<?php echo $data["Image_1"] ?> alt="Nom de l'article" style="height :25%; width : 25%;">
                  <h3><a href="Article.php?ID_article=<?php echo $data["ID_article"];?>"><?php echo $data["Nom"];?> </a></h3>
                  <p><?php echo $data["Prix"]."€";?></p>
                  <p><?php echo $data["Description"];?></p>

              </div>
          </td>
      </tr>
 
  <?php  } ?> 
<?php  } ?> 

</thead>
</table>
</div>
</center>




<?php 
include "moitie_bas.php";

?>