<?php 

// ici on va lister les topics en php

$topics=$bdd->query('SELECT * from f_topics order by id desc ');



 if (!empty($_GET['categorie']) and !empty($_GET['id_cat'])) {
  
// ici on recupere la sous categorie pour l'afficher dans le formulaire automatiquement
   $string_categorie=$_GET['categorie'];
  $get_categorie=htmlspecialchars($_GET['id_cat']);
  $get_id_cat=htmlspecialchars($_GET['id_cat']);
    
  $souscategorie=$bdd->prepare("SELECT * from f_souscategories where id_categorie=?  ORDER BY nom ");
  $souscategorie->execute(array($get_categorie));
 
  // partie permettant d'ajouter un topics
  if ($getData->getIdPublic()!=null) {
  	# code...
  

	if (isset($_POST['Tsubmit'])) {
		
		if (isset($_POST['Tsujet'],$_POST['Tcontenu'])) {

	                $sujet=htmlentities($_POST['Tsujet']);
	                $contenu=htmlentities($_POST['Tcontenu']);
                    $contenu=utf8_encode($contenu);
                    $contenu=str_replace("éé", '', $contenu);
                    $contenu=utf8_decode($contenu); 

                     $souscategorie=htmlspecialchars($_POST['souscategorie']);

                    $verify_sc=$bdd->prepare("SELECT id from f_souscategories where id=? and id_categorie=?");
                    $verify_sc->execute(array($souscategorie,$get_categorie));

                    $verify_sc=$verify_sc->rowcount();

           if ($verify_sc==1) {
                       # code...
                    if (!empty($sujet) AND !empty($contenu)) { //verification si le contenu et le sujet contient quelque chose
         	                	

         			   if (strlen($sujet)<=70) {  // verification de la taille du sujet
         				  	# code...
         				  	if (isset($_POST['Tmail'])) {
         				 	# code...
         		          $notif_mail=1;
         				 	
         				 }

         				  else{
         				 $notif_mail=0;
         				  }
         	     
         	      $insert=$bdd->prepare("INSERT into f_topics (id_createur,sujet,contenu,notif_createur,date_heure_creation) VALUES (?,?,?,?,NOW())");
         	      $insert->execute(array($getData->getIdPublic(),$sujet,$contenu,$notif_mail));
         			     
                       // recuperation du drnier id tu topics

                  $last_topic=$bdd->query('SELECT id from f_topics ORDER BY id desc limit 0,1');
                  $last_topic=$last_topic->fetch();
                  $id_topic=$last_topic['id'];
                
                  $insert=$bdd->prepare('INSERT INTO  f_topics_categories(id_topic,id_categorie,id_souscategorie) VALUES(?,?,?)');
                  $insert->execute(array($id_topic, $get_categorie,$souscategorie)); 
                      header('location:nouveau_topics.php? categorie='.$string_categorie.'&id_cat='.$get_categorie.'');
                     if (!$insert) {
                        
                        die("pas d'insertion possible");
                     }

         			  }

         		 else{
         			//cas ou la taille du sujet entrer est superieur a 70 a
         			//gerer avec le jquery 

         			 	$terror="votre sujet ne peut pas depasser 70 caracter";
         		}

         		}

         		else{ // sinon si le sujet et le contenu ne contiennent rien
         			$terror="veillez rensigner tous les champs";
         		}

            }
            else{

               $terror='souscategorie invalide...';
            }   

			 
		} 

	}

}
 else{
 
  header("location:index.php");
 }

}

else{
  die("aucune categorie defini...");
} 
// ici on lister les topics , categories et sous categories

 if(isset($_GET['categorie']) AND !empty($_GET['categorie'])) {

   $get_categorie = htmlspecialchars($_GET['categorie']);

   $categories = array();

   $req_categories = $bdd->query('SELECT * FROM f_categories');

   while($c=$req_categories->fetch()) {

      array_push($categories, array($c['id'],$c['nom']));
   }

   foreach($categories as $cat) {

      if(in_array($get_categorie, $cat)) {

         $id_categorie = intval($cat[0]);

      }
     
   }

   if(@$id_categorie) {

      if(isset($_GET['souscategorie']) AND !empty($_GET['souscategorie'])) {

         $get_souscategorie = htmlspecialchars($_GET['souscategorie']);

         $souscategories = array();

         $req_souscategories = $bdd->prepare('SELECT * FROM f_souscategories WHERE id_categorie = ?');

         $req_souscategories->execute(array($id_categorie));

         while($c = $req_souscategories->fetch()) {

            array_push($souscategories, array($c['id'],$c['nom']));
         }

         foreach($souscategories as $cat) {
            if(in_array($get_souscategorie, $cat)) {
               $id_souscategorie = intval($cat[0]);
            }
         }
      }
      $req = "SELECT *,f_topics.id topics_base_id FROM f_topics
            LEFT JOIN f_topics_categories ON f_topics.id = f_topics_categories.id_topic
            LEFT JOIN f_categories ON f_topics_categories.id_categorie = f_categories.id
            LEFT JOIN f_souscategories ON f_topics_categories.id_souscategorie = f_souscategories.id
            LEFT JOIN public ON f_topics.id_createur=public.id
            WHERE f_categories.id =? 
           ";


      if(@$id_souscategorie) {
         $req .= " AND f_souscategories.id = ?";
         $exec_array = array($id_categorie,$id_souscategorie);
      } else {
         $exec_array = array($id_categorie);
      }

      $req .= " ORDER BY f_topics.id DESC";
      
      $topics = $bdd->prepare($req);
      $topics->execute($exec_array);
   } 

   else {
      die('Erreur: Catégorie introuvable...');
   }
}
 else {
   die('Erreur: Aucune catégorie sélectionnée...');
}


?>
   
