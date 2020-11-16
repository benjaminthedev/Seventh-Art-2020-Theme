<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */?>

<?php if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>">

	<?php
		// get the current taxonomy term
		$term = get_queried_object();

		// vars
		$image = get_field('parallax_image', $term);
		$paraText = get_field('parallax_text', $term);
		$paraTextImg = get_field('parallax_text_image', $term);
		$paraResponsive = get_field('parallax_image_responsive', $term);
	?>

	<div class="productCat__image">	
		<?php if( $image ): ?>
			<div class="parallax pro-cat-page"  style="background-image: url(<?php echo $image; ?>);">
			
				<!-- <?php //if( $paraText ): ?>
					<div class="para__textWrap">
						<p>this is where the text goes</p>
					</div>
				<?php //endif; ?>	 -->

				<?php if( $paraTextImg ): ?>
					<div class="para__imageWrap">
						<img src="<?php echo $paraTextImg ?>" alt="This is a para Text" class="para__image"/>
					</div>
				<?php endif; ?>					


			
			</div><!-- end parallax pro-cat-page -->
		<?php endif; ?>
	</div>	 


	<div class="productCat__imageResponsive">
		<?php if( $paraResponsive ): ?>
			<div class="parallax_image_responsive"  style="background-image: url(<?php echo $paraResponsive; ?>);">
		
				<!-- <?php //if( $paraText ): ?>
					<div class="para__textWrap">
						<p>this is where the text goes</p>
					</div>
				<?php //endif; ?>	 -->

				<?php if( $paraTextImg ): ?>
					<div class="para__imageWrap">
						<img src="<?php echo $paraTextImg ?>" alt="This is a para Text" class="para__image"/>
					</div>
				<?php endif; ?>	
		
			</div><!-- end parallax pro-cat-page responsive -->
		<?php endif; ?>
	</div>

	<style>
		/* Temp Styles! */
	@media only screen and (max-width: 600px) {
		/* body.exhibition-on-screen-2 {
			background-color: lightblue !important;
		} */

		/* .parallax_image_responsive {
			width: 92vw;
			height: 44vh;
			background-repeat: no-repeat;
			background-size: contain;
		} */

		.exhibition-on-screen-2 .productCat__image {
			display: none;
		}
	}
	</style>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' ); ?>
