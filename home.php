<?php
/**
 * Template Name: Custom Home Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seventh_Art_2020
 */

get_header();
?>








<div class="banner__home">

<?php echo do_shortcode('[rev_slider alias="slider-1"][/rev_slider]'); ?>





    <div class="welcome__text">
        <p>
            <?php the_field('home_view_text');?>
        </p>
    </div>

</div>


<?php if( have_rows('woocommerce_category_boxes') ):?>
						<ul class="woocommerce-products-cats">
								<?php // loop through the rows of data
									while ( have_rows('woocommerce_category_boxes') ) : the_row();
									

											$image = get_sub_field('image');
											$title = get_sub_field('title');
											$link = get_sub_field('link');
											
									?>
								<li class="increment">											
								
										<div id="woo-cat-image">

                                    <?php if( $link ): ?>
														<a href="<?php echo $link; ?>">
													<?php endif; ?>	    
                                        <img src="<?php echo $image; ?>" alt="Seventh Art Product Categories">
                                        	<?php if( $link ): ?>
													</a>
												<?php endif; ?>
							
											<div class="title-container">
													<?php if( $link ): ?>
														<a href="<?php echo $link; ?>">
													<?php endif; ?>	

															<?php echo $title; ?>

													<?php if( $link ): ?>
													</a>
												<?php endif; ?>

											</div>
										</div>
									
									

					
								</li>
								<?php
									endwhile;
									else :
									// no rows found?>
					</ul>
				<?php endif;?>	
									
				
					
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row end -->



<?php
get_footer();
?>




<script>


const slides = document.querySelectorAll('.slide');
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');
const auto = false; // Auto scroll
const intervalTime = 5000;
let slideInterval;

const nextSlide = () => {
    // Get current class
    const current = document.querySelector('.current');
    // Remove current class
    current.classList.remove('current');
    // Check for next slide
    if (current.nextElementSibling) {
        // Add current to next sibling
        current.nextElementSibling.classList.add('current');
    } else {
        // Add current to start
        slides[0].classList.add('current');
    }
    setTimeout(() => current.classList.remove('current'));
};

const prevSlide = () => {
    // Get current class
    const current = document.querySelector('.current');
    // Remove current class
    current.classList.remove('current');
    // Check for prev slide
    if (current.previousElementSibling) {
        // Add current to prev sibling
        current.previousElementSibling.classList.add('current');
    } else {
        // Add current to last
        slides[slides.length - 1].classList.add('current');
    }
    setTimeout(() => current.classList.remove('current'));
};

// Button events
next.addEventListener('click', e => {
    nextSlide();
    if (auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});

prev.addEventListener('click', e => {
    prevSlide();
    if (auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});

// Auto slide
if (auto) {
    // Run next slide at interval time
    slideInterval = setInterval(nextSlide, intervalTime);
}



</script>