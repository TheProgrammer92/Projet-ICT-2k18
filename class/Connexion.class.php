<?php 

include"../bout de page/base.php";

include_once "FonctionConnexion.class.php";



class Connexion extends FonctionConnexion{
	    
		protected $prenom;
		protected $password;
		protected $donnees;


	  public function __construct($prenom,$password)

	  {
	  	
	     
	    $this->prenom=addslashes(htmlspecialchars($prenom));
	    $this->password=addslashes( htmlspecialchars(sha1($password)));

	  }

    public function ConnecterMembre()
    {
    	include"../bout de page/base.php";
    	
    	$nomTable="inscription";
    	//on recupere les infos pour la verifier la connexion
        $this->donnees=$this->recupererInfo($nomTable);

	   

		  if ($this->donnees['prenom']==$this->prenom && $this->donnees['password']==$this->password) {
	           //on dit a la bd qu'il est connecté
              $this->Insert_connect($nomTable,$this->donnees['id']);
               
               
               //demarrage des session
               $this->StartSession();  
	           $this->StartSessionPublic();

	           //on fais la meme chose dans la table public
              $this->Insert_connect("public",$_SESSION['idPublic'],'id_personne');
              
	        //ici la requete pour verifier si c'est un nouveau ou pas    
	         
	          $first=$this->Verifie_membre_new($nomTable);

	          if ($first==0) {

	             // la requete qui va update first_connexion puisque il ira que dans cette page une seule fois
               
                $_SESSION['notifie']='Bienvenu dans notre univers  '.$_SESSION['nom_connecter'];
                $_SESSION['first']=0;

	               ?>
                   
                    <script >
			              	  

			      $(function () {
	              	 	$(window).attr('location','http://localhost/monNouveauProjet/index.php');
	              	 })
			              	   
			              
			              </script> 


	               <?php
  
	          }


	          elseif($first==1){
	          

	            $_SESSION['notifie']='ravie de vous revoir '.$_SESSION['nom_connecter'];

	            $_SESSION['first']=1;


	            ?>

	            <script >
	              	
	              	 $(function () {
	              	 	$(window).attr('location','http://localhost/monNouveauProjet/index.php');
	              	 })
	              </script>


	            <?php

	          }
	   
			?> 
	            
	             

	              
			<?php 
		
		}

		if($this->donnees['prenom']!=$this->prenom and $this->donnees['password']!=$this->password){
	        
	        	?>

		       <span style="color: red">
	          <?php die('Prenom ou Mot de passe incorrect'); ?>
	             </span>
	             <script >
	             	
	             	$(function () {
	             		$('#prenom_connexion').val("");
	             		$('#prenom_connexion').css('border','1px solid #ff6347');
	             		$('#pasword_connexion').val("");
	             		$('#password_connexion').css('border','1px solid #ff6347');
	             	})
	             </script>



		<?php 
			
			
		}

		
    
}



     //cette fontion se charger de l'animation pour le new  user et le rediriger vers index.php


}


