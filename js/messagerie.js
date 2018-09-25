$(function () {


  var take;

	         // la messagerie es caché a l'aide de display en css
          $('#messagerie').fadeIn(800)
           $('.new_message_messagerie').hide(); //div d'ajour de conversation
           $('.affiche_conversation').hide();

        //au click sur l'image de la messagerie
         click=0;
         $('.sms').click(function () {
          if (click==0) {


           
            $('.messagerie').fadeIn(500);
            click++;
          }
          else{
            $('.messagerie').fadeOut(500);
              $('.new_message_messagerie').hide(); //div d'ajour de conversation
              $('.affiche_conversation').hide();

            click--;
          }
    
  })

// premiere parti la partie des animation

 
 
                                                     

    //au click sur le profil pour lire les message
$('.profil').click(function() {
    
       
        take=$(this).attr('id');
        
         $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{id_accueil:take},function(data) {
        
          $('.accueil_affiche').html(data);
          $('.affiche_conversation').fadeIn(500);
          $('.new_message_messagerie').hide()
   })

}) 

  
     function lire() {
      

       $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{id_dest:take},function(data) {
         
          $('.corp_conversation').html(data);
       })



        $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{id_entete:take},function(data) {
         
          $('.entete_affiche_conversation').html(data);
       })

         $('#conversation').focus();
     }

        setInterval(lire,1000);
       lire();
    
    $('#conversation').focus();
  
      $('#conversation').keyup(function (e) {

               var get=$('#conversation').val();
                  get=$.trim(get);
               
                  if (get!=="" && e.keyCode===13 && e.shiftKey===false) {
                         

              $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{conversation:get,submit:'sub',id_dest:take},function(data) {

                           $('.corp_conversation').html(data);
                          $('#conversation').val("");
                        $('#conversation').focus();
                           lire()

                           })

             
                  }
          })

              
             $('#submit').click(function() {

               var get=$('#conversation').val();
                   get=$.trim(get);
               

                $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{conversation:get,submit:'sub',id_dest:take},function(data) {
                
                   $('.corp_conversation').html(data);
                  $('#conversation').val("");
                  $('#conversation').focus()
                  lire()
                   
                         
                           
                })

             })



  function chargement_accueil() {

           
          $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{id_char:'true'},function(data) {
             
              $('.accueil_affiche').html(data);
             

                   // au click sue le profil d'accueil
                $('.profil_accueil').click(function() {
                 
                     
                       take=$(this).attr('id');
                   
                        // $('.affiche_conversation').show(500);

                          $.post('http://localhost/monNouveauProjet/php/traitement_msg.php',{id_accueil:take},function(data) {
                         
                          $('.accueil_affiche').html(data);

                          
                       })

                     
                          $('.affiche_conversation').fadeIn(500);
                          $('.messagerie').hide();
                          
                   

                }) 
             })
                   
             }

              setInterval(chargement_accueil,4000);
                       
                chargement_accueil();

            })
           


