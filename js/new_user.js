$(function() {
	
$('.chargement1').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
    $('.chargement2').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
       $('.chargement3').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
			
			$('.chargement4').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
					$('.chargement5').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
						$('.chargement6').fadeIn(1000).delay(1500).fadeOut(500).queue(function () {
						
							$(location).attr('href','http://localhost/mon%20nouveau%20projet/acceuil.php')
						})
							// body...
						})
											
					})
				})
			
		})
		// body...
	})
})