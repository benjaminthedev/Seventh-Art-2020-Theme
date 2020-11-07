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

<div class="slider__home">
     <div class="slider">
        <div class="slide current" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">          
                <div class="slider__text">
                    <img src="https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/type_freud.png" alt="Slider Text Test">
                </div>            
              
                <div class="slider__info">
                     Download / Stream / DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>SPECIAL MUSIC OFFER - Buy on DVD and receive Ronald Brautigam's PIANO NOTES DVD free</h4>
                </div>
            </div>
        
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                
                <!-- <div class="slider__text">
                </div> -->

                    <div class="text__content">
                        <h3>Tim Marlow With</h3>
                        <h3>Gilber & George</h3>
                    </div>


                

                <div class="slider__info">
                 Available On DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>DVD NOW HALF PRICE - Now only £6.50 (RRP £12.99)</h4>
                </div>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <div class="slider__text">
                    <img src="https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/type_freud.png" alt="Slider Text Test">
                </div>

                 <div class="slider__info">
                 Download / Stream / DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>SPECIAL MUSIC OFFER - Buy on DVD and receive Ronald Brautigam's PIANO NOTES DVD free</h4>
                </div>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <div class="slider__text">
                    <img src="https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/type_freud.png" alt="Slider Text Test">
                </div>

                <div class="slider__info">
                 Download / Stream / DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>SPECIAL MUSIC OFFER - Buy on DVD and receive Ronald Brautigam's PIANO NOTES DVD free</h4>
                </div>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <div class="slider__text">
                    <img src="https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/type_freud.png" alt="Slider Text Test">
                </div>

                <div class="slider__info">
                 Download / Stream / DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>SPECIAL MUSIC OFFER - Buy on DVD and receive Ronald Brautigam's PIANO NOTES DVD free</h4>
                </div>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <div class="slider__text">
                    <img src="https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/type_freud.png" alt="Slider Text Test">
                </div>            


                <div class="slider__info">
                    Download / Stream / DVD
                </div>
            
                <div class="woocommerce__message">
                    <h4>SPECIAL MUSIC OFFER - Buy on DVD and receive Ronald Brautigam's PIANO NOTES DVD free</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="buttons">
        <button id="prev">&lt;</button>
        <button id="next">&gt;</button>
    </div>
</div>

<br />

<?php the_field('home_view_text');?>


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

                                        <img src="<?php echo $image; ?>" alt="Seventh Art Product Categories">
							
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