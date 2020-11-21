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
	<div class="parallax__single"  style="background-image: url(<?php the_field('parallax_image'); ?>);">

	<h3 class="parallax__textNoOverLay">
		<!-- <?php //the_field('parallax_text_-_no_image_overlay') ?> -->
		<?php the_title(); ?>
	</h3>
	
	<!-- <div class="parallax__textOverlayWrapper">
		<img src="<?php //the_field('parallax_text_image_overlay')?>" class="parallax__textOverlay">
	</div>	 -->
	

	



</div>
<?php endif; ?>


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


    		

<style>
td.woo__grouped.woocommerce-grouped-product-list-item__quantity {
    display: none;
}
</style>
<script>
console.log('single products');
//Get the tr
const getTr = document.querySelectorAll('tr');

getTr.forEach(eachItem);

const checkBox = document.querySelectorAll('input.wc-grouped-product-add-to-cart-checkbox');
function eachItem(item, index){
	//Get the checkbox
	item.addEventListener("mouseenter", function( event ) {   
			console.log('Mouse Enter'); 
			checkBox[index].checked = true;
	}, false);

	item.addEventListener("mouseleave", function( event ) {   
			console.log('Mouse leave'); 
			checkBox[index].checked = false;
	}, false);
	//console.log(item);
	//console.log(index);
}

// Message when some has added to cart
const buttonClicked = document.querySelectorAll('.single_add_to_cart_button');
buttonClicked.forEach(clicked);
function clicked(item, index){
	const findItemClicked = document.querySelectorAll('.woocommerce-grouped-product-list-item__clicked');
	const findItemClickedNew = document.querySelectorAll('.woocommerce-grouped-product-list-item__clickedNew');

	item.addEventListener('click', function(event){
		console.log('Buy Now Clicked');				
		findItemClicked[index].classList.add('showMe');
		findItemClickedNew[index].classList.add('showMe');
	});
}




</script>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

