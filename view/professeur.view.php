<?php
//la page php qui permet d'affichier les element dans la page professeur
session_start();
require "bout de page/base.php";


	
	if (isset($_SESSION['prof']['id']) and !empty($_SESSION['prof']['id']))
	{
		# code...
	
		$id=$_SESSION['prof']['id'];
		$afficheCour=$bdd->query("SELECT * from ict_addcour where id_professeur=$id");



}
