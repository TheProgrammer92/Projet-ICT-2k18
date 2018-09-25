
<?php 
   
		   	# code...zu
		  $view=$bdd->prepare("SELECT * from public where id_personne!=?");
		  $view->execute(array($getData->getIdPublic()));

		  $count=$view->rowCount();

               
           


		   
		
  
     
     
    



    	  
 ?>