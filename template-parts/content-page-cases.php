<?php 

    // Cases 
    $latest_cases = array(
        'post_type' => 'cases-briefs', 
        'posts_per_page'    => -1
    );

    $cases = new WP_QUERY($latest_cases); 

    if($cases){
        ?>
            <section class="latest-cases position-relative theme-padding">
                <div class="container">
                    <div class="row">
                        <div class="card-group">
                            <?php 
                                $c = 0; 
                                while($cases->have_posts()): 
                                    $cases->the_post();
                                    get_template_part('template-parts/content', 'component-deals-cases', $c++);

                                    
                                if($c % 3 == 0):
                                    ?>
                                        </div>
                                        <div class="my-3"></div>
                                        <div class="card-group">
                                    <?php
                                endif;
                                endwhile;

                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php   
    }