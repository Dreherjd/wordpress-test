<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Optimistic_Blog_Lite
 */

	   /**
   	* Hook - optimistic_blog_lite_doctype.
   	*
   	* @hooked optimistic_blog_lite_doctype_action - 10
   	*/
   	do_action( 'optimistic_blog_lite_doctype' );
  
   	/**
   	* Hook - optimistic_blog_lite_head.
   	*
   	* @hooked optimistic_blog_lite_head_action - 10
   	*/
   	do_action( 'optimistic_blog_lite_head' );

   	/**
      * Hook - optimistic_blog_lite_body_before.
      *
      * @hooked optimistic_blog_lite_body_before_action - 10
      */
      do_action( 'optimistic_blog_lite_body_before' );

      /**
      * Hook - optimistic_blog_lite_header.
      *
      * @hooked optimistic_blog_lite_header_action - 10
      */
      do_action( 'optimistic_blog_lite_header' );

      /**
   	* Hook - optimistic_blog_lite_banner.
   	*
   	* @hooked optimistic_blog_lite_banner_action - 10
   	*/
   	do_action( 'optimistic_blog_lite_banner' );

      