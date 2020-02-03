<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foodzone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( function_exists( 'add_theme_support' ) ) { 
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

			// additional image sizes
			// delete the next line if you do not need additional image sizes
			add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
		}		
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<h6 style="list-style-type:none; color:black!important;" class="badge badge-pill badge-light"><?php the_category(" "); ?></h6>
			<?php
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				the_author();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'foodzone' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foodzone' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
