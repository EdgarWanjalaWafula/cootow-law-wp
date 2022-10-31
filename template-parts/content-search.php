<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cootow_&_Associates_Advocates
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
	<div class="card">
		<div class="card-body">
		<header class="entry-header">
			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				cootow_associates_advocates_posted_on();
				cootow_associates_advocates_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
