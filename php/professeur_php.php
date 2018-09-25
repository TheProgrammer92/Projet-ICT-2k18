<?php 

/* 

dans cette page , au debut je gere d'abord l'upload de la photo,
et des que ce dernier serra valider, il renvera par json une variable IDENREGISTREMENT
qui permettre alors d'identifier chaque cour, ce dernier permettre l'insertion dans la bd du titre,description


*/
  session_start();
  require '../class/AddCour.class.php';
  require "../class/getDataConnect.class.php";
   $getData=new getDataConnect();
 

   // gestion de la photo
 	if (isset($_FILES['photo']) and !empty($_FILES['photo'])) {
 		
 		 
 		  $newPhoto=new AddCour("titre","description");
 		  $newPhoto->insertPhoto($_FILES['photo'],"ict_addcour");

 	}


 	
	// ici $_POST['idEnregistrement'] est la variable aleatoir choisi dans l'uplod de la photo par json

 if (isset($_POST['titre'],$_POST['description'],$_POST['idEnregistrement']) and !empty($_POST['titre']) and !empty($_POST['description']) and !empty($_POST['idEnregistrement'])) {


   

    	 	 	$titre=addslashes(htmlspecialchars($_POST['titre'])); 
    			$description=addslashes(htmlspecialchars($_POST['description']));
         	$idEnregistrement=htmlspecialchars($_POST['idEnregistrement']);
         	$longueurTitre=strlen($titre);
         	$longueurDescription=strlen($description);

         	//on verifie la longueur du titre
         	if ($longueurTitre>5 and $longueurTitre <60) {
         	
	        	$newAdd=new AddCour($titre,$description);
	        	$newAdd->insertCours($_SESSION['prof']['id'],$idEnregistrement);


        }
        else{

        	?>
        	<script>
        		$(function() {
        			$('.error').html("Le titre doit depasser 5 caractere")
        		})
        	</script>

        	<?php
        }
         

  	# code...


 }	

 
 ?>