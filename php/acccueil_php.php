<?php  
include 'bout de page/base.php';
 if (!empty($_SESSION['id_connecter'])) {
 	# code...


 if (isset($_COOKIE['accept_cookie']) and !empty($_COOKIE['accept_cookie'])=="faux"  ) {

	$showcookie=true;
	# code...
 }


 else  {
	$showcookie=false;
}



	
   

	


/*if (!empty($_POST['input_message'])) {

	$msg=htmlspecialchars($_POST['input_message']);

     $id=intval($_SESSION['id_connecter']);

     $ins=$bdd->prepare("INSERT INTO messagerie VALUES ('',?,1,?)");

     $ins->execute(array($id,$_POST['input_message'])); 

     if (!$ins) {
     die('klsdf');
     }
     else{
     	echo "possible";
     }

}*/

 }
 ?>