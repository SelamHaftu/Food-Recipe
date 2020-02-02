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
			<div style="border-right:1px solid silver; border-left:1px solid silver;">
			<center>
			<h3>Latest Posts</h3>
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

						<?php get_template_part( 'template-parts/post/post');?>

						
					



						
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
