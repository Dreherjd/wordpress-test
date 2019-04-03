<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Optimistic_Blog_Lite
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 col-sm-12 col-xs-12 sticky_portion">

		<aside class="sidebar">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		</aside>

</div>
