.  <?php 

   include "../bout de page/base.php";
   include "../Function/FuncUpdateSession.php";
   include "UpdateSession.class.php";
 	
  class Update extends UpdateSession
  {
  	
  	private $id;
  	private $statutPersonne;
  	private $table;
 
 /* le statutPersonne nous serra utilse quand au niveau de la modification des autre champs*/

  	function __construct($id,$statutPersonne="",$table="")
  	{

  		

  		$this->id=$id;
  		$this->table=$table;
  		$this->statutPersonne=$statutPersonne;
  		
  	}
    

    public function Update_avatar($table,$fichier)  //pour mofifier l'avatar
    {

    	
		global $getData;

    	 $_FILES['monfichier']=$fichier;
        //verification de l'existance du fichier
    	

			if (isset($_FILES['monfichier'])  AND $_FILES['monfichier']['error']== 0)
			{
			// Testons si le fichier n'est pas trop gros
				if ($_FILES['monfichier']['size'] <= 10000000)
				{
				// Testons si l'extension est autorisée
				$infosfichier =pathinfo($_FILES['monfichier']['name']);

				$extension_upload = $infosfichier['extension'];
				$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','PNG');

					if (in_array($extension_upload,$extensions_autorisees))
					{
					// On peut valider le fichier et le stocker définitivement
					 $fichier=basename($_FILES['monfichier']['name']);
					move_uploaded_file($_FILES['monfichier']['tmp_name'], '../php/img_update/' .basename($_FILES['monfichier']['name']));
					   


					include "../bout de page/base.php";

					  
					   $id=$this->id;
					  

					  $req=$bdd->prepare("UPDATE $table set avatar=:avatar where id=".$id." ");

					  $req->execute(array(

					    'avatar'=>$fichier
					      

					    ));

					  

						  if (!$req) {
						    die("L'envoie de l'image ne marche pas");
						  }

						else{
								 $this->UpdateSession("avatar",$fichier,$this->statutPersonne);
						 		$this->UpdatePublic("avatar",$fichier)
							

						  
						 
						  
						  

						   ?>

						    
						   <!-- affichage de l'avatar a modifier -->
						  <?php  echo "<img src=php/img_update/".$fichier."  style='z-index:2;' >"; ?>
						   <?php
						}
					    # code...
					 

					 

					}
				else{

				  echo "verifier votre extension, celle ci n'est pas autorisé";
				}
			}
			else{
			  die("Taille de fichier trop grande");
			}
			}
    }



    //modification des autre valeur
     //cette fonction va modiffier toute les autre champ
    // la variable nameId est la a cause de la table public , on va aussi lui update
  private function modifier($id,$table,$champ,$valeur,$nameId='id')


 {
	   include "../bout de page/base.php";
	     
			     // verification si la base de donnee contient deja l'information
			  $verify_info=$bdd->query("SELECT $champ from $table where $champ='$valeur' and  $nameId='$id' "); 

			   $count_info=$verify_info->rowCount();
			 
			     if ($count_info==0) {
			       # code...
			    
		          //si elle ne contient pas, on peut donc update
		            
			      $req= $bdd ->prepare("UPDATE $table set $champ=? where $nameId=? ");

			      $req->execute(array($valeur,$id));


				   if (!$req) {
				   die("cette requete ne marche pas");
				    # code...
				   }
				    else{

				    	
				    	$this->UpdatePublic($champ,$valeur);
				       header("location:../update.php");
				       $_SESSION['notifi']='profil';

				     }

				      }
			      else{
			         header("location:../update.php");
			         $_SESSION['notifi']='pas reussi';
			      }

	   
	     }

  	public function UpdatePublic($champ,$valeur)
  	{		

  		global $getData;
  		global $bdd;
  		// la fonction qui va update dans la table public
  		$id_personne=$getData->getIdPublic();
	      $updatePublic= $bdd->prepare("UPDATE public set $champ=? where id_personne=? ");
	      $updatePublic->execute(array($valeur,$id_personne));

	      if (!$updatePublic) {
	      	

	      	die("Erreur l'ors de la modification dans le public...");
	      }
	      else
	      { 	
		       if ($champ=="telephone")
		        {
		      	$champ="tel";
		      }

	      		$this->UpdateSession($champ,$valeur,'public');

	      }





  	}

     public function Update_nom($nomU)
     	     {
     	     	
     	     	
			    $champ=htmlspecialchars('nom');

			   
			    
			    $this->modifier($this->id,$this->table,'nom',$nomU);
			    $this->UpdateSession('nom',$nomU,$this->statutPersonne);
			     
			     $_SESSION['notifi']='nom';
     	     }	  


     public function Update_prenom($prenomU)
     	     {
    
		     $prenom=addslashes(htmlspecialchars($prenomU));

			  $this->modifier($this->id,$this->table,'prenom',$prenom);
			  $this->UpdateSession("prenom",$prenom,$this->statutPersonne);
			   $_SESSION['notifi']='prenom';

     	     }	


     public function Update_sexe($sexeU)
     	     {
     	     	$sexe=addslashes(htmlspecialchars($sexeU));

			    $this->modifier($this->id,$this->table,'sexe',$sexe);
			    $this->UpdateSession("sexe",$sexe,$this->statutPersonne);
			     $_SESSION['notifi']='sexe';
     	     }	


     public function Update_email($emailU)
     	     {
     	     	$sexe=addslashes(htmlspecialchars($sexeU));
			    $this->modifier($this->id,$this->table,'sexe',$sexe);
			    $this->UpdateSession("email",$this->statutPersonne);
			     $_SESSION['notifi']='sexe';
     	     }	


     public function Update_password($passwordU)
     	     {
     	     	$password=sha1($passwordU);

			    $this->modifier($this->id,$this->table,'password',$password);
			    $this->UpdateSession("password",$password,$this->statutPersonne);
			     $_SESSION['notifi']='password';
     	     }		    


     public function Update_telephone($telephoneU)
     	     {


				$tel=htmlspecialchars($telephoneU);
			
				$this->modifier($this->id,$this->table,'telephone',$tel);
				
				$this->UpdateSession("tel",$tel,$this->statutPersonne);
				 $_SESSION['notifi']='telephone';
     	     	
     	     }

      public function Update_jour($jourU)
     	     {

     	     	$jour=intval($jourU);

				$this->modifier($this->id,$this->table,'jour',$jour);
				$this->UpdateSession("jour",$jour,$this->statutPersonne);
				 $_SESSION['notifi']='jour';
     	     	
     	     }	
     	     
       public function Update_mois($moisU)
     	     {
     	     	$mois=addslashes(htmlspecialchars($moisU));

				$this->modifier($this->id,$this->table,'mois',$mois);
				$this->UpdateSession("mois",$mois,$this->statutPersonne);
				 $_SESSION['notifi']='mois';
     	     }


        public function Update_annee($anneeU)
     	     {  

     	     	$annee=htmlspecialchars(intval($anneeU));

				$this->modifier($this->id,$this->table,'annee',$annee);
				$this->UpdateSession("annee",$annee,$this->statutPersonne);
				$_SESSION['notifi']='années';

     	     	
     	     }	     	          
  }



   ?>