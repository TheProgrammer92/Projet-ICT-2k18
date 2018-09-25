$(function() {
	
//gestion des operations sur les Cour
	// chose a faire au chargement de la page
$('#container1,#container2').hide();
$('.cour').hide()
$('#container1,#container2').show('bounce',1500,function () {
	// body...
	$('.cour').fadeIn(300)
})


	// $('#container3').hide()
var takeId;

	$('.cour').click(function(event) {
		 takeId=$(this).attr('id')
		
		// $('#container1,#container2').css('opacity','0.2')
		$('#section').fadeOut(500)
		$('#section').animate({'opacity': '0.1'}, 500)
		$('#container1').animate({'opacity': '0.1'}, 500)
		
	

		//Partie de modification des couur
  		//  getions du chargement des pages
  		var param= 'idCour='+takeId;
  		$('#chargeInsertCour').hide()
  		$('#chargeInsertCour').load('pagesIct/prof/operationCour.php',
  		param ,
  			function(){
  					$('#chargeInsertCour').fadeIn(700)
  			/* Stuff to do after the page is loaded */
  		});
  		

	});

	


//gestion sur les click du modifier


$('.modifierCour').click(function(event) {
	
	$('#formProfesseur').fadeIn(1200)
});
	//autre operation
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

		var titreCour=$('.titre').val();
		var descriptionCour=$('.description').val();
	
		var photoCour=$('.photo').val()


		
		
	
		if (photoCour=="") {

			$('.error').text("Veuillez completer les champs")
			$('.error').show();
			$('.photo').css('border','1px solid red')
		} 

	
   else{  



    	var longueurTitre=titreCour.length;
 
     // verification de la longueur du titre

    	if (longueurTitre>4 && longueurTitre<40) {

    		//on verifi si la description es vite
    		// je vais gerer sa longueur plus tard
    		if (descriptionCour=="") {
          
				$('.error').text("Veuillez completer les Champs")
				$('.error').show()
				$('.description').css('border','1px solid red')

		    }
		    else{

	    	    $('.error').html('<img src="img/loader/ajax-loader.gif">');
				 $.ajax({

				        url:"http://localhost/monNouveauProjet/php/professeur_php.php",
				        type: "POST",
				        data:new FormData(this),
				        cache: false,
				        processData:false,
				        
				        contentType: false,
				       
				    success:function(data) {
			         
		                if (data.return="success") {
		                    	
		                    	var $id=data.idEnregistrement;

		                  $('.error').html('<img src="img/loader/ajax-loader.gif">');
		                    $.ajax({
								type: 'POST',
								url: 'http://localhost/monNouveauProjet/php/professeur_php.php',
								data:{titre:titreCour,description:descriptionCour,idEnregistrement:$id},
								timeout: 5000,
								success: function(data) {
								
								$('.error').show();
								$('.error').html(data)


								
								 },

								error: function() {
								alert('La requête n\'a pas abouti, verifier les chemin d\'acces'); }
								});

							}
			             else{
			             	$('.error').show();
			             	$('.error').html("erreur au niveau de la requete")
			             }

				       },
				       error:function () {
				       	$('.error').show();
				       	$('.error').html(data)
				       }
	   				 })
			 
   
			}
}
else{

	$('.error').text("Le titre doit etre entre 5 et 40 caractere")
	$('.error').show();
	$('.titre').css('border','1px solid red')
	}
}
}))



    


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