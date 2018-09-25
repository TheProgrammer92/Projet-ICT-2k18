<?php session_start();

   include "php/function.php";
   
//verifions si l'utilisateur est connecter;


 ?>
 <?php if (!empty($_SESSION['prenom_connecter']) and !empty($_SESSION['password_connecter'])) {

?>



<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
      
      <script src="js/jquery.js"></script>
 
       <script src="js/jquery-ui.js"></script> 
         
      <script src="js/accueil.js"></script>
      <script src="js/forme.js"></script>
      <meta charset="utf8">

</head>
<body>

<!-- ici sera la barre de suivie qui serra inclu toute l'application -->


  <!-- inclusion de l'entete -->
<?php include "bout de page/entete.php"; ?>

<div id="suivie">

<a href="" style="text-decoration: none; position: absolute; left: 3%;"><span style="color: #FF4500; ">Acceuil</span>  <img src="img/icone/next3.png" width="13" ">  </a><span style="position: absolute; color: #A8A8A8;left: 10%;"> Parcours </span ></div>

<!-- script qui se lance au chargement de la page -->
  <!-- <?php /* --> -->
   if (!empty($_SESSION['prenom_connecter']) and !empty($_SESSION['password_connecter'])){

    ?>
    <script>
      $(function () {
        $('.cardre1').css('display','none');
        $('.cardre2').css('display','none');
        $('.cardre3').css('display','none');
       $('#entete').css('display','none');
       var i=1;
       
          $('#entete').fadeIn(5000)
          $('.cardre1').fadeIn(5000);
           $('.cardre2').fadeIn(6000);
            $('.cardre3').fadeIn(7000);
             
            

      
      })

    </script>

    <?php
   }
*/
   ?> 


<!script jquery qui va animer le click sur la div si l'utilisateur est connecté -->

<script >
  
  $(function () {

  $('.cardre1').click(function () {
    $("#arriere_plan").animate({"opacity":"0.5"},300);
        
    $('#page_inserer').show(500);
  var i=1;

   
     
  })
  
  $('.fermer').click(function () {

    $('#page_inserer').hide(500);
     $("#arriere_plan").animate({"opacity":"8"});
    
    
  }) 
    // body...
  })
</script>


<div id="arriere_plan">
<!-- cet image ci dessous pest l'image qui apparait a l'ouverture  de l'application -->
<!-- <img src="img/image/fond.jpg" style="position: absolute; width: 100%; height: 100%; bottom: 2%; z-index:7" id="fond">  -->
<script >

  $(function() {
  
    $('#inclu_connect').css('display','none');



  })

</script>

  

       









  <!-- nous entrons maintenant dans le body qui sera constituer que de 3 images -->
  <div id="explorer">

   <div class="cardre1"><img src="img/logo/4.jpg" style="width: 100%; height: 88%; "> Creer un theme</div>
  
    <div class="cardre2" ><img src="img/logo/creation.jpg" style="width: 100%; height: 88%; "> Explorez vos creations</div>

  	 <div class="cardre3"><img src="img/logo/Communiquer.jpg" style="width: 100%; height: 88%;">Communiquez dans le monde</div>
  	
  	

  </div>




















</div>

  <!-- ici on va inclure lal page inserer -->
  <div id="page_inserer" >
 <?php if (!empty($_SESSION['prenom_connecter']) and !empty($_SESSION['password_connecter'])) {
   # code...
include"inserer.php";  }  ?>
 </div>

 <!--  la partie parramettre qui contiendra l'inscription -->

    

<!-- ici serra la partie du reseau social -->

<div id="reseau_social">
 <div id="entete_menu">

   <img src="img/icone/search.png" title="search" width="35" style="position: absolute;  top: 5%; left: 3%; z-index: 2 " alt="menu parramettre">

   <input type="search" name="recherche_social" placeholder="nom ou numero de telephone" class="search_social">
    <img src="img/icone/nof.png" width="45"  title="paramettre" 
      style="position: absolute; left: 82%; top: -0%; z-index: 2" alt="menu">
      <br><br>

      <ul>
        <li>DISC.</li>
        <li>STATUT</li>
        <li>APPELS</li>
        

      </ul>
    

    </div>
    <!--  <img src="IMG/icone/home5.png" width="40" style="position: absolute; bottom: 5%;">
     <img src="IMG/icone/call2.png" width="40" style="position: absolute; bottom: 5%; left: 15%;">
  -->
  <br>
  <div id="contact"> <span>Contact a la une</span></div>   
  <!-- icone du message -->
<img src="img/icone/message.png"  class="icons_message" width="60">
</div>

<!-- <div id="block_amis">
    
    <div class="entete_amis">

    <img src="img/icone/retour.jpg" width="60"> <span style="position: absolute; left: 20%;color: #FFFFF3">Amis</span>

    <img src="img/icone/add1.png" width="40" style="position: absolute; left: 70%; top: 4%;">
      

    </div> -->

  

</div><br>
<!-- ici la gestion du system de messagerie et une div qui va souvrir au clicl sur l'image -->
<!-- 
   <div id="messagerie">
     
     <img src="img/icone/message.png" alt="">
   </div>
 -->
<!-- the div of the low of the page that must content the information on the site and the snow -->

  <!-- <div  id="footer">
    
    <?php 

  //include "bout de page/neige.php";
   
     ?>
  

  </div> -->

  <!-- banniere des cookie <-->
   <div class="cookie_alert">
     En  poursuivant votre navigation sur ce site, vous acceptez l'utilisation des cookies pour vous proposer des contenus et services adaptés a vos centres  d'interèts <br> <br>
     <a href="">OK</a>
   </div>
</body>



</html>


<?php 
}
else{

  header("location:index.php");
}


?>  