<?php
  $ID_a_modif=$_GET['ID'];
  echo "ID ".$ID_a_modif;
  include "header_admin.php";
?>
<?php
  
  $Nom_base ="Market Place";
  $Endroit ='localhost';
  $Nom_utilisateur ='root' ;
  $MDP ="";

  $connexion = mysqli_connect($Endroit,$Nom_utilisateur,$MDP);
  $trouve = mysqli_select_db($connexion,$Nom_base);
  $requete = "SELECT * FROM vendeur WHERE ID_vendeur = '$ID_a_modif'";
  $resultat=mysqli_query($connexion, $requete);
  while ($data=mysqli_fetch_assoc($resultat)) {

?>
    <div id= "Section">
      <br>

      <center>
    <form action="Enregistrer_vendeur.php" method="post">

    <h3>Modifier un Article</h3>
    <table border="1" align="center">
      <tr>
        <td>Nom</td>
        <td><input type="text" name="nom" value="<?php echo $data['Nom']?>"></td>
      </tr>
      <tr>
        <td>Prenom</td>
        <td><input type="text" name="prenom" value="<?php echo $data['Prenom']?>"></td>
      </tr>

      <tr>
        <td>Mail</td>
        <td><input type="text" name="mail" value="<?php echo $data['Mail']?>"></td>
      </tr>
      
      <tr>
        <td>Pseudo</td>
        <td><input type="text" name="pseudo" value="<?php echo $data['Pseudo']?>"></td>
      </tr>

      <tr>
        <td><input type="hidden" name="ID" value="<?php echo $data['ID_vendeur']?>"></td>
        <td><input type="submit" name="submit" value="Modifier"></td>
      </tr>
    </table>
  </form>
      </center>

      
        <br>
<?php

}
include "moitie_bas.php"
?>