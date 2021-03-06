<?php
/**
 * Seventh Art 2020 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Seventh_Art_2020
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'seventhart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function seventhart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Seventh Art 2020, use a find and replace
		 * to change 'seventhart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'seventhart', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'seventhart' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'seventhart_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'seventhart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seventhart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'seventhart_content_width', 640 );
}
add_action( 'after_setup_theme', 'seventhart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seventhart_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'seventhart' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'seventhart' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'seventhart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function seventhart_scripts() {
	wp_enqueue_style( 'seventhart-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'seventhart-style', 'rtl', 'replace' );

	wp_enqueue_style( 'wooStylesCheckout', get_stylesheet_directory_uri() . '/woo.css', array(), '1.0.0', false );

	wp_enqueue_script( 'seventhart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (is_page(8)) {
		wp_enqueue_script( 'cartJS', get_stylesheet_directory_uri() . '/js/cart.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'seventhart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//Just show grouped products - do this when you have all products grouped

add_filter( 'woocommerce_product_query_tax_query', 'only_grouped_products', 20, 1 );
function only_grouped_products( $tax_query ){

	if (is_product_category(array( 311, 47, 50, 53))) {
		
		$tax_query[] = array(
        'taxonomy'  => 'product_type',
        'field'     => 'name',
        'terms'     => array('grouped'),
    );
	return $tax_query;

	}	
}

//Removes popularity & 

function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["popularity"]);
    unset($orderby["rating"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );

//short desc

function show_subtitle() {
global $product;
$id = $product->get_id();
$excerpt = get_field('excerpt',$id);
$mediaType = get_field('media_type',$id);
$pricesFrom = get_field('price_from',$id);
	
	
    if ( $excerpt ) { 
		echo '
		<?php if( get_field($excerpt) ): ?>
			<div class="woo__excerpt"><p>'.$excerpt.'<p></span>
		<?php endif; ?>
		';
    }
	
	if ( $mediaType || $pricesFrom ) { 
		echo '
		
		<div class="woo_mediaType__pricesFrom__wrapper">
		
		<?php if( $mediaType ): ?>
			<div class="woo__mediaType">'.$mediaType.'</div>
		<?php endif; ?>	

		<?php if( $pricesFrom ): ?>
			<div class="woo__pricesFrom">From £'.$pricesFrom.'</div>
		<?php endif; ?>				
		</div>

		';
    }

}
add_action('woocommerce_after_shop_loop_item_title', 'show_subtitle', 1 );

function cw_remove_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'cw_remove_quantity_fields', 10, 2 );



add_action( 'woocommerce_no_products_found', function(){
    remove_action( 'woocommerce_no_products_found', 'wc_no_products_found', 10 );

    // HERE change your message below
    $message = __( 'Sorry no products were found matching your search. Please try again.', 'woocommerce' );

    echo '<p class="woocommerce-info">' . $message .'</p>';
}, 9 );