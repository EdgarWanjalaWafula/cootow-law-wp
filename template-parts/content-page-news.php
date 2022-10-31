<?php 

$data = array(
    'post_type'         =>  'post', 
    'posts_per_page'    =>  -1, 
    'orderby'           =>  'date',
    'order'             =>  'desc'
); 

$loop = new WP_QUERY($data);

if($loop){
    ?>
        <section class="theme-padding">
            <div class="container">
                <div class="row">
                    <?php 
                        while($loop->have_posts()): $loop->the_post();
                            get_template_part('template-parts/content', 'component-news-item'); 
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
    <?php
}