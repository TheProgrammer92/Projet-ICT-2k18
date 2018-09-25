$(function () {
	


 	$id_cour=0;
 	$id_pdf=0;

	 $('.errorPartage').css('color','blue')
	 $('.errorPartage').html("pas modifié merci")
	$('#partager').click(function() {

		$id_cour=$(this).attr('id_cour')
		$id_pdf=$(this).attr('id_pdf')

		$.ajax({
			url: 'http://localhost/monNouveauProjet/php/notification_php.php',
			type: 'POST',

			data: {id_cour: $id_cour,id_pdf:$id_pdf},
			success:function (data) {
					 $('.errorPartage').css('color','blue')
					$('.errorPartage').html(data)
			}
		})
		
		
	});


})