<?php

get_header(); ?>
    <div class="row">
        
                <section id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <?php
                        if (have_posts()) : ?>

                            <header class="header-title-wrapper">
							<nav class="col-md-8" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
									<strong>
									<h6 class="page-title">
										<?php
                                    		printf(esc_html__('Search Results for: %s', 'thunder'), '<span>' . get_search_query() . '</span>');
										?>
										</strong>
										</h6>
									</li>
								</ol>
								</nav>
						
                            </header><!-- .header-title-wrapper -->
                            <div class="row">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();

							?>
								<div class="card bg-white text-black col-md-3 mr-4 ml-4 mt-1 mb-1">
								
								<div class="card-body">
								<?php the_post_thumbnail( 'predefImageSize', ['class' => 'card-img-top', 'title' => 'Feature image'] ); ?>
								<div class="card-header">
										<strong><?php the_title(); ?></strong></div>
									<hr>
									<p style="font-size:12px;" class="card-text"><?php the_date(); ?></p>
									<h6 style="list-style-type:none; color:black!important;" class="badge badge-pill badge-light"><?php the_category(" "); ?></h6>
									<?php 
									echo('<a href='  .esc_url( get_permalink() ). ' class="btn btn-success">ተጨማሪ ያንብቡ</a>');
									?>
								</div>
								</div>
							<?php

                            endwhile; ?>
                            </div>
                        <?php
						else : ?>
							<center>
							<nav class="row" aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
									<strong>
									<h6 class="page-title">
										<?php
                                    		printf(esc_html__('Search Results for: %s', 'thunder'), '<span>No Results Found</span>');
										?>
										</strong>
										</h6>
									</li>
								</ol>
								</nav>
								</center>
								</div>
								<br>
							<?php
                        endif; ?>
                        
                    </main><!-- #main -->
                </section><!-- #primary -->

                <?php
                get_sidebar();
                ?>
            
    </div>
<?php
get_footer();
