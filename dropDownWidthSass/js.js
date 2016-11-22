var main = function(){
var tags = ['#heading1','#map','#info','footer']
var nb = null;
	var yPos = $(document).scrollTop();
	animateNav(); //for page refresh
	
	$(document).scroll(function(){//keirir þegar skrollar
		animateNav();
	});

	$("#link1").click(function (){
                
           scrollToElement('#heading1');
           nb =0;  
           for (var i = tags.length - 1; i >= 0; i--) {
           	if (i==nb) {
           		$(tags[i]).css('border-color','white');	 	  
           		$(tags[i]).css('border-width','20px');
           	}
           	else{
           		$(tags[i]).css('border-color',document.getElementById("img").style.backgroundColor);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
    });
    $("#link2").click(function (){
                
           scrollToElement('#map');	   
           nb = 1;
           for (var i = tags.length - 1; i >= 0; i--) {
           	if (i==nb) {
           		$(tags[i]).css('border-color','white');	 	  
           		$(tags[i]).css('border-width','20px');
           	}
           	else{
           		$(tags[i]).css('border-color',document.getElementById("img").style.backgroundColor);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
           console.write(document.getElementById("img").style.backgroundColor);
    });
    $("#link3").click(function (){
                
           scrollToElement('#info');	
           nb = 2;
           for (var i = tags.length - 1; i >= 0; i--) {
           	if (i==nb) {
           		$(tags[i]).css('border-color','white');	 	  
           		$(tags[i]).css('border-width','20px');
           	}
           	else{
           		$(tags[i]).css('border-color',document.getElementById("img").style.backgroundColor);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
    });
    $("#link4").click(function (){
                
           scrollToElement('footer');
           nb=3
           for (var i = tags.length - 1; i >= 0; i--) {
           	if (i==nb) {
           		$(tags[i]).css('border-color','white');	 	  
           		$(tags[i]).css('border-width','20px');
           	}
           	else{
           		$(tags[i]).css('border-color',document.getElementById("img").style.backgroundColor);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
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
//function sem seigir til um skrollið
var animateNav = function() {//keirist þegar skrollar

	yPos = $(document).scrollTop();
	var heading1Pos = $('#heading1').offset().top;//hversu langt frá toppnum
	/*if(yPos > 100)//bæta við klassa
	{
		$('nav').addClass('scrollDown');		
		$('nav>ul>li').addClass('scrollDown');
		
	}
	else
	{
		$('nav').removeClass('scrollDown');
		$('nav>ul>li').removeClass('scrollDown');
	}*/

	if(yPos < 15)//breitist í abselute
	{
		$('nav').css('position','relative');
		$('nav').css('max-width','auto');
		$('nav').css('top', 'none');
	}
	else
	{
		$('nav').css('position','fixed');
		$('nav').css('max-width','905px');
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
/*
$("#link1").click(function (){
                
           scrollToElement('#heading1');	  
                
    });
*/
$(document).ready(main);