<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


	<div class="product__wrapper">
		<div class="product__woo">

	<div class="product__customInfo">
       
	   <div class="product__imageWrap">
	   	    <img src="<?php the_field('product_image_one'); ?>" class="product__firstImage" />        
        	<img src="<?php the_field('product_image_two'); ?>" />
			<img src="<?php the_field('product_image_three'); ?>" />
		</div>
		
		<div class="product__youtube">
			<?php the_field('video_pop_up'); ?>
		<button class="youtube__close">Close Video</button>

		</div>


		<?php the_content(); ?>
		
		<!-- Flexible Content -->

		
	<?php
		
		if( have_rows('content') ):

										// loop through the rows of data
										while ( have_rows('content') ) : the_row();

												if( get_row_layout() == 'content_info' ):?>
												<div class="info-text">
													<?php if( get_row_layout('title') ): ?>
														<p><strong><?php the_sub_field('title'); ?></strong></p>
													<?php endif; ?>	

													 <?php if( get_row_layout('running_time') ): ?>
														<p>Running Time: <?php the_sub_field('running_time'); ?></p>
													<?php endif; ?>	
												
													<?php if( get_row_layout('subtitles') ): ?>
														<p><strong>DVD has these subtitles</strong>: <?php the_sub_field('subtitles'); ?></p>
													<?php endif; ?>	

													<?php if( get_row_layout('extra_info') ): ?>	
														<p><?php the_sub_field('extra_info'); ?></p>	
													<?php endif; ?>	
												</div>
												<?php 

												endif;

										endwhile;

								else :

										// no layouts found

								endif;

								?>

						
     
	</div><!-- end product__customInfo -->



<div id="main__productWrap product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>



	<br />

		<div class="woo__buyingGuide">

		<?php if( get_field('download') ): ?>
			<h4>BUYING GUIDE:</h4>
			<h4>Download</h4>
			<p><?php the_field('download'); ?></p>
		<?php endif; ?>

			<?php if( get_field('stream') ): ?>
			<h4>Stream</h4>
			

			
			<p><?php the_field('stream'); ?></p>
			<?php endif; ?>
			
			<?php if( get_field('dvd') ): ?>
			 <h4>DVD</h4>
			 <p><?php the_field('dvd'); ?></p>
			<?php endif; ?>

			<?php //the_field('content'); ?>
			<p><?php //the_field('excerpt'); ?></p>
			<p><?php //the_field('media_type'); ?> </p>
			<p><?php //the_field('price_from'); ?> </p>
		</div>
	</div>
</div>
</div><!-- end product__woo -->

	

<div class="woo__upsell">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>	




<?php do_action( 'woocommerce_after_single_product' ); ?>

</div><!-- end product__wrapper -->


<script>
	const link_kill = document.querySelectorAll('.single-product td label a');

	link_kill.forEach(function (link_kill) {
		link_kill.removeAttribute("href");
	});
</script>