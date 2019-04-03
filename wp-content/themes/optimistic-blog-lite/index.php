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
 * @package Optimistic_Blog_Lite
 */

	get_header();

	$home_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_post_list_layout' );

	$sidebar_position = optimistic_blog_lite_get_option( 'optimistic_blog_lite_sidebar_position' );

	if( $home_layout == 'layout_one' ) {
?>

	<div class="container">
    	<div class="main-post-area-wrapper main-post-area-layout-one">
        	<div class="main-post-area-inner">
            	<div class="row">
            		<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                	<div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                    	<div class="main-post-area-holder">
	                        	<?php
	                        		if( have_posts() ) :
	                        			/* Start the Loop */
		                        		while( have_posts() ) :	the_post();
		                        			/*
											 * Include the Post-Format-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
											 */
		                        			
		                        			/**
										   	* Hook - optimistic_blog_lite_get_content.
										   	*
										   	* @hooked optimistic_blog_lite_get_content_action - 10
										   	*/
										   	do_action( 'optimistic_blog_lite_get_content' );

		                        		endwhile;

		                        		/**
									   	* Hook - optimistic_blog_lite_pagination.
									   	*
									   	* @hooked optimistic_blog_lite_pagination_action - 10
									   	*/
									   	do_action( 'optimistic_blog_lite_pagination' );

		                        	else :

		                        		get_template_part( 'template-parts/content', 'none' );

		                        	endif;
	                        	?>
	                            <!-- // end of article -->
	                    </div><!-- // main-post-area-holder -->
	                </div>
	                <?php if( $sidebar_position == 'right' ) { get_sidebar(); } ?>
	            </div>
	        </div>
	    </div>
	</div>

<?php } else if( $home_layout == 'layout_two' ) { ?>

<div class="single-wrapper main-post-area-wrapper">
    <div class="single-inner">
        <div class="container">
            <div class="search-page">
                <div class="row">
                	<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                    <div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                        <div class="main-post-area-holder">
                        	<?php
	                        	if( have_posts() ) :
	                        		/* Start the Loop */
		                        	while( have_posts() ) :	the_post();
		                        		/*
										* Include the Post-Format-specific template for the content.
										* If you want to override this in a child theme, then include a file
										* called content-___.php (where ___ is the Post Format name) and that will be used instead.
										*/
		                        			
		                        		/**
										* Hook - optimistic_blog_lite_get_content.
										*
										* @hooked optimistic_blog_lite_get_content_action - 10
										*/
										do_action( 'optimistic_blog_lite_get_content' );

		                        	endwhile;

		                        	/**
									* Hook - optimistic_blog_lite_pagination.
									*
									* @hooked optimistic_blog_lite_pagination_action - 10
									*/
									do_action( 'optimistic_blog_lite_pagination' );

		                        else :

		                        	get_template_part( 'template-parts/content', 'none' );

		                        endif;
	                        ?>
                        </div>
                    </div>
                    <?php if( $sidebar_position == 'right' ) { get_sidebar(); } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else { ?>

<div class="single-wrapper main-post-area-wrapper">
    <div class="single-inner">
        <div class="container">
            <div class="home-layout-three-wrapper">
                <div class="row">
                	<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                    <div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                        <div class="main-post-area-holder">
                        	<?php
                        		if( have_posts() ) :
                        	?>
                        		<div class="masonry-container">
                            		<div class="row masonry-grid home-layout-four-masonry">
                            			<?php
                            				/* Start the Loop */
					                        while( have_posts() ) :	the_post();
					                        	/*
												* Include the Post-Format-specific template for the content.
												* If you want to override this in a child theme, then include a file
												* called content-___.php (where ___ is the Post Format name) and that will be used instead.
												*/
					                        			
					                        	/**
												* Hook - optimistic_blog_lite_get_content.
												*
												* @hooked optimistic_blog_lite_get_content_action - 10
												*/
												do_action( 'optimistic_blog_lite_get_content' );

					                        endwhile;
                            			?>
                            		</div>
                            		<div class="row">
                            			<?php
                            				/**
											* Hook - optimistic_blog_lite_pagination.
											*
											* @hooked optimistic_blog_lite_pagination_action - 10
											*/
											do_action( 'optimistic_blog_lite_pagination' );
                            			?>
                            		</div>
                            	</div>
                           	<?php
                           		else :
                           	?>
                           			<div class="row masonry-grid home-layout-four-masonry">
                           				<?php
                           					get_template_part( 'template-parts/content', 'none' );
                           				?>
                           			</div>
                           	<?php
                           		endif;
                           	?>
                        </div>
                    </div>
                    <?php if( $sidebar_position == 'right' ) { get_sidebar(); } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } 
get_footer();