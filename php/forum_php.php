<?php 
include"bout de page/base.php"; 

$categories=$bdd->query('SELECT * from f_categories ORDER BY nom ');
$souscat=$bdd->prepare("SELECT * from f_souscategories where id_categorie= ? order by nom ");



 ?>