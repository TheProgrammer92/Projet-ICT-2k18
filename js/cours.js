$(function() {
	
 $('.loader').hide();

  $('.voir_pdf').click(function() {
  	
  	
    $('#background').animate({'opacity':'0.3'},1500)
    $('#div_pdf').fadeIn(1000)
   
    
  })

  $('.close').click(function() {
  	 $('#background').animate({'opacity':'1'},1500)
  	 $('#div_pdf').fadeOut(1000);
  })

  $('.refus_voir').click(function() {
  	 
      var cobail=1; 



  $.post('http://localhost/mon%20nouveau%20projet/php/cours_php.php',{refus:cobail},function(data) {
  	 	
  	 $('#div_pdf').fadeOut(1000);
  	 $('#affiche_pdf').fadeOut(1000);
  	 })
  })


  //gestion du moteur de recherche pour les cours

   $('.rechercher_pdf').keyup(function() {
       
        
       search=$(this).val();

       $search=$.trim(search);

       if ($search!=="") {
          $('.loader').show();    
       	$.post("php/cours_php.php",{search:$search},function(data) {
       		

       		$('#affichage').html(data);
       	    $('.loader').hide();	
       	})
       }
   })


   function view_pdf() {
     	// body...
     
   if ($('.rechercher_pdf').val()=="") {

 
   	   $.post("php/cours_php.php",{valide:true},function(data) {
   	   

   	   	$('#affichage').html(data);


   	   })
   }
     }

    setInterval(view_pdf,1000);

})

