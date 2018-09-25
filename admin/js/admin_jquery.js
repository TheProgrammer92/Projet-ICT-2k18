$(function () {
	



     


  

   $('.corbeille').click(function () {
   	  
     take=$(this).attr('id');
		$.post('http://localhost/mon%20nouveau%20projet/admin/php/admin.traitement.php',{id_delete:take},function (data) {
		  $("div[id="+take+"]").hide(500);
		})
   })


   //gestion du formulaaire d'ajout de la secretaire

   $('#form').on('submit',function (event) {
   			
   			event.preventDefault()
   			$prenom=$('.prenom').val();
   			$email=$('.email').val();

   			$.post('php/addSecretaire_php.php',{prenom:$prenom,email:$email},
   				function function_name(data) {

   					$('.error_add').html(data)
   				// body...;
   			})
   })

})