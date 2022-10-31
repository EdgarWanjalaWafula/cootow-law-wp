<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="practice-area-content">
        <?php 

            if(get_the_content()){
                ?>
                    <h4 class="section-heading">Description</h4>
                    <?php echo get_the_content(); ?>
                <?php
            } else {
                ?>
                    <div class="alert alert-info">
                        Content is being developed for this practice area. Please check back later. 
                    </div>
                <?php
            }

        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->