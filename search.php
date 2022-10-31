<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cootow_&_Associates_Advocates
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header search-results-header">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">
								<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'cootow-associates-advocates' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h2>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->
			<div class="theme-padding">
			<div class="container">
				<div class="row">
					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();
					?>
				</div>
			</div>
			</div>

			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
