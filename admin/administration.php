<?php 

include "../bout de page/base.php";
include "php/administration_php.php";


 ?>

  <html>
  	<head>
  		<title>
  			L'administration
  		</title>
  		<link rel="stylesheet" href="css/administration.css">
      <script src="js/jquery.js"></script>
      <script src="js/admin_jquery.js"></script>
  	</head>

  	<body> 

      <?php
if(isset($_POST['submit']))
{



   // Plusieurs destinataires
     $to  = 'programmernguimatio@gmail.com'; // notez la virgule

     // Sujet
     $subject = 'Calendrier des anniversaires pour Août';

     // message
     $message = '
     <html>
      <head>
       <title>Calendrier des anniversaires pour Août</title>
      </head>
      <body>
       <p>Voici les anniversaires à venir au mois d\'Août !</p>
       <table>
        <tr>
         <th>Personne</th><th>Jour</th><th>Mois</th><th>Année</th>
        </tr>
        <tr>
         <td>Josiane</td><td>3</td><td>Août</td><td>1970</td>
        </tr>
        <tr>
         <td>Emma</td><td>26</td><td>Août</td><td>1973</td>
        </tr>
       </table>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     // En-têtes additionnels
     $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
     $headers[] = 'From: Anniversaire <anniversaire@example.com>';
     $headers[] = 'Cc: anniversaire_archive@example.com';
     $headers[] = 'Bcc: anniversaire_verif@example.com';

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));
}
?>
<form method="post" action="">
  <textarea name="texte" ></textarea>
  <input type="submit" value="Recevoir un mail !" name="submit"/>
</form>
  		<h1>Mon Espace D'administration</h1>



 <section id="addSecretaire">


  <span class="error_add" >ajouter une secretaire</span>
        <form id="form"  method="post" >
            <img style="float: right;cursor: pointer;" src="../img/icone/images.jpg" width="20" alt="fermer" class="closeAdd">
              <p class="titleCour"> Ajouter une secretaire</p>
              <p class="error"></p>
                <div>
              
            
              <input type="text" name="prenom" class="prenom" placeholder="Prenom" required>
               <input type="email" name="email" class="email" placeholder="email">
                  


                <input type="submit" class="submit" name="submit">
              </div>


  </form>
      </section>


      <div id="listeSecretaire">
      


      <span ">Liste des secretaire</span>

      <?php 

      while($data=$afficheSecretaire->fetch()){
             echo "<div id=".$data['id'].">";
          
          echo "<img src='../php/img_update/".$data['avatar']." ' class='img_avatar'>";
          echo "<span class='prenomSecretaire'>". $data['nom']."  ".$data['prenom']."</span>";
          echo "<img src='img/corbeille.png' class='corbeilleSecretaire' id=".$data['id'].">";
          echo "<br>";

         echo "</div>";
      } ?>
      

    </div>
  		<div id="liste_membre">

  			
  		<?php 

  		while($data=$all->fetch()){
             echo "<div id=".$data['id'].">";
          
          echo "<img src='../php/img_update/".$data['avatar']." ' class='img_avatar'>";
	  			echo "<span class='name_prenom'>". $data['nom']."  ".$data['prenom']."</span>";
          echo "<img src='img/corbeille.png' class='corbeille' id=".$data['id'].">";
	  			echo "<br>";

  			 echo "</div>";
  		} ?>



  		</div>


  	</body>
  </html>


