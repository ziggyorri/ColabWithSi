var main = function(){
var tags = ['#heading1','#mapi','#info','footer']
var nb = null;
var test = $('.mainbody').css('border-color');
	var yPos = $(document).scrollTop();
	animateNav(); //for page refresh
	
	$(document).scroll(function(){//keirir þegar skrollar
		animateNav();
    $('img').css('margin-left','0px');
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
           		$(tags[i]).css('border-color',test);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
    });
    $("#link2").click(function (){
                
           scrollToElement('#mapi');	   
           nb = 1;
           for (var i = tags.length - 1; i >= 0; i--) {
           	if (i==nb) {
           		$(tags[i]).css('border-color','white');	 	  
           		$(tags[i]).css('border-width','20px');
           	}
           	else{
           		$(tags[i]).css('border-color',test);	 	  
           		$(tags[i]).css('border-width','5px');
           	}
           }
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
           		$(tags[i]).css('border-color',test);	 	  
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
           		$(tags[i]).css('border-color',test);	 	  
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
	if(yPos > 15)//bæta við klassa
	{
		$('.navcontainer').addClass('scrollDown');
	}
	else
	{
		$('.navcontainer').removeClass('scrollDown');
	}

	/*if(yPos < 15)//breitist í abselute
	{
		$('.navcontainer').css('position','relative');
		$('.navcontainer').css('top', 'none');
	}
	else
	{
		$('.navcontainer').css('position','fixed');
		$('.navcontainer').css('top','0');
	}*/
	
}
var bul = false;
$("img").click(function (){
      var breid = $(window).width();
      if (breid<480) {
        var margin = -640+breid;
        $('img').animate({marginLeft:margin},500);
      }
    });
$(window).resize(function(){
  var breid = $(window).width();
        if (breid>480) {
        $('img').css('margin-left','0px');
      }
});

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