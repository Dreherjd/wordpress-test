<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mega-blog' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mega-blog' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="entry-meta">
				<?php mega_blog_entry_footer(); ?>
			</div>
		</div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
