<?php 

/**
 *  la classe qui va contenir les fonction qui vont gerer les notification
 */

require "../bout de page/base.php";
class Notification
{
	private $id; //id du cour, #j'arrive pas a trouver un autre non que ca pour lui
	private $id_notifieur;
	private $id_elelement;		

	function __construct($id="",$id_notifieur="",$id_element="")
	{
		# code...
		global $bdd;
		$this->id=intval($id);
		$this->id_notifieur=intval($id_notifieur);
		$this->id_element=intval($id_element);

}


	public function InsertNotificationBd()
	{
		require "../bout de page/base.php";

		 
	//on verify s'il n'a pas encore partagé le pdf en verifiat di id_element est deja dans la tabless
	 $verifyPartage=$this->verifyNoPartage();

	 if ($verifyPartage) {
	 	# code...

		 	$insertNotifie=$bdd->prepare("INSERT INTO notify  (id_cour,id_notifieur,id_element,date_partage) VALUES (?,?,?,NOW())");
			$insertNotifie->execute(array($this->id,$this->id_notifieur,$this->id_element));


		if (!$insertNotifie) {
			# code...
			die("ERREUR 314... Au niveau de l'insertion");
		}
		else{
			
			

			?>
			<script>
				
				$(function () {
					
					$('.errorPartage').css('color','rgb(52, 152, 219)');
					$('.errorPartage').html("Le partage a ete effectué merci");
				})
			</script>


			<?php
		

		}
		 }
		 else
		 {

		 	die("Vous avez deja partagé ce Pdf");

		 }
		
	}

	public function verifyNoPartage()
	{
		// cette fonction verifie si l'element n'est pas partagé
		//return false si l'element est deja partagé et false sinon
		require "../bout de page/base.php";

		$id_element=intval($this->id_element);
		$verifyPartage=$bdd->prepare("SELECT * FROM notify where id_element=?");
		$verifyPartage->execute(array($id_element));

		$countVerify=$verifyPartage->rowCount();

		if ($countVerify>0) {
			return false;		
		}
		else{
			return true;
		}

	}

	public function chargerNotifyPdf()
	{	//la fonction qui va charger les notification dans l'entete
		require "../bout de page/base.php";

		
		# code...
		$chargerNotify=$bdd->query("SELECT * FROM notify");

		if (!$chargerNotify) {
			
			die("ERREUR l'ors du chargement des notication,veuillez reessayer");

		}
		else{
			$i=1;
			while ($notify=$chargerNotify->fetch()) {
				// variable de base
				$idPdf=intval($notify['id_element']);
				$idCour=intval($notify['id_cour']);
				$idProf=intval($notify['id_notifieur']);
				#on recupere les info sur le prof d'abord

				
				//ceci juste pour ne pas afficher les meme notification au meme professeur
				if (empty($_SESSION['prof']['id'])) {
					# code...
				
				$recupProf=$bdd->query("SELECT * FROM ict_professeur where id=$idProf");

				$infoProf=$recupProf->fetch();  #on a maintenant tous les info sur l e prof

				#recuperation des info sur le pdf

				$recupPdf=$bdd->query("SELECT * FROM ict_addPdf where id_pdf=$idPdf");
				$infoPdf=$recupPdf->fetch();  #on a maintenant tous les info sur le pdf
				

				#recuperation des info sur le cour

				$recupCour=$bdd->query("SELECT * FROM ict_addCour where id=$idCour");
				$infoCour=$recupCour->fetch();  #on a maintenant tous les info sur le pdf

				//on peut maintenant tout afficher
				$pdf="pdf".$i.".png";
				?>

				<a href="cours.php" title="voir" class=" col-lg-12 col-md-12"><div class="col-lg-12 col-md-12" id="Notify" >

			        <div class="row col-md-2 divImgNotify">

			          <span><img src="php/img_update/<?= $infoProf['avatar'] ?>" alt="supprimer" width="50" height="55" style="border-radius: 50px"></span>
			        </div>

			        <div class="row pull-right" >
			        	<span><img src="img/icone/<?= $pdf ?>" alt="supprimer" width="50" height="50"></span>
			        </div>

			        <div class="col-md-9 col-md-offset-1 notify" >

			          <h4><?= $infoCour['titre']."  par "." Mr ".$infoProf['nom'] ?></h4> <!-- titre  de la notification-->
			          <span>Dans <?= $infoProf['code_matiere']."  a été ajouté le pdf ".$infoPdf['titrePdf'] ?></span>

			          <span class="row dateNotify">
			          	<br>
			          	<?php

			        	$takeDate=$notify['date_partage']; 

			        	$date=$this->dateNotify($takeDate);
			        	echo "$date";
			        	 ?></span>

			        </div>

			        
      		
      		</div>
      		</a>


				<?php

				  $i++;
                  if ($i==6) {
                  $i=1;
                  }

              	}    
			}
		}
	}


	//la fonction qui va formater les date et nous renvoyer la date de partage du pdf
	public function dateNotify($date)
	{	$jourActuel=strftime('%A');
		$dateJour=strftime('%A',strtotime($date));
		$heure=strftime('%H',strtotime($date));
		$minute=strftime('%M',strtotime($date));
		// si l'heure de partage est < 59 minute
		if ($dateJour==$jourActuel) {
			
			$retour= "Aujourd'hui a  ".$heure."h".":".$minute;

			return $retour;
		}

		else{

			$retour= "$dateJour"."A"."  ".$heure." h";
			return $retour;

			
	}

}

	 //la fonction qui calcule a partir des heure le nombre de jour
	public function calculJour($dateHeure)
	{
		# code...
		$nombreJour=0;
		for ($i=0; $i <=$dateHeure; $i++) { 
			# code...

			if ($i==24) {
				
				$nombreJour++;
			}
		}

		return $nombreJour;
	}
}




 ?>