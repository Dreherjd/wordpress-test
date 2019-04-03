<?php
/**
 * Filter Functions.
 *
 * @package Optimistic_Blog_Lite
 */

/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'optimistic_blog_lite_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function optimistic_blog_lite_excerpt_more( $more ) {
		return '';
	}
endif;
add_filter( 'excerpt_more', 'optimistic_blog_lite_excerpt_more' );


if( !function_exists( 'optimistic_blog_lite_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function optimistic_blog_lite_excerpt_length( $length ) {
		
		if( is_admin() ) {
			return $length;
		}

		$excerpt_length = optimistic_blog_lite_get_option( 'optimistic_blog_lite_excerpt_length' );

		$excerpt_length = apply_filters( 'optimistic_blog_lite_filter_excerpt_length', $excerpt_length );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;

	}
endif;
add_filter( 'excerpt_length', 'optimistic_blog_lite_excerpt_length' );



if( !function_exists( 'optimistic_blog_lite_comment_form_fields' ) ) :
	/**
	 * Add custom style of form field
	 */
	function optimistic_blog_lite_comment_form_fileds( $fields ) {
		$commenter = wp_get_current_commenter();
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields   =  array(
			'author'=>  '<div class="comments__form-field">
							<input id="author comments__form-label-name" name="author" placeholder="'.esc_attr__( "Name", "optimistic-blog-lite" ).'" type="text" class="comments__form-input" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . '/ >
							<label class="comments__form-label" for="comments__form-label-name">
								<span class="comments__form-label-text">'.esc_attr__( "Name *", "optimistic-blog-lite" ).'</span>
							</label>
						</div>'. ( $req ? '<span class="required"></span>' : '' ),

			'email'=>   '<div class="comments__form-field">
							<input id="email comments__form-label-mail" name="email" placeholder="'.esc_attr__( "Email Address", "optimistic-blog-lite" ) .'" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .	'" ' . $aria_req . '  class="comments__form-input">
							<label class="comments__form-label" for="comments__form-label-mail">
								<span class="comments__form-label-text">'.esc_attr__( "E-mail *", "optimistic-blog-lite" ) .'</span>
							</label>
						</div>' . ( $req ? '<span class="required"></span>' : '' ),

			'url'=>     '<div class="comments__form-field">
							<input id="url comments__form-label-site" name="url" placeholder="'.esc_attr__('Website', 'optimistic-blog-lite').'"  class="comments__form-input" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '">
							<label class="comments__form-label" for="comments__form-label-site">
								<span class="comments__form-label-text">'.esc_attr__('Website', 'optimistic-blog-lite').'</span>
							</label>
						</div>',
		);

		return $fields;
	}
endif;
add_filter( 'comment_form_default_fields', 'optimistic_blog_lite_comment_form_fileds' );



if( !function_exists( 'optimistic_blog_lite_comment_form' ) ) :
	/**
	 * Add custom default values of form.
	 */
	function optimistic_blog_lite_comment_form( $args ) {
		$args['class_form'] = esc_attr__('comments__form', 'optimistic-blog-lite');
		$args['title_reply'] = esc_html__('Leave comment','optimistic-blog-lite');
		$args['title_reply_before'] = '<div class="comment-box-tile"><h4>';
		$args['title_reply_after'] = '</h4></div>';
		$args['comment_notes_before'] = '<p>'. esc_html__( 'Your email address will not be published. Required fields are marked with *.','optimistic-blog-lite' ).'</p>';
		$args['comment_field'] = '<div class="comments__form-field">
									<textarea id="comment comments__form-label-text" name="comment" type="text" class="comments__form-input comments__form-textarea" aria-required="true" placeholder="'.esc_attr__( 'Express your thoughts *','optimistic-blog-lite' ).'"></textarea>
									<label class="comments__form-label" for="comments__form-label-text">
										<span class="comments__form-label-text">'.esc_html__('Express your thoughts *','optimistic-blog-lite').'</span>
                                    </label>
                                  </div>';
		$args['class_submit'] = esc_attr__('comments__form-submit', 'optimistic-blog-lite'); 
		$args['label_submit'] = esc_attr__('Post A Comment', 'optimistic-blog-lite');

		return $args;
	}
endif;
add_filter( 'comment_form_defaults', 'optimistic_blog_lite_comment_form' );

