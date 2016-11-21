var main = function(){

	var yPos = $(document).scrollTop();
	animateNav(); //for page refresh
	
	$(document).scroll(function(){
		animateNav();
	});

	$("#link1").click(function (){
                
           scrollToElement('#heading1');	  
                
    });

	// code for scrolling to top of page
    $("#upButton").click(function (){
                
           $('body, html').animate({
               scrollTop: 0
           }, 800);
                
    });

	// code for scrolling to bottom of page
	 
	$("#downButton").click(function (){
	    $("html, body").animate({ 
	    	scrollTop: $(document).height() 
	    }, 800);
   	});
	
}  //end main

var animateNav = function() {

	yPos = $(document).scrollTop();
	var heading1Pos = $('#heading1').offset().top;
	
	if(yPos > 100)
	{
		$('nav').addClass('scrollDown');		
		$('nav>ul>li').addClass('scrollDown');
		
	}
	else
	{
		$('nav').removeClass('scrollDown');
		$('nav>ul>li').removeClass('scrollDown');
	}

	if(yPos > heading1Pos)
	{
		$('nav').css('position','absolute');
		$('nav').css('top', heading1Pos + 'px');
	}
	else
	{
		$('nav').css('position','fixed');
		$('nav').css('top','0');
	}
	
}



//smoothscroll function
var scrollToElement = function(element)
{
	$('body').animate({
               scrollTop: ($(element).offset().top) - 50
           }, 1000);
}

//function call
$("#link1").click(function (){
                
           scrollToElement('#heading1');	  
                
    });

$(document).ready(main);