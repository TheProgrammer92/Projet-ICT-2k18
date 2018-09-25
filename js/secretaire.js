$(function() {

	$('#container1,#container2').hide()
	
	$('#container1,#container2').show('explode',800)
	var click=0;
	
	$('.img_utilisateur').click(function() {
		 if (click==0) {

		 	$('#option_ul').fadeIn(400);
		 	click++;
		 }
		 else{
		 	$('#option_ul').fadeOut(500);
		 	click--;
		 }
		
	})

	$('#form').hide()
	$('.ajouterCour').click(function () {
		
		$('section,header').css('opacity','0.4')
		$('#form').css('opacity','5')
	 	$('#form').show();
	 	 $('#form').animate({"margin-top":"170px"},600)
	 	 $('#form').animate({"margin-top":"40px"},600)
	 	 $('#form').animate({"margin-top":"70px"},700)
	 	 $('#form').animate({"margin-top":"40px"},600)
	 	 $('#form').animate({"margin-top":"70px"},700)



	})

	$('.closeAdd').click(function () {
		
		$('body').css('opacity','1')
		
	   $('#form').animate({"margin-top":"-400px"},600);
	   $('#form').fadeOut(0);
	   $('section,header').css('opacity','4')
	  

	})

	//Gestion du formulaire en ajax

$('#form').on('submit',(function(event) {
		// je bloque le formulaire
		event.preventDefault();
		// on recupere les valeur du formumlaire

		var $prenomProf=$('.prenomProf').val();
		var $code_matiere=$('.code_matiere').val();
		var $emailProf=$('.emailProf').val();

		
		
		if (($prenomProf=="") || ($code_matiere=="") || ($emailProf=="")) 

		{

			$('.error').text("Veuillez completer Tous les champs")
			$('.error').show();
			$('.emailProf,.prenomProf,.photoProf,.code_matiere').css('border','1px solid red')
		} 

	
   else{  



    	var longueurPrenomProf=$prenomProf.length;
    	var longueurCodeMatiere=$code_matiere.length;
    	var longueurEmail=$emailProf.length;
    	

     // verification de la longueur du titre

    	if (longueurPrenomProf>2 && longueurPrenomProf<20) {

    		//on verifi si la description es vite
    		// je vais gerer sa longueur plus tard
    		if (longueurEmail>=5 && longueurEmail<30) {


    				if (longueurCodeMatiere>=3 && longueurCodeMatiere<20) {



		    	  $('.error').html('<img src="img/loader/ajax-loader.gif">');
                    $.ajax({
						type: 'POST',
						url: 'http://localhost/monNouveauProjet/php/secretaire_php.php',
						data:{prenomProf:$prenomProf,code_matiere:$code_matiere,emailProf:$emailProf},
						timeout: 5000,
						success: function(data) {
						
						$('.error').show();
						$('.error').html(data)


						
						 },

						error: function() {
						alert('La requete n\'a pas abouti, verifiez le chemin dacces a la maison'); }
						});
	


		       }

		        else{


       			$('.error').text("L'email doit etre entre 5 et 20 caractere")
				$('.error').show()
				$('.emailProf').css('border','1px solid red')
		       			
			 
   				}
          
				
		    }
		    else{

		    	$('.error').text("L'email doit etre entre 5 et 15 caractere")
				$('.error').show()
				$('.emailProf').css('border','1px solid red')

			}
}
else{

	$('.error').text("Le prenom doit etre entre 2 et 15 caractere")
	$('.error').show();
	$('.prenomProf').css('border','1px solid red')
	}
}
})


)


//gestion de la notification
$('#msgIncriptionProf').show()
$('#msgIncriptionProf').delay(1000).animate({'margin-top': '0px'}, 800)
$('.closeNotifyProf').click(function() {
	$('#msgIncriptionProf').animate({'margin-top': '-85px'}, 800,function () {
		// body...
		$('#msgIncriptionProf').hide()

	})
});



                    $('#chargement').fadeIn(1000);

             $('.chargement1').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {

               $('.chargement2').fadeIn(1000).delay(1500).fadeOut(500).queue(
                function () {

                 $('.chargement3').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                
               	 $('.chargement4').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {

                    $('.chargement5').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                      

                      $('.chargement6').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                        
                          $('#chargement').slideUp(1000);

                          
                      })
                        // body...
                      })
                                
                    })
                  })
                
              })
              // body...
            })

})