<?php
/**
 * The template for displaying all offices. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cootow_&_Associates_Advocates
 */

get_header();
?>

	<main id="primary" class="site-main">
        <?php 
            get_template_part( 'template-parts/content', 'partial-pagetitle');
        ?>
        <div class="theme-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="office-contact-form">
                            <h3 class="section-heading">Get in touch</h3>
                            <?php echo do_shortcode('[contact-form-7 id="10" title="Contact form 1"]'); ?>
                        </div>
                    </div>
                    <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', get_post_type() );

                        endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
	</main><!-- #main -->

<?php
get_footer();
