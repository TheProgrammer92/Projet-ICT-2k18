<?php 

     function get_pseudo($id) 
     {    
     	global $bdd;
        
     	      $pseudo=$bdd->prepare("SELECT prenom from public where id_personne=?");
  	        $pseudo->execute(array($id));
  	        $pseudo=$pseudo->fetch()['prenom'];
  	        return $pseudo;
     }

     //recuperation de l'avatar
        function get_avatar($id) 
     {    
     	global $bdd;


     	     $avatar=$bdd->prepare("SELECT * FROM public WHERE id_personne=?");
       
  	        $avatar->execute(array($id));
  	        $avatar=$avatar->fetch()['avatar'];
  	        return $avatar;
     }
       

       function reponse_nbr_categorie($id_categorie){

       	global $bdd;

       	$nbr=$bdd->prepare("SELECT f_messages.id from f_messages left join f_topics_categories on f_topics_categories.id_topic=f_messages.id_topics where f_topics_categories.id_categorie=?");

       	$nbr->execute(array($id_categorie));
       	return $nbr->rowCount();
       }
  

     function derniere_reponse($id_categorie){
                     	global $bdd;

                   	$rep=$bdd->prepare("SELECT f_messages.* from f_messages left join f_topics_categories on f_topics_categories.id_topic=f_messages.id_topics where f_topics_categories.id_categorie=? order by  f_messages.date_heure_post desc limit 0,1");
            
       	       $rep->execute(array($id_categorie));
       	       if ($rep->rowCount()>0) {
	       	       $rep=$rep->fetch();
	       	       $dr=$rep['date_heure_post'];
	       	       $dr.='<span > par  '.get_pseudo($rep['id_posteur']).'</span>';

               }

       	       else{
       	       	$dr="Aucune réponse...";
       	       }
               	return $dr;

     }
   

   function reponse_nbr_topic($id_topic){

       	global $bdd;

       	$nbr=$bdd->prepare("SELECT f_messages.id from f_messages left join f_topics on f_topics.id=f_messages.id_topics where f_topics.id=?");

       	$nbr->execute(array($id_topic));
       	return $nbr->rowCount();
       }


       function derniere_reponse_topic($id_topic){
                     	global $bdd;

                   	$rep=$bdd->prepare("SELECT f_messages.* from f_messages left join f_topics on f_topics.id=f_messages.id_topics where f_topics.id=? order by  f_messages.date_heure_post desc limit 0,1");
             
             	       $rep->execute(array($id_topic));
             	       if ($rep->rowCount()>0) {
      		       	       $rep=$rep->fetch();
      		       	       $dr='dernier message par  '.get_pseudo($rep['id_posteur']);
      		       	       $dr.=" le  ".$rep['date_heure_post'];

             	       }
             	       else{
             	       	$dr='Aucune Réponse...';
             	       }
               	return $dr;

     }

 ?>