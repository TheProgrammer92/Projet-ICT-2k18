$(function() {

	//inserons ici la fontion qui va slider l'ecran
  $(window).keydown(function (e) {
  	$('#fond').slideUp(500);
  

  })
	

	$('.recherche').focus(function() {
  
		$('.recherche').animate({'width':'50%'},500)
		$('.recherche').css('box-shadow','1px 1px 10px #FA8072');
		// body...
	})
	$('.recherche').blur(function () {
		 $('.recherche').animate({'width':'25%'},500)
		 	$('.recherche').css('border-color','#bebebe');
      $('.recherche').css('box-shadow','0px 0px 0px #CCCCCC');
		// body...
	})
     
     
    $('#page_inserer').hide();

 $('.mon_calque').draggable();
  

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


 // jquery de la parti option quanf qui va onmouse
$('#option').hide();
i=0;
 var click=i%2;

  $('.img_utilisateur').click(function () {
  	  if (click==0) {
  	 $('#option').slideDown();
  	 click++;
  	 }

  	 else{
   
  	$('#option').slideUp();
  	click--;

  	 }

  })
   
   
}) 