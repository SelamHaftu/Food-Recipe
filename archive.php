<?php
get_header();
?>
<nav class="col-md-8" aria-label="breadcrumb">
		<ol class="shadow breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">
			<strong>
			<h6 class="page-title">
				<?php
    				printf( __( 'Category : %s', '' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?>
				</strong>
				</h6>
			</li>
		</ol>
		</nav>

	<div id="primary" class="content-area">
	<br>
		<main id="main" style="background-color:white; padding:20px; border-radius:8px;" class="site-main">
			<div style="border-right:1px solid silver; border-left:2px solid silver;">
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
				<nav aria-label="Page navigation example">
				<ul class="pagination">
				<?php
				the_posts_pagination( array(
						'prev_text' => '<li class="page-item"></i><span class="screen-reader-text">' . __( 'Previous Page', 'pool' ) . '</span></li>',
						'next_text' => '<li class="page-item"><span class="screen-reader-text">' . __( 'Next Page', 'pool' ) . '</span><i class="fa fa-arrow-right" aria-hidden="true"></i></li>',
					) ); ?>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
				</ul>
				</nav>
				<center>
				</div>
			
			</div>
				</main><!-- #main -->	
		</div>
		<?php

get_footer();
