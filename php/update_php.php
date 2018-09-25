 



<?php 
session_start(); 
  include "../class/getDataConnect.class.php";
   $getData=new getDataConnect();

   include_once "../bout de page/base.php";
   include_once "../class/Update.class.php";
   

  # code...


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur

/// verification s'il n'est pas conneecté 
if ($getData->getIdConnecter()!=null)
{
    
    

    if (isset($_FILES['monfichier']) and !empty($_FILES['monfichier'])) {

           switch ($getData->getSessionIdentify())

            {

             case 'prof':
                  $statut='prof';
                  $table="ict_professeur";
               break;
            case 'secretaire':
                  
                  $statut='secretaire';
                  $table="ict_secretaire";
               break;
            case 'eleve':
                  
                  $statut='eleve';
                  $table="inscription";
               break;
            default:
                die("Vous n'etes pas membre de ce site");
                break;
            
           }
           $statut=htmlspecialchars($statut);
           $table=htmlspecialchars($table);
           $update=new Update($getData->getIdConnecter(),$statut,$table);
           $update->Update_avatar($table,$_FILES['monfichier']);

     }

}

 ?>


 <!-- gestion des autre modification -->





 <?php 

 // le fonction qui va modifier les information de l'utilisateur
 if ($getData->getIdConnecter()!=null ) {


           switch ($getData->getSessionIdentify())

            {

             case 'prof':
                  
                  $table="ict_professeur";
                  $statutPersonne="prof";
               break;
            case 'secretaire':
                  
                  $table="ict_secretaire";
                  $statutPersonne="secretaire";

               break;
            case 'eleve':
                  
                  $table="inscription";
                  $statutPersonne="eleve";
               break;
            default:

                  die("Erreur 504, aucun statut(eleve,prof,secretaire) definie");
                break;
            
           }
    
          $id=$getData->getIdConnecter();
          $Update=new Update($id,$statutPersonne,$table);
            


    // modification du nom
    if (isset($_POST['nom']) and !empty($_POST['nom'])) {

        
         $Update->Update_nom($_POST['nom']);

     
     }

     // modification du prenom
    if (!empty($_POST['prenom']) and isset($_POST['prenom'])) {

        $Update->Update_prenom($_POST['prenom']);
    }

    if ( isset($_POST['sexe']) and !empty($_POST['sexe'])) {

        $Update->Update_sexe($_POST['sexe']);

    }


    // modification de l'email
    if (isset($_POST['email']) and !empty($_POST['email'])) {

        $Update->Update_email($_POST['email']);
       

    }


    // ici pour le mot de passe 
    if (!empty($_POST['password']) and $_POST['password']==$_POST['repeat_password'] ) {

         
         $Update->Update_password($_POST['password']);


      
        

    }


    // modification de telephone 
    if (!empty($_POST['telephone'])) {
      
      $Update->Update_telephone($_POST['telephone']);


    }

    // pour le jour 
    if (!empty($_POST['jour']) and  $_POST['jour']!='jour') {

      $Update->Update_jour($_POST['jour']); 



    }

    // pour le mois

    if (!empty($_POST['mois']) and $_POST['mois']!='mois') {
      

      $Update->Update_mois($_POST['mois']);




    }


    //modification de l'annee

    if (!empty($_POST['annee']) and $_POST['annee']!="années") {
       

       $Update->Update_annee($_POST['annee']);




    }
}
else{

  die("veuillez vous connecter");
}


 // else{
 //   // header("location:../update.php");
 //  die("ERREUR 144.. vous ne pouvez pas acceder ici.");
 // }
  ?>

