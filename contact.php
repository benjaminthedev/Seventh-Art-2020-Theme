<?php
/**
 * Template Name: Contact Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Seventh_Art_2020
 */

get_header();
?>

	<main id="primary" class="site-main">

    <div class="about__wrapper">

    <img src="https://www.seventh-art.com/wp-content/uploads/2019/06/About-US.jpg" class="about__banner" />

        <div class="about__left">
            
            <?php
                if( have_rows('left_content') ):
                    // loop through the rows of data
                    while ( have_rows('left_content') ) : the_row();
                        if( get_row_layout() == 'left_content' ):?>
                            <h2><?php the_sub_field('heading');?></h2>
                        <?php the_sub_field('content_left');
                        endif;
                    endwhile;
                else :
                endif;
            ?>
        
        </div>

        <div class="about__right">
                <?php
                if( have_rows('right_content') ):
                    // loop through the rows of data
                    while ( have_rows('right_content') ) : the_row();
                        if( get_row_layout() == 'right_content' ):?>
                            <h2><?php the_sub_field('heading');?></h2>
                        <?php the_sub_field('right_content');
                        endif;
                    endwhile;
                else :
                endif;
            ?>
        </div>    

    </div>
    
    </main><!-- #main -->
    

    <style>

    .about__wrapper {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }         
    
    .about__banner{
        width: 100vw;
    }

    .about__left,
    .about__right {
        width: 49vw;
        padding: 40px;
    }

    @media (max-width: 575.98px) {

    .about__left,
    .about__right {
        width: 100vw;
        padding: 40px;
    }


    }
    @media (min-width: 576px) and (max-width: 767.98px) {
    .about__left,
    .about__right {
        width: 100vw;
        padding: 40px;
    }        
     }
    @media (min-width: 768px) and (max-width: 991.98px) {
        .about__left,
        .about__right {
            width: 100vw;
            padding: 40px;
        }        
    }    


    </style>

<?php
get_footer();
