$(function() {
    			

				

			$('#submit').click(function (event) {
			     
			    event.preventDefault();
			    $nom=$('.nomUpdate').val()
			    $prenom=$('.prenomUpdate').val()
			     $email=$('.emailUpdate').val();
			     $password=$('.passwordUpdate').val();
    

			      $.ajax({
					type: 'POST',
					url: 'http://localhost/monNouveauProjet/php/ictTraitementNew_php.php',
					data:{nom:$nom,prenom:$prenom,email:$email,password:$password},
					timeout: 5000,
					success: function(data) {
					
					$('.errorUpdate').show()
			    	$('.errorUpdate').html(data);

					
					 },

					error: function() {
					alert('La requête n\'a pas abouti'); }
								});
			   

			   
				})

		//gestion de la notification
			$('#msgIncriptionProf').show()
			$('#msgIncriptionProf').delay(1000).animate({'margin-top': '-100px'}, 800)
			$('.closeNotifyProf').click(function() {
				$('#msgIncriptionProf').animate({'margin-top': '-185px'}, 800,function () {
					// body...
					$('#msgIncriptionProf').hide()

				})
});



    		})