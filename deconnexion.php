
<?php 
//ici la deconnexion du membre;
session_start();
    include"bout de page/base.php";
require "class/getDataConnect.class.php";
$getData=new getDataConnect();
if (!empty($getData->getIdConnecter()) ) {
  # code...



    $id=htmlspecialchars($getData->getIdConnecter());
    if ($getData->getIdConnecter()!=null) {
      # code...
      $table="inscription";
      $id=intval($getData->getIdConnecter());
    }
    elseif (isset($_SESSION['secretaire']['id'])) {
       $table="ict_secretaire";
       $id=intval($_SESSION['secretaire']['id']);
    }
    elseif (isset($_SESSION['prof']['id'])) {
      # code...
      $table="ict_professeur";
      $id=intval($_SESSION['prof']['id']);
    }
    	# code...

$tablePublic="public";
$deconnexion=deconnexion($table,$id);
$deconnexionPublic=deconnexionPublic("public",$getData->getIdPublic());

    if (!$deconnexion) {
    	die('Erreur de deconnexion');
    }
    else{

        	 $_SESSION=array();
       
       unset($_SESSION);
       setcookie('accept_cookie',NULL,-1);
      
         if (isset($_SESSION['touch'])) {
         	unset($_SESSION['touch']);
         }
       
      header("location:index.php");

    }

}

else{
die("Vous ne pouvez pas vous deconnecter dans etre connecter");
  $_SESSION['notifie']="vous devez vous connecter ";
  header("location:index.php");
  
}


function deconnexion($table,$id)
{
  global $bdd;
    $deconnexion=$bdd->prepare("UPDATE ".$table." set date_derniere_deconnexion=NOW(), connecter=0 where  id=?");

    $deconnexion->execute(array($id));
    return true;
}
function deconnexionPublic($table,$id)
{
  global $bdd;
    $deconnexion=$bdd->prepare("UPDATE ".$table." set date_derniere_deconnexion=NOW(), connecter=0 where  id_personne=?");

    $deconnexion->execute(array($id));
}
 ?>