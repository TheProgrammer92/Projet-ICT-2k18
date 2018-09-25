<?php 
include "../../bout de page/base.php";
include "../class/Admin.class.php";

  //on ,affiche tous les membre de la bd

    if (isset($_POST['id_delete']) and !empty($_POST['id_delete'])) {
      
    	  
          $id=intval($_POST['id_delete']);
          $admin=new Admin();
    	  $admin->deleteMembre($id);

    	  
    }


 ?>