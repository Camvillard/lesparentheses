<?php
/**
 * template for single posts
 *
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     Creative Commons
 */

 namespace lesparentheses\single;


// change les metas
add_filter( 'genesis_post_info', __NAMESPACE__ . '\custom_post_info');
function custom_post_info($info_des_articles) {
  $info_des_articles = '[post_date label="histoire publiée le&nbsp;"]';
  return $info_des_articles;
}



// Add post navigation (requires HTML5 theme support)
add_post_type_support( 'post', __NAMESPACE__ . '\prev_next_post_nav' );
add_action( 'genesis_after_entry_content', __NAMESPACE__ . '\prev_next_post_nav', 8 );
  function prev_next_post_nav() {

   	genesis_markup( array(
   		'open'    => '<div %s>',
   		'context' => 'single-entry-pagination',
   	) );

   	echo '<div class="article-pre">';
   	previous_post_link( '%link', '&#9001;' );
   	echo '</div>';

   	echo '<div class="article-suiv">';
   	next_post_link( '%link', '&#9002;' );
   	echo '</div>';

   	genesis_markup( array(
   		'close'    => '</div>',
   		'context' => 'single-entry-pagination',
   	) );
 }

// change les metas
add_filter( 'genesis_post_meta', __NAMESPACE__ . '\custom_post_metas');
  function custom_post_metas($metas_des_articles) {
 		$metas_des_articles = '[post_categories before="classé dans : " sep="&#160;/"][post_comments zero="Il n&apos;a pas encore de commentaire, et c&apos;est franchement dommage" one="il y a déjà un commentaire, vous avez le droit de copier" more="Il y a déjà % commentaires"]';
 		return $metas_des_articles;
}

add_action('genesis_after_entry_content', __NAMESPACE__ . '\like_button', 6);
  function like_button() {
    do_action( 'nice_likes_custom' );
}




genesis();
