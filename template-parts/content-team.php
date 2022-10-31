<article id="post-<?php the_ID(); ?>" <?php post_class('theme-padding'); ?>>
    <div class="container">
        <div class="row">
            <?php 
                $profile_sections = get_field('profile_tabs');

                if($profile_sections){
                    ?>
                        <div class="col-md-4 position-relative">
                            <div class="team-profile position-sticky">
                                <?php 
                                    the_post_thumbnail(); 
                                ?>

                                <div class="team-meta">
                                    <h2 class="section-heading"><?php echo get_the_title(); ?></h2>
                                    <?php 
                                        if(get_field('position')){
                                            ?>
                                                <div class="d-flex align-items-center">
                                                    <span class="d-flex">
                                                        <i class="bi bi-bank2"></i>
                                                        <?php echo get_field('role'); ?>,
                                                        <?php echo get_field('position'); ?>
                                                    </span>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                                        <div class="team-content-nav">
                                        <div class="team-profile-nav position-sticky">
                                <ul class="">
                                    <li><a class="text-white small">Navigate to:</a></li>
                                    <?php

                                        foreach($profile_sections as $link){
                                            ?>
                                                <li>
                                                    <a class="text-white small text-capitalise" target="<?php echo strtolower(str_replace(" ", "-", $link['section_title'])); ?>"><?php echo $link['section_title']; ?></a>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="team-content-container">
                                <?php 
                                    foreach($profile_sections as $key=>$content){
                                        ?>
                                            <div id="<?php echo strtolower(str_replace(" ", "-", $content['section_title'])); ?>" class="profile-content">
                                                <h4><?php echo $content['section_title']; ?></h4>
                                                <?php echo $content['section_content']; ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                                        </div>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="col-md-4">
                            <div class="alert alert-info">
                                Content for this advocate is being developed. Please check back later. 
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->