<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

<header id="masthead" class="site-header" role="banner">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-fixed">
    <nav class="navbar navbar-dark bg-primary navbar-expand-md fixed-top">
        <a class="navbar-brand" href="#">
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
                'menu_class'      => 'navbar-nav mr-auto',
                'walker'          => new bs4navwalker()
              ) );
            get_search_form(); 
        ?>
        </nav>


</header><!-- #masthead -->
            <br><br><br>
<div id="content" class="site-content container">

    <!-- <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div> -->

    <div class="row">