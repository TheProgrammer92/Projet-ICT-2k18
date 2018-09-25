<?php session_start(); 
include "bout de page/base.php";
include "class/getDataConnect.class.php";

$getData=new getdataConnect();

if (!empty($getData->getIdConnecter())) {
  # code...
  header("Location:index.php");
}

else{

  ?>
<br>
<html>
<head>
  <title>  inscription et connexion</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/connexion_inscription.css">


       <script src="js/jquery.js"></script>
     
      <script src="js/forme.js"></script>
   
      <meta charset="utf-8" >
</head> 
    <!-- partie de l'animation -->








  <body id="body" style="background-image: url('img/image/65.jpg') ; background-attachment: fixed;background-position: center center;
 ">

    <div class="container">

       

      <section class="row" >
            <!-- ici la connexion a l'application -->

          <div class="col-lg-6 col-md-offset-3 col-sm-7 col-xs-11"  style="background-color: #EBEBEB;border-radius: 15px;min-height: 608px;"  >
              

              <div class="row">
          
                  <div  class="col-lg-12"    style="background-color: white">
                    
                     <div > <img src="img/logo/logo2.png" width="64" alt=""></div>
                     <!-- div d'erreur a charger -->
                  </div>

                </div>
              <div id="ajax_char_inscr" align="center" >  <span >   </span> </div>
                   <div  class="row" style="text-align: center; margin-top: 20px;" >
                        <ul idd='connect_inscr'  class="list-unstyled list-inline" style="font-family: serif; font-size: 20px;">

                          <li class="in"> SIGN IN  </li>
                          <li class="up"> SIGN UP </li>
                             <hr class="hr" style="margin-left: 215px">
                           
                        </ul>
               
                  </div>

                    
                    
                    
                  <form method="post" action="php/connexion.php" id="form1" class="row"  >

                  <div class="row" style="margin-left: 35px" >


                        <img src="img/image/uti.png"  class="uti" height="170"> 
                      
                    </div>

                    <fieldset  class="col-md-12"   style="border-style: none;margin-top: 35px;margin-bottom: 65px;">
                      
                       <div class="form-group">

                         <input type="text" style="font-family: serif; color:black;text-align: center;" class="form-control input-lg" name="prenom" class="prenom" placeholder="prenom" required=""  autocomplete="off" id="prenom_connexion">


                             <span class="error"> veuillez entrer quelque chose</span>

                       </div>

                           <div class="form-group">

                             <input type="password" style="font-family: serif;text-align: center" class="form-control input-lg" name="password" placeholder="password"  class="password" required=""  autocomplete="off" id="password_connexion">

                             <span class="error_password"> veuillez entrer un mot de passe</span>

                          </div><br>

                               <br><br>
                           

                         
                          
                          <div class="col-md-8 col-md-offset-2">
                            
                          
                         <input type="submit"  id="submit_connexion" class="btn-custom btn-block "  name="valider" value="Se connecter">
                         </div>
                      
                    </fieldset> 

                  </form>



          <form method="post" id="form2" class="row" action="php/inscription.php" style="display: none">
        
                    
               <fieldset   id="fieldset2"  class="col-md-12">

                        <div class="row" style="margin-left: 35px" >


                        <img src="img/image/incr.jpg"  class="uti" height="155"> 
                      
                    </div>

                        
                    <div class="form-group">

                      <input type="text" class="form-control input-lg" style="font-family: serif;text-align: center" id="nom"   name="nom" class="prenom_inscription" placeholder="nom" required autocomplete="off"><br>

                        <span class="prenom_manquant">prenom manquant</span>

                       <input type="text" class="form-control input-lg" style="font-family: serif;text-align: center" id="prenom" name="prenom" class="prenom_inscription" placeholder="Prenom" required autocomplete="off"><br>

                      <span class="prenom_manquant">prenom manquant</span>

                           
                         

                          <input type="email" id="email" style="font-family: serif;text-align: center" class="form-control input-lg" name="email" class="email_inscription" placeholder="email" autocomplete="off"><br>

                            <span class="email_manquant"> verifier votre address</span>

                       <input type="password" id="password" style="font-family: serif;text-align: center" class="form-control input-lg" name="password" placeholder="password" class="password_inscription" required=""><br>
                         <span class="password_manquant">prenom manquant</span>
                            
                            
                       
             
                       <div class="col-md-8 col-md-offset-2">
                            
                          
                         <input type="submit" id="bouton_envoie" class="btn-custom btn-block "  name="valider" value="S'inscrire">
                         </div>

                    </fieldset>

                  </form>

                </div>


           
</section>


      <!-- ici la partie inscription -->

 <!-- s -->
       

 
              <div id="gif"> <img src="img/loader/1.gif"></div>

             



         
  






</body>
</html> 



<?php
}
?>