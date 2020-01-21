<?php get_header(); ?>
<div class="col-md-12 blog-main">
    <div class="row">

    <?php 
    if ( have_posts() ) { 
        while ( have_posts() ) : the_post();
    ?>
        <div class="card col-md-6">
        <div class="card-header">
        <h4 class="blog-post-title"><?php the_title(); ?></h4>
        </div>
        
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p><?php the_excerpt(); ?></p>
            <footer class="blockquote-footer" style="background-color:white;"><p style="font-size:14px;" class="blog-post-meta"><?php the_date(); ?></p><cite title="Source Title"> by <?php the_author(); ?></cite></footer>
            </blockquote>
			<?php 
			echo('<a href='  .esc_url( get_permalink() ). ' class="btn btn-primary">Read more</a>');
			?>
        </div>
        </div>
    <?php
        endwhile;
    } 
    ?>
    </div>
    <nav>
        <ul class="pager">
            <li><?php next_posts_link('Previous'); ?></li>
            <li><?php previous_posts_link('Next'); ?></li>
        </ul>
    </nav>

</div>
<?php get_footer(); ?>