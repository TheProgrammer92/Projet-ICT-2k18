<?php 
session_start();

include '../bout de page/base.php';
require_once '../class/function/connexion.func.class.php';
require_once '../class/ConnexionSecretaire.class.php';
require_once '../class/ConnexionProf.class.php';

if ((isset($_SESSION['secretaire_update']) and !empty($_SESSION['secretaire_update'])) || (isset($_SESSION['professeur_update']) and !empty($_SESSION['professeur_update']))  and isset($_SESSION['passwordRecup']) and !empty($_SESSION['passwordRecup']))
 {
	

	


//cette page traite le donnee tu new prof ou new secretaire




 if (isset($_POST['nom'],$_POST['email'],$_POST['password'],$_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['prenom'])  and !empty($_POST['nom'])) {
 	
		   $newInscription=new ConnexionFunc();
		   $nom=addslashes(htmlspecialchars($_POST['nom']));
		   	$prenom=addslashes(htmlspecialchars($_POST['prenom']));
		 	$email=addslashes(htmlspecialchars($_POST['email']));
		 	$password=addslashes(htmlspecialchars($_POST['password']));

	 		//on verifie que le password n'existe pas dans toute les table
	 			

	 		// d'abord dans la table inscription, des etudiant
	 		$table1="inscription";
	 		$table2="ict_secretaire";
	 		$table3="ict_professeur";
	 		$verifyEtudiant=$newInscription->verifyExist($table1,$prenom,$password);
	 		$verifyProf=$newInscription->verifyExist($table2,$prenom,$password);
	 		$verifySecretaire=$newInscription->verifyExist($table3,$prenom,$password);

	  if ($verifyEtudiant and $verifyProf and $verifySecretaire) {
	  	# code...
	 

			 if (isset($_SESSION['secretaire_update'],$_SESSION['email_secretaire_update']) and !empty($_SESSION['secretaire_update']) and !empty($_SESSION['email_secretaire_update'])) {


			 		
			 		//on verifi que l'email est egale a l'email donnée par la secretaire
			 		if ($email==$_SESSION['email_secretaire_update']){
			 			
			 			$table=htmlspecialchars("ict_secretaire");
			 			$ancienTable=htmlspecialchars("ict_addsecretaire");
			 		}

			 		else{

		 					
			 			?>
			 				<script>
			 					
			 					$(function () {
			 						$('.errorUpdate').html("Cette email secretaire est introuvable,entrer la bonne")
			 						$('.emailUpdate').css('border','1px solid red')
			 						$('.emailUpdate').text(" ");
			 					})
			 				</script>
			 			<?php
			 		}
			 		
			 	}

			 	elseif (isset($_SESSION['professeur_update'],$_SESSION['email_professeur_update']) and !empty($_SESSION['professeur_update']) and !empty($_SESSION['email_professeur_update'])) {

			 		if ($email==$_SESSION['email_professeur_update']) {
			 			# code...
			 		
				 		$table=htmlspecialchars("ict_professeur");
				 		$ancienTable=htmlspecialchars("ict_addprofesseur");

			 		}

			 		else{

			 			?>

			 			<script>
			 					
			 					$(function () {
			 						$('.errorUpdate').html("Cette email est introuvable,entrer la bonne")
			 						$('.emailUpdate').css('border','1px solid red')
			 						$('.emailUpdate').text(" ");
			 					})
			 				</script>


			 			<?php
			 		}
			 	}

			 	else{

			 		die("Les session n'existe pas ,veuillez nous voir");
			 	}

			 	//on verifie d'abord que le zozo existe deja

	
	
			if (isset($table)) {
				# code...
			
			 	$verifieExist=$newInscription->verifyExist($table,$prenom,$password);

			 	if ($verifieExist) {// s'il existe
			 		# code...
			 	

					 	//on l'inscris dans la bd
					 	$insert=$newInscription->ins_Prof_secr($table,$nom,$prenom,$email,$password);
					 	//$insert nous retourne l'id de la personne
					 	if (!$insert) {
					 		die("Erreur Lors de votre inscription.");
					 	}

					 	else{
					 		
					 		$avatar="default.jpg";
					 		$lastId=$insert;
					 		$inscriptionPublic=new ConnexionFunc();
              				$inscriptionPublic->insertPublic($lastId,$nom,$prenom,$email,$password,$avatar);
					 		



					 		?>
					 			<script>
					 				
					 				$(function () {
					 					$('#form')[0].reset();
					 				})
					 			</script>

					 		<?php

					 		$passwordDelete=$_SESSION['passwordRecup'];
					 		
					        if ($table=="ict_professeur" and $ancienTable="ict_addprofesseur") {

					        	// le champs de la table pour pas avoir de repetition
					        	$insert=$newInscription->delete_prof_secr($ancienTable,$passwordDelete);

					        	if ($insert) {
					        		# code...
					        	
						        	$connect=new ConnexionProf($prenom,$password);
						 			$connect->ConnecterProf();

					 			}

					 			else{

					  	 			die("suppression de l'ancien pas effectué");
					  	 		}
					        }
					        else if($table=="ict_secretaire" and $ancienTable=="ict_addsecretaire"){
					        		//maintenant on la supprime de sont ancien table
					             $insert=$newInscription->delete_prof_secr($ancienTable,$passwordDelete);

					        		if ($insert) {
					        		# code...
						  	 		$connectSecretaire=new ConnexionSecretaire($prenom,$password);
						  	 		$connectSecretaire->ConnecterSecretaire();

					  	 		}
					  	 		else{

					  	 			die("suppression de l'ancien pas effectué");
					  	 		}
					 		}

					 		?>
					 			<script>

					 				$(function () {
					 					
									 $('#form').animate({"margin-right":"-50px"},400)
									$('#form').hide();
					 				})
					 				


					 			</script>
					 		<?php


					 		//destruction des email professeur

					 		if ($table="ict_secretaire") {
					 			# code...
					 			unset($_SESSION['secretaire_update']);
					 			unset($_SESSION['email_secretaire_update']);
					 			unset($_SESSION['passwordRecup']);

					 		}

					 		elseif ($table=="ict_professeur") {
					 			
					 			unset($_SESSION['code_matiereRecup']);
						 		unset($_SESSION['id_secretaireRecup']);
						 		unset($_SESSION['passwordRecup']);
						 		unset($_SESSION['professeur_update']);
						 		unset($_SESSION['email_professeur_update']);

					 		}


					 		//destruction des email secretaire
					 		
					 		
					 		
					 	}

			 	}
			 	else{


			 	   ?>

			 	   	<script>
				
						$(function () {
							$('.errorUpdate').html("Ce Membre existe deja, veuilez verifier");
							$('#form')[0].reset();
						
						})
			</script>

			 	   <?php

			 	}

			 }
			else{

				echo "la table n'existe pas";
			}

 }


 // si le password n'existe pas
 else{

 	?>
 		<script>
		
		$(function () {
			$('.errorUpdate').html("Ce mot de passe existe deja..veuillez modifier");
			
			$('#form')[0].reset();
		})
	</script><?php


 }

  }

  // s'il n'a pas completer tous les champs
 else{
 	?>
 		<script>
		
		$(function () {
			$('.errorUpdate').html("Veuillez completer tous les champs")
			$('.emailUpdate.prenomUpdate,.nomUpdate,.passwordUpdate').css('border','1px solid red')
			$('#form')[0].reset();
		})
	</script><?php
 }




}

else{

	echo("Vous devez etre secreaire ou professeur pour acceder a cette page");

	?>

		<br><a href="index.php" >clique ici pour aller a l'accueil</a>
	

	<?php
}


 ?>