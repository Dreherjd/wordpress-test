<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

	get_header();

	$archive_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_archive_layout' );
	$sidebar_position = optimistic_blog_lite_get_option( 'optimistic_blog_lite_sidebar_position' );
	if( $archive_layout == 'layout_one' ) {
?>

		<?php
    	/**
		* Hook - optimistic_blog_lite_breadcrumb.
		*
		* @hooked optimistic_blog_lite_breadcrumb_action - 10
		*/
		do_action( 'optimistic_blog_lite_breadcrumb' );
    	?>
	<div class="container">
    	<div class="main-post-area-wrapper main-post-area-layout-one">
    	
        	<div class="main-post-area-inner">
            	<div class="row">
            		<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 sticky_portion">
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
									   	* Hook - optimistic_blog_lite_archive_content.
									   	*
									   	* @hooked optimistic_blog_lite_archive_content_action - 10
									   	*/
									   	do_action( 'optimistic_blog_lite_archive_content' );

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
	                    </div><!-- // main-post-area-holder -->
	                </div>
	                <?php if( $sidebar_position == 'right' ) { get_sidebar(); } ?>
	            </div>
	        </div>
	    </div>
	</div>

<?php
	} else if( $archive_layout == 'layout_two' ) {
?>

    	<?php
    	/**
		* Hook - optimistic_blog_lite_breadcrumb.
		*
		* @hooked optimistic_blog_lite_breadcrumb_action - 10
		*/
		do_action( 'optimistic_blog_lite_breadcrumb' );
    	?>
<div class="single-wrapper main-post-area-wrapper">

    <div class="single-inner">

        <div class="container">
            <div class="search-page">
                <div class="row">
                	<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                    <div class="col-md-8 sticky_portion">
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
										* Hook - optimistic_blog_lite_archive_content.
										*
										* @hooked optimistic_blog_lite_archive_content_action - 10
										*/
										do_action( 'optimistic_blog_lite_archive_content' );

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
<?php
	} else {
?>

		<?php
    	/**
		* Hook - optimistic_blog_lite_breadcrumb.
		*
		* @hooked optimistic_blog_lite_breadcrumb_action - 10
		*/
		do_action( 'optimistic_blog_lite_breadcrumb' );
    	?>
<div class="single-wrapper main-post-area-wrapper">
    <div class="single-inner">
        <div class="container">
            <div class="home-layout-three-wrapper">
                <div class="row">
                	<?php if( $sidebar_position == 'left' ) { get_sidebar(); } ?>
                    <div class="col-md-8 sticky_portion">
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
												* Hook - optimistic_blog_lite_archive_content.
												*
												* @hooked optimistic_blog_lite_archive_content_action - 10
												*/
												do_action( 'optimistic_blog_lite_archive_content' );

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
<?php
	} 
get_footer();
