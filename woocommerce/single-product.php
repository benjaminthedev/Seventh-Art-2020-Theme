<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<!-- Para section -->
<?php if( get_field('parallax_image') ): ?>
	<div class="parallax__single"  style="background-image: url(<?php the_field('parallax_image'); ?>);"></div>
<?php endif; ?>

<style>

.parallax__single {
    width: 99.1vw;
    background-size: contain;
    background-repeat: no-repeat;
	min-height: 60vh;
}

nav.woocommerce-breadcrumb {
    display: none;
}

figure.woocommerce-product-gallery__wrapper,
a.woocommerce-product-gallery__trigger,
.product_meta,
.woocommerce-tabs.wc-tabs-wrapper {
    display: none;
}

p.price{
    display: none;
}

.product_meta{
    dislay: none;
}


/* Layout */

.product__woo {
    display: flex;
    width: 95vw;
    margin: 0 auto;
}

.product__wrapper {
    /* background: green; */
}

.product__customInfo {
	/* background: yellow; */
	width: 70vw;
	padding-right: 40px;
}

.product {
    /* background: blue; */
    display: flex;
	flex-direction: column;
	width: 30vw;
}

tr {
    height: 200px;
    border: 1px solid #444;
    padding: 20px;
    margin: 10px 0;
}


.product__imageWrap {
    display: flex;
}

.product__imageWrap img{
    width:14vw;
    margin: 0 14px
}

img.product__firstImage{
    margin-left: 0px;
}

.single-product .product__woo  h1.product_title.entry-title {
    display: none;
}

section.up-sells.upsells.products {
    display: flex;
    flex-direction: column;
    background: pink;
    width: 50vw;
}

section.up-sells.upsells.products > ul.products.columns-4  {
    background:#af1919;
    width:50vw;
}


section.up-sells.upsells.products > ul.products li{
    width: 8vw;
    margin: 0px;
    padding: 0px;
    background: #af1919;
    color: #fff;
    
}

section.related.products {
    display: none;
}




</style>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	


		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; // end of the loop. ?>
		



		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			//do_action( 'woocommerce_sidebar' );
		?>
    		



<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */