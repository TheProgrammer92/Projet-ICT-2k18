<?php 


/* 

dans cette page , au debut je gere d'abord l'upload de la photo,
et des que ce dernier serra valider, il renvera par json une variable IDENREGISTREMENT
qui permettre alors d'identifier chaque cour, ce dernier permettre l'insertion dans la bd du titre,description


*/

	session_start();
	  require "../class/AddCour.class.php";
	  require "../class/getDataConnect.class.php";
	   $getData=new getDataConnect();
 


   // gestion de la photo
 	if (isset($_FILES['insertPdf']) and !empty($_FILES['insertPdf'])) {
 	
 		
 		  $newPhoto=new AddCour();
 		  $newPhoto->insertPdf($_FILES['insertPdf']);

 	}



 		// ici $_POST['idEnregistrement'] est la variable aleatoir choisi dans l'uplod de la photo par json

 if (isset($_POST['titre'],$_POST['description'],$_POST['idEnregistrement'],$_POST['idCour']) and !empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['idEnregistrement']) and !empty($_POST['idCour'])) {

	 	

	 	 	$titre=addslashes(htmlspecialchars($_POST['titre'])); 
			$description=addslashes(htmlspecialchars($_POST['description']));
         	$idEnregistrement=htmlspecialchars($_POST['idEnregistrement']);
         	$longueurTitre=strlen($titre);
         	$longueurDescription=strlen($description);
         	$idCour=intval($_POST['idCour']);

         	//on verifie la longueur du titre
         	if ($longueurTitre>5 and $longueurTitre <60) {
         	
	        	$newAdd=new AddCour($titre,$description);
	        	$newAdd->insertPdfElement($idEnregistrement,$idCour);


        }
        else{

        	?>
        	<script>
        		$(function() {
        			$('.error').html("Le titre doit depasser 10 caractere")
        		})
        	</script>

        	<?php
        }
         

  	# code...


 }	

 ?>