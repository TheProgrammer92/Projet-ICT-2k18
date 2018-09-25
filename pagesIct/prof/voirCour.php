<?php 

if (isset($_GET['idCour']) and !empty($_GET['idCour'])) {
	# code...
	$id=intval($_GET['idCour']);
	require "../../php/voirCour_php.php";



	?>

		<!DOCTYPE html>
<html>
<head>

	<title>voir le pdf</title>
	
	<link rel="stylesheet" type="text/css" href="css/operationCour.css">
	<script src="js/jquery.js"></script>

	<script src="js/voirCour.js"></script>

		
</head>
<body>
<p class="row col-md-8 col-md-offset-5 errorPartage"></p>
<section  class="row col-md-12 col-md-offset-3 col-sm-3 col-xs-3 col-lg-12"  id="section4"  >
	<div >
	<?php 
	$i=1;
		while ($cour=$voir->fetch()) {

			

			$file="../../fichierUploade/".$cour['pdf']."";
            $taille=(filesize($file)/1024)/1024;

            $pdf="pdf".$i.".png";
			?>
			<div class="row affichePdf">

				<div class="col-md-2 photoPdf" ">
					<img src="img/icone/<?= $pdf ?>" alt="pdf" width="50" height="50">

				</div>
				<div class="col-md-9 col-md-offset-1 affichePdfDescription" >
			
					<div class="titrePdfAffiche">
						<span><?= $cour['titrePdf'] ?></span>
							<p><?="Taille  ".substr($taille,0,4)." Mo"  ?></p>
						</div>
					<p class="descriptionPdfAffiche"><?= $cour['descriptionPdf'] ?></p>

				</div>

				
				<a href="<?= "fichierUploade/".$cour['pdf']."" ?>"
				 download="<?= $cour['pdf'] ?>">Telecharger</a>
				
					<!-- partager le pdf -->
				<span  class="pull-right partager" id="partager" id_pdf="<?= $cour['id_pdf'] ?>" id_cour="<?= $id ?>" ><img src="img/icone/share2.png" alt="Partager" width="40"  style="cursor: pointer"></span>

		</div>
			<?php
			$i++;
			if ($i==6) {
				$i=1;
			}
		}

	 ?>
	</div>
</section>
</body>
</html>

	<?php
}
else {

	die("L'identifiant de ce cour es introuvable");
}


 ?>
