<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-page-details-holder wow fadeInUp">
		<?php
			if( has_post_thumbnail() ) :
			?>
				<div class="post-image">
	                <?php
	                	the_post_thumbnail('full', array( 'class'=>'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
	                ?>
	            </div>
	        <?php
			endif;
		?>
	    <div class="single-page-other-information-holder">
	        <div class="post-title">
	            <h2>
	                <?php the_title(); ?>
	            </h2>
	        </div><!-- .post-title -->
	        <div class="post-the-content">
	            <?php
	            	the_content(); 

	            	wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'optimistic-blog-lite' ),
						'after'  => '</div>',
					) );
	            ?>
	        </div><!-- .post-the-content -->
	        <?php if ( get_edit_post_link() ) : ?>
				<div class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'optimistic-blog-lite' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</div><!-- .entry-footer -->
			<?php endif; ?>
	    </div>
    </div><!-- .single-page-other-information-holder -->
</article><!-- #post-<?php the_ID(); ?> -->