 <?php 




  $getData=new getDataConnect();


  /*gestion des connexion et deconnexion ,un utilisateur es en ligne si:
    il a actualisé la page ca fait 5min
  Et pas en ligne si il ne l'a pas fait
*/


if ($getData->getIdConnecter()!=null) {
  # code...

  $id=$_SESSION['idPublic'];

 

  
  $tablePublic="public";
  // on va verifier si les personne des trois table ce sont pas connecté depuis 5min sinon on les deconnecte

  $selectDate=$bdd->query("SELECT * from $tablePublic where id_personne!=$id");

  while ($autrePersonne=$selectDate->fetch()) {

      $date=strftime('%M',strtotime($autrePersonne['date_derniere_connexion']));
      $dateActuel=strftime('%M',strtotime($autrePersonne['date_derniere_connexion']));
      
      // s'il ne s'est pas connecté depuis 5minutes

      if ($date<=$dateActuel+5) {
        // on le deconnecte
        $deconnecte=$bdd->prepare("UPDATE $tablePublic set date_derniere_deconnexion=NOW(),connecter=0 where id_personne=?");

        $deconnecte->execute(array($autrePersonne['id_personne']));

        if (!$deconnecte) {
          
          die("La deconnexion des autre n'a pas été effectué , merci");   
        
       }

       else{

         // on met a jour la personne connecté et sa dernier connexion chaque fois qu'il actualise la page

        $req=$bdd->prepare("UPDATE public SET date_derniere_connexion=NOW(),connecter=1 where id=?");
        $req->execute(array($id));

        if (!$req) {

          die("La mise a jour en ligne n'a pas abouti");

        }

       }




  }
}




}

   ?>



<html>
<head>


      <title></title>
      
        <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css"> -->
        <link rel="stylesheet" type="text/css" href="css/entete.css">
       
       <meta charset="utf-8">
          <script src="js/jquery.js"></script>
          
         
          <script src="js/accueil.js"></script>
          <script src="js/forme.js"></script>
           <script src="js/entete.js"></script>
          <!-- <meta http-equiv="refresh" content="1"> -->


  </head>


  <body id="_entete">
    


     <section class="row col-md-4 col-lg-4 col-sm-4" id="notification">
        
        <div class="row" id="headerNotify">
          
          <h3 class="col-md-5" >Notifications</h3>
          <br>
          <span class="col-md-2 pull-right" id="closeNotify" style="cursor: pointer;"><img src="img/icone/close3.jpg" width="30" height="30" alt="close notify"></span>
        </div>

       
      <section id="bodyNotify">

        
      
      </section>  
     </section>

 

      
        
      
      <nav class="nav row"  >

        
          <div class="col-sm-12 col-md-12 col-lg-12" >
               
            <div class="row col-sm-12 col-md-12 col-lg-12">
                   <img src="img/logo/logo2.png" class="logo">
              <ul class="nav navbar-nav ulNav  " style="margin-top: 15px;" >

                 
                   <li>  <a href="index.php " target="_parent"> Parcours</li></a>

                     <li> <a href="cours.php" > Cours </a></li>

                      <li> <a href="forums.php" target="_parent"> Forums </a></li>

                     <li> <a href=""> Competition </a></li>
                      <li> <a href="TheHacker/view/hacker.php"> TheHacker </a></li>

              </ul>


                <form class="navbar-form" style="margin-top: 35px;float: right;">

                 

                    <input type="search" style="min-width: 270px" class="form-control recherche" placeholder="Recherche">

                   

                        <?php  

               // recuperer_avatar();

                        if ($getData->getIdConnecter()!=null) {
                          # code...
                        
                       echo " <span id='entete_update'><img src=php/img_update/".$getData->getAvatarConnecter()." width='40' height='45' class='img_utilisateur'></span>";
                         echo " <span id='activeNotify'><img src=img/icone/no.jpg width='40' height='45' ></span>";

                         }
                         else{

                          ?>
                          

                      <a href="login.php" title="connexion"><button type="button" class="btn btnSeConnecter"> Se connecter</button>
                        </a>

                      <?php
                     }
                    
         
             ?> 
         

               <div class="col-md-3  monMenu">
                     
                     <ul id="menu" class="list-group collapse in col-md-12 col-sm-offset-2 ">

                    <li class="list-group-item"><span><img src="img/icone/user.png" width="40" alt="usr"></span> 
                      
         
                        <a href="update.php"> <?= $getData->getNomConnecter()."  ".$getData->getPrenomConnecter()

                         ?></a></li>

                                <li class="list-group-item"><span class="glyphicon glyphicon-tag text-primary"></span> 
                                    <?php 

                                    switch ($getData->getSessionIdentify()) {

                                      case 'eleve':

                                        ?>
                                         <a href="#"> Mes Parametre</a>

                                        <?php
                                        break;

                                        case 'prof':
                                          ?>
                                          <a href="Proffesseur.php"> Mon Compte</a>

                                        <?php
                                        break;

                                        case 'secretaire':
                                          ?>
                                            <a href="secretaire.php"> Mon Compte</a>

                                        <?php
                                        break;
                                     
                                    }




                                     ?>
                                      </li>

                                  <li class="list-group-item"><span class="glyphicon glyphicon-file text-primary"></span> 

                                         <a href="#">Aucun message</a></li>

                                  <li class="list-group-item"><span class="glyphicon glyphicon-comment text-success"></span> 

                                        <a class="text-success" href="#">Aucune notification</a><span class="badge">28</span></li>


                                  <li class="list-group-item"><span class="glyphicon glyphicon-comment text-success"></span> 

                                        <a class="text-success" href="deconnexion.php">Se deconnecter</a><span class="badge">28</span></li>

                                </ul>
                   
               
      </div>
                 
            </form>


           
        </div>
         </div>



       


           





     </nav>



      


<?php 

 

 ?>





