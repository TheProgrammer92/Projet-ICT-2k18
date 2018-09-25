<?php 



/**
  * 
  */
 class AddProf
 {

 	private $prenom;
 	private $code_matiere;
 	private $emailProf;

 	
 	function __construct($prenomProf,$code_matiere,$emailProf)
 	{
 		$this->prenomProf=addslashes(htmlspecialchars($prenomProf));
 		$this->code_matiere=addslashes(htmlspecialchars($code_matiere));
 		$this->emailProf=addslashes(htmlspecialchars($emailProf));
 		
 		
 	}

 	public function insertProf()
 	{    

 		include"../bout de page/base.php";
 		//ici je genere le mot de passe
 		$id=$_SESSION['secretaire']['id'];
	   $r1=rand(2,800);
	   $r2=rand(800,1555);
	   $password=$this->prenomProf."$r1"."$r2".$this->emailProf[2].$id."jesbeer";
	   
 		$id=$_SESSION['secretaire']['id'];

 		$add=$bdd->prepare("INSERT INTO ict_addprofesseur (prenom,id_secretaire,code_matiere,password,email) values (?,?,?,?,?)");
 		$add->execute(array($this->prenomProf,$id,$this->code_matiere,$password,$this->emailProf));

 		if (!$add) {
 			die("L'insertion n'a pas été effectué");
 		}

 		else{  
 			// le message qui va apparaitre apres cette inscription au dessu de la page
 			$_SESSION['notifyProf']="Le professeur ".$this->prenomProf." a été enregistreé, il serra officiellement professeur de ".$this->code_matiere." quand il repondra a l'email que nous l'avons envoyé,merci.."

 			?>

 			<script>
 			
 				$(function () {
 					
 					
 					$('#form')[0].reset();
 					$('.prenomProf,.code_matiere,.emailProf').css('border','1px solid F3F0F0');
 					$('body').css('opacity','1')
		
				   $('#form').animate({"margin-top":"-400px"},600);
				   $('#form').fadeOut(0);
				   $('section,header').css('opacity','4');
				   location.reload()
				   



 				})
 			</script>

 			<?php
 		}

 		
 		# code...
 	}



 	 public function insertPhotoProf($fichier)  //pour mofifier l'avatar
    {
       
       header('Content-type: application/json');
        	$tab=array();
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
				$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG');

					if (in_array($extension_upload,$extensions_autorisees))
					{
					// On peut valider le fichier et le stocker définitivement
					 $fichier=basename($_FILES['monfichier']['name']);
					move_uploaded_file($_FILES['monfichier']['tmp_name'], '../php/img_update/' .basename($_FILES['monfichier']['name']));
					   


					include "../bout de page/base.php";
					//ici je genere un id_enregistrement aleatoir, pour l'envoyer l'insertion suivante

					   $id=$_SESSION['secretaire']['id'];
					   $r1=rand(2,800);
					   $r2=rand(7,155);
					   $idEnregistrement=$fichier[0]."$r1"."$r2".$fichier[3]."jesbeer";
					   $req=$bdd->prepare("INSERT INTO ict_addprofesseur () values(photoProf)");
					 $req->execute(array($fichier,$idEnregistrement));

						  if (!$req) {
						    die("L'envoie de l'image ne marche pas");
						  }
						  else{

						  	$tab["idEnregistrement"]=$idEnregistrement;
						  	$tab["return"]="sucess";
						  	// on renvoie le tableau json
						  	echo json_encode($tab);
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


    public function verifyExistProf($email)
   {
       
   		include "../bout de page/base.php";
       $verify=$bdd->prepare("SELECT * from ict_professeur where email=?");
        $verify->execute(array($email));

        $count=$verify->rowCount();

        if ($count==0) {// on a pas trouvé, c'est bon
          # code...
          return true;
        }
        else{

          return false;
        }
   }


 } 

 ?>