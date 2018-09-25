 <?php 
session_start();


 
 require "../bout de page/base.php"; 
 include_once "../class/Connexion.class.php";
 include_once "../class/ConnexionProf.class.php";
 require "../class/ConnexionSecretaire.class.php";
 require_once "../class/function/connexion.func.class.php";


  //on verifie si le prenom et password existe
if ( isset($_POST['prenom'],$_POST['password']) and  !empty($_POST['prenom']) and !empty($_POST['password'])) {

    $passwordNonHache=$_POST['password'];
    $password=addslashes(htmlspecialchars(sha1($_POST['password'])));	
    $prenom=addslashes(htmlspecialchars($_POST['prenom']));

    $tableSecretaire='ict_addSecretaire';
    $tableMembre='inscription';
    $tableProf='ict_Prof';

   	$functionVerify=new ConnexionFunc();

    //verification s'il est nouvelle secretaire secretaire

   $countNewSecretaire=$functionVerify->verify('ict_addSecretaire',$prenom,$passwordNonHache);

	switch ($countNewSecretaire) {


		case 1:
			$_SESSION['secretaire_update']=true;
			$_SESSION['passwordRecup']=htmlspecialchars($passwordNonHache);
			$recupInfo=$bdd->query("SELECT * from ict_addSecretaire where prenom='$prenom' and password='$passwordNonHache'");
			 $_SESSION['email_secretaire_update']=htmlspecialchars($recupInfo->fetch()['email']);

			?>

			<script >
						              	  

		      $(function () {
	          	 	$(window).attr('location','http://localhost/monNouveauProjet/ictTraitementNew.php');
	          	 })
		              	   
		              
		              </script> 


					 <?php

			

		break;


		case 0:
		    
			//verification si il est ancien secretaire
			$countSecretaire=$functionVerify->verify('ict_secretaire',$prenom,$password);

			switch ($countSecretaire) {
			  	//s'il c'est une ict_secretaire
			  	case 1:
			  		//redirection vers la page de la secretaire
			  		//si on trouve le meme prenom et mot de passe dans la bd
			  		
		  		    $connexionSecretaire=new ConnexionSecretaire($prenom,$passwordNonHache);
		  		    $connexionSecretaire->ConnecterSecretaire();
			  		
			  	break;

			  	//sinon on verifi s'il est New prof
			  	case 0:
			  	     //on utilise le password non hashé
			  	 
			  		$countNewProf=$functionVerify->verify('ict_addprofesseur',$prenom,$passwordNonHache);
			  		//s'il est new professeur

			  		switch ($countNewProf) {
			  			case 1:

			  				//on recupere les infos de la secretaire qui l'a inscrit> et son code matiere
			  				$_SESSION['professeur_update']=true;

			  				$recupInfo=$bdd->query("SELECT * from ict_addprofesseur where prenom='$prenom' and password='$passwordNonHache'");
			  				$recup=$recupInfo->fetch();

			  				//on demarre les session qui vont nous aider dans l'inscription

			  				$_SESSION['id_secretaireRecup']=intval($recup['id_secretaire']);
			  				$_SESSION['code_matiereRecup']=htmlspecialchars($recup['code_matiere']);
			  				$_SESSION['passwordRecup']=$passwordNonHache;
			  				$_SESSION['email_professeur_update']=htmlspecialchars($recup['email']);

			  				?>
                   
			                    <script >
						              	  

							      $(function () {
					              	 	$(window).attr('location','http://localhost/monNouveauProjet/ictTraitementNew.php');
					              	 })
						              	   
						              
						              </script> 


	              				 <?php

			  				break;
			  			
			  			case 0:
			  				//on verifi s'il est ancien prof
			  				$countAncienProf=$functionVerify->verify('ict_professeur',$prenom,$password);

			  				if ($countAncienProf>=1) {
			  					//verification s'il e {s professeur
			  					//si on a trouvé le meme prof plusieur fois
			  					if ($countSecretaire>1) {
			  						die("Erreur..Veillez nous contacter");
			  					}
			  					else{
								$connexionProf=new ConnexionProf($prenom,$passwordNonHache);

						    	$connexionProf->ConnecterProf();
								

								}
			  				}

			  				else{
			  					//on le connecte en tant que etudiant
			  				
			  					$connexion=new Connexion($prenom,$passwordNonHache);
					   			$connexion->ConnecterMembre();
					   			break;
			  				}
			  				break;
			  			default:

			  				die("Erreur, veuillez nous contacter");
			  		}
			  		
  		}
			  		break;

			  		default:

			  		  die("Erreur..veuillez nous contacter");
			  		 break;
			  }



			
		//si c'est pas une secretaire

	}

   


    

  

else
{

	?>

	 <span style="color: red">
   <?php die('Veillez completer tous les champ svp'); ?>
             </span>



	<?php 
}



 ?>
 