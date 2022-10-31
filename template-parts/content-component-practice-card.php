<a data-aos="fade-up" data-aos-delay="<?php echo $args; ?>00"  class="col-lg-4 col-md-4 col-sm-6 aos-init aos-animate" href="<?php echo get_the_permalink(); ?>">
    <div class="card practice-area-card border-0 align-items-end">
        <img class="position-absolute h-100 theme-border-radius theme-obj-fit " src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : wp_get_attachment_image_url('260', 'full'); ?>" alt="">
        <div class="card-body position-relative text-white">
            <h4 class="m-0"><?php echo get_the_title(); ?></h4>
        </div>
    </div>
</a>