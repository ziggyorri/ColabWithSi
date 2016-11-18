
var main = function(){
	var yPos = $(document).scrollTop();
	animateNav();//for page refrash

	$(document).scrollTop(function(){
		animateNav();
	});

	$('#link1').click(function(){
		scrollToElement('heading1');
	});

	$("#upButton")
}
var animateNav = function(){
	yPos = $(document).scrollTop();
	var heading1Pos = $('#heading1').offset().top;
	if (yPos > 100) {
		$('nav').addClass('scrollDown');
		$('nav>ul>li').addClass('scrollDown');
	}
	else{
		$('nav').removeClass('scrollDown');
		$('nav>ul>li').removeClass('scrollDown');
	}
	if (yPos>heading1Pos) {
		$('nav').css('position','absolute');
		$('nav').css('top',heading1Pos+'px');
	}
	else{
		$('nav').css('position','fixed');
		$('nav').css('top','0');
	}
}

$(document).ready(main);