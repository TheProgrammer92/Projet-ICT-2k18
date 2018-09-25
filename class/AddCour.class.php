<?php 



/**

A cause du fait que les table d'insertion sont differente(dans les table).., je ne peux pas utiliser
les meme fonction, donc je creer d'autre meme si elle sont differente
  * 
  */
 class AddCour
 {

 	private $titre;
 	private $description;
 	private $photo;

 	
 	function __construct($titre="",$description="")
 	{
 		$this->titre=addslashes(htmlspecialchars($titre));
 		$this->description=addslashes(htmlspecialchars($description));
 		
 		
 	}

 	public function insertCours($id,$idEnregistrement)
 	{    

 		include"../bout de page/base.php";
 		
 		$add=$bdd->prepare("UPDATE ict_addCour set titre=? , description=? where id_enregistrement=?");
 		$add->execute(array($this->titre,$this->description,$idEnregistrement));

 		if (!$add) {
 			die("L'insertion n'a pas été effectué");
 		}

 		else{  


 			?>

 			<script>
 			
 				$(function () {
 					
 					
 					$('#form')[0].reset();
 					$('.titre,.photo').css('border','1px solid F3F0F0');
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



 	 public function insertPhoto($fichier)  //pour mofifier l'avatar
    {
    	include"../bout de page/base.php";
       
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
					move_uploaded_file($_FILES['monfichier']['tmp_name'], '../img/uploadCour/' .basename($_FILES['monfichier']['name']));
					   


					//ici je genere un id_enregistrement aleatoir, pour l'envoyer l'insertion suivante

					   $id=$_SESSION['prof']['id'];
					   $r1=rand(2,800);
					   $r2=rand(7,155);
					   $idEnregistrement=$fichier[0]."$r1"."$r2".$fichier[3]."jesbeer";
					   $req=$bdd->prepare("INSERT INTO ict_addCour (id_professeur,titre,photo,description,id_enregistrement) values(?,'titre',?,'description',?)");
						$req->execute(array($id,$fichier,$idEnregistrement));

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

				  die("verifier votre extension, celle ci n'est pas autorisé");
				}
			}
			else{
			  die("Taille de fichier trop grande");
			}
			}
    }

//insertion du titre,description du pdf
public function insertPdfElement($idEnregistrement,$idCour)
 	{    

 		include"../bout de page/base.php";
 		$idProf=$_SESSION['prof']['id'];

 		
 		$add=$bdd->prepare("UPDATE ict_addpdf set id_cour=?,id_prof=?,titrePdf=? , descriptionPdf=? where idEnregistrementProf=?");
 		$add->execute(array($idCour,$idProf,$this->titre,$this->description,$idEnregistrement));

 		if (!$add) {
 			die("L'insertion n'a pas été effectué");
 		}

 		else{  


 			?>

 			<script>
 			
 				$(function () {
 					
 					
 					$('#formPdf')[0].reset();
 					$('.success').text(" Bravo!! vous avez inseré un cour ")
 					$('#titrePdf,#insertPdf').css('border','1px solid F3F0F0');
 				
 				})
 			</script>

 			<?php
 		}

 		
 		# code...
 	}

//insertion du pdf du cour
     public function insertPdf($fichier)  //pour mofifier l'avatar
    {		
   		include"../bout de page/base.php";
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
				$extensions_autorisees = array('pdf','txt');

					if (in_array($extension_upload,$extensions_autorisees))
					{
					// On peut valider le fichier et le stocker définitivement
					 $fichier=basename($_FILES['monfichier']['name']);
					move_uploaded_file($_FILES['monfichier']['tmp_name'], '../fichierUploade/' .basename($_FILES['monfichier']['name']));
					   


					//ici je genere un id_enregistrement aleatoir, pour l'envoyer l'insertion suivante

					 
					   $r1=rand(2,800);
					   $r2=rand(7,155);
					   $idEnregistrement=$fichier[0]."$r1"."$r2".$fichier[3]."jesbeer";
					   $req=$bdd->prepare("INSERT INTO ict_addpdf (pdf,idEnregistrementProf) VALUES(?,?)");
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

				  echo "verifier votre extension, Extension autorsé: .PDF, .TXT";
				}
			}
			else{
			  die("Taille de fichier trop grande");
			}
			}
    }




 } 

 ?>