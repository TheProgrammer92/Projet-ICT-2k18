<?php session_start();
include"php/function.php";

include "class/getDataConnect.class.php";

$getData=new getDataConnect();




if ($getData->getIdConnecter()!=null) {
  # code...
?> 

    <html>
    <head>
      <title></title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/update.css">
      <script src="js/jquery.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/update.js"></script>


      <script>

        var $j=jQuery.noConflict();

        $j(function(){

              $j('#sectionFormulaire').draggable();
          })
        
        

      </script>

      

    </head>
    <body>
    <!-- inclusion de la partie entete -->
  
   
<div class="container">
  <?php  include "bout de page/entete.php";
     ?>
       <br>
      <section  class="row" >

              <div class="row col-md-11 col-sm-11 col-xs-11" id="suivie"  >
                <a href="" style="text-decoration: none;">
                  <span style="color: #FF4500; ">Acceuil</span> <img src="img/icone/next3.png" width="13" >  </a><span style=" color: #A8A8A8;"> Parcours </span >

            </div>
            <br><br><br><br>
           


             

                 <div class="row col-md-3 col-sm-5 col-xs-11" style="margin-left: 55px" >

                      <form action="php/update_php.php"  method="post" id="pdp" class="col-md-10 col-sm-10 col-xs-7"  >
                           <span class="error_up" style=""></span>
                          <label for="avatar" class="label_profil"> 


                                <!-- le crayon qui va permettre de modifier l'image -->
                               <img src="img/icone/crayon2.png" class="crayons" title="modifier l'image" width="50"  >

                          </label>
                              <input type="file" name="monfichier" id="avatar" class="monfichier" style="position: absolute; top: -200%;display: none ">
                                <!-- affichage de l'avatar a modifier -->
                                <div class="chargeImg">
                        <?php

                          echo "<img src=php/img_update/".$getData->getAvatarConnecter()." width='180' height='180' class='img_update' style='z-index:2;' >"; ?>
                          </div>

                         <button type="submit" name="valider"  class="btnUpdateImg submit" id="submit">
                          Changer
                      </button>
                             
                          

                   </form>

            </div>

            <section class="row col-md-7 col-sm-7 col-xs-12" >

             
                <div class="row col-md-12 col-sm-10 col-xs-12 " id="afficheInfo" >

                       <span class="NamePrenom"><?= $getData->getPrenomConnecter()." ".$getData->getNomConnecter() ?></span>

                    <!-- image de modification du formulaire -->
                       <span class="crayon"><img src="img/icone/crayons.png" alt="Mise a jour" width="70" height="70" ></span>

                       <div class="row">
                         <span style="color:#FF6347">Email</span><span><?=" "." "."  ".$getData->getEmailConnecter() ?></span>
                       </div>



                       <div class="row">
                         <span style="color:#FF6347">Tel</span><span><?php

                         if ($getData->getTelConnecter()!=null and !empty($getData->getTelConnecter())) {
                           echo  " "." "."  ".$getData->getTelConnecter();
                         }
                         else{

                           echo " "." "."  "."Aucun numero definie";
                         }

                         ?></span>
                       </div>

                       <br><br>



                       <span class="competence">Competence</span>

                        <div class="row">
                          <span> Biographie</span>
                          <br><br><br>



                         <span style="color:#FF6347">Anniversaire</span><span><?php

                         if (!empty($getData->getJourConnecter()) and !empty($getData->getMoisConnecter()) and !empty($getData->getAnneeConnecter())) {

                           echo  " "." "."  ".$getData->getJourConnecter()." ".$getData->getMoisConnecter()." ".$getData->getAnneeConnecter();
                         }
                         else{

                           echo " "." "."  "."Pas d'anniverssaire";
                         }

                         ?></span>
                       </div>

                  </div>



                
                </section>


                <!-- ici la partie du formulaire -->
          <section class="col-md-4 col-sm-7 col-xs-10" id="sectionFormulaire">

              <form action="php/update_php.php" method="post" id="formUpdate" class="col-md-12">

                    <img src="img/icone/close1.png" width="25" style="position: absolute; cursor: pointer; left: 97%; top: -1%" class="close2">

                    
                

                  <button type="submit" name="submit" value="Enregistrer info" class="btnUpdateImg submit">Valider la mise a jour</button><br><br>

                      <div class="form-group">
                    
                      <input type="text" name="nom" class=" form-control new_nom"  placeholder="nom"  autocomplete="off">
                      <span class="Unom_manquant">  </span> 

                    </div>
                           
                    <div class="form-group">
                     <input type="text" name="prenom"   class="form-control new_prenom" placeholder="Prenom"  autocomplete="off">
                     </div>

                     <span class="Uprenom_manquant"> </span> 
                      
                      <div class="form-group">
                         <select id="sex" name="sexe" class="form-control " >
                          <option value="" ></option>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                          </select>

                        </div>

                        <div class="form-group">

                            <input type="email" name="email" class="form-control new_email" placeholder="email" autocomplete="off" >
                            <span class="Uemail_manquant"> </span> 
                        </div>

                        <div class="form-group">

                             <input type="password" name="password" placeholder="password" class="form-control new_password" autocomplete="off" >
                                <span class="Upassword_manquant"></span>  
                              
                               <input type="password" name="repeat_password" placeholder="repeter le password" class="form-control new_repeat"  autocomplete="off">  
                                <span class="Urepeat_manquant"></span> 
                            </div>

                            <div class="form-group">

                                 <input type="tel" name="telephone" placeholder="telephone" class="form-control new_tel">
                                   <span class="Utel_manquant" ></span> 
                              </div>
                          

                        <div class="form-group" class="selectAge">
                             <select id="sex_new" name="jour" class="selects">
                                   <option >jour</option>
                                   
                                   <?php 

                                   for ($i=1; $i <32; $i++) { 
                                     ?>
                                      <option value="1"><?= $i ?></option>
                                     <?php
                                   }

                                    ?>
                                 
                               </select>
     
                                 <select id="sex_new" class="selects" name="mois" >
                                    <option value="mois">mois</option>
                                     <option value="janvier">janvier</option>
                                     <option value="fevrier">fevrier</option>
                                     <option value="mars">mars</option>
                                     <option value="avril">avril</option>
                                     <option value="mai">mais</option>
                            </select>

                            <select id="sex_new" name="annee" class="selects" >
                              <option value="années">années</option>
                                  <?php 
                                  
                                    for ($i=1980;$i <2019 ; $i++) { 
                                          
                                          ?> 

                                          <option value="<?=$i ?>"><?=$i ?></option>

                                          <?php
                                    }

                                   ?>


                              
                               
                            </select>
                      </div>

                      <div class="form-group">
                        

                  <button type="submit" name="submit" value="Enregistrer info" class="btnUpdateImg submit">Valider la mise a jour</button><br>
                      </div>

                      
           
        

             
            </form>

    </section>
            
  </section>
       


 </div>

  


</body>
</html>
 <?php

}

else{
  header("location:index.php");
 }

 ?>

