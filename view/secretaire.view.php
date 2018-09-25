<?php
//la page php qui permet d'affichier les element dans la page secretaire
session_start();
require "bout de page/base.php";


	
	if (isset($_SESSION['secretaire']['id']) and !empty($_SESSION['secretaire']['id'])){
		# code...
	
	$id=$_SESSION['secretaire']['id'];
	$afficheProfNonEnregistrer=$bdd->query("SELECT * from ict_addprofesseur where id_secretaire=$id");

     $afficheProf=$bdd->query("SELECT * from ict_professeur where id_secretaire=$id");

}
