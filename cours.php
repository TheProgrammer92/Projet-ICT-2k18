<?php 



   

   
   include 'bout de page/base.php';
   require "class/getDataConnect.class.php";

   $getData=new getDataConnect();
   include "php/function.php";


 ?>
<?php include "php/cours_php.php"; ?>



      

      <html>
<head>
	<title>
		 Home and learning
	</title>
	 <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cours.css">
   
    <meta charset="utf8">

      <script src="js/jquery.js"></script>
      <script src="js/cours.js"></script>

</head>
<body>


<div class="container">

		 <div class="row">

           <?php include "bout de page/entete.php"; ?>

       </div>
       <br>

		 <div class="row col-md-11 col-sm-11 col-xs-11" id="suivie"  >

		<a href="" style="text-decoration: none;">
		<span style="color: #FF4500; ">Acceuil</span> <img src="img/icone/next3.png" width="13" >  </a><span style=" color: #A8A8A8;"> Cours </span >

        </div>
        <br>


       	<section class="col-md-11" id="sectionCours" >

       		<div class="row col-md-3 listCodeMatiere"  >

       			<div class="row enteteCodeMatiere" > <h4>Matieres</h4></div>

       			<ul class="list-unstyled">
       				<li class="row">ICT 103</li>
       				<li class="row">ICT 103</li>
       				<li class="row">ICT 103</li>
       				<li class="row">ICT 103</li>
       				<li class="row">ICT 103</li>
       				<li class="row">ICT 103</li><li class="row">ICT 103</li>
       				
       			

       		</div>


       <div class="row col-md-7 col-md-offset-1 " id="div_pdf" >


  		<div class="row"  style="background-color: #FF6347"> 
             <!-- le loader -->
  		   <div class="loader"><img src="img/loader/2.gif" alt=""></div>

            <img src="img/icone/close.png" alt="close" width="30" height="30" style="float: right; cursor: pointer;" class="close">
            <form method="post" action="" class="row col-md-12"> 

	  		<input type="search" class="row col-md-6 col-md-offset-3 rechercher_pdf"  placeholder="Rechercher un pdf">

	  		</form> 

	  		
	  	</div>

	  		<div class="row" id="liste">
	  			  
		  			
                     
		  			<div id="affichage" class="row">
		  				  


		           
		  			</div>


	  		</div>


  	</div>
  	


  </div>
       	</section>		

	








</body>

</html>








