/* AJAX Formular */

$("form.ajax").submit( function(ev) {
	    ev.preventDefault();
		var that = $(this);
			url = that.attr('action');
			type = that.attr('method');
			contents = that.serialize();
		//$('#schreiberling > .nachricht').html('es wird gespeichert ...');
		$.ajax({
			url: url,
			type: type,
			dataType: 'json',
			data: contents,
			success: function(response){
				alert ('saved!');
			},
			error : function(response){
				alert ('error!');
			},
		});
	return false;
});

$(window).on('load resize', function () {
	var changerWidth = $(window).width() - $('#menu-trigger').outerWidth();
	$('#footer-change').css('width', changerWidth);
});

/* Overlay */

$(window).on('load', function () {
	var overlayCount = 0;
	$('#menu-trigger').click(function(){
	if (overlayCount == 1) {
		$('.overlay').css('height', '0');
		overlayCount = 0;
	} else {
		var windowHeight = $(window).height();
		$('.overlay').css('height', windowHeight);
		overlayCount = 1;
	}
});
});


