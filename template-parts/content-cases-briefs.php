<?php
/**
 * Template part for displaying deals and cases. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cootow_&_Associates_Advocates
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="case-content">
        <?php

            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cootow-associates-advocates' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cootow-associates-advocates' ),
                    'after'  => '</div>',
                )
            );
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->