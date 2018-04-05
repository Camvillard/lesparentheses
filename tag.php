<?php
/**
 * archives pour les étiquettes
 *
 * @package     lesparentheses
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     NonCommercial Creative Common Attribution.
 *
 */
namespace lesparentheses\tag;

//remove_action( 'genesis_entry_header', 'genesis_post_info', 9 );
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
//remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
//remove_action( 'genesis_entry_header', 'genesis_post_info', 11 );


//add_action( 'genesis_entry_header', 'genesis_post_info', 13 );

add_action('genesis_archive_title_descriptions', __NAMESPACE__ . '\add_title_to_the_category_page',9);
  function add_title_to_the_category_page() {
    echo '<div class="template-title">étiquette / </div>';
  }

// change les métas des articles
add_filter( 'genesis_post_info', __NAMESPACE__ . '\change_infos');
  function change_infos ($infos_des_articles) {
    $infos_des_articles = '[post_date label="article publié le "]';
    return $infos_des_articles;
}

// change les métas des articles
add_filter( 'genesis_post_meta', __NAMESPACE__ . '\change_metas');
  function change_metas ($meta_des_articles) {
    $meta_des_articles = '[post_categories before="catégorie(s) / "][post_comments zero="il n y a pas encore de commentaire" before="commentaires / "]';
    return $meta_des_articles;
}


 // Run the Genesis loop.
 genesis();
