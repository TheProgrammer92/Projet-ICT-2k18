$(function () {

	// Gestion des notification dans l'entete
$('#activeNotify').css('cursor','pointer')

$('#notification').hide()
$('#activeNotify').click(function() {
      $('#notification').show()
    $('#notification').animate({'left': '1115px'}, 300)

});

$('#closeNotify').click(function() {
    

  $('#notification').animate({'left': '1550px'}, 400,function () {
      
      $('#notification').hide()
  })
});
	
	function loadNotify() {
	

		$.ajax({
			url: 'http://localhost/monNouveauProjet/php/notification_php.php',
			type: 'POST',
			data: {chargerNotify: '2'},
			success:function (data) {
				
				$('#bodyNotify').html(data)
			}
		})
	
	}

	setInterval(loadNotify,1000)
	
})