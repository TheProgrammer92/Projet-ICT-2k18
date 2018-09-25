<?php 




 function UpdateSession($nom,$value)
{
	

	switch ($nom) {

		case "nom_connecter":

			$_SESSION['nom_connecter']=htmlspecialchars($value);

			break;

		case "password_connecter": 

			$_SESSION['password_connecter']=htmlspecialchars(sha1($value));
			
			break;

		case "prenom_connecter":

			$_SESSION['prenom_connecter']=htmlspecialchars($value);
			
			break;

		case "avatar_connecter":

			$_SESSION['avatar_connecter']=htmlspecialchars($value);

			break;
		case "email_connecter":

			$_SESSION['email_connecter']=htmlspecialchars($value);
			
			break;
		case "tel_connecter":

			$_SESSION['tel_connecter']=htmlspecialchars($value);
			
			break;
		
		default:
			# code...


		   die("Le nom de cette variable session est invalide");

			break;
	}
}