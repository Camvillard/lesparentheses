<?php
/**
 *
 * Template Name: Front page
 *
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */

 namespace lesparentheses;

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

 add_filter( 'body_class', __NAMESPACE__ . '\add_custom_body_class', 1 );
 /**
  * Description.
  *
  * @since 1.0.0
  *
  * @param array $body_classes Array of body classes
  *
  * @return array
  */
 function add_custom_body_class( array $body_classes ) {
 	$body_classes[] = 'custom-front-page';

 	return $body_classes;
 }

 add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );



 add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_front_page_widgets' );
 /**
  * Renders out the pre-footer.
  *
  * @since 1.0.0
  *
  * @return void
  */
 function render_front_page_widgets() {
 	genesis_widget_area( 'frontpage-derniere-histoire', array(
 		'before' => '<div class="frontpage-derniere-histoire"><div class="wrap">',
 		'after'  => '</div></div>',
 	) );

  genesis_widget_area( 'frontpage-histoires', array(
    'before' => '<div class="frontpage-histoires"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'frontpage-apropos', array(
    'before' => '<div class="frontpage-apropos"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

  genesis_widget_area( 'frontpage-autres-histoires', array(
    'before' => '<div class="frontpage-autres-histoires"><div class="wrap">',
    'after'  => '</div></div>',
  ) );

 }


genesis();
