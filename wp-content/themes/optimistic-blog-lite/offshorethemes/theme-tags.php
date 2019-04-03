<?php
/**
 * Theme Tags Options.
 *
 * @package Optimistic_Blog_Lite
 */

if( !function_exists( 'optimistic_blog_lite_get_categories' ) ) :
	/**
	 * Function To Get Categories
	 */
	function optimistic_blog_lite_get_categories() {
		if( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'optimistic-blog-lite' ) );			
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'optimistic-blog-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if( !function_exists( 'optimistic_blog_lite_get_tags' ) ) :
	/**
	 * Function To Get Tags
	 */
	function optimistic_blog_lite_get_tags() {
		if( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'optimistic-blog-lite' ) );
			if( $tags_list ) :
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( ' %1$s', 'optimistic-blog-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			endif;
		}
	}
endif;

if( !function_exists( 'optimistic_blog_lite_get_comments_no' ) ) :
	/**
	 * Function To Get Tags
	 */
	function optimistic_blog_lite_get_comments_no() {
		if( ( comments_open() || get_comments_number() ) ) {
			$comments_number = get_comments_number();
			if( $comments_number == 0 ) {
				esc_html_e( 'No Comment', 'optimistic-blog-lite' );
			} else if( $comments_number == 1 ) {
				/* translators: %s: number of comments */
				printf( esc_html_x( '%s Comment', 'comments-no', 'optimistic-blog-lite' ), $comments_number );
			} else {
				/* translators: %s: number of comments */
				printf( esc_html_x( '%s Comments', 'comments-no', 'optimistic-blog-lite' ), $comments_number );
			}
		}
	}
endif;

if( !function_exists( 'optimistic_blog_lite_get_author' ) ) :
	/**
	 * Function To Get Author
	 */
	function optimistic_blog_lite_get_author() {
		printf( '<span class="post-author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" >' . esc_html( get_the_author() ) . '</a></span>' );
	}
endif;

if( !function_exists( 'optimistic_blog_lite_get_post_date' ) ) :
	/**
	 * Function To Get Post Date
	 */
	function optimistic_blog_lite_get_post_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	}
endif;


if ( ! function_exists( 'optimistic_blog_lite_post_meta' ) ) :
/**
* Prints HTML with meta information for the current post-date/time and author.
*/
function optimistic_blog_lite_post_meta() {
	
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'optimistic-blog-lite' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'optimistic-blog-lite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$num_comments = esc_attr( get_comments_number() );

		if ( $num_comments == 0 ) {
			$comments_txt = esc_html__( 'No Comment', 'optimistic-blog-lite' );
		} elseif ( $num_comments > 1 ) {
			/* translators: %d: number of comments */
			$comments_txt = sprintf( esc_html__( '%d Comments.', 'optimistic-blog-lite' ), $num_comments );
		} else {
			$comments_txt = esc_html__( '1 Comment', 'optimistic-blog-lite' );
		}
		
		$comment_meta = '<span class="comments-link"><a href="' . esc_url( get_comments_link() ).'">' . $comments_txt . '</a></span>';


		echo '<div class="postmeta"><ul><li><i class="fa fa-user-circle" aria-hidden="true"></i>' . $byline . '</a></li><li><i class="fa fa-clock-o" aria-hidden="true"></i>' . $posted_on . '</a></li><li><i class="fa fa-comments" aria-hidden="true"></i>' . $comment_meta . '</a><//ul></div>'; 

	}

endif;




if ( !function_exists( 'optimistic_blog_lite_post_format_media' ) ) :
	/**
	 * Function To Extact Media Elements From Post Cotent
	 */
    function optimistic_blog_lite_post_format_media( $post_format, $post_id, $thumbnail ) {

        if( $post_format == 'gallery' ) {
            return optimistic_blog_lite_post_format_gallery( $post_id, $thumbnail );
        } else if( $post_format == 'video' || $post_format == 'audio' ) {
            return optimistic_blog_lite_post_format_audio_video( $post_id, $thumbnail );
        } else {
        	return optimistic_blog_lite_post_format_others( $post_id, $thumbnail );
        }
    }
endif;

if( !function_exists( 'optimistic_blog_lite_post_format_gallery' ) ) :
	/**
	 * Function To Extact Gallery From Post Cotent
	 */
	function optimistic_blog_lite_post_format_gallery( $post_id, $thumbnail ) {
		$image_gallery = get_post_gallery( $post_id, false );
		if( $image_gallery ) {
			$image_ids = explode( ',', $image_gallery['ids'] );
			$image_url = array();
			foreach( $image_ids as $image_id ) {
				$image = wp_get_attachment_image_src( $image_id, $thumbnail );
				$image_url[] = $image[0];
			}
			return $image_url;
		} else {
			if( has_post_thumbnail( $post_id ) ) {
				$post_thumbnail_url = get_the_post_thumbnail_url( $post_id, $thumbnail );
				return $post_thumbnail_url;
			}
		}
	}
endif;

if( !function_exists( 'optimistic_blog_lite_post_format_audio_video' ) ) {
	/**
	 * Function To Extact Audio & Video From Post Cotent
	 */
	function optimistic_blog_lite_post_format_audio_video( $post_id, $thumbnail ) {
		$post_content = apply_filters( 'the_content', get_the_content() );
        $media_content = get_media_embedded_in_content( $post_content, array( 'video', 'audio', 'object', 'embed', 'iframe' ) );
        if( $media_content ) {
        	return $media_content[0];
        }
	}
}

if( !function_exists( 'optimistic_blog_lite_post_format_others' ) ) :
	/**
	 * Function To Extact Featured Image From Post Cotent
	 */
	function optimistic_blog_lite_post_format_others( $post_id, $thumbnail ) {
		if( has_post_thumbnail( $post_id ) ) {
			$post_thumbnail_url = get_the_post_thumbnail_url( $post_id, $thumbnail );
			return $post_thumbnail_url;
		}
	}
endif;