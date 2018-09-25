$(function () {

 $('#repeter').hide();
	

	$('.crayon').click(function () {
		// body...
		$('#sectionFormulaire').fadeIn(1000)
		$('.crayon').fadeOut().fadeIn()	
        bis()

    })

	function bis() {

		$('.crayon').click(function () {
				$('.crayon').fadeOut().fadeIn()	;
		})
		// body...
	}

setInterval(bis,200)

	$('.close2').click(function () {
		// body...
		$('.crayon').stop(true); 
		$('.crayon').css('opacity','5')
		$('#sectionFormulaire').fadeOut(500);
	})
	// body...

    // gestion de l'affichage des div d'information

    
     $("#deuxieme_affichage").hide()
   
    $('.but1').click(function () {
      
          $('#corp_update').show(800);
         $("#deuxieme_affichage").fadeOut(1000); 
      
        
   })


   $('.but2').click(function () {
       
        $("#deuxieme_affichage").show(800)
        $('#corp_update').fadeOut(1000);
        
   })

   



// maintenant des verifiction sur la parti modification

$('.new_nom').keyup(function () {
                                 
                    if (!$('.new_nom').val().match(/^[a-z]+$/i)) {
                   $('.new_nom').css('outline-color','#FF6347');
                   
                     $('.Unom_manquant').fadeIn().text('le prenom r ');

                     
                    }
                    else{
                        $('.Unom_manquant').hide().text("");

                    }

})





$('.new_prenom').keyup(function () {
                                 $('.Uprenom_manquant').hide().text("  ")
                    if (!$('.new_prenom').val().match(/^[a-z]+$/i)) {
                   $('.new_prenom').css('outline-color','#FF6347');
                   
                     $('.Uprenom_manquant').fadeIn().text('le prenom doit contenir ');


                    }
                    else{
                        $('.Uprenom_manquant').hide().text("  ")

                    }
           
})

 $('.new_email').keyup(function () {
                                 
                    if (!$('.new_email').val().match(/^[a-z@.]+$/i)) {
                   $('.new_email').css('outline-color','#FF6347');
                     $('.Uemail_manquant').fadeIn().text('email doit contenir des lettre de a-z, le ".",et "@"              x          ');


                    }
                    else{
                        $('.Uemail_manquant').hide().text("  ")

                    }



}) 


$('.new_password').keyup(function () {
                                 
                    if (!('.new_password').val().match(/^[a-z0-9*]+$/i)) {
                   $('.Upassword_manquant').css('outline-color','#FF6347');
                     $('.Upassword_manquant').fadeIn().text('erreur password doit avoir a-z,0-9 et * ');
                            $('#repeter').fadeOut(800);

                    }
                    else{


                        $('.Upassword_manquant').hide().text("");
                        $('#repeter').fadeIn(800);


                    }

})

$('.new_repeat').keyup(function () {
                                 
                    if ($('.new_password').val()!=$('.repeat_inscription').val()) {

                   $('.Urepeat_manquant').css('outline-color','#FF6347');
                     $('.Urepeat_manquant').fadeIn().text('veuillez entrer un password identique  ');


                    }
                    else{
                        $('.Urepeat_manquant').fadeIn().text("le password est identique")

                    }


})

$('.new_tel').keyup(function () {
                                 
                    if (!$('.new_tel').val().match(/^[0-9]+$/i)) {
                   $('.Utel_manquant').css('outline-color','#FF6347');
                     $('.Utel_manquant').fadeIn().text('erreur password doit  contenir les lettre a-z,0-9 et * ');


                    }
                    else{
                        $('.Utel_manquant').hide().text("")

                    }

})


//gestion en ajax de la modification du profil

$('#pdp').on('submit',(function(event) {
     
     event.preventDefault(); 

    
     if ($("#avatar").val()=="") {

        $('.error_up').text("selectionnez une image svp")
     }  
     else{
    
        $('.img_update').html('<img src="img/loader/2.gif">');
          $('.error_up').text("");

            $.ajax({

                url:"php/update_php.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function(data) {
                
                    $('.chargeImg').fadeOut(500).fadeIn(800).html(data)
                    $('.chargeImg img').attr('width', '180');
                    $('.chargeImg img').attr('height', '180');
                    $('.chargeImg img').attr('border-radius', '3px');
                    $('.chargeImg img').addClass("img_update") 

                    $('#entete_update').fadeOut(500).fadeIn(500).html(data)
                    $('#entete_update img').attr('width', '40');
                    $('#entete_update img').attr('height', '45');
                    $('#entete_update img ').addClass("img_utilisateur")

                    
                    $('.img_utilisateur').click(function () {
                        
                              if (click==0) {
                             $('.monMenu').slideDown();
                             click++;
                             }

                             else{
                           
                            $('.monMenu').slideUp(500);
                            click--;

                             }

                          })
                   
                    $('#pdp')[0].reset()
                     

                    // body...
                },

                error:(function() {
                    alert("erreur");
                })
            })



return false;
}
    
}))




})


