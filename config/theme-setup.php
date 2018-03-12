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
namespace lesparentheses;

return array(
	//=============================================
	// Theme support features to add
	//=============================================
	'add_theme_support' => array(
		'html5'                       => array(
			'caption',
			'comment-form',
			'comment-list',
      'gallery',
			'search-form'
		),
    'genesis-accessibility'           => array(
      '404-page',
      'drop-down-menu',
      'headings',
      'rems',
      'search-form',
      'skip-links'
    ),
		'genesis-responsive-viewport' => null,
    'custom-header'                   => array(
      'width'           => 600,
      'height'          => 160,
      'header-selector' => '.site-title a',
      'header-text'     => false,
      'flex-height'     => true,
    ),
		'genesis-footer-widgets'      => 4,
    'custom-background'               => null,
		'genesis-structural-wraps'    => array(
			'footer',
			'footer-widgets',
			'header',
			'nav',
			'site-inner',
			'site-tagline',
		),
		'genesis-menus'               => array(
			'primary' => __( 'Primary Navigation Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Secondary Navigation Menu', CHILD_TEXT_DOMAIN ),
			'footer'  => __( 'Footer Navigation Menu', CHILD_TEXT_DOMAIN ),
		),
//		'genesis-after-entry-widget-area' => null,
	),



	//=============================================
	// Layouts to unregister
	//=============================================
	'genesis_unregister_layout' => array(
		'sidebar-content',
    // 'content-sidebar',
		'content-sidebar-sidebar',
		'sidebar-content-sidebar',
		'sidebar-sidebar-content',
	),
	//=============================================
	// Theme Default Settings
	//=============================================
	'theme_default_settings' => array(
		'blog_cat_num'              => 10,
		'content_archive'           => 'full',
		'content_archive_limit'     => 250,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
	),
);
