<div class="position-relative theme-section-title d-flex align-items-center">
    <?php       

        $img_url = "";
        if(is_singular('team')){
            $img_url = wp_get_attachment_image_url('198', 'full');
        } else {
            $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url():  wp_get_attachment_image_url('198', 'full');
        }
    ?>
    
    <img src="<?php echo $img_url; ?>" class="position-absolute w-100 h-100 theme-obj-fit" alt="">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-white position-relative">
                <?php 
                    $page_meta = get_field('page_content');
                    $page_title = "";
                    $first_letter = "";
                    
                    if($page_meta['page_title']){
                        $page_title = $page_meta['page_title'];
                    } else {
                        $page_title = get_the_title(); 
                    }

                    if(is_home(  )){
                        $page_title = 'Latest News';
                    }

                    $arr = $page_title;
                    $arr = explode(" ",$arr);
                    $words = str_word_count($page_title);

                    if($words > 5){
                        ?>
                            <style>
                                .theme-section-title h1 {
                                    font-size:1.75rem; /* reduce font size based on the number of words. Prevent overflowing of text  */
                                }
                            </style>
                        <?php 
                    }
                ?>
                <span class="first-word"><?php echo $arr[0]; ?></span>
                <h1><?php echo $page_title; ?></h1>
                    <?php 

                    if($page_meta['page_descriptio']){
                        ?>
                            <span><?php echo $page_meta['page_descriptio']; ?></span>
                        <?php
                    }

                if('office' == get_post_type()):
                    $rows = get_field('contact_rows');

                    if($rows){
                        ?>
                <ul class="office-info">
                    <?php 
                                    foreach($rows as $row){
                                        ?>
                    <li class="text-white d-flex align-items-center">
                        <i class="bi bi-<?php echo $row['icon']; ?>"></i>
                        <span><?php echo $row['content']; ?></span>
                    </li>
                    <?php
                                    }
                                ?>
                </ul>
                <?php
                    }
                endif;
            ?>
            </div>
        </div>
    </div>
</div>