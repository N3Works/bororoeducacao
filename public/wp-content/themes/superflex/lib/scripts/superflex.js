
jQuery(document).ready(function(){
			
			$("a[rel^='prettyPhoto']").prettyPhoto(); 
			Cufon.replace('h1,h2,h3',{});
			portfolioHover();
			
			toggleMenu();
		
			// SHORTCUTS MENU HOVER FUNCTIONS
			jQuery("#shortcuts").hover(function(){
					jQuery("#shortcuts ul li a").css({'background-color':'#333'});
					},function(){
					jQuery("#shortcuts ul li a").css({'background-color':''});
				
			});
			
			// TAB PANEL
			
			//Default Action
				$(".tabcontent").hide(); //Hide all content
				$("#tabnav li:first").addClass("active").show(); //Activate first tab
				$(".tabcontent:first").show(); //Show first tab content
				
				//On Click Event
				$("ul#tabnav li").click(function() {
					$("ul#tabnav li").removeClass("active"); //Remove any "active" class
					$(this).addClass("active"); //Add "active" class to selected tab
					$(".tabcontent").hide(); //Hide all tab content
					var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
					$(activeTab).show(); //Fade in the active content
					return false;
				});
			
			
			// SLIDER HOVER FUNCTION
			jQuery(".prev-slide:hidden, .next-slide:hidden").show();
			jQuery(".prev-slide, .next-slide").css({'opacity':'0'});
			
			jQuery(".slider-full .image").hover(function(){
					jQuery(".prev-slide, .next-slide",this).stop().fadeTo("slow", 1.0); 
					},function(){
					jQuery(".prev-slide, .next-slide",this).stop().fadeTo("slow", 0); 
			
			});
			
			// CYCLE GALLERY
			jQuery('#gallerycycle').cycle({
			  fx: 'fade',
			  speed:300,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:0,
			  timeout: 0,
			  next:  '#next-gallery',
			  prev:  '#prev-gallery'
			});		
			
			jQuery('#galleryslider').cycle({
			  fx: 'fade',
			  speed:300,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:0,
			  timeout: 0,
			  next:  '#next-gallery',
			  prev:  '#prev-gallery'

			});		
			
		
			// CYCLE SLIDERS
			
			var $home_slider_effect = jQuery("meta[name=home_slider_effect]").attr('content');
			var $home_slider_timeout = jQuery("meta[name=home_slider_timeout]").attr('content');
			
			jQuery('#feature div:first').fadeIn(1000, function() {	 
			jQuery('#feature').cycle({
			  //fx: $home_slider_effect,
			  fx:$home_slider_effect,
			  speed:1000,
			  easing: 'easeInOutQuad',
			  cleartype:  1,
			  pause:1,
			  timeout:  $home_slider_timeout,
			  next: '.next-slide',
			  prev: '.prev-slide'
				});
			});
			
			

});

function portfolioHover(){
			// PORTFOLIO AND GALLERY ZOOM
			jQuery(".portfolio .zoom").css({'opacity':'0'});
			jQuery(".portfolio").hover(function(){
					jQuery(".zoom",this).stop().fadeTo("slow", 1); 
					},function(){
					jQuery(".zoom",this).stop().fadeTo("slow", 0);  
			
			});
			
			
			jQuery(".portfolio").hover(function(){
					jQuery(this).stop().fadeTo("medium", 0.8); 
					},function(){
					jQuery(this).stop().fadeTo("slow", 1);  
			
			});
			}


function toggleMenu(){
	
	$(".toggle_container").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		
		
		
		return false; //Prevent the browser jump to the link anchor
	});
					
}


$(function() {
	$('a[rel*=external]').click( function() {
		window.open(this.href);
		return false;
	});
});

// JavaScript Document

/* 
 * Cross-browser event handling, by Scott Andrew
 */
function addEvent(element, eventType, lamdaFunction, useCapture) {
    if (element.addEventListener) {
        element.addEventListener(eventType, lamdaFunction, useCapture);
        return true;
    } else if (element.attachEvent) {
        var r = element.attachEvent('on' + eventType, lamdaFunction);
        return r;
    } else {
        return false;
    }
}

/*
 * Clear Default Text: functions for clearing and replacing default text in
 * <input> elements.
 *
 * by Ross Shannon, http://www.yourhtmlsource.com/
 */

addEvent(window, 'load', init, false);

function init() {
    var formInputs = document.getElementsByTagName('input');
    for (var i = 0; i < formInputs.length; i++) {
        var theInput = formInputs[i];
        
        if (theInput.type == 'text' && theInput.className.match(/\bcleardefault\b/)) {  
            /* Add event handlers */          
            addEvent(theInput, 'focus', clearDefaultText, false);
            addEvent(theInput, 'blur', replaceDefaultText, false);
            
            /* Save the current value */
            if (theInput.value != '') {
                theInput.defaultText = theInput.value;
            }
        }
    }
}

function clearDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == target.defaultText) {
        target.value = '';
    }
}

function replaceDefaultText(e) {
    var target = window.event ? window.event.srcElement : e ? e.target : null;
    if (!target) return;
    
    if (target.value == '' && target.defaultText) {
        target.value = target.defaultText;
    }
}