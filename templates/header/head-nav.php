    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-inverse navbar-dark fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Navbar</a>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary-menu',
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'navbar-nav mr-auto',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

        <?php get_search_form(); ?>
        </div>
    </nav>