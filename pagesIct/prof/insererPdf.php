<!-- 

	cette page est la page des modification de cour de ict
	par le professeur
	page qui va permettre d'inserer l'info tous se passe en ajax
 -->

<?php 


if (isset($_GET['idCour']) and !empty($_GET['idCour'])) {	

	$id=intval($_GET['idCour']);

	?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8" >
		<title>

			modifier Cour ICT
			
		</title>

		<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" type="text/css" href="../../css/operationCour.css">
			<script src="js/jquery.js"></script>
		<script src="js/operationCour.js"></script>




	</head>

	<body>



		<section  class="row col-md-12 col-md-offset-4 col-sm-3 col-xs-3 col-lg-9"  id="section3"  >
				
			<form class="form-horizontal  col-md-12 col-xs-12 col-sm-12 " id="formPdf"   method="post"  >
						<span class="takeId" id="<?= $_GET['idCour'] ?>"></span>
						  <div class="form-group" style="text-align: center;">

						    	<legend >Modifier le Cours</legend>

						  </div>
						  <p class="errorPdf" style="color:red"></p>
						  <p class="success" style="color: rgb(52, 152, 219);text-align: center;"></p>

					 <div class="row">

					    <div class="form-group">

					      <label for="text" class="col-lg-4 col-sm-4 control-label" style="text-align: center;">Titre 
					      </label>

					      <div class="col-lg-7 col-sm-7">

					        <input type="text"  class="form-control" id="titrePdf" style="padding-bottom: 20px;padding-top: 20px"name="titre"class="titrePdf">

					      </div>

					    </div>

					  </div>

					  <div class="row">

					    <div class="form-group">

					      <label   class="col-lg-4  col-sm-4 control-label"  style="margin-top: 30px">
					      	Description
					      </label>

					     

					      	<textarea  class="row col-lg-6  col-sm-5 col-md-6 "  style="margin-left: 20px;resize: none;" name="description"  id="descriptionPdf"></textarea>
					  
					   

					    </div>

					  </div>

				  <div class="row">

				    <div class="form-group" class="formLabel3">

				    <label for="select" class="col-lg-5  col-sm-5 control-label col-md-4" style="margin-left: -20px">Ajouter pdf</label>

				      <div class="col-lg-4">

					       <label for="insertPdf">

					       		<img src="img/icone/pdf5.png" alt="ajouter" width="70" style="margin-left: 35px" >

					       	</label>

					       	<input type="file"  name="insertPdf" id="insertPdf" style="position: absolute;top: -1500px;display: none;">

				      </div>

				    </div>

				  </div>

					  <div class="form-group" style="margin-left: -15px">
					  	
					  </style>

					    <button type="submit" class=" btn btn-danger btn-lg btn-block submitModifCour" >
					    	INSERER
					    </button>

					  </div>

				</form>
		</section>



	</body>
	</html>



	<?php
}

else{


	die(" ERREUR l'identifiant du cour n'existe pas");
}

 ?>
