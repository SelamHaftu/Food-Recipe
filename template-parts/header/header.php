<header id="masthead" class="shadow site-header" role="banner">
    <nav class="shadow navbar navbar-dark bg-dark navbar-expand-lg navbar-fixed">
    <nav class=" shadow navbar navbar-dark bg-warning navbar-expand-md fixed-top">
        <a class="navbar-brand text-dark" href="#">
            <?php bloginfo('name'); ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            wp_nav_menu( array(
                'theme_location'  => 'menu-1',
                'menu_id'         => 'primary-menu',
                'container'       => 'div',
                'container_id'    => 'navbarCollapse',
                'container_class' => 'collapse navbar-collapse',
                'menu_class'      => 'navbar-nav mr-auto text-dark',
                'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
              ) );
            get_search_form(); 
        ?>
        </nav>


</header><!-- #masthead -->