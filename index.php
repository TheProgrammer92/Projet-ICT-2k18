<?php session_start();

  
//verifions si l'utilisateur est connecter;


  # code...
  include "php/function.php";
   include 'php/acccueil_php.php';
   require "class/getDataConnect.class.php";
  $getData=new getDataConnect();


  
 
   

 ?>

<html>


    <head>
      	<title>
      		 Home and learning
      	</title>
      	
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="css/index.css">
          <meta charset="utf8">
          <meta name="viewport" content="width-device-width , initial-scale=1.0">
             <script src="js/jquery.js"></script>
           
            <script src="js/accueil.js"></script>
            <script src="js/forme.js"></script> 
         
         

         

    </head>

    
<?php 
    include 'bout de page/base.php';

 

 ?>

 <?php 


 if (isset($_SESSION['first'])  and $_SESSION['first']==0 and isset($_SESSION['id_connecter'])) {

       $update_first=$bdd->prepare("UPDATE inscription set first_connexion=1 where prenom=? and id=?");
      $update_first->execute(array($getData->getPrenomConnecter(),$getData->getIdConnecter()));
   

       $_SESSION['notifie']='Bienvenu dans notre univers  '.$getData->getNomConnecter();
    ?>
<script>
  
  $(function() {
      $('#contenu').hide()
      $('#contenu').fadeIn(25000)
  })
</script>
      <div id="chargement">
         
         <section class="content">
             <span class="loader loader-basic">

             </span>

         
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
<body>






<div class="container"  >

        <div class="row">

           <?php include "bout de page/entete.php"; ?>

       </div>
       <br>
      <section class="col-md-12" >
        
      </style> 
        
         
          <div class="row col-md-11 col-sm-11 col-xs-11" id="suivie"  >



              <a href="" style="text-decoration: none;">
                <span style="color: #FF4500; ">Acceuil</span> <img src="img/icone/next3.png" width="13" >  </a><span style=" color: #A8A8A8;"> Parcours </span >

        </div>


              <!-- partie des image dans la div -->
            <div class="row col-md-11 col-sm-12 col-xs-12" id="blocks" >

                  <div class="col-md-4 block">

                      <div  style="background-image: url('img/logo/4.jpg');">
                    
                      </div>
                         
                      <div>
                         Creer un theme
                      </div>



                   </div >


                  <div class="col-md-4 block">

                      <div  style="background-image: url('img/logo/creation.jpg');">
                    
                      </div>
                         
                      <div>
                         Creer un theme
                      </div>



                   </div >



                  <div class="col-md-4 block">

                      <div  style="background-image: url('img/logo/Communiquer.jpg');">
                    
                      </div>
                         
                      <div>
                         Creer un theme
                      </div>



                   </div >         
                </div>
                
     
              
          </section>
          


          <div class="cookie_alert col-md-3 col-ld-3 col-xs-9 col-sm-5">
              <p>
               En  poursuivant votre navigation sur ce site, vous acceptez l'utilisation des cookies pour vous proposer des contenus et services adaptés a vos centres  d'interèts</p>  <br>
               <a class="accept_cookie">OK</a>
         </div>




           

                    <div  class="row col-md-10 col-sm-12 col-xs-12 sectionSms" style="" >

                      <?php require_once "messagerie.php" ?>
                     </div>
           

         </div>
         


         


            


   <!-- ici la div  pour les cookie -->



       
          <br><br><br>
          <div class="container-footer container-fluid">




            <footer class="col-md-12 footer" >
              
            </footer>


            

          </div>




</body>



</html>




                  