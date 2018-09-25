$(function () {
	// body...

	$('#menu').hide()
	$('.iconMenu').click(function() {
	      $('#menu').show()
	    $('#menu').animate({'left': '16px'}, 300)

	});

	$('.closeMenu').click(function() {
	    

	  $('#menu').animate({'left': '-270px'}, 400,function () {
	      
	      $('#menu').hide()
	  })
	});
})