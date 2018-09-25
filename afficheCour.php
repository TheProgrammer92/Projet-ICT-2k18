<!DOCTYPE html>
<html>
<head>
	<title>afficher  des cour</title>
	
	<link rel="stylesheet" type="text/css" href="css/afficheCour.css">
	<script src="js/afficheCour.js"></script>

	<?php 
			require'view/afficheCour.view.php';




	 ?>
</head>
<body>

 <section id="">
 	<ul>


 
 	 			<?php while ($cour=$afficheCour->fetch()) 

		 	{


   					
   					if ($cour['titre']!="titre" && $cour['description']!="description") {
   						# code...
   					
		 		?>

		 	<li> 

		 		<div style="
			 		background: url(img/image/<?= $cour['photo']  ?>);
			 		background-position: center;
			 		-webkit-background-size: cover;
				    -moz-background-size: cover;
				    -o-background-size: cover;
				    background-size: cover;
				" >

				    
			 		 
		 	     </div>


		 		<div>
		 		   <p>
		 			<?= $cour['titre'] ?> 
		 			</p>
		 		</div>
	 			<div>
	 				<p> Voir le cour</p>
	 			</div>	
		 </li>
		 		<?php
		 		}
		 	}
		 	 ?>

		 
		 	 </ul>

		 	 <ul> 

		 	 	<?php

		 	 	 while ($affiche=$afficheCourNew->fetch()) {
       					
		 	 	 	if ($cour['titre']!="titre" && $cour['description']!="description") {
		 	 	 	


		 	 	 	?>



		 	 	<li><?= $affiche['titre'] ?></li>
		 	 	

		 	 	 	<?php
		 	 	 }
		 	 	}

		 	 	 ?>

		 	 </ul>


 </section>


</body>
</html>