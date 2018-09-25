<!DOCTYPE html>
<html>
<head>
	<title>inserer</title>
	<link rel="stylesheet" type="text/css" href="css/inserer.css">
</head>
<body>

<div class="mon_calque">
	   <span class="fermer"> fermer</span><br>
	   <div class="titre">inserer theme</div><br>

	   <form method="post" action="php/inserer_php.php">
	   	
	   <label class="theme">theme</label>
	      <select class="nom" required="" name="select">
	      	 <option>developpement web</option>
	      	  <option>formation</option>
	      	   <option>ecole</option>
	      	    <option>sur tout</option>
	      	     <option>developpement web</option>

	      </select>
	   <br>

	     <input type="file" name="fichier_pdf" class="inserer_image_theme"> <br>

	    <label class="description"> description</label>  <input type="text" name="description" class="form_description" required maxlength="50">

	    <span class="image"> image </span> <input type="file" name="file_image" id="file_image"> <label for="file_image"><img src="img/icone/incr.jpg" width="12%" style="position: absolute; left: 48%; bottom: 15%;cursor: pointer;" ></label> <br>

	    <input type="submit" name="" class="submit" id="bouton_envoie">

	   </form>
       
    


   
</div>
</body>
</html>