/* Fancybox */

$(document).ready(function() {
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
});

/* Smooth Scrolling */

$(".scroll").click(function (event) {
    event.preventDefault();
    //calculate destination place
    var dest = 0;
    if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
        dest = $(document).height() - $(window).height();
    } else {
        dest = $(this.hash).offset().top;
    };
    //go to destination
    $('html,body').animate({
			scrollTop: dest
		}, 1000, 'swing');
});

/* Loading Layer */

function hideLoadingLayer(){
	$("#loadinggif").css('visibility', 'hidden');
	$("#preloader-movie").css('visibility', 'hidden');
	$("#loading-layer").css('opacity', '0');
	setTimeout (ladesymbol, 1000);
};

function ladesymbol() {
	$("#loading-layer").css('visibility', 'hidden');
	$("#loading-layer").css('height', '0');
	$("body").css('overflow', 'visible');
};

/* Quart Pics */

$(window).on('resize', function(){
    $('.quart').each(function(){
          var selfWidth = $(this).width();
          $(this).height(selfWidth);   
    });
}).resize();

/* Resize Height Pics */

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-100').height($(window).height());
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-90').height($(window).height()*0.9);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-80').height($(window).height()*0.8);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-70').height(($(window).height()*0.7));
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-60').height(($(window).height()*0.6));
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-50').height($(window).height()*0.5);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-40').height($(window).height()*0.4);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-30').height($(window).height()*0.3);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-20').height($(window).height()*0.2);
	});
});

$(document).ready(function(){
	$(window).on('ready resize', function(){
    	$('.window-20').height($(window).height()*0.2);
	});
});

/* Center Vertically */

$(window).on('load resize', function centerVert (){
    $('.center-vert').each(function(){
		if ($(this).children().attr('class') == 'table') {
			var relatedID = $(this).attr("data-center-to");
			var relatedHeight = $('#' + relatedID).height();
			$(this).children().css('height', relatedHeight);
		} else {
			var relatedID = $(this).attr("data-center-to");
			var relatedHeight = $('#' + relatedID).height();
			$(this).wrapInner('<div class="table-cell"></div>');
			$(this).wrapInner('<div class="table"></div>');
			$(this).children().css('height', relatedHeight);
		}
	});
});

$(window).on('load resize', function centerVertParent (){
    $('.center-vert-parent').each(function(){
		if ($(this).children().attr('class') == 'table') {
			var parentHeight = $(this).parent().height();
			$(this).children().css('height', parentHeight);
		} else {
			var parentHeight = $(this).parent().height();
			$(this).children().css('height', parentHeight);
			$(this).wrapInner('<div class="table-cell"></div>');
			$(this).wrapInner('<div class="table"></div>');
		}
	});
});

/* Center Horizontally */

$(window).on('load', function centerVertically() {
    $('.center-hor').each(function(){
           var parentWidth = $(this).parent().outerWidth();   
           var selfWidth = $(this).outerWidth();   
           $(this).css('margin-left', function(i,x){return ((parentWidth-selfWidth)/2);});
    });
});

/* Google maps Scrolling */

$(document).ready(function(){
	$("#maps-overlay").click(function(){
		$("#maps-overlay").css("visibility","hidden");
	});
});

/* Center Video in Container */

$(window).on('ready resize', function(){
    $('.background-movie').each(function(){
          var parentWidth = $(this).parent().width();
          var parentHeight = $(this).parent().height();
          var selfWidth = $(this).width();
          var selfHeight = $(this).height();
		  var margLeft = Math.min(-(selfWidth-parentWidth)/2, 0)
          $(this).css('margin-left', margLeft);
    });
});

/* 16:9 Format for Videos */

$(window).on('load resize', function(){
		$('.video-ratio').each(function(){
    		$(this).height($(this).width()*0.5625);
		});
});

/* Outdated Browser */

$(document).ready(function(){
outdatedBrowser({
	bgColor: '#f25648',
	color: '#ffffff',
	lowerThan: 'transform',
	languagePath: 'js/outdatedbrowser/lang/de.html'
})

});

/* E-Mail Form */

function validateEmail(email) { 
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate(){
	var email = $("#mail").val();
	  if (validateEmail(email)) {
			 var name = $('#name').val();
			 var mail = $('#mail').val();
			 var text = $('#message').val();
			 
			 if(name && mail && text ){
					
					document.getElementById('send').removeAttribute('type');
					document.getElementById('send').innerHTML = 'sending...';
					var that = $('form.mail');
						url = that.attr('action');
						type = that.attr('method');
						contents = that.serialize();
					
					$.ajax({
						url: url,
						type: type,
						dataType: 'json',
						data: contents,
						success: function(response){
							document.getElementById('send').innerHTML = 'sent!';
						}
					});
			 } else {
				alert ('Please fill out all fields!') 
			 };
	  } else {
  alert ('Please enter a valide E-Mail address!') 
	  }
}



$('form.mail').on('submit', function(ev){
	 ev.preventDefault();
	 validate ();
	 return false;
});
                        