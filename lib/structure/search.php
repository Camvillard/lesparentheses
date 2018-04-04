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
 * Unregister default archive events.
 *
 * @since 1.5.0
 *
 * @return void
 */
function unregister_search_events() {
	// nothing to unregister.
}

// change the placeholder
add_filter( 'genesis_search_text', __NAMESPACE__ . '\search_text' );
  function search_text( $custom_search_text ) {
  $custom_search_text="chercher dans les parenthèses";
  return $custom_search_text;
}

// ccustom no results page
add_filter( 'genesis_noposts_text', __NAMESPACE__ . '\no_results_text' );
  function no_results_text( $no_results_text ) {
  $no_results_text = "il n&apos;y a aucun article qui correspond à cette recherche, ce qui est bien dommage (enfin, sauf si c&apos;était une recherche bizarre et auquel cas c&apos;est peut etre mieux comme ça). Deux options s&apos;offrent ainsi à vous : soit vous faites une nouvelle recherche, soit vous allez vous faire un café et vous lisez quand même les autres articles";
  return $no_results_text;
}


add_filter( 'genesis_search_title_text', __NAMESPACE__ . '\search_title_page_text' );
  function search_title_page_text($search_title_page) {
  $search_title_page = "résultats de la recherche pour :";
  return $search_title_page;
}
