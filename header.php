<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seventh_Art_2020
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    
<!-- Standard Favicon -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141717600-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141717600-1');
</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'seventhart' ); ?></a>

	<header id="masthead" class="site-header">

	<div class="header__wrap">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$seventhart_description = get_bloginfo( 'description', 'display' );
			if ( $seventhart_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $seventhart_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'seventhart' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		</div><!-- end header__wrap -->

		<div class="search__popUp">
			<?php //echo do_shortcode('[woocommerce_product_search]'); ?>
		</div>

		<!-- Search Form -->
		<div id="search__box" > 
			<span class="close">X</span>
			<div class="search__section">
					<?php echo do_shortcode('[woocommerce_product_search]'); ?>
			</div>
			
			<!-- <form role="search" id="searchform" action="/search" method="get">
				<input value="" name="q" type="search" placeholder="type to search"/>
			</form> -->
		</div>




	</header><!-- #masthead -->

	<script>
	console.log('Working?');

	const searchClicked = document.querySelector('li.search');
	const findDiv = document.getElementById('search__box');
	const closeBtn = document.querySelector('.close');
		  

	searchClicked.addEventListener("click", function(){
		findDiv.classList.add('open');
	});
	closeBtn.addEventListener("click", function(){
		findDiv.classList.remove('open');
	});



// $(document).ready(function(){
// 	console.log('ddd');
// 	$('a[href="#search"]').on('click', function(event) {                    
// 		$('#search').addClass('open');
// 		$('#search > form > input[type="search"]').focus();
// 	});            
// 	$('#search, #search button.close').on('click keyup', function(event) {
// 		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
// 			$(this).removeClass('open');
// 		}
// 	});            
// });

	</script>