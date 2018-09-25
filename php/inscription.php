  
  
         

        <?php 

        include_once "../class/Inscription.class.php";
           
        if (isset($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password']) and !empty($_POST['nom']) and  !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['password']))  {
       

              $nom=$_POST['nom'];
              $prenom=$_POST['prenom'];
              $email=$_POST['email'];
              $password=$_POST['password'];
              $avatar="default.jpg";

               //je cree un nouvelle object de la classse inscription  
              $inscription=new Inscription($nom,$prenom,$email,$password,$avatar);
              
              $inscription->InscrireMembre();


        }
            

            else{
                ?>
                <span style="color: red">
                    <?php die('veillez completer tous les champ'); ?>
                </span>

                <?php
                
            }
            

         ?>