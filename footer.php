<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cootow_&_Associates_Advocates
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<h6>The Firm</h6>
					<?php 
						wp_nav_menu(array(
							'theme_location'	=> 'menu-4'
						));
					?>
				</div>
				<div class="col">
					<h6>People</h6>
					<?php footer_terms('position'); ?>
				</div>
				<div class="col-md-3">
					<h6>Practice Areas</h6>
					<?php footer_post_type('practice-areas'); ?>
				</div>
				<div class="col-md-3">
					<h6>Latest News</h6>
					<?php footer_post_type('post'); ?>
				</div>
				<div class="col">
					<h6>Offices</h6>
					<?php footer_post_type('office'); ?>
				</div>
			</div>
			<div class="row footer-row-bottom small align-items-center">
				<div class="col-md-4">
					<?php echo get_custom_logo(); ?>
				</div>
				<div class="col">
				</div>
				<div class="col text-end">
					<p class="m-0">&copy; <?php echo date('Y'); ?> Cootow Advocates. All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
 
<?php wp_footer(); ?>
</body>
</html>
