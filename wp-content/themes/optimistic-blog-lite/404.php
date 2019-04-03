<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Optimistic_Blog_Lite
 */

get_header(); ?>

<div class="single-wrapper">
	<div class="single-inner">
		<div class="container">

			<div class="error-message-holder">
				<h2><?php esc_html_e( '404', 'optimistic-blog-lite' ); ?></h2>
				<h4><?php esc_html_e( 'Ooops, Page not found!', 'optimistic-blog-lite' ); ?></h4>
				<p><?php esc_html_e( 'The page you are looking for either has moved or doesn\'t exists in this server.Try hitting search!', 'optimistic-blog-lite' ); ?></p>

				<div class="error_page_search">
					<?php
						get_search_form();
					?>
				</div>

			</div><!-- // error-message-holder -->
		</div><!-- // container -->
	</div><!-- // single_inner -->
</div><!-- // single-wrapper -->

<?php
get_footer();
