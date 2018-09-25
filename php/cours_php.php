<?php 

session_start();


 
if (isset($_POST['refus'])) {
   
   
   
 
	include "../bout de page/base.php";
	 $_POST['refus']=0;
   $refus=intval(htmlspecialchars($_POST['refus']));
   //verification si ca existe deja
    
   $verifi_exist_bd=$bdd->prepare("SELECT * from voir_pdf where refus=? and id_membre=?");
 
   $verifi_exist_bd->execute(array($refus,$_SESSION['id_connecter']));

   $verifi_exist=$verifi_exist_bd->fetch()[id_membre];

	
    if ($verifi_exist==$_SESSION['id_connecter']) {
       $refus=1;

       $update_bd=$bdd->prepare("UPDATE voir_pdf set refus=? where id_membre=? ");

       $update_bd->execute(array($refus,$_SESSION['id_connecter']));

       $_SESSION['touch']=1;
    } 
    
    else{
      $refus=1;

    	$change=$bdd->prepare("INSERT INTO voir_pdf VALUES ('',?,?)");

    	$change->execute(array($refus,$_SESSION['id_connecter']));

    	if (!$change) {
    		
    		die("ERREUR...");
    	      }

         else{
          
         die("merci tout marche a merveille");
         $_SESSION['touch']=1;
         	
         }

     }

    
}

//affichage de tous les valeur avant l'appui sur une touche de la recherche

  elseif (isset($_POST['valide'])) {
  	

  	              include "../bout de page/base.php";
   
                     $affiche=array();

		           $req=$bdd->query("SELECT * from pdf");
                   $count=$req->rowCount();   
		           while ($data=$req->fetch()) {
		             
		             $affiche[]=$data;
		           }
                   
                   $i=1;
                   foreach ($affiche as $affich) {

                        
                        $file="../fichier/pdf/".$affich['titre'].".pdf";

                        $taille=(filesize($file)/1024)/1024;
                        


                   	  
                   	  	?> 
                        <?php //generons une valeur aleatoire
                          
                            $pdf="pdf".$i.".png";
                             
                         ?>

                        <ul class="list-unstyled col-md-offset-2 col-md-9" id="affiche_final">

                          <li class="row">

                            <div class="col-md-2 img_affiche_final">
                              <img src="img/icone/<?= $pdf ?>" alt="pdf" width="50" height="50">
                            </div>

                            <div class="col-md-8">
                                   <div class="row affiche_titre">
                                        <?= $affich['titre'] ?>
                                    
                                    </div>

                                    <div class="row affiche_taille"><?=

                                    "Taille  ".substr($taille,0,4)." Mo" ?>
                                      
                                    </div>
                                    <br>

                                    <div class="row affiche_telechargement">

                                  <a href="fichier/pdf/<?=$affich['titre'].".pdf"?>" download="<?= $affich['titre'].".pdf"?>">Telecharger</a>

                                  </div> 

                            </div>
                            

                          </li>

                        </ul>
                           


                 
                   	  	<?php
                    $i++;
                  if ($i==6) {
                  $i=1;
                  }

                   }

		           
  }


 
 // gestion de la recherche

elseif (isset($_POST['search']) and !empty($_POST['search'])) {
	include "../bout de page/base.php";
   
	$search=htmlspecialchars($_POST['search']);

	$search=trim($search);

	$req=$bdd->query("SELECT titre from pdf where titre LIKE '%$search%'");

	$affiche=array();

	$count_resultat=$req->rowCount();

	  if ($count_resultat==0) {
	  	echo "<h2 style='font_size:18px;margin-left:35%;'>pas de resultat</h2>";
	  }  

	  else{
       echo "<h2 style='font_size:18px;margin-left:35%;'>$count_resultat résultat(s)trouvée(s)</h2>";
	while ($data=$req->fetch()) {
		
		$affiche[]=$data;
			}
 
	 foreach ($affiche as $affich) {

                        
                        $file="../fichier/pdf/".$affich['titre'].".pdf";

                        $taille=(filesize($file)/1024)/1024;
                        


                   	  
                   	  	?> 
                           


                   	<div id="affiche_final" style="background-color: #f2f2f2">
                   		<div>
                   			<?php //generons une valeur aleatoire
                          
                             $pdf="pdf".rand(1,6).".png";
                             
                             
                   			 ?>
                   			<div class="img_affiche_final">
                   				<img src="img/icone/<?= $pdf ?>" alt="pdf" width="50" height="50">
                   			</div>
                   			 <!-- titre du pdf -->

                   		     <div class="affiche_titre">
                   			 <?= $affich['titre'] ?>
                   			 	
                   			 </div>

                   			
                             <!-- taille du pdf -->

                   		<div class="affiche_taille"><?=

                   		"Taille  ".substr($taille,0,4)." Mo" ?>
                   			
                   		</div>

                   		     <!-- affiche du telechargement -->
                         <div class="affiche_telechargement">

                        	<a href="fichier/pdf/<?=$affich['titre'].".pdf"?>" download="<?= $affich['titre'].".pdf"?>">Telecharger</a>

                       	  </div> 
                      </div>
                   	
                   	</div>
                   	<br>
                   	  	<?php
               
                                       }
                   }		

}

else{
     
      
     
   include "bout de page/base.php";

   if (isset($_SESSION['id_connecter'])) {
     # code...
   

//verification s'il a deja cliquer,tant qu'il serra connecter ce popup n'apparaitra plus


    $verifie=$bdd->query("SELECT refus from voir_pdf where id_membre=".$_SESSION["id_connecter"]."");

    $verifi=$verifie->fetch()['refus'];
    $_SESSION['verifi']=$verifi;
   
   }
  
}

 ?>