<div class="mobile-panel position-fixed h-100 w-100">
    <i class="bi bi-x text-danger close-menu"></i>
    <?php get_search_form(); ?>
    <nav class="mobile-nav">
        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-3'
                )
            );
        ?>
    </nav>
</div>