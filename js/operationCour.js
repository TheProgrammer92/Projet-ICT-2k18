$(function () {


	$('.inserer').click(function(event) {
	
		event.preventDefault()
		var takeId=$(this).attr('id');

		var param= 'idCour='+takeId;
		$('#sectionModifie').hide()
		$('#sectionModifie').load('pagesIct/prof/insererPdf.php',param,function() {
			$('#sectionModifie').fadeIn(500)
		});
	});

		$('.voirPdf').click(function(event) {
		
			event.preventDefault()
		
			var takeId=$(this).attr('id');

			var param= 'idCour='+takeId;
			$('#sectionModifie').hide()
			$('#sectionModifie').load('pagesIct/prof/voirCour.php',param,function() {
				$('#sectionModifie').fadeIn(500)
			});
	});

	$('.fermer').click(function(event) {

		$('#section').css('opacity','5')
		$('#container1').css('opacity','5')
	
		$('#container3').hide()
		$('#section').show(800)
		
	});






 //gestion de la l'insertion du pdf

 $('#formPdf').on('submit',(function(event) {

		var takeId=$('.takeId').attr('id');

		 	
		event.preventDefault();
		
		var titrePdf=$('#titrePdf').val();
		
		var descriptionPdf=$('#descriptionPdf').val();
		
		var photoPdf=$('#insertPdf').val()

		
		
		if (photoPdf=="") {

			$('.errorPdf').text("Veuillez completer les champs")
			$('.errorPdf').show();
			// $('.photo').css('border','1px solid red')
		} 

	
   else{  



    	var longueurTitre=titrePdf.length;
 
     // verification de la longueur du titre

    	if (longueurTitre>3 && longueurTitre<40) {

    		//on verifi si la description es vite
    		// je vais gerer sa longueur plus tard
    		if (descriptionPdf=="") {
          
				$('.errorPdf').text("Veuillez completer les Champs")
				$('.errorPdf').show()
				$('.description').css('border','1px solid red')

		    }
		    else{

	    	    $('.errorPdf').html('<img src="img/loader/ajax-loader.gif">');

				 $.ajax({
				 		type: "POST",

				        url:"http://localhost/monNouveauProjet/php/operationCour_php.php",
				        
				        data:new FormData(this),
				        cache: false,
				        processData:false,
				        
				        contentType: false,
				       
				    success:function(data) {

				    	$('.errorPdf').html(data);
						$('.errorPdf').show();
				   
		                if (data.return="success") {
		              
		                    	var $id=data.idEnregistrement;

		                  $('.errorPdf').html('<img src="img/loader/ajax-loader.gif">');

		                    $.ajax({
								type: 'POST',
								url: 'http://localhost/monNouveauProjet/php/operationCour_php.php',
								data:{titre:titrePdf,description:descriptionPdf,idEnregistrement:$id,idCour:takeId},
								timeout: 5000,
								success: function(data) {
							
								$('.errorPdf').show();
								$('.errorPdf').html(data)


								
								 },

								error: function(data) {
								alert('La requête n\'a pas abouti');
								$('.errorPdf').show();
								$('.errorPdf').html(data)

								 }
								});

							}
			             else{

			             	$('.errorPdf').text("erreur au niveau de la requete")
			             }

				       }
	   				 })
			 
   
			}
}
else{

	$('.errorPdf').text("Le titre doit etre entre 10 et 40 caractere")
	$('.errorPdf').show();
	$('.titre').css('border','1px solid red')
	}
}

}))



 
				
})