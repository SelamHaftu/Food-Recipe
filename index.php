<?php get_header(); ?>
<div class="col-sm-8 blog-main">
    
    <?php 
    if ( have_posts() ) { 
        while ( have_posts() ) : the_post();
    ?>
    <div class="blog-post">
        <h4 class="blog-post-title"><?php the_title(); ?></h4>
        <p style="font-size:14px;" class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
        <?php the_content(); ?>
        <hr>
    </div>
    <?php
        endwhile;
    } 
    ?>

    <nav>
        <ul class="pager">
            <li><?php next_posts_link('Previous'); ?></li>
            <li><?php previous_posts_link('Next'); ?></li>
        </ul>
    </nav>

</div>
<?php get_footer(); ?>