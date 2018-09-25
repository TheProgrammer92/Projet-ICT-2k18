
<?php 



// session_start();

	include 'bout de page/base.php';
  // include "class/getDataConnect.class.php";
  //   $getData=new getDataConnect();
  include "php/messagerie_php.php";

// on verifie si la variable de session existe


    if ($getData->getIdPublic()!=null) {
      # code...


      ?>


<html>
 <head>
   <title>Messagerie</title>
<!--  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">  -->
   <link rel="stylesheet"  href="css/messagerie.css">
    <meta charset="utf-8">

  <script src="js/jquery.js"></script>
   <script src="js/messagerie.js"></script>

 </head>
 <body>


  <section class="row col-md-4 col-xs-10 col-sm-5 col-lg-4"   style="float: right;" >
        
     

    <section class="row messagerie col-md-12 col-xs-12 col-lg-12 col-sm-12"   >

      <div class="row entete_messagerie">
           <span> ICT speed</span>
           <div >
            <img src="img/icone/search.png" style="position: absolute;" width="55" alt="rechercher">
           </div>

         </div>
        
        <div class="row accueil_affiche"> 


         </div>




        
    </section>


    <!-- partie du nouveau message -->


     <section class="row new_message_messagerie col-md-4 col-xs-12 col-lg-12 col-sm-12" >

      <div class="row entete_new_message">

           <img src="img/icone/retour.jpg" width="40" height="30" class="retour_message" style="cursor: pointer;">
              <span style="font-size: 18px;color:#FAFAFA">Membres</span>
              <span style="color:#FAFAFA"><?= $count ?> membres</span>
         </div>
        
        <div class="row liste_membre"  > 



                  <?php while ($data=$view->fetch()) {

                     ?>  
                   
                  <div class="profil"   id=<?= $data['id_personne']?> >
                  
                 
                     
                      <img src="php/img_update/<?=$data['avatar'] ?>" style="border-radius: 30px" width="50" height="50" />
                       <span class="name"><?= $data['prenom']."  ".$data['nom'] ?></span>

        
                  </div>

                
       
                     <?php 

                  }?>


    



        
    </section>


        
        <section class="row affiche_conversation col-md-4  col-xs-12 col-lg-12 col-sm-12" >

          <div class="row entete_affiche_conversation">

              

                
            </div>


             <div class="row corp_conversation col-" style="background-image: url(img/image/snow_panoramic4.jpg);background-size: cover">
                                

                
               </div>


                <div class="footer_conversation"  >
                      
                    <img src="img/icone/ImageCapture.png" class="capture" width="45" height="45"  alt="pinceau" > 
                       <textarea cols="25" rows="1"  type="text" placeholder="taper un message , tapez ENTRER a la fin" id="conversation" name="conversation"></textarea>
                       
                       <button id="submit"  title="creer un topic"><img src="img/icone/pinceau1.jpg" width="15" height="15"  alt="pinceau"> send </button>
                            
                  </div>

        
    



        
    </section>
    
    <!-- image qui fait aparraite le messenger -->
     <span class="col-md-3 sms" >
                    
     <img src="img/icone/close3/Messages.png" alt="message" width="70px">
   </span>

      
<!--    <div id="faux_chargement"></div> -->
  
 </section>

    


   
 </body>
 </html>





      <?php
    }





	?>
	 
 


