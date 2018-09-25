
<?php 


/**
 * classe qui gere les differente fonction de la page connexin
 */
class ConnexionFunc  
{


	
	//cette fonction va verifier dans les 3 table s'il est proffesseur, eleve ou secretaire
   public function verify($nomTable,$prenom,$password){

      	include "../bout de page/base.php";

      	$verify=$bdd->prepare("SELECT * from ".$nomTable." where prenom=? and password=? ");
	    $verify->execute(array($prenom,$password));
	    $countSecretaire=$verify->rowCount();
	    if (!$verify) {
	    	die("Erreur... de verification");
	    }
	    else{
	    	return $countSecretaire;
	    }

	       }

         //cette fonction va varifierle mot de passe
		public function Verifie_email_password($nomTable,$email,$password)
        {
        	
                  include "../bout de page/base.php";
             
               		$verify_ins=$bdd->prepare("SELECT email,password FROM ".$nomTable." WHERE email=? or password=?");

                   $verify_ins->execute(array($email,$password));
                   
		             $verify_in=$verify_ins->rowCount();  

             return $verify_in;
        }


       //cette fonction insere dans la  bd le nouveau ou la nouvelle secretaire

    
      public function ins_Prof_secr($nomTable,$nom,$prenom,$email,$password)
      {
      	include "../bout de page/base.php";

      $password=sha1($password);
      //verification si le professeur ou la secretaire existe deja dans sa table

      $verify_prof_secre=$this->Verifie_email_password($nomTable,$email,$password);

      if ($verify_prof_secre==0) {

        //ici on va differencier les table, parceque la table professeur a de "code_matiere et l'id secretaire en plus"


        if ($nomTable=="ict_professeur") {
            

           if (isset($_SESSION['id_secretaireRecup'],$_SESSION['code_matiereRecup']) and !empty($_SESSION['id_secretaireRecup']) and !empty($_SESSION['code_matiereRecup']))

            {
        
              $id_secretaire=$_SESSION['id_secretaireRecup'];
              $code_matiere=$_SESSION['code_matiereRecup'];
                 $inscription=$bdd->prepare("INSERT INTO ".$nomTable." (id_secretaire,code_matiere,nom,prenom,email,password,avatar,date_inscription) 
                  VALUES(?,?,?,?,?,?,'tof.jpg',NOW())");
                $inscription->execute(array($id_secretaire,$code_matiere,$nom,$prenom,$email,$password));
           
                  if (!$inscription) {
                    return false;

                    }

                    else{
                      //on retourne l'id
                      $id=intval($this->lastId($nomTable));
                      return $id;
                    }
            
          }
          else{


            die("L'id_secretaire ou code matiere n'existe pas veuillez nous contacter..");
            }  
        }
        else{
         
             # code...

              
                # code...

              
                    $inscription=$bdd->prepare("INSERT INTO ".$nomTable."  (nom,prenom,email,password,avatar,sexe,date_derniere_connexion,date_derniere_deconnexion,date_inscription,first_connexion) VALUES(?,?,?,?,'tof.jpg','',NOW(),NOW(),NOW(),1)");
                    $inscription->execute(array($nom,$prenom,$email,$password));
                 
                    if (!$inscription) {
                      return false;

                      }
                 

                    else{

                      return true;
                    }
          
    

    
    }

     }
           else{

              die("Le professeur ou la secretaire est deja enregistrée");
            }

  }



   // suppression de du prof ou de la secretaire dans son ancienne table
   public function delete_prof_secr($nomTable,$password)
   {
    include "../bout de page/base.php";
    $delete=$bdd->prepare("DELETE FROM ".$nomTable." where  password=? ");
    $delete->execute(array($password));

        if (!$delete) {
          die("La suppresssion n'a pas ete effectué...veuillez nous contacter");
        }
        else{
          return true;
        }
              

    }
            
            
   

   //cette fonction va verifier si le professeur ou la secretaire exite deja

   public function verifyExist($table,$prenom,$password)
   {
       
      include "../bout de page/base.php";
       $verify=$bdd->prepare("SELECT * from ".$table." where prenom=? and password=?");
        $verify->execute(array($prenom,$password));

        $count=$verify->rowCount();

        if ($count==0) {// on a pas trouvé, c'est bon
          # code...
          return true;
        }
        else{

          return false;
        }
   }


   // la fonction qui va inserrer le menbre dans la table public


   public function insertPublic($lastId,$nom,$prenom,$email,$password,$avatar)
   {
        $verify=$this->Verifie_email_password("public",$email,$password);

        if ($verify==0) {
          # code...

           include "../bout de page/base.php";
                $req=$bdd->prepare("INSERT INTO public (id,nom,prenom,email,password,avatar,date_inscription) VALUES(?,?,?,?,?,?,NOW())");
                $req->execute(array(
                  $lastId,
                  $nom,
                  $prenom,
                  $email,
                  $password,
                  $avatar));
           
     
              if (!$req) {
                  
                  die("ERREUR: L'insertion dans le public ne marche pas");
              }

              else{//si l'insertion marche
                   
                 ?>

                  <script >
                      
                      $(function () {

                         $(".hr").animate({'margin-left':'215px'},500)
                         $('#form1').show(800);
                       $('#form2').slideUp();

                         $('#nom').val("");
                       $('#prenom').val("");
                       $('#password').val("");
                      $('#email').val("");

                      })
                  </script>


                 <?php
                 
              }
             
        }
        else{

          die("Ce membre existe deja dans le public");
        }
             
   }


  public function lastId($table)
  {
    # code...
      include "../bout de page/base.php";
      $selectLast = $bdd->query("SELECT id FROM ".$table." ORDER BY id DESC LIMIT 0, 1");
      $lastId = $selectLast->fetch();
      $selectLast->closeCursor();

      $id=$lastId['id'];

      return $id;
  }

}


