

<?php 

session_start();
include"php/function_forum.php";
include"php/function.php";
require "class/getDataConnect.class.php";
 $getData=new getDataConnect();

include "php/forum_php.php";





 ?>
<?php if ($getData->getIdPublic()!=null){

	?> 

	<!DOCTYPE html>
<html>
<head>
	<title>Forums page</title>

 	 <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/forum.css">

	<script src="js/forum_js.js"></script>
	
</head>
<body> 

<div class="container">
		<div class="row">

           <?php include "bout de page/entete.php"; ?>

       </div>
       <br>
		


          <div class="row col-md-11 col-sm-11 col-xs-11" id="suivie"  >

			<a href="" style="text-decoration: none;">
			<span style="color: #FF4500; ">Acceuil</span> <img src="img/icone/next3.png" width="13" >  </a><span style=" color: #A8A8A8;"> Forums </span >

        </div>
<br><br><br>

<!-- affichage des categories et sous categories toute ici dans cette partie-->
		<section class="row" >

			<div class="row">
  				<span style=" font-size: 23px;" class="col-md-offset-1">Liste des forums</span>
  			</div>
  			<br>



<?php

  $souscategorie='';
 
 while ($donnee=$categories->fetch()) {


 $souscat->execute(array($donnee['id']));

	?>
  <div class="row col-md-offset-1" id="afficheForums" >

		<span class="titre"> <a href="nouveau_topics.php?categorie=<?php echo $donnee['nom'];?>& id_cat=<?= $donnee['id']; ?> " > <?php echo $donnee['nom']; ?></span></a><br>
		<br>
		  <?php while ($req=$souscat->fetch()) {
				
		    
		    $souscategorie.='<a href="nouveau_topics.php? categorie='.$donnee['nom'].'& souscategorie='.$req['nom'].'&id_cat='.$donnee['id'].'">';
		    

					    echo $souscategorie;
					  
					    echo "<div class='col-md-3 col-xs-5' id='categorie' style='line-height: 70px'>";

						    echo "<span class='nom_cat'>".$req['nom']." </span>  ";
			                     
			                    
				               echo "<div  class='row categorie_design' >";

								echo "<span class='Dernier' >dernier message le: ".derniere_reponse($donnee['id'])."</span>";
					              
					             
				              echo "</div>";
				            
						echo "</div>";
						echo "</a>";
						


		    }

		      
			?>


      
      
</div>

<br>


	
 <?php } ?>
	
	
 
 </section>
</div>

</body>
</html>


	 <?php 
} 
else{
	$_SESSION['notifie']="veillez vous connecter";
	header("location: login.php");
}

?>
