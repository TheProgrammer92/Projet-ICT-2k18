
<?php 


  //on ,affiche tous les membre de la bd

 $all=$bdd->query("SELECT * from inscription");
   
   

 //affichage de toute les secretaire

 $afficheSecretaire=$bdd->query("SELECT * from ict_secretaire ");


 ?>