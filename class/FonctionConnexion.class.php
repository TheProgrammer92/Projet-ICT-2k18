<?php 

/**
 * 
 */
include "getDataConnect.class.php";
class FonctionConnexion
{
	

	//la fonctio qui va update la table pour dire s'il es connecté
	public function  Insert_connect($nomTable,$id,$nameId="id")

	   {  
	   	       include"../bout de page/base.php";

	   	       $connecter=1;
	           $insert_connect=$bdd->prepare("UPDATE $nomTable set  connecter=?,	date_derniere_connexion=NOW() where $nameId=?");

	           $insert_connect->execute(array($connecter,$id));

	           if (!$insert_connect) {
	           	# code...
	           	die("La mise a jour de cette personnne n'a pas aboutit");
	           }
	    
	   }


	//cette fonction verifi s'il es nouveau
	   //cette fontion insere 1 dans le champ connecter, et la date actuelle de connection,'' histoir de dire qu'il est connecté''
	 public function Verifie_membre_new($nomTable)
	 {
		 	   include"../bout de page/base.php";
		 	   $verifie_new=$bdd->query("SELECT first_connexion from ".$nomTable." where prenom='$this->prenom' and password='$this->password'");

			    $firs=$verifie_new->fetch()['first_connexion'];

				return $firs;
	 }
     //cette fonction va juste demarer les variable session
     /*

     elle prend en parramettre les different nom relative au debut de la session ,que ce soit la session de la secretaire, prof ou etudiant

     */ 

	 public function StartSession(){
      include"../bout de page/base.php";

     	 $_SESSION['prenom_connecter']=htmlspecialchars($this->donnees['prenom']);
	 	$_SESSION['password_connecter']=htmlspecialchars($this->donnees['password']);

	  	 $_SESSION['avatar_connecter']=htmlspecialchars($this->donnees['avatar']);
	    
		$_SESSION['nom_connecter']=htmlspecialchars($this->donnees['nom']);
		$_SESSION['id_connecter']=htmlspecialchars(intval($this->donnees['id']));
		$_SESSION['sexe_connecter']=htmlspecialchars($this->donnees['sexe']);
		
		$_SESSION['tel_connecter']=htmlspecialchars($this->donnees['telephone']);
		$_SESSION['email_connecter']=htmlspecialchars($this->donnees['email']);

		$_SESSION['jour_connecter']=htmlspecialchars($this->donnees['jour']);
		
		$_SESSION['mois_connecter']=htmlspecialchars($this->donnees['mois']);
		$_SESSION['annee_connecter']=htmlspecialchars($this->donnees['annee']);
		$_SESSION['active']=true;
		$_SESSION['ecran']='ecran';
	}


//cette fonction va demmarer les session dans des tableau a deux dimmension

	public function StartSession_prof_secr($prenom,$password,$avatar,$nom,$id,$sexe,$tel,$email,$jour,$mois,$annee){
      include"../bout de page/base.php";

     	 $_SESSION[$prenom]['prenom']=htmlspecialchars($this->donnees['prenom']);
	 	$_SESSION[$password]['password']=htmlspecialchars($this->donnees['password']);

	  	 $_SESSION[$avatar]['avatar']=htmlspecialchars($this->donnees['avatar']);
	    
		$_SESSION[$nom]['nom']=htmlspecialchars($this->donnees['nom']);
		$_SESSION[$id]['id']=htmlspecialchars(intval($this->donnees['id']));
		$_SESSION[$sexe]['sexe']=htmlspecialchars($this->donnees['sexe']);
		
		$_SESSION[$tel]['tel']=htmlspecialchars($this->donnees['telephone']);

		$_SESSION[$email]['email']=htmlspecialchars($this->donnees['email']);
		$_SESSION[$jour]['jour']=htmlspecialchars($this->donnees['jour']);
		$_SESSION[$mois]['mois']=htmlspecialchars($this->donnees['mois']);
		$_SESSION[$annee]['annee']=htmlspecialchars($this->donnees['annee']);
		
		$_SESSION['active']=true;
		$_SESSION['ecran']='ecran';
	}


	public function StartSessionPublic()
	{	
		$getData=new getDataConnect();

		$_SESSION['prenomPublic']=htmlspecialchars($this->donnees['prenom']);
	 	$_SESSION['passwordPublic']=htmlspecialchars($this->donnees['password']);

	  	 $_SESSION['avatarPublic']=htmlspecialchars($this->donnees['avatar']);
	    
		$_SESSION['nomPublic']=htmlspecialchars($this->donnees['nom']);

		// onn recupere son id dans la table public
		$idPublic=$getData->getIdPublic();
		$_SESSION['idPublic']=htmlspecialchars(intval($idPublic));

		$_SESSION['sexePublic']=htmlspecialchars($this->donnees['sexe']);
		
		$_SESSION['telPublic']=htmlspecialchars($this->donnees['telephone']);
		$_SESSION['emailPublic']=htmlspecialchars($this->donnees['email']);

		$_SESSION['jourPublic']=htmlspecialchars($this->donnees['jour']);
		$_SESSION['moisPublic']=htmlspecialchars($this->donnees['mois']);
		$_SESSION['anneePublic']=htmlspecialchars($this->donnees['annee']);
		
		$_SESSION['active']=true;
		$_SESSION['ecran']='ecran';
	}

      //this method going to recupere info of the user
	 public function recupererInfo($nomTable)
	   {
	   	  //on recupere les information dans la base de donnee
	   	include"../bout de page/base.php";
		$req_info=$bdd->query("SELECT * from ".$nomTable." where prenom='$this->prenom' and password='$this->password'");
		$donnees=$req_info->fetch();

		if (!$req_info) {
		    	# code...
		    	die('ERREUR..la connexion ne marche pas');
		     }
        else{

		return $donnees;

		}

	   }


	  


	  

}

 ?>