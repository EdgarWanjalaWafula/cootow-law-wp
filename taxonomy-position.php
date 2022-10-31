<?php
/**
 * The template for displaying team members associated to the slug. 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package technofin
 */

get_header();

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$tax_shorcode = basename($url); 

$terms = get_term_by('name', $tax_shorcode, 'position');

?>

	<main data-barba="container" data-barba-namespace="<?php echo $tax_shorcode; ?>" id="primary" class="site-main">
        <div class="theme-title without-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="m-0"><?php echo $terms->name; ?></h2>
                    </div>
                </div>
            </div>
        </div>
	    <?php 

        $data = array(
            'post_type'         =>  'team', 
            'posts_per_page'    => -1, 
            'position'        => $tax_shorcode, 
            'orderby'           =>  'date', 
            'order'             =>  'asc'
        );
    
        $teams = new WP_QUERY($data); 
    
        if($teams): 
            ?>
                <section class="theme-padding">
                    <div class="container">
                        <div class="row">
                            <?php 
                                while($teams->have_posts()): $teams->the_post();
                                    get_template_part('template-parts/content', 'component-team-card');
                                endwhile;
                            ?>
                        </div>
                    </div>
                </section>
            <?php 
            wp_reset_postdata(); 
        endif; 
        ?>
	</main><!-- #main -->
<?php
get_footer();
