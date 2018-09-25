<?php 

/* 

dans ce fichier de gere l'insertion du professeur dans la bd..


*/
  session_start();
  if (isset($_SESSION['secretaire']['id']) and !empty($_SESSION['secretaire']['id'])) {
    # code...
 
    require '../class/AddProf.class.php';
    require "../class/getDataConnect.class.php";

   



   	
  	// ici $_POST['idEnregistrement'] est la variable aleatoir choisi dans l'uplod de la photo par json

   if (isset($_POST['prenomProf'],$_POST['code_matiere'],$_POST['emailProf']) and !empty($_POST['prenomProf']) and !empty($_POST['code_matiere']) and !empty($_POST['emailProf'])) {

    	     

    	 	
    	 	 	$prenomProf=addslashes(htmlspecialchars($_POST['prenomProf'])); 
    			$code_matiere=addslashes(htmlspecialchars($_POST['code_matiere']));
          $emailProf=htmlspecialchars($_POST['emailProf']);
          $longueurPrenomProf=strlen($prenomProf);
           $longueurCodeMatiere=strlen($code_matiere);

           //on verifie d'abord si le prof existe deja
            $newAdd=new AddProf($prenomProf,$code_matiere,$emailProf);
          $verifyExistProf=$newAdd->verifyExistProf($emailProf);

          if ($verifyExistProf) {
            # code...
          

             	//on verifie la longueur du titre
          if ($longueurPrenomProf>=3 and $longueurPrenomProf<20) {

            if ($longueurCodeMatiere>=3 and $longueurCodeMatiere<25) {
              # code...
           
             	
    	         // on l'insert dans sa premier table
    	        	$newAdd->insertProf();

                 }
            else{



              ?>
              <script>
                $(function() {
                  $('.error').html("Le code de la matiere doit etre entre 3 et 25 caractere")
                })
              </script>

              <?php


            }


            }
            else{

            	?>
            	<script>
            		$(function() {
            			$('.error').html("Le prenom doit etre entre 3 et 20 caractere")
            		})
            	</script>

            	<?php
            }
            
          

      


    	# code...
}
    else{

        ?>

        <script>
          
          $(function () {

            $('.error').html("Ce Professeur existe deja");
            $('#form')[0].reset();
            


          })
        </script>

        <?php
    }

   }	

else{

  die("Les variables n'existe pas..veuillez contacter l'administrateur");
}

 }

 else{

  header('location:../index.php');
 }
 
 ?>