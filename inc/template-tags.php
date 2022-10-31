<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cootow_&_Associates_Advocates
 */

if ( ! function_exists( 'cootow_associates_advocates_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function cootow_associates_advocates_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'cootow-associates-advocates' ),
			'<a class="small" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cootow_associates_advocates_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function cootow_associates_advocates_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cootow-associates-advocates' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'cootow_associates_advocates_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function cootow_associates_advocates_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cootow-associates-advocates' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cootow-associates-advocates' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cootow-associates-advocates' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cootow-associates-advocates' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cootow-associates-advocates' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'cootow-associates-advocates' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'cootow_associates_advocates_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function cootow_associates_advocates_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if(!function_exists('footer_terms')){
	function footer_terms($tax){
		$terms = get_terms($tax, array(
			'orderby'    	=> 'name', 
			'order'      	=> 'ASC',
			'hide_empty' 	=> 1, 
		)); 
		
		if(count($terms) > 0):
			?>
				<ul>
					<?php 
						foreach($terms as $term):
							?>
								<li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
							<?php
						endforeach;
					?>
				</ul>
			<?php
		endif;
	}
}

if(!function_exists('footer_post_type')){
	function footer_post_type($post_type){

		$data = array(
			'post_type'         =>  $post_type, 
			'posts_per_page'    =>  -1, 
			'orderby'           =>  'date',
			'order'             =>  'desc'
		); 

		$loop = new WP_QUERY($data);

		if($loop){
			?>
				<ul>
					<?php 
						while($loop->have_posts()): $loop->the_post();
							?>
								<li><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
							<?php
						endwhile;
					?>
				</ul>
			<?php 
		}
		wp_reset_postdata(); 
	}
}

// Menu Shortcodes
function practice_areas(){
	$practices = array(
		'post_type'         => 'practice-areas', 
		'posts_per_page'    => -1, 
		'orderby'           => 'name',
		'order'           	=> 'asc'
	);

	$practice = new WP_QUERY($practices); 

	if($practice){
		$output = "";
		$output .= "<div class='custom-mega-menu'>";
			while($practice->have_posts()): $practice->the_post();
				$output .= '<a href='.get_the_permalink().'>'.get_the_title().'</a>';
			endwhile;
		$output .= "</div";

		wp_reset_postdata();

		return $output;
	}
}

add_shortcode('practice-areas-sc','practice_areas'); 

// Show practice areas on single page 
function showpracticeareas(){
	$pareas = array(
		'post_type'         => 	'practice-areas',
		'orderby'		    =>  'name', 
		'order'			    => 	'asc',
		'posts_per_page'    => '4'
	);

	$return = '<ul class="list-unstyled">';

	$loop = new WP_QUERY($pareas);
	
	while($loop->have_posts()): $loop->the_post(); 
		$return .= '<li><a href="';
		$return .= get_the_permalink();
		$return .= '">';
		$return .= get_the_title();
		$return .= '</a></li> '; 
	endwhile; 

	$return .= '</ul>';

	return $return; 
}

add_shortcode('practice-areas-list', 'showpracticeareas'); 


// Show practice areas on single page 
function show_briefs(){
	$pareas = array(
		'post_type'         => 	'cases-briefs',
		'orderby'		    =>  'name', 
		'order'			    => 	'asc', 
		'posts_per_page'    => '4'
	);

	$return = '<ul class="list-unstyled">';

	$loop = new WP_QUERY($pareas);
	
	while($loop->have_posts()): $loop->the_post(); 
		$return .= '<li><a href="';
		$return .= get_the_permalink();
		$return .= '">';
		$return .= get_the_title();
		$return .= '</a></li> '; 
	endwhile; 

	$return .= '</ul>';

	return $return; 
}

add_shortcode('cases-briefs-list', 'show_briefs'); 

function practice_areas_contact_form(){
	$arr = array(
		'post_type'         => 	'practice-areas',
		'orderby'		    =>  'name', 
		'order'			    => 	'asc'
	);

	$select = new WP_QUERY($arr);

	$output = '';

	if($select){
		$output .= '<select name="" class="form-control">';
		$output .= '<option selected disabled>--Select practice area--</option>';
			while($select->have_posts()): $select->the_post();
				$output .= '<option value="'.get_the_title().'">'.get_the_title().'</option>';
			endwhile;
		$output .= '<\select>';
	}

	wp_reset_postdata();

	return $output;
}

add_shortcode('show-practice-areas-contactform', 'practice_areas_contact_form');

function menu_practice_areas(){
	$arr = array(
		'post_type'         => 	'practice-areas',
		'posts_per_page'    =>  -1, 
		'orderby'		    =>  'name', 
		'order'			    => 	'asc'
	);

	$loop = new WP_QUERY($arr);

	$output = '';

	if($loop){
		$output .= '<div class="position-relative menu-container">';
			$output .= '<img class="menu-panel-bg position-absolute h-100" src="'.wp_get_attachment_image_url('223', 'full').'">';
			$output .= '<div class="container">';
				$output .= '<div class="row justify-content-end">';
					$output .= '<div class="col-md-7">';
					$output .= '<div class="theme-padding">';
						$output .= '<div class="row">';
							while($loop->have_posts()): $loop->the_post();
								$output .= '<div class="col-md-6">';
									$output .= '<a href="'.get_the_permalink().'" class="d-flex align-items-center">';
										$output .= '<i class="bi bi-chevron-right"></i>';
										$output .= '<span>'.get_the_title().'</span>';
									$output .= '</a>';
								$output .= '</div>';
							endwhile;
						$output .= '</div>';
						$output .= '<div class="row">';
						$output .= '<div class="col-md-12 menu-cta-row">';
							$output .= '<a class="btn btn-sm d-flex align-items-center theme-button text-white border-0" href="'.home_url('practices').'">All practice areas <i class="bi bi-arrow-right"></i></a>';
						$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	}

	wp_reset_postdata();

	return $output;
}

add_shortcode('show-practice-areas-menu', 'menu_practice_areas');

function menu_people(){
	$tax = "position"; 

	$terms = get_terms($tax, array(
		'orderby'    	=> 'id', 
		'order'      	=> 'ASC',
		'hide_empty' 	=> 1, 
	)); 

	$return = '';

	if($terms){
		$return .= '<div class="position-relative menu-container people-menu">';
			$return .= '<img class="menu-panel-bg position-absolute h-100" src="'.wp_get_attachment_image_url('133', 'full').'">';
			$return .= '<div class="container">';
				$return .= '<div class="row justify-content-end">';
					$return .= '<div class="col-md-7">';
						$return .= '<div class="theme-padding"><ul class="positions-list position-relative row">';
							foreach($terms as $position){
								$link = get_term_link($position);
								$return .= '<li class="position-relative col">';
									$return .= '<a class="d-flex align-items-center justify-content-between" href="'.$link.'">';
										$return .= '<h4>'.$position->name.'</h4>'; 
									$return .= '</a>';

									$return .= '<ul>';
										$data = array(
											'post_type'         =>  'team', 
											'posts_per_page'    =>  -1, 
											'position'          =>  $position->slug, 
											'orderby'           =>  'date',
											'order'             =>  'asc'
										); 

										$team = new WP_QUERY($data);

										while($team->have_posts()): $team->the_post();
											$return .= '<li class="position-relative">';
												$return .= '<a class="d-flex align-items-center" href="'.get_the_permalink().'">';
													$return .= '<i class="bi bi-chevron-right"></i>';
													$return .= get_the_title();
												$return .= '</a>';
											$return .= '</li>';
										endwhile;
									$return .= '</ul>';
								$return .= '</li>';
							}
						$return .= '</ul>';
						$return .= '<div class="row">';
						$return .= '<div class="col-md-12 menu-cta-row">';
							$return .= '<a class="btn btn-sm d-flex align-items-center theme-button text-white border-0" href="'.home_url('people').'">All team members <i class="bi bi-arrow-right"></i></a>';
						$return .= '</div>';
					$return .= '</div>';
					$return .= '</div>';
					$return .= '</div>';
				$return .= '</div>';
			$return .= '</div>';
		$return .= '</div>';
	}

	wp_reset_postdata();
	return $return;
}

add_shortcode('show-team-positions', 'menu_people');