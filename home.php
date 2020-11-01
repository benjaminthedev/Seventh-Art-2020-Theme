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
                <h1>Slide One</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <h1>Slide Two</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <h1>Slide Three</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <h1>Slide Four</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <h1>Slide Five</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
        <div class="slide" style="background: url(https://wordpress-293167-1568393.cloudwaysapps.com/wp-content/uploads/2020/11/Header_freud.jpg) no-repeat
    center center/cover">
            <div class="content">
                <h1>Slide Six</h1>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                    maxime, voluptatibus labore doloremque vero!
                </p>
            </div>
        </div>
    </div>
    <div class="buttons">
        <button id="prev">&lt;</button>
        <button id="next">&gt;</button>
    </div>
</div>



<br />
<h1>this is the banner home page</h1>
</div>








<h1>This is the home page</h1>

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