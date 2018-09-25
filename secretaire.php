<?php


require "view/secretaire.view.php";


if (isset($_SESSION['secretaire']['id'])) {


	require 'class/getDataConnect.class.php';
	$getData=new getDataConnect();
	# code...

	?>


		<html>
	
	<head>
		<title>View proffessor</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/secretaire.css">
	
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/secretaire.js"></script>
	<!-- <meta http-equiv="refresh" content="1"> -->
	<meta charset="utf-8" content="content">

</head>




<?php 



 if (isset($_SESSION['first'])  and $_SESSION['first']==0 ) {

       $update_first=$bdd->prepare("UPDATE ict_secretaire set first_connexion=1 where prenom=? and id=?");
      $update_first->execute(array($getData->getPrenomConnecter(),$getData->getIdConnecter()));
   

      $_SESSION['notifie']='Bienvenu dans notre univers  '.$getData->getNomConnecter();
    ?>
<script>
  
  $(function() {
  	    
     
  })
</script>
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

<?php 
		if (isset($_SESSION['notifyProf'])) {

			?>

				<div id="msgIncriptionProf">

					<img src="img/icone/close1.png" alt="" width="35" class="closeNotifyProf">

					<p>
					<?= $_SESSION['notifyProf'] ?>
					</p>
					
				</div>

			<?php
			# code...

			unset($_SESSION['notifyProf']);
		}
	 ?>
<body >
	
	<br>
<div class="container-fluid" id="container1">	
	<header id="header">


		<div id="div1">
	
			<p>GoSpeeD</p>
			<p>
			<?php 

				if (isset($_SESSION['secretaire']['id']) and !empty($_SESSION['secretaire']['id']) ) {
					echo "Espace personnel de  ".$_SESSION['secretaire']['prenom'];
				}

				elseif (isset($_SESSION['prof']['id']) and !empty($_SESSION['secretaire']['prof'])) {
					 
					echo "Cours concernent ICT 103";
				}

			 ?>
			</p>
			<hr>

			
		</div>



			<nav>
				<ul>
					<li ><img src="img/icone/download.png"  width='30' height='30' alt=""></li>
					 <li ><img src="img/icone/no.jpg"  width='30' height='30' alt=""></li>
					<li>
						<?php 

					if (isset($_SESSION['secretaire']['avatar']) and !empty($_SESSION['secretaire']['avatar'])) {

					  echo "<img src=php/img_update/".$_SESSION['secretaire']['avatar']." width='40' height='45' class='img_utilisateur'>";
					}

				 ?>

	          <ul id="option_ul" class="row list-group collapse in col-md-2 col-sm-offset-2 ">

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
	<!--  le formulaire d'inscription du prof -->
	<form id="form" action="php/secretaire_php.php" method="post" >
		
		<img style="float: right;cursor: pointer;" src="img/icone/images.jpg" width="20" alt="fermer" class="closeAdd">
			<p class="titleCour"> Jesbeer Add Teacher</p>
			<p class="error"></p>
	   		<div>
	   	
	  		<input type="text" name="prenomProf" class="prenomProf" placeholder="Prenom ">
			<input type="text" name="code_matiere" class="code_matiere" placeholder="Code de la matiere">
			<input type="email" name="emailProf" class="emailProf" placeholder="Email">

		


		    <input type="submit" class="submit" name="submit">
	 		</div>


	</form>

	<section id="section"  class="col-md-12 col-xs-4 col-md-offset-0 col-xs-offset-2">

	<ul class="nav row">
		 	<li class="col-md-3" style="
		 		background-image: url(img/image/1.jpg);
		 		background-size:cover;width: 270px;
		 		
		 	">  
		 		

			 	<div   style="background-color: transparent;" >
			 		<img src="img/icone/plus.png" alt="" width="40" style="float: right;margin-top: -15px;" class="ajouterCour">
			 		  <p></p>
			 	 </div>

			 	<div style="visibility: hidden;">

				 		 <p>
				 			
				 		</p>
			 		</div>

			 	  	<div style="
			 	  	background-color: rgba(149, 165, 166,0.8);">
			 	  	   <p style="color: #1C1C1C">Ajouter Professeur</p>
			 	  	</div>	
		 	  	
		 
		 	</li>

		 	<!-- affichage des professeur enregistré -->


		 	<?php while ($prof=$afficheProf->fetch()) 

		 	{

   		
   					
		 		?>

		 	<li class="col-md-8" style="width: 270px;"> 
		 		<div class="row" style="
			 		background: url(img/image/<?=  "fond5.jpg" ?>);
			 		background-position: center;
			 		-webkit-background-size: cover;
				    -moz-background-size: cover;
				    -o-background-size: cover;
				    background-size: cover;" >
				     <img src="img/icone/delete2.png" title="supprimer le prof" alt="pas inscrit" width="30"
				    style="float: right;">

				    
			 		 
		 	     </div>


		 		<div class="row">
		 		   <p>
		 			<?= $prof['code_matiere']."  par  ".$prof['prenom'] ?> 
		 			</p>
		 		</div>

	 			<div class="row">
	 				<p> Voir le cour</p>
	 			</div>	
		 </li>
		 		<?php
		 		
		 	}
		 	 ?>


            <!-- affichage des professeur non enregister -->
		 	<?php while ($prof=$afficheProfNonEnregistrer->fetch()) 

		 	{

   					
   					
   						# code...
   					
		 		?>

		 	<li class="col-md-3" style="width: 270px;"> 
		 		<div class="row" style="
			 		background: url(img/image/<?=  "fond5.jpg" ?>);
			 		background-position: center;
			 		-webkit-background-size: cover;
				    -moz-background-size: cover;
				    -o-background-size: cover;
				    background-size: cover;" >

				    <img src="img/icone/info1.png" title="Le prof n'est pas encore inscrit" alt="pas inscrit" width="25"
				    style="float: right;">
			 		 
		 	     </div>


		 		<div>
		 		   <p>
		 			<?= $prof['code_matiere']."  par  ".$prof['prenom'] ?> 
		 			</p>
		 		</div>
	 			<div>
	 				<p> Voir le cour</p>
	 			</div>	
		 </li>
		 		<?php
		 		
		 	}
		 	 ?>

		 


		 	
		 
</ul>
	</section>

</div>
</body>


</html>



	<?php
}

else{

	echo "Erreur 3014..etes vous secretaire? veuillez vous connecter ici-->";

	?>

	<a href="login.php" title="se connecter">Clique ici pour te connecter</a>

	<?php
}





