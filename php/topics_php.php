
<?php 
require_once "jbbcode/Parser.php";


  if (!empty($_GET['titre']) and !empty($_GET['id'])){
  	     
  	     // ici on verifie si l'url est bien egale dans la base de donnee
  	   $get_titre=htmlspecialchars($_GET['titre']);
  	   $get_id=htmlspecialchars($_GET['id']);

  	   $titre_original=$bdd->prepare('SELECT sujet from f_topics where id=?');
  	   $titre_original->execute(array($get_id));
  	   $titre_original=$titre_original->fetch()['sujet'];


            $parser = new JBBCode\Parser();
	       $parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
	       $parser->addBBCode("quote", '<div class="contenu_topic">{param}</div>');
 	   
  	   if ($get_titre==$titre_original) {
  	        
  	        $topic=$bdd->prepare("SELECT * from f_topics where id=?");
  	        $topic->execute(array($get_id));
  	        $t=$topic->fetch();

  	        
                // requete qui va nos permettre d'afficher les reponses
 
  	      
  	           // gestion de l'envoie du message
                     
					   if (isset($_POST['topic_reponse_submit'],$_POST['topic_reponse'])) {


					       if (!empty($getData->getIdPublic())) {
					       	# code...
					     $a=strlen($_POST['topic_reponse']);
					       if (!empty($_POST['topic_reponse']) ) {  

                               $reponse=htmlspecialchars($_POST['topic_reponse']);

						
									 




					       	   
					       	   //insertion de la reponse dans la base de donnee
					          
					          $ins=$bdd->prepare('INSERT INTO f_messages (id_topics,id_posteur,contenu,date_heure_post)
					          	values (?,?,?,now())');

					           $ins->execute(array($get_id,$getData->getIdPublic(),$reponse));
					           if (!$ins) {
					           	  $reponse_msg="la requete n'a pas ete execute";
					           } 
					           else{
                                   unset($reponse);

                                  header('location:topics_view.php? titre='.$get_titre.'&id='.$get_id.'');
                                  }

					       }
					       else{

					       	$reponse_msg="Votre reponse ne peut pas etre vide ou inferieur a 4 caractere";
					       }
					   }  else{

					   	      $reponse_msg="veillez vous connecter ou creer un compte pour poster une reponse";
					   }
					 }
                   
                     $reponsesParPage=15;
                     $reponsesTotaleReq=$bdd->prepare('SELECT * from f_messages where id_topics=?');
                     $reponsesTotaleReq->execute(array($t['id']));
                     $reponsesTotales=$reponsesTotaleReq->rowCount();
                     $pagesTotales=ceil($reponsesTotales/$reponsesParPage);                   

                     if (!empty($_GET['page']) and $_GET['page']>0 and $_GET['page']<=$pagesTotales ) {

                     	$_GET['page']=intval($_GET['page']);
                     	$pageCourante=$_GET['page'];
                     	# code...
                     }
                         else{

                         	$pageCourante=1;
                         }
                        $depart=($pageCourante-1)*$reponsesParPage;

                               
          					 $reponses=$bdd->prepare('SELECT * from f_messages where id_topics=? LIMIT '.$depart.','.$reponsesParPage.'');
  	                 $reponses->execute(array($get_id));
  	                 
                    }  

       
			       else{

			       	die("erreur. le titre ne correspond pas a l'id. ");
			       }

  }

 ?>