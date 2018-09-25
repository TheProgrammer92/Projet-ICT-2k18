<?php  if (!empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['password']) and $_POST['password']==$_POST['repeat_password']) {

include '../bout de page/base.php';
  $password=$_POST['password'];
    
        $reponse=$bdd->query("SELECT password FROM inscription WHERE password='$password'");
             $donnees=$reponse->fetch();
           $count=$reponse->rowCount();
         if ($count==0) {

         	header("location:inscription.php");
         	
         }else{

         	echo "ceci existe deja";
         }}

              ?>