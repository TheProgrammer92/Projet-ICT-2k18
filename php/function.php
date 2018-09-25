<?php 

// ceci est un fichier fonction que je vais inclure dans tous mes fichiers

include "bout de page/base.php";

   //cette fontion va recupere l'avatar dans la base de donne pour afficher
  function recuperer_avatar()

{       

 include "bout de page/base.php";
	$prenom=$getData->getPrenomConnecter();
	$password=$getData->getPasswordConnecter();
	$req=$bdd->query("SELECT prenom,password, avatar from inscription where prenom='$password' and password='$password' ");

   $donnees=$req->fetch();
   if (isset($_SESSION['avatar_connecter'])) {
   	# code...
   	$_SESSION['avatar_connecter']=$donnees['avatar'];
   }
   elseif (isset($_SESSION['prof']['avatar'])) {
   	# code...
   	$_SESSION['prof']['avatar']=$donnees['avatar'];
   }
   elseif (isset($_SESSION['secretaire']['avatar'])) {
   	# code...
   $_SESSION['secretaire']['avatar']=$donnees['avatar'];
   }
  
   global $donnees;

}

    
    // la fonction qui va modifier les element dans la base de donnée, update

  
     

 ?>