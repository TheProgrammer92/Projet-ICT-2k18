
<?php

include"../bout de page/base.php";

 require "../class/messagerie.class.php"; 
 ?>




<?php 


setlocale(LC_TIME,'fr');
 $messagerie=new Messagerie();

// pour la fontioin qui va charger l'accueil

    if (isset($_POST['id_char'])) {

      
      $messagerie->affiche_accueil();

    }

             if (isset($_POST['id_accueil']) and !empty($_POST['id_accueil'])) {
            // verification si le destinataire existe deja pour l'ajouter ou pas a l'ecran d'accueil

               $id=intval(htmlspecialchars($_POST['id_accueil']));
      
               $messagerie->insert_accueil_personne($id);
                 

             }


    
   
   // verification du chargement pour charger l'entete de la prochaine page, donc on va charger le profil du destinataire cliqué

          if (isset($_POST['id_entete']) and !empty($_POST['id_entete'])) {   
                  
             $messagerie->chargement_entete_destinataire($_POST['id_entete']);    
             
          }


   // affichage des messages
   if (isset($_POST['id_dest']) and !empty($_POST['id_dest'])) {
                   
            
   	        $messagerie->Affiche_all_msg($_POST['id_dest']);
              
				                   
                                 }  

   
  // traitement de l'envoie du message, quand il envoie
   if (isset($_POST['submit'])) {
     	# code...
    

       if (isset($_POST['conversation'] )) {
		      

		       if (isset($_POST['id_dest']) and !empty($_POST['id_dest'])) {
		       	# code...
				   
				      $messagerie->Insert_msg_bd($_POST['id_dest'],$_POST['conversation']);
		             }

					  else{
					     
					   
					   echo "l'id du destinataire n'existe pas";
					  }
 
   
}

else{

	die('veillez completer tous les champs');
}

  }
 

             
  
 ?>