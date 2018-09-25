<?php 

 include "../bout de page/base.php";

 include_once "function/connexion.func.class.php";

   class Inscription 

   {

   	    private $nom;
   	    private $prenom;
   	    private $email;
   	    private $password;
   	    private $avatar;
        
     	
     	function __construct($nom,$prenom,$email,$password,$avatar)
     	{
     		
     		$this->nom=addslashes( htmlentities($nom));
     		$this->prenom=addslashes( htmlentities($prenom));
     		$this->email=addslashes( htmlentities($email));
   	    $this->password=addslashes( htmlentities(sha1($password)));
   	    $this->avatar=$avatar;
        
     	}

         public function InscrireMembre()
                {
                	   
              include "../bout de page/base.php";
               //on  verifie s'il est deja inscrit grace a cette methode
                $insFunction= new ConnexionFunc();
                $nomTable="inscription";

                 $verify_in=$insFunction->Verifie_email_password($nomTable,$this->email,$this->password);

             
             if ($verify_in==0) {
                 

		            $req=$bdd->prepare("INSERT INTO inscription(nom,prenom,email,password,avatar,date_inscription) VALUES(?,?,?,?,?,NOW())");
		            $req->execute(array(

	                $this->nom,
	                $this->prenom,
	                $this->email,
	                $this->password,
	                $this->avatar
                ));
           
     
	            if (!$req) {
	                
	                die("La requete ne marche pas");
	            }

	            else{//si l'insertion marche

                  $inscriptionPublic=new ConnexionFunc();
                  //on recupere d'abord le dernier id inseré
                  $lastId=$inscriptionPublic->LastId("inscription");
                  $inscriptionPublic->insertPublic($lastId,$this->nom,$this->prenom,$this->email,$this->password,$this->avatar);
    	                 
	               ?>

	                <script >
	                    
	                    $(function () {

                         $(".hr").animate({'margin-left':'215px'},500)
                         $('#form1').show(800);
                       $('#form2').slideUp();

	                       $('#nom').val("");
		                   $('#prenom').val("");
		                   $('#password').val("");
		                  $('#email').val("");

	                    })
	                </script>


	               <?php
	               
	            }
             
        }
        else{  //bloc a executer si cette personne existe deja

            ?>
                <span style="color: red">
                    <?php echo "ce mot de passe et cet email existe deja mr";; ?>
                </span>
                     <script type="text/javascript">
                         $(function () {
                            $('#password').val("");
                         $('#email').val("");
                         $('#password').css('border','1px solid #ff6347');
                         $('#email').css('border','1px solid #ff6347');
                         })
                     </script>
                <?php
                 }
         }       


        
         //verification si l'email et le mot de passe exite deja
        public function Verifie_email_password()
        {
        	
                  include "../bout de page/base.php";
             
               $verify_ins=$bdd->prepare("SELECT email,password FROM inscription WHERE email=? or password=?");

                   $verify_ins->execute(array($this->email,$this->password));
                   
		             $verify_in=$verify_ins->rowCount();  

             return $verify_in;
        }



   }

 ?>