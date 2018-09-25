<?php 
session_start();
require "../../class/OperationCour.class.php";


if (isset($_SESSION['prof']['id'])) 
{
	if (isset($id)) {
		# code...
	
	$voirCour=new OperationCour($id);
	$voir=$voirCour->voir();

	}

}

else{


	die("Vous devez etre professeur");
}



 ?>