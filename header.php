<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bwac_wp_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700|Satisfy' rel='stylesheet' type='text/css'>
<style>
.js #page {display:none;}
</style>
<script>
	//improve handling of  fouc
	//hide display block until end if js is available to turn it back on
	document.documentElement.className = 'js';
</script>
<?php wp_head(); ?>
<script>
(function($){
    $(window).load(function() {
	  //initialize masonry after all images have loaded in the container to prevent overlapping	
      // Masonry Trigger
      var $container = $('.contentModuleWrapper');

      $container.isotope({
         // options
          itemSelector: '.contentModule',
		  layoutMode: 'masonry'
      });

    }); 

})(jQuery); 


jQuery(document).ready(function($) {

      $('#slides').slidesjs({
        width: 940,
        height: 528,
        navigation: true,
		play: {
      	active: true,
        	// [boolean] Generate the play and stop buttons.
        	// You cannot use your own buttons. Sorry.
      	effect: "slide",
        	// [string] Can be either "slide" or "fade".
      	interval: 10000,
        	// [number] Time spent on each slide in milliseconds.
      	auto: true,
        	// [boolean] Start playing the slideshow on load.
      	swap: true,
        	// [boolean] show/hide stop and play buttons
      	pauseOnHover: false,
        	// [boolean] pause a playing slideshow on hover
      	restartDelay: 2500
        	// [number] restart delay on inactive slideshow
    	},
		callback: {
          loaded: function(number) {
	
		    $('#slideInfoDetails a').attr('href', $("#slideTarget" + number).attr("href"));
			$('#slideInfoTitle').text($("#slideTarget" + number).attr("data-title"));
			$('#slideInfoCaption').text($("#slideTarget" + number).attr("data-caption"));		
			//$('#slideInfoDescription').text($("#slideTarget" + number).attr("data-desc"));
		  },
		  complete: function(number) {
		    $('#slideInfoDetails a').attr('href', $("#slideTarget" + number).attr("href"));
		    $('#slideInfoTitle').text($("#slideTarget" + number).attr("data-title"));
			$('#slideInfoCaption').text($("#slideTarget" + number).attr("data-caption"));
			//$('#slideInfoDescription').text($("#slideTarget" + number).attr("data-desc"));
		  }
		}
      });
	 
    });
	
</script>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bwac_wp_theme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="/wordpress/wp-content/themes/bwac_wp_theme/images/logo_sm2.png" border="0"></a>
			<div id="searchBlock">
                <div id="search">
                  <form method="post" action="#"
                  name="searchform">
                    <input type="text" class="searchbox"
                    name="Search" value="SEARCH" />
                    <input type="image"
                    src="/wordpress/wp-content/themes/bwac_wp_theme/images/button_search_blank.gif"
                    class="searchboxSubmit" value="" />
                  </form>
                </div>
              </div>
              
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2><div style="clear:both"></div>
			<!--div class='site-branding-divider'></div>
			<div class='site-branding-divider-bottom'></div-->
		</div>
<a class="toggleMenu" href="#">Menu</a>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!--button class="menu-toggle"><?php _e( 'Primary Menu', 'bwac_wp_theme' ); ?></button-->
			
            <!--div class="toggleMenu">Menu</div-->
			<div class="navigationWrapper">
			<?php wp_nav_menu( array( 
    			'theme_location' => 'primary',
    			'menu_class' => 'nav', //Adding the class for the menu
    			
    			));
			?>
			<?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
           </div>
		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->
<script>
var ww = document.body.clientWidth;


jQuery(document).ready(function($) {
	$(".nav li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("parent");
		};
	})
	
	$(".toggleMenu").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("active");
		$(".nav").toggle();
	});
	var adjustMenu = function() {
	if (ww < 884) {
		$(".toggleMenu").css("display", "inline-block");
		if (!$(".toggleMenu").hasClass("active")) {
			$(".nav").hide();
		} else {
			$(".nav").show();
		}
		$(".nav li").unbind('mouseenter mouseleave');
		$(".nav li a.parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 884) {
		$(".toggleMenu").css("display", "none");
		$(".nav").show();
		$(".nav li").removeClass("hover");
		$(".nav li a").unbind('click');
		$(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
}
	jQuery(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});
	adjustMenu();

})


</script>
	<div id="content" class="site-content">
