$(function () {
  
  var $do_animation=0;

	
	

  
var click=0;
     

	$('.in').click(function () {
   click++;
   $(".hr").animate({'margin-left':'215px'},500)
   $('#form1').show(800);
 $('#form2').slideUp();
 
   
	// body...
})

$('.up').click(function () {
	
   $(".hr").animate({'margin-left':'300px'},500)
   $('#form1').hide(800);
 $('#form2').show(800);

    
	
})
	$('.fermer').mouseover(function () {

		$('.fermer').attr('src','img/icone/download2.jpg')
		// body...
	})
	$('.fermer').mouseout(function () {

		$('.fermer').attr('src','img/icone/ff.png')
		// body...
	})
	

	// ici nous ferrons la veriication du formulaire de connexion avec jquery

 $('.prenom').keyup(function () {
                                 
                    if (!$('.prenom').val().match(/^[a-z]+$/i)) {
                   $('.prenom').css('outline-color','#FF6347');
                     $('.error').fadeIn().text('entrer les caracterer entre a et z');


                    }
                    else{
                        $('.error').hide().text("")

                    }



})
 $('.password').keyup(function () {
                                 
                    if (!$('.password').val().match(/^[a-z0-9]+$/)) {
                   $('.password').css('outline-color','#FF6347');
                     $('.error_password').fadeIn().text('entrer  plusieurs caractere avec des chiffre');


                    }
                    else{
                        $('.error_password').hide().text("")

                    }



})

// maintenant des verifiction sur la parti incription

 $('.prenom_inscription').keyup(function () {
                                 
                    if (!$('.prenom_inscription').val().match(/^[a-z]+$/i)) {
                   $('.prenom_inscription').css('outline-color','#FF6347');
                     $('.prenom_manquant').fadeIn().text('le prenom doit contenir les caracterer a-z plusieur fois');


                    }
                    else{
                        $('.prenom_manquant').hide().text("")

                    }



})

 $('.email_inscription').keyup(function () {
                                 
                    if (!$('.email_inscription').val().match(/^[a-z@.]+$/i)) {
                   $('.email_inscription').css('outline-color','#FF6347');
                     $('.email_manquant').fadeIn().text('email doit contenir des lettre de a-z, le ".",et "@"');


                    }
                    else{
                        $('.email_manquant').hide().text("")

                    }



})

$('.password_inscription').keyup(function () {
                                 
                    if (!$('.password_inscription').val().match(/^[a-z0-9*]+$/i)) {
                   $('.password_inscription').css('outline-color','#FF6347');
                     $('.password_manquant').fadeIn().text('erreur password doit avoir a-z,0-9 et * ');


                    }
                    else{
                        $('.password_manquant').hide().text("")

                    }

})

$('.repeat_inscription').keyup(function () {
                                 
                    if ($('.password_inscription').val()!=$('.repeat_inscription').val()) {
                   $('.repeat_inscription').css('outline-color','#FF6347');
                     $('.repeat_manquant').fadeIn().text('veuillez entrer un password identique  ');


                    }
                    else{
                        $('.repeat_manquant').fadeIn().text("le password est identique")

                    }


})

// je vais gerer l'image gif
$('#gif').hide();



// partie du tutoriel:
  
  var click=0%4;

  $('.next').click(function () {


       if (click==0) {
          $('.numb').text('2');
          $('#corp_description').fadeOut(500);
          $('#corp_description2').show(300)
          click++;
       }

       if (click==1) {
            
            $('.next').click(function () {
              // body...
           
        $('.numb').text('3');
          $('#corp_description2').fadeOut(500);
          $('#corp_description3').show(300)
          click++;
           if (click==2) {
                    
                    $('.next').click(function () {
                      // body...
                   
                $('.numb').text('4');
                  $('#corp_description3').fadeOut(500);
                  $('#corp_description4').show(300)
                  click++;
                   })
               }

               if (click==3) {
                    
                    $('.next').click(function () {
                      // body...
                   
                $('.numb').text('5');
                  $('#corp_description4').fadeOut(500);
                  $('#corp_description5').show(300)
                  click++;
                   })
                    
               }
           })

       }
        


  })

  //gestion de l'inscription avec ajax

  $('#bouton_envoie').click(function (event) {
  
  event.preventDefault();

  var $nom=$('#nom').val();
  var $prenom=$('#prenom').val();
  var $password=$('#password').val();
  var $email=$('#email').val();

   $('#ajax_char_inscr').html('<img src="img/loader/ajax-loader(1).gif">')
 $('#ajax_char_inscr').load('php/inscription.php',
  {nom:$nom,prenom:$prenom,password:$password,email:$email},function() {
        
  })



  })


  $('#submit_connexion').click(function (event) {
  

  event.preventDefault();


  var $prenom_c=$('#prenom_connexion').val();
  var $password_c=$('#password_connexion').val();
  

   $('#ajax_char_inscr').html('<img src="img/loader/ajax-loader(1).gif">');
     
     $.post('php/connexion.php',{prenom:$prenom_c,password:$password_c},function(data) {
       // body...
        
              $('#ajax_char_inscr').html(data)
       
     });

   
     
     
  })



//ici la gestion de la modification concernant la newsecretaire ou new professeur



 // $('#form').show();
 // $('#form').animate({"margin-right":"0px"},400)
 // $('.error').show()
 //  $('.error').html("jhndfjdsnb")

})




