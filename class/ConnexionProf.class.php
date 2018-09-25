
<?php 
/**
 * 

 */
include_once "FonctionConnexion.class.php";

class ConnexionProf extends FonctionConnexion
{

	protected $prenom;
	protected $password;
	protected $donnees;
	
	function __construct($prenom,$password)

	{

		$this->prenom=addslashes(htmlspecialchars($prenom));
		$this->password=addslashes(htmlspecialchars(sha1($password)));
		
	}



	public function ConnecterProf()
    {
    	include"../bout de page/base.php";

    	$nomTable='ict_professeur';
    	//on recupere les infos pour la verifier la connexion
        $this->donnees=$this->recupererInfo($nomTable);

	       

		  if ($this->donnees['prenom']==$this->prenom && $this->donnees['password']==$this->password) {
	           //on dit a la bd qu'il est connecté
              $this->Insert_connect($nomTable,$this->donnees['id']);
                 
                
               //demarrage des session
               $this->StartSession_prof_secr('prof','prof','prof','prof','prof','prof','prof','prof','prof','prof','prof');  
	    
               $this->StartSessionPublic();
           
               $this->Insert_connect("public",$_SESSION['idPublic'],'id_personne');
	        //ici la requete pour verifier si c'est un nouveau ou pas    
	         
	          $first=$this->Verifie_membre_new($nomTable);

	          if ($first==0) {

	             // la requete qui va update first_connexion puisque il ira que dans cette page une seule fois
               
                $_SESSION['notifie']='Bienvenu dans notre univers  '.$_SESSION['prof']['nom'];
                $_SESSION['first']=0;

	               ?>
                   
                    <script>
			              	  

			      $(function () {
	              	 	$(window).attr('location','http://localhost/monNouveauProjet/Proffesseur.php');
	              	 })
			              	   
			              
			         </script> 


	               <?php
  
	          }


	          elseif($first==1){
	          

	            $_SESSION['notifie']='ravie de vous revoir '.$_SESSION['prof']['prenom'];

	            $_SESSION['first']=1;


	            ?>

	            <script >
	              	
	              	 $(function () {
	              	 	$(window).attr('location','http://localhost/monNouveauProjet/Proffesseur.php');
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
	          <?php die('Information du professeur incorrect'); ?>
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


    /**
     * @param mixed $prenom
     *
     * @return self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

}



 ?>