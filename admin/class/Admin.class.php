<?php 


class Admin
{
	 private $id;
	
   //la methode qui va supprimer un membre quand on clique sur la corbeille


	public function deleteMembre($id_delete)
	{
	     include"../../bout de page/base.php";

	    $id=addslashes(intval($id_delete));

	    $remove=$bdd->prepare("DELETE from inscription WHERE id=?");
	    $remove->execute(array($id));

	    if (!$remove) {
	    	die("Erreur lors de la suppression");
	    }

	    else{

           echo "c'est bon lacher";
	    }

	}
	
}



 ?>