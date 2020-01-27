<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Thunder
 */

get_header();
?>

	<div id="primary" class="content-area">
	<br>
		<main id="main" class="site-main">
			<div style="border-right:2px solid #dc3545; border-left:2px solid #dc3545;">
			<center>
			<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h2 class="blog-post-title"><?php single_post_title(); ?></h2>
						</header>
						<?php
					endif;
					?>
					<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						?>

						<div class="bg-white text-black col-md-3 mr-4 ml-4 mt-1 mb-1">
						
						<div class="card-body">
						<?php the_post_thumbnail( 'predefImageSize', ['class' => 'card-img-top', 'title' => 'Feature image','width'=>100,'height'=>100] ); ?>
						<div class="card-header">
    							<strong><?php the_title(); ?></strong></div>
							<hr>
							<h6 style="list-style-type:none; color:black!important;" class="badge badge-pill badge-light"><?php the_category(" "); ?></h6>
							<?php 
							echo('<a href='  .esc_url( get_permalink() ). ' class="btn btn-success">Read More</a>');
							?>
						</div>
						</div>
						
					



						
						<br>
						<?php
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						//get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					?>
					</div>
					
					<nav aria-label="Page navigation example">
					<ul class="pagination">
					<?php
					
						?>  
					</ul>
					</nav>
					<?php
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				<center class="col-md-4">
				
				<?php
				the_posts_pagination( array(
						'prev_text' => '<li class="page-item"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span></li>',
						'next_text' => '<li class="page-item"><span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="fa fa-arrow-right" aria-hidden="true"></i></li>',
					) ); ?>
	
				<center>
				</div>
			
			</div>
				</main><!-- #main -->	
		</div>
		<?php
get_sidebar();
get_footer();
