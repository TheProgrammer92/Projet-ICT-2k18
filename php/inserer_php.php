<?php 
   
 if(!empty($_POST['select']) and !empty($_POST['fichier_pdf']) 
 	and !empty($_POST['description']) and !empty($_POST['file_image'])){

 	$select=$_POST['select'];
     $fichier_pdf=$_POST['fichier_pdf'];
     $description=$_POST['description'];
     $file_image=$_POST['file_image'];

 	include "bout de page/base.php";
 }
 ?>