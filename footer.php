<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thunder
 */

?>
	</div>
	</div><!-- #content -->
	<footer class="text-dark bg-warning">
	<div class="mt-5 pt-5 footer bg-light" >
		<div class="container-fluid">
		
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-xs-12 location">
			<?php
					get_search_form();
					?>
					<br>
			<h4>Contact Us</h4>
			<ul class="list-inline col-xs-12">
              <a href="#"><i class="fa fa-google-plus-square fa-5x"></i></a>
              <a href="#"><i class="fa fa-twitter-square fa-5x"></i></a>
              <a href="#"><i class="fa fa-youtube-square fa-5x"></i></a>
              <a href="#"><i class="fa fa-rss-square fa-5x"></i></a>               
            </ul>
			<p class="mb-0"><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
			<p><i class="fa fa-envelope-o mr-3"></i>info@hsdf.com</p>
			</div>
			<div class="col-lg-3 col-xs-12 links">
			<h5 class="widget-title"><?php esc_html_e( 'Sort By Categories', 'foodzone' ); ?></h5>
						<ul style="list-style-type:none;">
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
								'style' =>'float:left;',
							) );
							?>
						</ul>
			</div>
			<div class="col-lg-5 col-xs-12 about-company">
			<div class="media">
				<?php 
				the_widget( 'WP_Widget_Recent_Posts');
				?>
				</div>
			<p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
			</div>
			</div>
		</div>
		<div class="copyright text-center">
			Copyright &copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
		</div>
		</div>
		</div>
	</footer>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
