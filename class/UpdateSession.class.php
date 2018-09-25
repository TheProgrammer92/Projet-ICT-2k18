<?php 

/*

la classe contenant les fonction qui vont se charger de modifier mes variable session


*/

/**
 * 
 */
class UpdateSession
{

	

	public function UpdateSession($nom,$value,$statutPersonne)
	{

		/*
		$nom=nom de la session et $value=sa valeur
		*/
		# code...

		switch ($statutPersonne) {

			case 'eleve':
				
				$_SESSION[$nom."_connecter"]=$value;
				break;


			case 'prof':
				# code...
				$_SESSION['prof'][$nom]=$value;
				break;


			case 'secretaire':
				# code...
				$_SESSION['secretaire'][$nom]=$value;
				break;

			case 'public':

				$_SESSION[$nom."Public"]=$value;
				break;
			default:
				# code...
				die("Erreur .. aucun statut definie");
				break;
		}
	}
}


 ?>