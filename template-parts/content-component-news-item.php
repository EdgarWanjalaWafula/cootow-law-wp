<?php
/**
 * Template part for displaying news content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cootow_&_Associates_Advocates
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news-row'); ?>>
    <div class="row">
        <div class="col-md-5">
            <div class="position-relative h-100">
                <img class="position-absolute h-100 theme-border-radius theme-obj-fit" src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : wp_get_attachment_image_url('41', 'full'); ?>" alt="">
            </div>
        </div>
        <div class="col">
            <div class="news-content">
                <a href="<?php echo get_the_permalink(); ?>"><h4 class="section-heading"><?php echo get_the_title(); ?></h4></a>
                <p><?php echo wp_trim_words(get_the_content(), '35'); ?></p>
                <div class="d-flex justify-content-between entry-meta align-items-center">
                    <div class="">
                        <ul>
                            <li><span>News</span></li>
                            <li><?php echo get_the_date(); ?></li>
                        </ul>
                    </div><!-- .entry-meta -->
                    <a href="<?php echo get_the_permalink();?>" class="btn btn-sm d-flex align-items-center theme-button">Read more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->