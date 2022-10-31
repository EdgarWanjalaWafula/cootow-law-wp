<a href="<?php echo get_the_permalink(); ?>" data-aos="fade-up" data-aos-delay="<?php echo $args; ?>00" class="card case-card aos-animate">
    <div class="card-body">
        <h5 class="card-title"><?php echo get_the_title(); ?></h5>
        <p class="m-0"><?php echo wp_trim_words(get_the_content(), '20'); ?></p>
    </div>
    <div class="card-footer bg-transparent border-0 pt-0">
        <button class="btn btn-sm d-flex align-items-center theme-button">Read more <i class="bi bi-arrow-right"></i></button>
    </div>
</a>