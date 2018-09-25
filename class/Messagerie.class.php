<?php 
session_start();






 include "getDataConnect.class.php";
 
class Messagerie extends getDataConnect 
{
	


  // ici l'affichage a l'accueil

public function affiche_accueil()
{
    include"../bout de page/base.php";
   

	   $select=$bdd->prepare("SELECT id_destinataire from reception_message where mon_id=?");
    $select->execute(array($this->getIdPublic()));

	while ($sel=$select->fetch()) {
                        

                     $reception=$bdd->prepare("SELECT * from public where id_personne=? ");
                     $reception->execute(array($sel['id_destinataire']));

                          while ($donnee=$reception->fetch()) {
                            //requetetqui va  chercher les notificaion

                          $count_notif=$bdd->prepare("SELECT * from messagerie where id_envoie=? and id_destinataire=? and lu=0");
                          $count_notif->execute(array($sel['id_destinataire'],$this->getIdPublic()));
                          $count_n=$count_notif->rowCount();

                          ?> 

                            <div class="profil_accueil " id= <?= $donnee['id_personne']?>>
                            <span   >
                                    
                                  
                                <img src="php/img_update/<?=$donnee['avatar'] ?>" style="border-radius: 30px" width="50" height="50">
                                </span>
                                <span class="name_accueil" >
                                    <?= $donnee['prenom']."  ".$donnee['nom'] ?></span>
                                    <!-- on affiche le nbre de notification -->
                                
                                      <?php if ($count_n>0){

                                                             ?>
                                                     
                                              <span class="count col-md-1 pull-right"  style="color:red"><?=  $count_n ?></span>

                                  <?php
                                }
                            

                                  ?>

                             </div>
                           <?php 
                           }
                          }
                          ?>

                            
                          

                            </div>
                            <span >
                               <a class="nouveau_message"><img src="img/icone/messagerie1.png" alt="nouveau message" width="40"></a>
                               </span>
                            



      
         <script>
         	$(function () {
         		$('.nouveau_message').click(function () {
      			
      		        $('.new_message_messagerie').slideUp();
      				$('.new_message_messagerie').slideDown(500);
      				
                $('.messagerie').hide()
      				 $('.new_message_messagerie').show(1000)
      	
      	})

      			    $('.retour_message').click(function() {

                  $('.new_message_messagerie').hide(500);
                  $('.messagerie').show(500)

     

})

         	})
         </script>
                    <?php
}





public function insert_accueil_personne($id)

{
	 include"../bout de page/base.php";
   
	 $verify=$bdd->prepare("SELECT accept from reception_message where id_destinataire=?
              and mon_id=? ");
            $verify->execute(array($id,$this->getIdPublic()));
            $verif=$verify->rowCount();

            if ($verif==0) {
            
             $insert=$bdd->prepare("INSERT INTO reception_message (id_destinataire,mon_id,accept) values(?,?,1)");
             $insert->execute(array($id,$this->getIdPublic()));

               if (!$insert){

                die("ERREUR 305 au moment de l'insertion");
               }  
                else{

                    $this->affiche_accueil();
                    }

              }

              else{
                $this->affiche_accueil();
              
                  }
             }


   

   public function chargement_entete_destinataire($id)
   {
   	//on recupere les informaition du destinataire
   	        include"../bout de page/base.php";
        
            //on recupere l'id du destinataire
           
          	$id_entete=intval(htmlspecialchars($id));
          	$get_info=$bdd->prepare("SELECT * from public where id_personne=?");
          	$get_info->execute(array($id_entete));
          	$get_info=$get_info->fetch();
          	$prenom_dest=$get_info['prenom'];
          	$nom_dest=$get_info['nom'];
          	$avatar_dest=$get_info['avatar'];
          	$ligne=$get_info['connecter'];
          	$date_dernier=$get_info['date_derniere_connexion'];

          	
          	?> 
                <div class="col-md-12" style="margin-top: 10px;z-index: 2000">
                    <img src="img/icone/retour.jpg" style="cursor: pointer;" width="35" height="35" id="retour_accueil">


                    <script>
                      $(function () {

                         $('#retour_accueil').click(function () {

                           $('.affiche_conversation').hide();
                            $('.messagerie').fadeIn(800);
                            
                                    })
              
                        
              // body...
                      })
                    </script>     
          	    
          	    <img src="php/img_update/<?=$avatar_dest ?>"  width="40" height="40" style=" border-radius: 65px; ">
               <span style="color:#fff; "><?= $prenom_dest ?></span>
               <span style="color:#fff; "><?= $nom_dest ?></span>

               <!-- verification s'il es en ligne ou pas -->
               <div class="col-md-8 col-lg-offset-2" style="position: relative;top: -10px">

               <span style="color:#fff;";><?php if ($ligne==1) {
               	    echo "En ligne";
               } else{

                 $var=strftime('%A, le %d',strtotime($date_dernier));
                 $var.=strftime('%B %Y',strtotime($date_dernier));
                 $jour_now=strftime('%A');
                 $jour=strftime('%A',strtotime($date_dernier));
                  $heure=date('H',strtotime($date_dernier));
                   $minute=date('i',strtotime($date_dernier));
                   $jour_hier=strftime('%A',strtotime('-1 day'));
                   

                  if ($jour_now===$jour) {
                  	     echo "vu auj. a ".$heure.":".$minute;
                  }
                 else if ($jour_hier===$jour) {
                 	echo "vu hier. a ".$heure.":".$minute;
                 } 

                 else{
                   echo "vu ".$jour." a ".$heure.":".$minute; 
                 }
               } ?>
                 
              </span>
              </div>

               </div>

          	<?php
   }
   


 public function Affiche_all_msg($id)
 {

 	// verification si le destinataire existe deja pour l'ajouter ou pas a l'ecran d'accueil
 	        include"../bout de page/base.php";
           
            $id_dest=intval(htmlspecialchars($id));
            $verify=$bdd->prepare("SELECT accept from reception_message where id_destinataire=?
            	and mon_id=? ");
            $verify->execute(array($id_dest,$this->getIdPublic()));
            $verif=$verify->rowCount();

            if ($verif==0) {
            
   	         $insert=$bdd->prepare("INSERT INTO reception_message (id_destinataire,mon_id,accept) values(?,?,1)");
   	         $insert->execute(array($id_dest,$this->getIdPublic()));

   	                   }
      
                 //ici tout les message
	                 
	                 $affiche=$bdd->prepare('SELECT * from messagerie where id_envoie=? and id_destinataire=? or id_envoie=? and id_destinataire=? order by date_envoie asc ');

		                $affiche->execute(array($this->getIdPublic(),$id_dest,$id_dest,$this->getIdPublic()));
		              
				                
                          $messages=array();
                         
                          $count=$affiche->rowCount();
                          
                           if ($count==0){
                           	
                           } 

                           else{

                              while ($affich=$affiche->fetch() ){

                                   $messages[]=$affich;


                                   }
                                    }
                            
                         	 echo "<div id='message_view'>";
                         foreach ($messages as $message) {
                        
                        
                             // reuquete du 
                           	$heure=date('H',strtotime($message['date_envoie']));
                             $minute=date('i',strtotime($message['date_envoie']));
                              
                              if ($message['id_envoie']==$this->getIdPublic() and $message['id_destinataire']==$id_dest)

                               {

                                              
                                           	  ?> 
                                          
                                         
    		                         <div class="row col-md-7 affiche">

    		                              <?php if ($message['lu']==1){
    		                             	$lu=1;
    		                             } ?>
    		                             	
    		                              
    		                            <?= $message['messages'] ?>

    		                          
                                                   <?php if (isset($lu)){
                                              	
                                                  	echo "<img src='img/icone/sujet1.jpg' width='15' style='position:absolute;left:90%;top:70%'>";
                                                  } ?>

                                                  <span class="heureMsg" style="color: #7A7A7A; float: right; "> <?php echo $heure.":".$minute; ?></span>
                                              	

    		                      
    		                            
                                    </div>

                                     <?php


                                      }

                                	    else{


                                                	 

                                	    	?>
                                        
        		                        <div class="row col-md-7 col-md-offset-4 affiche_re">

          		                            <?= $message['messages'] ?>
                                          <span class="heureMsg" style="color:#7A7A7A;float: right;" > <?php echo $heure.":".$minute; ?></span>
                                         
        		                          </div>
    		                          

    		                            
                                	    	<?php
                                	    }

                                      $req_lu=$bdd->prepare("UPDATE messagerie set lu=1,date_reception=NOW() where id_envoie=? and id_destinataire=?");
                                       
                                       $req_lu->execute(array($id_dest,$this->getIdPublic()));

                                       if (!$req_lu) {
                                         

                                         die("Erreur l'ors de l'insertion du lu");
                                       }
                             
                                  

                                	   }
    		                    
    		                    echo "</div>";


 }




 public function Insert_msg_bd($id_destinataire,$conversation)
    {
	                  include"../bout de page/base.php";
                       
    				      $get_conversation=htmlspecialchars($conversation);
    				      $id_dest=intval($id_destinataire); 
    				    
    				    $envoi=$bdd->prepare("INSERT INTO messagerie (id_envoie,id_destinataire,messages,date_envoie) values(?,?,?,NOW())");

    				    $envoi->execute(array($this->getIdPublic(),$id_dest,$get_conversation));
                            
		             

					    if (!$envoi) {// si l'insertion ne marcher pas
					    	die("Erreur... au niveau de l'envoie");
					             }
						      else{
                        
             
                        $verify=$bdd->prepare("SELECT accept from reception_message where id_destinataire=?
                          and mon_id=? ");
                        $verify->execute(array($this->getIdPublic(),$id_dest));
                        $verif=$verify->rowCount();

                        if ($verif==0) {
                        
                         $insert=$bdd->prepare("INSERT INTO reception_message (id_destinataire,mon_id,accept) values(?,?,1)");
                         $insert->execute(array($this->getIdPublic(),$id_dest));

                       }
                  
         
						      }
}
}


 ?>