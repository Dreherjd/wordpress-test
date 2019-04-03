<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment-area-wrapper">
	<div class="comment-area-inner">
		<div class="comments">
			<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) : 
			?>
					<div class="comments__list">
						<div class="comment-listing-tile">
							<h4>
								<?php
									$comment_count = get_comments_number();
									if ( 1 === $comment_count ) {
										printf(
											/* translators: 1: title. */
											esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'optimistic-blog-lite' ),
											'<span>' . get_the_title() . '</span>'
										);
									} else {
										printf( // WPCS: XSS OK.
											/* translators: 1: comment count number, 2: title. */
											esc_html( _nx( '%1$s comment found', '%1$s comments found', $comment_count, 'comments title', 'optimistic-blog-lite' ) ),
											number_format_i18n( $comment_count )
										);
									}
								?>
							</h4>
						</div>
						<?php 
							the_comments_navigation(); 
						?>
						<ol class="comment-list">
							<?php
								wp_list_comments( array(
									'style'      => 'ol',
									'short_ping' => true,
									'avatar_size' => 80,
								) );
							?>
						</ol><!-- .comment-list -->

						<?php 
							the_comments_navigation();

							// If comments are closed and there are comments, let's leave a little note, shall we?
							if ( ! comments_open() ) : 
						?>
								<div class="comment-listing-tile">
									<h4 class="no-comments">	
										<?php 
											esc_html_e( 'Comments are closed.', 'optimistic-blog-lite' ); 
										?>
									</h4>
								</div>
						<?php
							endif;
						?>
					</div>
			<?php
				endif;
				comment_form();
			?>
		</div>
	</div>
</div>
