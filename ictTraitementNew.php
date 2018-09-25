<?php 
/*
 cette page recois chaque professeur ou secretaire
  et l'envoie vers php/ictTraitementNew_php.php pour
  son traitement
*/
session_start();
if ((isset($_SESSION['secretaire_update']) and !empty($_SESSION['secretaire_update'])) || (isset($_SESSION['professeur_update']) and !empty($_SESSION['professeur_update']))) {
	

	?>

	<html>
	<head>

		<title>Update mot de passe </title>
		<link rel="stylesheet" type="text/css" href="css/ictTraitementNew.css">
		<script src="js/jquery.js"></script>

		<script src="js/ictTraitementNew.js"></script>

	</head>
	<body>
		<?php 
		if (isset($_SESSION['notifyProf_Secretaire'])) {

			?>

				<div id="msgIncriptionProf">

					<img src="img/icone/close1.png"  width="35" class="closeNotifyProf">

					<p>
					<?= $_SESSION['notifyProf_Secretaire'] ?>
					</p>
					
				</div>

			<?php
			# code...

			unset($_SESSION['notifyProf_Secretaire']);
		}
	 ?>

	<form id="form" action="php/ictTraitementNew_php.php" method="post" >

	      
	        <p class="titleCour">
	        	<?php if (isset($_SESSION['secretaire_update'])){
	        		echo"Update password secretaire";
				
	        	} 
	        	elseif (isset($_SESSION['professeur_update'])) {
	        		# code...
	        		echo"Update password professeur";
	        	}

	        	?>
			       				</p>
			        <p class="errorUpdate"></p>
			       
			          <div>
			         <input type="text" name="nomUpdate" class="nomUpdate" placeholder="Nom">
			        <input type="text" name="prenomUpdate" class="prenomUpdate" placeholder="Prenom">
			        <input type="email" name="emailUpdate" class="emailUpdate" placeholder="Email">
			        <input type="password" name="passwordUpdate"  class="passwordUpdate"  placeholder="Password">

			          <input type="submit" id="submit" class="submitUpdate" name="submit" value="VALIDER">
			      </div>


			  </form>

			</body>
			</html>




	<?php
}
else{

	echo("Vous devez etre secreaire ou professeur pour acceder a cette page");

	?>

		<br><a href="index.php" >clique ici pour aller a l'accueil</a>
	

	<?php
}

 ?>

