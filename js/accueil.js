+$(function() {

	//inserons ici la fontion qui va slider l'ecran

  // gestion de l'accueil
 
i=0
 var click=0;

   $('.monMenu').hide()
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

  $(window).keydown(function (e) {
  	$('#fond').slideUp(500);
  

  })
	

	$('.recherche').focus(function() {
  
		$
		$('.recherche').css('box-shadow','1px 1px 10px #FA8072');
		// body...
	})
	$('.recherche').blur(function () {
		 
		 	$('.recherche').css('border-color','#bebebe');
      $('.recherche').css('box-shadow','0px 0px 0px #CCCCCC');
		// body...
	})
     
     
    $('#page_inserer').hide();



 //  operation sur le reseau social

 // $('#reseau_social').hide();
 i=0;
var click=i%2;
 $('.icone_menu').click(function() {
         
         if (click==0) {
 	$('#reseau_social').show();
    $('.icone_menu').attr('src','img/icone/menu_icon.png')
 	$('#reseau_social').animate({'right':'27cm'},700);
 	// body...
 	click++;
 	} 
 	
 	else{
           $('.icone_menu').attr('src','img/icone/images (2).png')
         $('#reseau_social').animate({'right':'40cm'},700);
          $('#reseau_social').hide(100);
        click--;

 	}

 })




   // les cookie et leur gestion avec ajax

   $('.accept_cookie').click(function () {
     
  $('.cookie_alert').load('http://localhost/mon%20nouveau%20projet/php/accept_cookie.php',{nom:'cookie'});
   })

 i=0;
var click=i%2;
$('#include_msg').hide();
   $('.img_msg').click(function () {
      if (click==0) {
   $('#include_msg').fadeIn(500)
    click++;
   }
   else{
      $('#include_msg').fadeOut(500);
    click--; 
   }
   })
   


   //ici on gere l'animation du new


                    $('#chargement').fadeIn(1000);

             $('.chargement1').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {

               $('.chargement2').fadeIn(1000).delay(1500).fadeOut(500).queue(
                function () {

                 $('.chargement3').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                
                $('.chargement4').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {

                    $('.chargement5').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                      

                      $('.chargement6').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
                        
                          $('#chargement').slideUp(1000);

                           $('#contenu').fadeIn(5000)
                      })
                        // body...
                      })
                                
                    })
                  })
                
              })
              // body...
            })



 })

