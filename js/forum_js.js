$(function () {
	// body...

	// $('#new_topics').css('display','none');
	 $('#formulaire').hide()
   $('.remonter').hide()
      i=0;
     click=i%2;
	   
	 $('.descendre').click(function (evt) {
	 	// body...
  
	 	// $('.creer_topics').text("voir les topics");
	 	 $('#formulaire').show()

			 	
		       // bloquer le comportement par défaut: on ne rechargera pas la page
		       evt.preventDefault(); 
		       // enregistre la valeur de l'attribut  href dans la variable target
			var target = $(this).attr('href');
		       /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
		       et safari (webkit) */
			$('html, body').stop()
		       // on arrête toutes les animations en cours 
		       /* on fait maintenant l'animation vers le haut (scrollTop) vers 
		        notre ancre target */
		       .animate({scrollTop: $(target).offset().top}, 1000 );
		        


          
   function bis() {

    
        $('.remonter').fadeIn(1000).fadeOut(1000) ;
       $('.remonter').show()
        $('.up').show()
    // body...
     
    
  }

 setInterval(bis,500)
	 
	 	})




     $('.remonter').click(function (evt) {
        // body...

             
             
        // $('.creer_topics').text("voir les topics");
      

                
               // bloquer le comportement par défaut: on ne rechargera pas la page
               evt.preventDefault(); 
               // enregistre la valeur de l'attribut  href dans la variable target
            var target = $(this).attr('href');
               /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
               et safari (webkit) */
            $('html, body').stop()
               // on arrête toutes les animations en cours 
               /* on fait maintenant l'animation vers le haut (scrollTop) vers 
                notre ancre target */
               .animate({scrollTop: $(target).offset().top}, 1000 );
        
              
                  $('#formulaire').fadeOut(800)
                  $('.remonter').stop()
                  $(".remonter").hide(500)
                  $('.up').hide(500)
     
        })
	 	



        // var option = {
        //          buttons:"smilebox,bold,italic,underline,fontcolor,|,bullist,video,tweet,img,link,|,code,quote",lang:"fr",resize_maxheight:"5000",allButtons:{code:{hotkey:"ctrl+shift+3",transform:{"<pre><code>{SELTEXT}</code></pre>":"[code]{SELTEXT}[/code]"}},tweet:{title:"Insérer un Tweet",buttonText:"Tweet",modal:{title:"Insérer un Tweet",width:"600px",tabs:[{input:[{param:"ID",title:'Entrez l\'id du tweet (Ex: <span style="color:#c1c1c1">https://twitter.com/PrimFX/status/</span><u>703307263306539013</u>)',validation:"^([0-9]*)$"}]}],onLoad:function(){},onSubmit:function(){}},transform:{'<div class="tweet-box">Ce Tweet (https://twitter.com/twitter/status/{ID}) apparaîtra à cet emplacement dans l\'article</div>':"[tweet]{ID}[/tweet]"}},

        //          img : {
        //   title: CURLANG.img,
        //   buttonHTML: '<span class="fonticon ve-tlb-img1">\uE006</span>',
        //   hotkey: 'ctrl+shift+1',
        //   addWrap: true,
        //   modal: {
        //     title: CURLANG.modal_img_title,
        //     width: "600px",
        //     tabs: [
        //       {
        //         title: CURLANG.modal_img_tab1,
        //         input: [
        //           {param: "SRC",title:CURLANG.modal_imgsrc_text,validation: '^*?\.(jpg|png|gif|jpeg)$'}
        //         ]
        //       }
        //     ],
        //     onLoad: this.imgLoadModal
        //   },
        //   transform : {
        //     '<img src="{SRC}" />':"[img]{SRC}[/img]",
        //     '<img src="{SRC}" width="{WIDTH}" height="{HEIGHT}"/>':"[img width={WIDTH},height={HEIGHT}]{SRC}[/img]"
        //   }
        // }
        //   }
    
  
        //         }


      // jQuery("#wysibb").wysibb();

 


	})
