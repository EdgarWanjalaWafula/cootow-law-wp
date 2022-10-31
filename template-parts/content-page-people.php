<?php 

$clientele = "position"; 

$terms = get_terms($clientele, array(
    'orderby'    	=> 'id', 
    'order'      	=> 'ASC',
    'hide_empty' 	=> 1, 
)); 

if(count($terms) > 0): 
    ?>
        <section class="position-relative theme-padding">
            <div class="container">
                <?php 
                    foreach($terms as $key=>$term){
                        ?>
                            <div class="team-row">
                                <div class="row">
                                    <h2 class="section-heading"><?php echo $term->name; ?></h2>

                                    <?php 
                                        $data = array(
                                            'post_type'         =>  'team', 
                                            'posts_per_page'    =>  -1, 
                                            'position'          =>  $term->slug, 
                                            'orderby'           =>  'date',
                                            'order'             =>  'asc'
                                        ); 

                                        $loop = new WP_QUERY($data);

                                        while($loop->have_posts()): $loop->the_post();
                                            get_template_part('template-parts/content', 'component-team-card', $term->name);
                                        endwhile;

                                        wp_reset_postdata(); 
                                    ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </section>
    <?php
endif; 