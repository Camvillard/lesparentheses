<?php
/**
 * Archive HTML markup structure
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
 * @since 1.3.0
 *
 * @return void
 */
function unregister_archive_events() {
	// nothing to unregister.
}

// change les infos
add_filter( 'genesis_post_info', __NAMESPACE__ . '\custom_post_info');
function custom_post_info($info_des_articles) {
  $info_des_articles = '[post_date label="histoire publiée le&nbsp;"]';
  return $info_des_articles;
}

// change les metas
add_filter( 'genesis_post_meta', __NAMESPACE__ . '\custom_post_meta');
function custom_post_meta($metas_des_articles) {
  $metas_des_articles = '[post_categories before="catégorie(s)&nbsp;// " sep="&nbsp;/"][post_tags before="étiquette(s)&nbsp;// " sep="&nbsp;/"][post_comments zero="Il n&apos;a pas encore de commentaire, et c&apos;est franchement dommage" one="il y a déjà un commentaire, glissez donc un petit mot vous aussi" more="Il y a déjà % commentaires, glissez donc un petit mot vous aussi"]';
  return $metas_des_articles;
}

//ajoute un artucle au hasard sur le côté
//add_action('genesis_before_entry', __NAMESPACE__ . '\random_blog_post');
function random_blog_post() {
  // if (is_page_template('archive.php')) {
      echo '<div class="hasard"><a href="https://les-parentheses.com/?random=1">un article au hasard</a></div>';
  // }

}
