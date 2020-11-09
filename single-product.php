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

<?php if( get_field('parallax_image') ): ?>
	<div class="parallax__single"  style="background-image: url(<?php the_field('parallax_image'); ?>);"></div>
<?php endif; ?>



<style>
.parallax__single {
    width: 100vw;
    background-size: contain;
    background-repeat: no-repeat;
    height: 85vh;
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
        <h1>yoyo</h1>


        <?php the_field('product_image_one'); ?>
        <?php the_field('product_image_two'); ?>
        <?php the_field('content'); ?>
        <?php the_field('dvd'); ?>

        <?php the_field('download'); ?>
        <?php the_field('stream'); ?>
        <?php the_field('excerpt'); ?>
        <?php the_field('media_type'); ?> 
        <?php the_field('price_from'); ?> 

        



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
		do_action( 'woocommerce_sidebar' );
	?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */