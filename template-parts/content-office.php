<?php
/**
 * Template part for displaying office locations.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cootow_&_Associates_Advocates
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('h-100 map-container'); ?>>
    <div class="position-relative h-100">
        <?php echo get_field('map_location'); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
