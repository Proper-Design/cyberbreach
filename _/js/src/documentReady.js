// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function ($) {

	/* trigger when page is ready */
	$(document).ready(function (){

		$('.site-nav-wrapper').squishMenu();
		$('.site-content-wrapper').fitVids();


		// Accessible tabs
		// http://accessibility.athena-ict.com/aria/examples/tabpanel2.shtml
		$("[role='tab']").click(function(){
        //deselect all the tabs
        $("li[role='tab']").attr("aria-selected","false");

        // select this tab
        $(this).attr("aria-selected","true");

        //find out what tab panel this tab controls
        var tabpanid= $(this).attr("aria-controls");
        var tabpan = $("#"+tabpanid);

        //hide all the panels
        $("div[role='tabpanel']").attr("aria-hidden","true");

        // show our panel
        tabpan.attr("aria-hidden","false");
     });

		/* EU Cookie Law */
		/* Uncomment to add meesage
		/* TODO - CSS :) */
		// if ( !Cookies( 'cookie-pop' ) ) {
		//   $('body').prepend(
		//     '<div class="cookie-pop site-notice"><svg class="site-notice-icon"><use xlink:href="#notice"></use></svg><span class="cookie-law">Our site uses Cookies</span><button class="button" id="accept-cookie">OK?</button></div>'
		//   );

		//   $( '#accept-cookie' ).click(function () {
		//     Cookies( 'cookie-pop', 'set' );
		//     $( '.cookie-pop' ).remove();
		//   });
		// }


	});

}(window.jQuery || window.$));