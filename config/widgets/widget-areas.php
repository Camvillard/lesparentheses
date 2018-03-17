<?php
/**
 * Sidebars and widget area runtime configuration
 *
 * @package     lesparentheses\widgets
 * @since       1.0.0
 * @author      camille villard
 * @link        https://camillevillard.io
 * @license     GNU General Public License 2.0+
 */
namespace lesparentheses\widgets;

return array(
	'unregister_widget_areas' => array(
		'sidebar',
		'sidebar-alt',
		'header-right',
	),

	'register_widget_areas' => array(
		array(
			'id'          => 'frontpage-derniere-histoire',
			'name'        => __( 'derniere histoire', 'ktc' ),
			'description' => __( 'premiere zone de widget faite pour afficher la derniere histoire publiée', 'lesparentheses' ),
		),

		array(
			'id'          => 'frontpage-histoires',
			'name'        => __( 'les autres histoires', 'ktc' ),
			'description' => __( 'zone de widget pour afficher les autres articles', 'lesparentheses' ),
		),

		array(
			'id'          => 'frontpage-apropos',
			'name'        => __( 'a propos', 'ktc' ),
			'description' => __( 'zone pour afficher un truc qui parle de moi', 'lesparentheses' ),
		),

		array(
			'id'          => 'frontpage-petites-parentheses',
			'name'        => __( 'les petites parenthèses', 'ktc' ),
			'description' => __( 'zone de widget pour afficher les petites parenthèses et histoires', 'lesparentheses' ),
		),

	),
);
