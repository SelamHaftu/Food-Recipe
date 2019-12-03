<?php

$get_id = get_theme_mod( 'ocean_error_page_template' );


$elementor  = get_post_meta( $get_id, '_elementor_edit_mode', true );

$get_content = oceanwp_error_page_template_content();

if ( 'on' == get_theme_mod( 'ocean_error_page_blank', 'off' ) ) { ?>

	<!DOCTYPE html>
	<html <?php language_attributes(); ?><?php oceanwp_schema_markup( 'html' ); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<link rel="profile" href="http://gmpg.org/xfn/11">

			<?php wp_head(); ?>
		</head>

		<!-- Begin Body -->
		<body <?php body_class(); ?><?php oceanwp_schema_markup( 'body' ); ?>>

			<?php do_action( 'ocean_before_outer_wrap' ); ?>

			<div id="outer-wrap" class="site clr">

				<?php do_action( 'ocean_before_wrap' ); ?>

				<div id="wrap" class="clr">

					<?php do_action( 'ocean_before_main' ); ?>

					<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?>>

<?php
} else {

	get_header();

} ?>

						<?php do_action( 'ocean_before_content_wrap' ); ?>

						<div id="content-wrap" class="container clr">

							<?php do_action( 'ocean_before_primary' ); ?>

							<div id="primary" class="content-area clr">

								<?php do_action( 'ocean_before_content' ); ?>

								<div id="content" class="clr site-content">

									<?php do_action( 'ocean_before_content_inner' ); ?>

									<article class="entry clr">

										<?php
					
										if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

											// Check if there is a template
									        if ( ! empty( $get_id ) ) {

											    // If Elementor
											    if ( OCEANWP_ELEMENTOR_ACTIVE && $elementor ) {

											        OceanWP_Elementor::get_error_page_content();

											    }

											    // If Beaver Builder
											    else if ( OCEANWP_BEAVER_BUILDER_ACTIVE && ! empty( $get_id ) ) {

											        echo do_shortcode( '[fl_builder_insert_layout id="' . $get_id . '"]' );

											    }

											    // Else
											    else {

											        // Display template content
											        echo do_shortcode( $get_content );

											    }

											}

										    // Else
										    else { ?>

										    	<div class="error404-content clr">

													<h2 class="error-title"><?php esc_html_e( 'This page could not be found!', 'oceanwp' ) ?></h2>
													<p class="error-text"><?php esc_html_e( 'We are sorry. But the page you are looking for is not available.', 'oceanwp' ); ?><br /><?php esc_html_e( 'Perhaps you can try a new search.', 'oceanwp' ); ?></p>
													<?php get_search_form(); ?>
													<a class="error-btn button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back To Homepage', 'oceanwp' ) ?></a>

												</div><!-- .error404-content -->

											<?php }

										} ?>

									</article><!-- .entry -->

									<?php do_action( 'ocean_after_content_inner' ); ?>

								</div><!-- #content -->

								<?php do_action( 'ocean_after_content' ); ?>

							</div><!-- #primary -->

							<?php do_action( 'ocean_after_primary' ); ?>

						</div><!--#content-wrap -->

						<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php
// If blank page
if ( 'on' == get_theme_mod( 'ocean_error_page_blank', 'off' ) ) { ?>

			        </main><!-- #main-content -->

			        <?php do_action( 'ocean_after_main' ); ?>
			                
			    </div><!-- #wrap -->

			    <?php do_action( 'ocean_after_wrap' ); ?>

			</div><!-- .outer-wrap -->

			<?php do_action( 'ocean_after_outer_wrap' ); ?>

			<?php wp_footer(); ?>

		</body>
	</html>

<?php
} else {

	get_footer();

} ?>