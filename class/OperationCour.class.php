<?php 


/*
this class will allows the operation of some  courses
 * 
 */
class OperationCour  
{
	private $idCour;

	function __construct($idCour)
	{
		# code...
		$this->idCour=$idCour;
	}


	public function voir()
	{	
		include"../../bout de page/base.php";
		$idProf=$_SESSION['prof']['id'];

		$voirCour=$bdd->prepare("SELECT * FROM ict_addCour,ict_addpdf where ict_addCour.id=?  and ict_addpdf.id_cour=? and ict_addcour.id_professeur=? and ict_addPdf.id_prof=?");
		$voirCour->execute(array($this->idCour,$this->idCour,$idProf,$idProf));

		return $voirCour;
	}
}
 ?>