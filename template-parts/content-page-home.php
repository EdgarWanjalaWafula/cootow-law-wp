<?php 
    
    $home_banner = get_field('home_banner'); 

    if($home_banner){
        ?>
            <section class="position-relative home-banner">
                <div class="banner-carousel theme-carousel owl-theme owl-carousel">
                    <?php 
                        $banners = $home_banner['banner_items'];

                        if($banners){
                            foreach($banners as $key=>$banner){
                                ?>
                                        <div class="banner-slider position-relative d-flex align-items-center h-100">
                                            <img class="position-absolute w-100 h-100 theme-obj-fit" src="<?php echo $banner['background_image']; ?>" alt="">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-8 text-white">
                                                        <h1 class=""><?php echo $banner['heading']; ?></h1>
                                                        <a href="<?php echo $banner['page_cta']; ?>" class="btn theme-button text-white btn-sm d-flex align-items-center">Read more <i class="bi bi-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </section>
        <?php

        // Cases 
        $latest_cases = array(
            'post_type' => 'cases-briefs', 
            'posts_per_page'    => 2, 
            'orderby'   => 'date', 
            'order'     => 'asc'
        );

        $cases = new WP_QUERY($latest_cases); 

        if($cases){
            ?>
                <section class="latest-cases position-relative theme-padding">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <h1 data-aos="fade-in" class="section-title position-relative aos-animate section-heading">Landmark briefings</h1>
                            </div>
                            <div class="col">
                                <div class="card-group">
                                    <?php 

                                        $i = 1; 
                                        while($cases->have_posts()): 
                                            $cases->the_post();
                                            get_template_part('template-parts/content', 'component-deals-cases', $i++);
                                        endwhile; 

                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php   
        }

        $home_about = get_field('about_the_firm');
        
        if($home_about){
            ?>
                <section class="home-about theme-padding position-relative">
                    <img data-aos="fade-in" data-aos-delay="50" class="h-100 theme-obj-fit aos-animate" src="<?php echo $home_about['background_image']; ?>" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 position-relative">
                                <span data-aos="fade-in" data-aos-delay="50" class="text-uppercase small aos-animate"><?php echo $home_about['tag_line']; ?></span>
                                <h1 data-aos="fade-in" data-aos-delay="250" class="section-heading aos-animate"><?php echo $home_about['heading']; ?></h1>
                                <div data-aos="fade-in" data-aos-delay="450" class="about-firm-p text-justify aos-animate">
                                    <?php echo $home_about['content']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
        }

        // Practice Areas 
        $practice_areas = array(
            'post_type'         => 'practice-areas', 
            'posts_per_page'    => 6, 
            'orderby'           => 'name',
            'order'           => 'asc'
        );

        $query = new WP_QUERY($practice_areas); 

        if($query){
            ?>
                <section class="practice-areas position-relative theme-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <h1 class="section-heading">Practice Areas</h1>
                                <p class="section-desc"> One stop shop for all legal services</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php 
                                $i = 0; 
                                while($query->have_posts()): 
                                    $query->the_post();
                                    $i++;

                                    get_template_part('template-parts/content', 'component-practice-card', $i); 
                                endwhile; 

                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </section>
            <?php   
        }

        // Offices
        $offices = array(
            'post_type'         => 'office', 
            'posts_per_page'    => 6, 
            'orderby'           => 'name',
            'order'           => 'asc'
        );

        $query = new WP_QUERY($offices); 

        if($query){
            ?>
                <section class="home-offices position-relative theme-padding">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <h1 class="section-heading">Our Offices</h1>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <?php 
                                        while($query->have_posts()): 
                                            $query->the_post();
                                            ?>
                                                <a href="<?php echo the_permalink(); ?>" class="col">
                                                    <div class="card office-card border-0">
                                                        <?php 
                                                            the_post_thumbnail('full', array(
                                                                'alt' => the_title_attribute(
                                                                    array(
                                                                        'echo' => false,
                                                                    )
                                                                ),
                                                                'class' => 'position-absolute h-100 theme-border-radius theme-obj-fit '
                                                            ));
                                                        ?>
                                                        <div class="card-body d-flex align-items-center justify-content-center text-white">
                                                            <h3><i class="bi bi-geo-alt-fill"></i>&nbsp;<?php echo get_the_title(); ?></h3>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php
                                        endwhile; 

                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php   
        }
    }