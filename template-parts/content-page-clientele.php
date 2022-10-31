<?php 

$clientele = "industry"; 

$terms = get_terms($clientele, array(
    'orderby'    	=> 'name', 
    'order'      	=> 'ASC',
    'hide_empty' 	=> 1, 
)); 

if(count($terms) > 0): 
    ?>
        <section class="position-relative theme-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="accordion border-0" id="accordionExample">
                            <?php
                                $key=0;
                                foreach($terms as $term):
                                    $key++;
                                    ?>
                                          <div class="accordion-item ">
                                            <h2 class="accordion-header" id="heading<?php echo $term->slug; ?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $term->slug; ?>" aria-expanded="<?php echo $key == 1 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $term->slug; ?>">
                                                <?php echo $term->name; ?>
                                            </button>
                                            </h2>
                                            <div id="collapse<?php echo $term->slug; ?>" class="accordion-collapse collapse <?php echo $key == 1 ? 'show' : null; ?>" aria-labelledby="heading<?php echo $term->slug; ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="row align-items-start">
                                                        <?php 
                                                            $data = array(
                                                                'post_type'         =>  'clientele', 
                                                                'posts_per_page'    =>  -1, 
                                                                'industry'          =>  $term->slug, 
                                                                'orderby'           =>  'date',
                                                                'order'             =>  'desc'
                                                            ); 

                                                            $loop = new WP_QUERY($data);

                                                            while($loop->have_posts()): $loop->the_post();
                                                                ?>
                                                                    <li class="col-md-4 position-relative"><?php echo get_the_title(); ?></li>
                                                                <?php
                                                            endwhile;

                                                            wp_reset_postdata(); 
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
endif; 