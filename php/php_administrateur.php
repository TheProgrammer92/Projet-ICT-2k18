<?php 
session_start();
include "../bout de page/base.php";

if (!empty($_SESSION['id_connecter'] and $_SESSION['id_connecter']==2 and !empty($_GET['id_del']))) {

   
	$id_del=htmlspecialchars($_GET['id_del']);
	
	 $delete=$bdd->prepare("DELETE FROM f_topics where id=?");
     $delete->execute(array($id_del));

	 $categorie=htmlspecialchars($_GET['categorie']);
      $souscategorie=$_GET['souscategorie'];
	 $id_cat=htmlspecialchars($_GET['id_cat']);


	 
	 if (!$delete) {

	 	die("la requete ne marche pas");
	 	# code...
	 }
	 else{
       
	 	  header('location:../nouveau_topics.php?categorie='.$categorie.'&souscategorie='.$souscategorie.'&id_cat='.$id_cat.'');
	 	
	 }
	
}

else{
	echo "rien ne marche degage salo";
}
 ?>