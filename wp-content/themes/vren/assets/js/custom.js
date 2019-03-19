/**
* Equal Height
*/
function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		thisHeight = jQuery(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
jQuery(document).ready(function() {
	equalHeight(jQuery(".equal-height"));// equalHeight js
});

/**
* Anchor
*/
jQuery(document).ready(function () {
	jQuery(".anchor a, a.anchor").click(function() {
	      jQuery('html, body').animate({
	          scrollTop: jQuery('#'+jQuery(this).prop('href').split("#")[1]).offset().top
	      }, 500);
	});
	if(window.location.hash) {
	      jQuery('html, body').animate({
	          scrollTop: jQuery(window.location.hash).offset().top
	      }, 500);
	}
});
/**
* Fix Top Setting
*/
jQuery(document).ready(function () {
	"use strict";
	var w = document.body.clientWidth;
	var fixed = jQuery("body").find(".fixed-top")
	jQuery(window).bind("scroll", function () {
		if (jQuery(this).scrollTop() > 100 && w > 769) {
			fixed.addClass("fix-nav")
		} else {
			fixed.removeClass("fix-nav")
		}
	})
 });

 jQuery( window ).resize(function() {
	"use strict";
	var width = jQuery(window).width();
	if(jQuery(".ownavigation .navbar-nav li.ddl-active").length ) {
		if( width > 991 ) {
			jQuery(".ownavigation .navbar-nav > li").removeClass("ddl-active");
			jQuery(".ownavigation .navbar-nav li .dropdown-menu").removeAttr("style");
		}
	} else {
		jQuery(".ownavigation .navbar-nav li .dropdown-menu").removeAttr("style");
	}
});

jQuery(document).ready(function() {
	"use strict";
	jQuery(".ddl-switch").on("click", function() {
		var li = jQuery(this).parent();
		if ( li.hasClass("ddl-active") || li.find(".ddl-active").length !== 0 || li.find(".dropdown-menu").is(":visible") ) {
			li.removeClass("ddl-active");
			li.children().find(".ddl-active").removeClass("ddl-active");
			li.children(".dropdown-menu").slideUp();
		}
		else {
			li.addClass("ddl-active");
			li.children(".dropdown-menu").slideDown();
		}
	});
});

jQuery(document).ready(function(){
    jQuery(document).off('click.bs.dropdown.data-api');
});

// // 404
jQuery(document).ready(function() {
	var h = jQuery(window).height();
	var header_h = jQuery('#masthead').innerHeight();
	var footer_h = jQuery('#colophon').innerHeight();
	var error_h = jQuery('.error-404').height();
	var padding = h - header_h - footer_h - error_h ;
	if(padding > 0){
		jQuery(".error-404").css("padding-top", padding / 2);
		jQuery(".error-404").css("padding-bottom", padding / 2);
	}
});
jQuery( window ).on("resize",function() {
	var h = jQuery(window).height();
	var header_h = jQuery('#masthead').innerHeight();
	var footer_h = jQuery('#colophon').innerHeight();
	var error_h = jQuery('.error-404').height();
	var padding = h - header_h - footer_h - error_h ;
	if(padding > 0){
		jQuery(".error-404").css("padding-top", padding / 2);
		jQuery(".error-404").css("padding-bottom", padding / 2);
	}
});

jQuery(document).ready(function () {
    "use strict";
    var e = 220;
	var t = 500;
	var ww = document.body.clientWidth;
    if (ww >= 1200) {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > e) {
                jQuery(".back-to-top").fadeIn(t);
            } else {
                jQuery(".back-to-top").fadeOut(t);
            }
        })
    }
    jQuery(".back-to-top").click(function (e) {
        e.preventDefault();
        jQuery("html, body").animate({
            scrollTop: 0
        }, t);
		return false
	})
});

//custom tab
jQuery(document).ready(function(){
	jQuery(".custom-tab-content > .tab-content:first-child").addClass("active-content");
	jQuery(".custom-tab-btn > li:first-child").addClass('active-tab');
	jQuery(".custom-tab-btn li.tab-btn").click(function() {
	    jQuery(this).addClass("active-tab").siblings().removeClass('active-tab');
	    jQuery("#"+jQuery(this).data("id")).addClass("active-content").siblings().removeClass('active-content');
	});
});