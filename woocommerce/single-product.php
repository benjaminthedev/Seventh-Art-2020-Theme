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


<div class="product__single__desktop">
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
</div>


<div class="product__reponsiveBackground">
	<?php if( get_field('parallax_image') ): ?>
		<div class="parallax__single__mobile"  style="background-image: url(<?php the_field('parallax_image'); ?>);">
			<h3 class="parallax__textNoOverLay">
				<?php the_title(); ?>
			</h3>
		</div>
	<?php endif; ?>
</div>


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

//Video Clicked
const videoTitleClicked = document.querySelector('.product__firstImage');
//Video Youtube
const video = document.querySelector('.product__youtube');
//Close Video Btn
const videoCloseBtn = document.querySelector('.youtube__close');

	//Opens The Video
	videoTitleClicked.addEventListener('click', function(event){
		console.log('Video Image Clicked');				
		video.classList.add('show__video');
	});
	//Closes The Video
	videoCloseBtn.addEventListener('click', function(event){
		console.log('Close Btn Clicked');				
		video.classList.remove('show__video');
	});

window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');

	   document.querySelectorAll('img').forEach(function(img){
  	img.unknown = function(){this.style.display='none';};
   })
});

document.addEventListener("DOMContentLoaded", function(event) {
   document.querySelectorAll('img').forEach(function(img){
  	img.unknown = function(){this.style.display='none';};
   });

   	//Country Restrictions!

	// Does this page have a restriction?
	const restricted = document.querySelectorAll('.restricted_country');
	
	// Is restricted by country?
	if(restricted.length >= 1){
		//Hide form
		const formBlocked = document.querySelectorAll('.grouped_form');
		formBlocked[0].style.display = "none";
		//Hide Buying Guide
		const guide = document.querySelectorAll('.woo__buyingGuide');
		guide[0].style.display = "none";
	}
});
</script>


<style>
img[src=""] {
  display:none;
}
   


   
p.restricted_country {
    font-size: 20px;
    font-weight: bold;
    line-height: 30px;
    text-transform: capitalize;
    width: 80%;
    background: #BF0000;
    padding: 20px;
    color: #fff;
    text-align: center;
}

label {font-weight: 700;}

b, strong {
    font-weight: 700;
}




</style>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

