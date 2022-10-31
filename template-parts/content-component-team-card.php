<a class="col-md-3 team-card" href="<?php echo get_the_permalink(); ?>">
    <div class="card border-0 align-items-end">
        <img class="position-absolute h-100 theme-border-radius" src="<?php echo has_post_thumbnail() ? the_post_thumbnail_url() : wp_get_attachment_image_url('91', 'full'); ?>" alt="">
        <div class="card-body position-relative text-white">
            <h4><?php echo get_the_title(); ?></h4>
            <span class="small"><?php echo get_field('role'); ?></span>
        </div>
    </div>
</a>