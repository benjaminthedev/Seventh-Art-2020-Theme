<?php
/**
 * Template Name: FAQS Custom Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seventh_Art_2020
 */

get_header();
?>
</div>

<img src="https://www.seventh-art.com/wp-content/uploads/2019/06/Contact-Us.jpg" class="faq__banner" />


	<main id="primary" class="site-main">




	<div class="helloWorld">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div>

<style>
    h1.entry-title {
    display: none;
}
</style>

<?php
get_footer();
