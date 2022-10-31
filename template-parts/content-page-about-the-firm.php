<?php 

    $about_cootow = get_field('about_the_firm');
    $advoc_membership = get_field('adhoc_membership');
    $values = get_field('values');

    if($about_cootow){
        ?>
            <div class="about-the-firm theme-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h1 class="section-heading"><?php echo $about_cootow['section_heading']; ?></h1>
                            <?php echo $about_cootow['content']; ?>
                        </div>
                        <div class="col">
                            <div class="row links-grid">
                                <?php 
                                    $links_grid = $about_cootow['related_pages_grid']; 

                                    if($links_grid){
                                        foreach($links_grid as $grid){
                                            ?>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <a href="<?php echo $grid['page_link']; ?>" class="grid-card card align-items-end border-0 position-relative">
                                                        <img class="position-absolute h-100 theme-border-radius theme-obj-fit" src="<?php echo $grid['background_image'] ? $grid['background_image'] : wp_get_attachment_image_url('91', 'thumbnail'); ?>" alt="">
                                                        <div class="card-body position-relative text-white">
                                                            <h5 class="m-0"><?php echo $grid['title']; ?></h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php   
    }

    if($values){
        ?>
            <div class="values theme-padding text-white">
                <div class="container">
                    <?php 
                        $tabs = $values['values'];

                        if($tabs){
                            ?>
                                <div class="row">
                                    <div class="nav flex-column nav-pills col-md-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <?php 
                                            foreach($tabs as $key=>$heading){
                                                ?>
                                                    <button class="nav-link <?php echo $key == 0 ? 'active' : null; ?>" id="v-pills-<?php echo $key; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $key; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $key; ?>" aria-selected="true"><h5 class="m-0 d-flex justify-content-between"><?php echo $heading['heading']; ?><i class="bi bi-chevron-right"></i></h5></button>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <?php 
                                                foreach($tabs as $key=>$content){
                                                    ?>
                                                        <div class="tab-pane fade <?php echo $key == 0 ? 'show active' : null; ?>" id="v-pills-<?php echo $key; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $key; ?>-tab">
                                                            <div class="text-white">
                                                                <?php echo $content['content']; ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        <?php
    }

    if($advoc_membership){
        ?>
            <div class="advoc-membership theme-padding">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h1><?php echo $advoc_membership['heading']; ?></h1>
                            <?php echo $advoc_membership['content']; ?>
                        </div>
                        <div class="col offset-1">
                            <img src="<?php echo $advoc_membership['adhoc_logo']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }