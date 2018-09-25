<?php session_start();
  if (!empty($_SESSION['active'])) {
   ?> 

   <html>
	<head>
		<title>
			
		</title>
		<link rel="stylesheet" href="css/new_user.css">

		<script src='js/jquery.js'></script>
		<script src="js/new_user.js"></script>
	</head>


	<body>
		
		<div id="chargement">
			 

			 <span class="chargement1"> Bonjour jesbeer..</span>
			  <span class="chargement2"> Veuillez patienter svp..</span>
			   <span class="chargement3"> preparation des composant</span>
			    <span class="chargement4"> Debut de l'initialisation</span>
			     <span class="chargement5"> Preparation du forum </span>
			      <span class="chargement6"> Ouverture..</span>

		</div>
	</body>
</html>
    <?php

     unset($_SESSION['active']);


  }
  else{

  	header("location:acceuil.php");
  }
 ?>

