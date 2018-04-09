<?php
/**
 *
 * Template Name: soutenir le blog
 *
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */

 namespace lesparentheses\soutien;




//remove all actions for a blank canvas
remove_action( 'genesis_header', 'genesis_do_nav', 4 );
remove_action( 'genesis_header', 'genesis_do_subnav', 12 );
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_footer', 'lesparentheses\Structure\render_footer_widgets',8);
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'lesparentheses\Structure\do_footernav' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );



 add_filter( 'body_class', __NAMESPACE__ . '\add_custom_body_class', 1 );
 /**
  * add a custom body classe to the page
  * @since 1.0.0
  * @param array $body_classes Array of body classes
  * @return array
  */
  function add_custom_body_class( array $body_classes ) {
 	$body_classes[] = 'soutenir-blog';
 	return $body_classes;
  }

// add the next page button
add_action( 'genesis_after_header', __NAMESPACE__ . '\insert_first_blurb' );
 function insert_first_blurb() {
   echo '<div class="soutien-blurb-1"></div>';
   echo '<div class="soutien-blurb-2"></div>';
}

// add the next page button
add_action( 'genesis_before_footer', __NAMESPACE__ . '\insert_second_blurb',8 );
 function insert_second_blurb() {
   echo '<div class="soutien-blurb-3"></div>';
}

// add the next page button
add_action( 'genesis_before_footer', __NAMESPACE__ . '\backtoblog' );
 function backtoblog() {
   echo '<div class="footer-soutien">';
   echo '<a class="btn-soutenir" href="https://www.patreon.com/camvillard" target="_blank" >soutenir le blog</a>';
   echo '<a class="btn-retour-au-blog" href="' . get_home_url() . '">retour au blog</a>';
   echo '<a class="btn-au-hasard" href="#">un article au hasard</a>';
   echo '</div>';
}





// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );



// Run the Genesis loop.
genesis();
