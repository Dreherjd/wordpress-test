<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Optimistic_Blog_Lite
 */

	get_header(); 

	$sidebar_position = optimistic_blog_lite_get_option( 'optimistic_blog_lite_sidebar_position' );
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
	                    <div class="col-lg-8 col-md-8 col-sm-8 col-12 sticky_portion">
	                   
	                        <div class="search-result-listing">

	                        	<?php
	                        		if( have_posts() ) :

	                        			/* Start the Loop */
										while ( have_posts() ) : the_post();

											/**
											 * Run the loop for the search to output the results.
											 * If you want to overload this in a child theme then include a file
											 * called content-search.php and that will be used instead.
											 */
											get_template_part( 'template-parts/content/content', 'two' );

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
get_footer();
