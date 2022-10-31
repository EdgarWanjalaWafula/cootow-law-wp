<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cootow_&_Associates_Advocates
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<?php 
		get_template_part('template-parts/content', 'partial-searchbar'); 
		get_template_part('template-parts/content', 'partial-mobile-panel'); 
	?>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-8 col-md-3">
					<div class="site-branding">
						<?php the_custom_logo(); ?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-4 d-flex justify-content-end d-sm-block d-md-none mobile-search-toggle align-items-center">
					<i class="bi bi-search"></i>
					<div class="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="col offset-1">
					<div class="menu-row">
						<div class="menu-top-row text-uppercase d-flex justify-content-end align-items-center">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-2',
										'menu_id'        => 'primary-menu',
										'menu_class'	=> 'd-flex justify-content-end'
									)
								);
							?>
							<a href=""><i class="bi bi-linkedin"></i></a>
						</div>
						<div class="menu-bottom-row">
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
										'menu_class'	=> 'd-flex justify-content-between align-items-center'
									)
								);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
