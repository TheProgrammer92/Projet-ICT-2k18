<?php 


if (isset($_GET['idCour']) and !empty($_GET['idCour'])) {


	$idCour=intval($_GET['idCour']);
 
	?>


<!DOCTYPE html>
<html>
<head>

	<title>operationcour</title>


	<link rel="stylesheet" type="text/css" href="css/operationCour.css">
	<script src="js/jquery.js"></script>
	
	<script src="js/operationCour.js"></script>
	<script src="js/voirCour.js"></script>

</head>
<body>

<div class="container" id="container3" style="z-index: 50;background-color: white"  >

	<span class="fermer pull-right">Fermer</span>
	  
		<br>
		<section class="col-md-3  col-md-offset-0 col-sm-offset-0 col-xs-offset-3" id="section2" >

			<div class="row" style="background-color:rgb(236, 240, 241) ; min-height: 160px;"
				    >

				    <img src="img/logo/logo.png" alt="logo" width="200" height="180" style="margin-left: 30px;z-index: 50;">
			

			</div>



		<div class="row  parcourOperation"  >
			


			<ul class="row col-md-12 col-xs-12" style="margin-left: 0px;">

				<a href="#" title="inserer" class="inserer" id="<?= $idCour ?>" >
					<li class="row">NOUVEAU PDF</li> 
				</a>

				<a href="#"  class="voirPdf"  title="voir les pdf" id="<?= $idCour ?>">
					<li class="row "  >VOIR </li>
				</a>
				<li class="row modifierCour " >PARTARGER</li>
				<li class="row">AUTRES</li>

			</ul>
			


		</div>
	</section>


		<div class="col-lg-2 col-md-7 col-md-offset-6 col-xs-offset-0 col-xs-6" style="
			z-index: 500;
			position: absolute;
		 	 margin-left: 600px;
		 	 margin-top: 100px" >
			<img src="img/logo/logo2.png" alt="logo">
		</div>

		<!-- Ce contenu est chargé par ajax en fonction du click sur les liens du haut -->
		<section class="row col-md-5 col-md-offset-1 col-sm-8 col-xs-12 col-xs-offset-1 col-sm-offset-0" id="sectionModifie"  style="z-index: 550px;">
			


	
		
		
		</section>

</div>
</body>
</html>





	<?php
}

else{

	die("ERREUR l'identifiant du cour n'existe pas");
}
 ?>
}
}
