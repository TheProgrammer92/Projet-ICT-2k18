<?php 
  session_start();
 
  if (isset($_POST['nom']) and !empty($_POST['nom']) ) {

    if (isset($_SESSION['id_connecter']) and !empty($_SESSION['prenom_connecter'])) {
    

   setcookie('accept_cookie','vrai',time() + 365*24*3600,null,null,false,true);
    setcookie('prenom',$_SESSION['prenom_connecter'],time()+ 365*24*3600,'/',null,false,true);
    setcookie('password',$_SESSION['password_connecter'],time()+ 365*24*3600,'/',null,false,true);
   
   $_SESSION['notifie']="merci jesbeer t'es une ange";
     if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])){
    
    header('location'.$_SERVER['HTTP_REFERER']);
     }
     
      
    ?> 
    <script >
      

      $(function () {
        
        $('.cookie_alert').fadeOut(800);
      })
    </script> 

    <?php
     
    
   }

   else{
   	die('veillez vous connecter');
   }
   

  }
  

else{

   header('location:'.$_SERVER['HTTP_REFERER']);
}


 ?>