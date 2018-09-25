<?php 



/**cette class permettre la modification de toute mes donnée
* 
*/

class getDataConnect 
{  

	private $nom;
	private $prenom;
	private $id;
	private $avatar;
	private $Tel;
	private $Email;
	private $Password;
	private $Sexe;
	private $jour;
	private $mois;
	private $annnee;
	//la session qui vas permettre d'identifier chaque professeur ,secretaire,et eleve
	private $sessionIdentify;
	
	function __construct()
	{   
		// initialization of variables by session

		
			# code

		// chargement des sesssion

			 if (isset($_SESSION['id_connecter']) and !empty($_SESSION['id_connecter'])) {

			   $this->nom=htmlspecialchars($_SESSION['nom_connecter']);
				$this->prenom=htmlspecialchars($_SESSION['prenom_connecter']);
				$this->password=htmlspecialchars(sha1($_SESSION['password_connecter']));
				$this->id=htmlspecialchars($_SESSION['id_connecter']);
				$this->avatar=htmlspecialchars($_SESSION['avatar_connecter']);
				$this->Email=htmlspecialchars($_SESSION["email_connecter"]);
				$this->Sexe=htmlspecialchars($_SESSION["sexe_connecter"]);
				$this->Tel=htmlspecialchars($_SESSION["tel_connecter"]);

				$this->jour=htmlspecialchars($_SESSION["jour_connecter"]);
				$this->mois=htmlspecialchars($_SESSION["mois_connecter"]);
				$this->annee=htmlspecialchars($_SESSION["annee_connecter"]);
				$this->sessionIdentify="eleve";

			 }
			 elseif (isset($_SESSION['prof']['id']) and !empty($_SESSION['prof'])) {
			  
			  $this->nom=htmlspecialchars($_SESSION['prof']['nom']);
				$this->prenom=htmlspecialchars($_SESSION['prof']['prenom']);
				$this->password=htmlspecialchars(sha1($_SESSION['prof']['password']));
				$this->id=htmlspecialchars($_SESSION['prof']['id']);
				$this->avatar=htmlspecialchars($_SESSION['prof']['avatar']);
				$this->Email=htmlspecialchars($_SESSION['prof']["email"]);
				$this->Sexe=htmlspecialchars($_SESSION['prof']["sexe"]);
				$this->Tel=htmlspecialchars($_SESSION['prof']["tel"]);

				$this->jour=htmlspecialchars($_SESSION['prof']["jour"]);
				$this->mois=htmlspecialchars($_SESSION['prof']["mois"]);
				$this->annee=htmlspecialchars($_SESSION['prof']["annee"]);

				$this->sessionIdentify="prof";

			 }
			 elseif (isset($_SESSION['secretaire']['id']) and !empty($_SESSION['secretaire']['id'])) {


			 		$this->nom=htmlspecialchars($_SESSION['secretaire']['nom']);
					$this->prenom=htmlspecialchars($_SESSION['secretaire']['prenom']);
					$this->password=htmlspecialchars(sha1($_SESSION['secretaire']['password']));
					$this->id=htmlspecialchars($_SESSION['secretaire']['id']);
					$this->avatar=htmlspecialchars($_SESSION['secretaire']['avatar']);
					$this->Email=htmlspecialchars($_SESSION['secretaire']["email"]);
					$this->Sexe=htmlspecialchars($_SESSION['secretaire']["sexe"]);
					$this->Tel=htmlspecialchars($_SESSION['secretaire']["tel"]);

					$this->jour=htmlspecialchars($_SESSION['secretaire']["jour"]);
					$this->mois=htmlspecialchars($_SESSION['secretaire']["mois"]);
					$this->annee=htmlspecialchars($_SESSION['secretaire']["annee"]);


					$this->sessionIdentify="secretaire";

			 	# code...
			 }

			 elseif(isset($_SESSION['idPublic']) and !empty($_SESSION['idPublic']))

			 {

			 	$this->nomPublic=htmlspecialchars($_SESSION['nomPublic']);
				$this->prenomPublic=htmlspecialchars($_SESSION['prenomPublic']);
				$this->passwordPublic=htmlspecialchars(sha1($_SESSION['passwordPublic']));
				$this->idPulic=htmlspecialchars($_SESSION['idPublic']);
				$this->avatarPublic=htmlspecialchars($_SESSION['avatarPublic']);
				$this->emailPublic=htmlspecialchars($_SESSION["emailPublic"]);
				$this->SexePublic=htmlspecialchars($_SESSION["sexePublic"]);
				$this->TelPublic=htmlspecialchars($_SESSION["telPublic"]);

				$this->jourPublic=htmlspecialchars($_SESSION["jourPublic"]);
				$this->moisPublic=htmlspecialchars($_SESSION["moisPublic"]);
				$this->anneePublic=htmlspecialchars($_SESSION["anneePublic"]);
				


			 }
	

			

			


	}

	public function RecupLastId()
	{
		global $bdd;
		$prenom=htmlspecialchars($this->prenom);
		$email=htmlspecialchars($this->Email);

		$lastRecup=$bdd->prepare("SELECT id_personne from public WHERE prenom=? and email=?");
		$lastRecup->execute(array($prenom,$email));

		$lastId=$lastRecup->fetch()['id_personne'];

		return $lastId;
	}


/*
ici les getters permmettant de recuperer les session
*/
	public function getNomConnecter()
	{

		return $this->nom;
	}

	public function getPrenomConnecter()
	{

		return $this->prenom;
	}
	public function getIdConnecter()
	{

		return $this->id;
	}


	public function getPasswordConnecter()
	{

		return $this->Password;
	}
	
	public function getAvatarConnecter()
	{

		return $this->avatar;
	}
	


	public function getEmailConnecter()
	{

		return $this->Email;
	}



	public function getTelConnecter()
	{

		return $this->Tel;
	}
	

	public function getSexeConnecter()
	{

		return $this->Sexe;
	}


	public function getJourConnecter()
	{

		return $this->jour;
	}
	

	public function getMoisConnecter()
	{

		return $this->mois;
	}

	public function getAnneeConnecter()
	{

		return $this->annee;
	}






    public function getSessionIdentify()
    {
        return $this->sessionIdentify;
    }
    public function getIdPublic()
    {
    	$last=$this->RecupLastId();
    	return intval($last);
    }





}

