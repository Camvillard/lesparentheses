<?php
/**
 * Footer HTML markup structure
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace lesparentheses\Structure;

/**
 * Unregister default navigation events.
 *
 * @since 1.3.0
 *
 * @return void
 */
function unregister_footer_events() {
	//remove_action( 'genesis_footer', 'genesis_do_footer' );
}

// Add schema markup to Footer Navigation Menu.
add_filter( 'genesis_attr_nav-footer', 'genesis_attributes_nav' );

add_action( 'genesis_footer', __NAMESPACE__ . '\render_footer_widgets', 8 );
/**
 * Renders out the pre-footer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_footer_widgets() {
 genesis_widget_area( 'search-footer', array(
	 'before' => '<div class="search-footer"><div class="wrap">',
	 'after'  => '</div></div>',
 ) );
 genesis_widget_area( 'fullwidth-footer', array(
  'before' => '<div class="fullwidth-footer"><div class="wrap">',
  'after'  => '</div></div>',
 ) );
}

// Display Footer Navigation Menu above footer content
add_action( 'genesis_footer', __NAMESPACE__ . '\do_footernav' );
/**
 * Echo the "Footer Navigation" menu.
 *
 * @uses genesis_nav_menu() Display a navigation menu.
 * @uses genesis_nav_menu_supported() Checks for support of specific nav menu.
 */
function do_footernav() {

	// Do nothing if menu not supported.
	if ( ! genesis_nav_menu_supported( 'footer' ) ) {
		return;
	}

	$class = 'menu genesis-nav-menu menu-footer';
	if ( genesis_superfish_enabled() ) {
		$class .= ' js-superfish';
	}

	genesis_nav_menu( array(
		'theme_location' => 'footer',
		'menu_class'     => $class,
	) );
}

//* Change the footer text
add_filter('genesis_footer_creds_text', __NAMESPACE__ . '\footer_creds_filter');
function footer_creds_filter( $creds ) {
	$creds = '&middot;[footer_copyright after=" les parenthèses"] &middot; </br><p class="love">identité visuelle, webdesign, petits dessins et ponctuation fabriqués avec <i class="icon ion-heart"></i> par <a href="http://www.camillevillard.com" target="_blank">camille villard</a></p>';
	return $creds;
}
