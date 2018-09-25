<?php 


include "../../bout de page/base.php";


 if (isset($_POST['prenom']) and isset($_POST['email'])) {
 	  
 		$prenom=htmlspecialchars($_POST['prenom']);
 		$email=htmlspecialchars($_POST['email']);
 		$rand1=rand(1,500);
 		$rand2=rand(500,1500);
 		$password=$prenom.$email[1].$rand1.$email[4].$rand2;
 	  	$newSecretaire=$bdd->prepare("INSERT INTO ict_addsecretaire (prenom,password,email) values(?,?,?)");
	 	  $newSecretaire->execute(array($prenom,$password,$email));
	 	  if (!$newSecretaire) {
	 	  	   
	 	  	   die("Erreur .. la requete ne marche pas petit");		
	 	  }
	 	  else{

 	  	?>
 	  		<script>
 	  		
 	  			$(function() {                                                                                                                                              
 	  				$('.error_add').html("Insertion effectué petit");
 	  				$('#form')[0].reset()
 	  			})
 	  		</script>

 	  	<?php
 	  }
 }