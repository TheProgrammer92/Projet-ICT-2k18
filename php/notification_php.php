<!-- 
cette page gere les notification
 -->


<?php 
	session_start();

	require "../class/Notification.class.php";


	if (isset($_POST['id_cour'],$_POST['id_pdf'],$_SESSION['prof']['id']) and !empty($_POST['id_cour']) and !empty($_POST['id_pdf']) and !empty($_SESSION['prof']['id']) ) {

		
		$id_cour=intval($_POST['id_cour']);
		$id_pdf=intval($_POST['id_pdf']);

		$id_prof=intval($_SESSION['prof']['id']);

		$notify=new Notification($id_cour,$id_prof,$id_pdf);
		$notify->InsertNotificationBd();



	}
	


	//chargement des notification dans l'entete


	if (isset($_POST['chargerNotify']) and !empty($_POST['chargerNotify'])) {

		$notify=new Notification();
		$notify->chargerNotifyPdf();
		
	}
 ?>