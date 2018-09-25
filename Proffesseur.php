<?php


require "view/professeur.view.php";


if (isset($_SESSION['prof']['id']) and !empty($_SESSION['prof']['id'])) {

	require 'class/getDataConnect.class.php';
	$getData=new getDataConnect();
	?>



		<html>
	
	<head>
		<title>View proffessor</title>

			<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/professeur.css">
			
			<script src="js/jquery.js"></script>
			<script src="js/jquery-ui.min.js"></script>
			<script src="js/professeur.js"></script>
			
			
			<meta charset="utf-8" >

</head>

<?php 



 if (isset($_SESSION['first'])  and $_SESSION['first']==0 ) {

       $update_first=$bdd->prepare("UPDATE ict_professeur set first_connexion=1 where prenom=? and id=?");
      $update_first->execute(array($getData->getPrenomConnecter(),$getData->getIdConnecter()));
   

      $_SESSION['notifie']='Bienvenu dans notre univers  '.$getData->getNomConnecter();
    ?>

      <div id="chargement">
         
         <section class="content">
             <span class="loader loader-basic">

             </span>

           ..
         </section>

       <span class="chargement1"> Bonjour <?php if ($getData->getIdconnecter()!=null and !empty($getData->getIdConnecter())) {

         echo $getData->getPrenomConnecter();

       } ?>..</span>
        <span class="chargement2"> Veuillez patienter svp..</span>
         <span class="chargement3"> preparation des composant</span>
          <span class="chargement4"> Debut de l'initialisation</span>
           <span class="chargement5"> Preparation du forum </span>
            <span class="chargement6"> Ouverture..</span>

    </div>


    <?php
   unset($_SESSION['first']);
  } ?>
<body >


		
<br>
	<div class="container-fluid" id="container1">

	<header id="header" class="row" >
		<div id="div1"  class="col-md-6 ">
	
			<span class="pull-left" style="margin-right: 50px">GoSpeeD</span>
			
			<span class="pull-left ">
			<?php 

				if (isset($_SESSION['prof']['id']) and !empty($_SESSION['prof']['id'])) {
					 
					echo "Cours concernent ICT 103";
				}

			 ?>
			</span>
			

			
		</div>



		<nav>

			<ul>
				<li >
					<img src="img/icone/download.png"  width='30' height='30' alt="">
				</li>

				 <li >
				 	<img src="img/icone/no.jpg"  width='30' height='30' alt="">
				 </li>
				<li>
					<?php 

				if (isset($_SESSION['prof']['avatar'])) {
				  echo "<img src=php/img_update/".$_SESSION['prof']['avatar']." width='40' height='45' class='img_utilisateur'>";
				}

			 ?>
	          <ul id="option_ul" class="row list-group collapse in col-md-3 col-sm-offset-5  col-xs-offset-1 col-lg-2 col-xs-5 col-sm-3" >

          		    <a href="index.php">
          		    	<li class="list-group-item"><span><img src="img/icone/user.png" width="40" alt="usr"></span> 
                  
     
	                     
	                         <?= "Accueil"
	                         ?>
	                     </li>
                 </a>

                     <a href="update.php">

                     	<li class="list-group-item"><span><img src="img/icone/user.png" width="40" alt="usr"></span> 
                      
     
                    <?= $getData->getNomConnecter()."  ".$getData->getPrenomConnecter()

                     ?></li>
                 </a>

                   
                    <a href="#">
                      <li class="list-group-item"><span class="glyphicon glyphicon-file text-primary"></span> 

                             Aucun message
                         </li>
                             </a>

                     <a class="text-success" href="#">

                      <li class="list-group-item"><span class="glyphicon glyphicon-comment text-success"></span> 

                            Aucune notification<span class="badge">28</span></li>

                       </a>


                       <a class="text-success" href="deconnexion.php">
                           	<li class="list-group-item">
                           <span class="glyphicon glyphicon-comment text-success"></span> 

                               Se deconnecter<span class="badge">28</span></li>

                           </a>

                    </ul>
			</ul >

			
		</nav>
	</header><!-- /header -->
	
</div>

<div class="container" id="container2">

	<form id="form" class="col-md-3 col-xs-3 col-md-offset-3" method="post" >

		<img style="float: right;cursor: pointer;" src="img/icone/images.jpg" width="20" alt="fermer" class="closeAdd">

		<p class="titleCour"> Jesbeer Add lessons</p>
		<p class="error">sdfsd</p>
   		<div class="row col-md-3">
   	
  
		<input type="text" name="titre" class="titre" placeholder="Titre du cour">

		<input type="file" name="photo"  class="photo" >


	    <textarea placeholder="Description" class="description" >
	    	

	    </textarea>

	    <input type="submit" class="submit" name="submit">
 		</div>


	</form>

	<section id="section"  class="col-md-10 col-xs-4 col-md-offset-1 col-xs-offset-2"  >

		<ul class="nav row">
		 	<li class="col-md-3" style="
		 		background-image: url(img/image/programmation.jpg);
		 		background-position: center;width: 270px;
		 		
		 	">  
		 		

			 	<div  style="background-color: transparent;" >
			 		<img src="img/icone/plus.png" alt="" width="40" style="float: right;" class="ajouterCour">
			 		
			 	  </div>

			 	<div style="visibility: hidden;">

				 		 <p>
				 			
				 		</p>
			 	</div>

			 	  	<div style="
			 	  	background-color: rgba(149, 165, 166,0.8);">
			 	  	   <p style="color: #1C1C1C">Ajouter un cour</p>
			 	  	</div>	
		 	  	
		 
		 	</li>

		 	<?php while ($cour=$afficheCour->fetch()) 

		 	{

   					
   					if ($cour['titre']!="titre" && $cour['description']!="description") {
   						# code...
   					
		 		?>

		 	<li class="col-md-3 cour"  style="width: 270px;"  id="<?= $cour['id'] ?>"> 
		 		
		 		<div class="row" style="
			 		background: url(img/uploadCour/<?= $cour['photo']  ?>);
			 		background-position: center;
			 		-webkit-background-size: cover;
				    -moz-background-size: cover;
				    -o-background-size: cover;
				    background-size: cover;" >
			 		 
		 	     </div>


		 		<div class="row">
		 		   <p>
		 			<?= $cour['titre'] ?> 
		 			</p>
		 		</div>
	 			<div class="row voirCour" >
	 				<p> Voir le cour</p>
	 			</div>	
		 </li>
		 		<?php
		 		}
		 	}
		 	 ?>

		 


			 	
			 
		</ul>
	</section>

	<section class="row" id="chargeInsertCour" style="position: fixed;">
		


	</section>



		
</div>



</body>


</html>



	<?php

}

else{

	die("Vous n'ete pas professeur");
}


 ?>


