
    
  
  
  

</head>
<body style=" background-color: #EBECE4;">

  <div class="container">
  <!-- partie notification -->

 <?php if (!empty($_SESSION['notifie'])) {

  ?>   
       <div id='erro_notifie'> <input type="checkbox" name="" checked=""> <span><?php echo $_SESSION['notifie'];?>!</span>
    <img src="img/icone/close.png" width="20" style="position: absolute; left: 90%; cursor: pointer;" class="close">
    </div>
    <script >

  $(function () {
        
           
        
   $('#erro_notifie').delay(1000).animate({'top':'0%'},800).delay(9000).fadeOut(1000);

   $('.close').click(function () {
     $('#erro_notifie').fadeOut(500);
   
    })
  })
</script>
<?php
} 
 unset($_SESSION['notifie']); //destruction de la variable session

?>
    

    <!-- entete pour toute mes pages -->
 <div class="row" id="entete">    

          <!-- nous  mettons les liens vers autres page dans les ul -->
             
           <nav class="navbar" >

              <div class="row">
              <img src="img/logo/logo.png" class="logo" width="90" style="float: left">

              <ul class="nav navbar-nav">
                    <li><a href="index.php"> Parcours</a></li>

                     <li> <a href="cours.php"> Cours </a></li>

                      <li> <a href="forums.php"> Forums </a></li>

                     <li> <a href=""> Competition </a></li>

              </ul>



                <form class="navbar-form navbar-right inline-form">

            <div class="form-group">

           

            <input type="search" class="input-sm form-control" name="recherche" placeholder="rechercher" class="recherche">
      
          </form>







       <!-- ici l'icone de notification -->

       <?php  if ($getData->getIdConnecter()!=null) {

         // recuperer_avatar();
          
         echo " <span id='entete_update'><img src=php/img_update/".$getData->getAvatarConnecter()." width='40' height='45' class='img_utilisateur'></span>";
         ?> 

        <!-- partie option ou il y'a le lien vers le profil  -->
         <div id="option">
               <a href="update.php" >  <div class="block1"> <span style="position: absolute; text-decoration: none;  left: 5%;" class="blo1"> <img src="img/icone/default.png" width="20"> <?php echo   $getData->getNomConnecter() ." ".$getData->getPrenomConnecter();  ?> </span></div></a>

               <?php 

               if(isset($_SESSION['secretaire']['id']) and !empty($_SESSION['secretaire']['id']))
               {
                ?>

               <a href="secretaire.php" title="">
                <div class="block2"> <span style="position: absolute; left: 5%;">Mon espace</span>
                </div></a>
                <?php
               } ?>

                <?php 

               if(isset($_SESSION['prof']['id']) and !empty($_SESSION['prof']['id']))
               {
                ?>

               <a href="secretaire.php" title="">

                <div class="block2"> <span style="position: absolute; left: 5%;">Mon espace</span>

               </div></a>
                <?php
               } ?>


            <div class="block2"> <span style="position: absolute; left: 5%;">  parametre </span>

            </div>
            <div class="block3"> <span style="position: absolute; left: 5%;" > aucun message </span>
            </div>

            <div class="block4"> <span style="position: absolute; left: 5%;"> <img src="img/icone/no.jpg" width="20"> aucune notification </span>

            </div>
            <a href="deconnexion.php" > 

              <div class="block5"> <span style="position: absolute; left: 5%;"> <img src="img/icone/deconnexion.png" width="20"> Déconnexion </span> 
              </div></a>

         </div>

         <img src="img/icone/no.jpg" class="img_messagerie" width="40" alt="message" title="messagerie">



         <?php

        }
       
        ?>

      <?php 
      if(empty($getData->getIdConnecter())){
       ?>
          <a href="login.php"  class="se_connecter"> Se connecter</a>
       <?php


      } ?>


  </div> 



            </div>
          </nav>

     <!--     <ul type="none">

         <li><a href="index.php"> Parcours</a></li>

         <li> <a href="cours.php"> Cours </a></li>

          <li> <a href="forums.php"> Forums </a></li>

         <li> <a href=""> Competition </a></li>


          </ul> -->
       <!-- inserons une zone de recherche ici -->
       
       	

 
</div>
</body>
</html>