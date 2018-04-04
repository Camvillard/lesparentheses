<?php
/**
 * Description
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace lesparentheses\Structure;

/**
 * Unregister all of the post default events.
 *
 * @since 1.4.8
 *
 * @return void
 */
function unregister_post_events() {
	//remove the image of the post to display the featured image instead
	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
}


//  displays the featured image
add_action( 'genesis_entry_header', __NAMESPACE__ . '\featured_post_image', 13 );
	function featured_post_image() {
		the_post_thumbnail('principal-image');
	}

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function setup_author_box_gravatar_size( $size ) {

	return 90;
}
