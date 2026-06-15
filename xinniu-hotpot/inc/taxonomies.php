<?php
/**
 * Custom taxonomies.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all theme taxonomies.
 */
function xinniu_register_taxonomies() {
	register_taxonomy(
		'xinniu_dish_category',
		array( 'xinniu_dish' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'Dish Categories', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'Dish Category', 'taxonomy singular name', 'xinniu-hotpot' ),
				'search_items'  => esc_html__( 'Search Dish Categories', 'xinniu-hotpot' ),
				'all_items'     => esc_html__( 'All Dish Categories', 'xinniu-hotpot' ),
				'edit_item'     => esc_html__( 'Edit Dish Category', 'xinniu-hotpot' ),
				'update_item'   => esc_html__( 'Update Dish Category', 'xinniu-hotpot' ),
				'add_new_item'  => esc_html__( 'Add New Dish Category', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'Dish Categories', 'xinniu-hotpot' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'menu-category',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_dish_tag',
		array( 'xinniu_dish' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'Dish Tags', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'Dish Tag', 'taxonomy singular name', 'xinniu-hotpot' ),
				'search_items'  => esc_html__( 'Search Dish Tags', 'xinniu-hotpot' ),
				'all_items'     => esc_html__( 'All Dish Tags', 'xinniu-hotpot' ),
				'edit_item'     => esc_html__( 'Edit Dish Tag', 'xinniu-hotpot' ),
				'update_item'   => esc_html__( 'Update Dish Tag', 'xinniu-hotpot' ),
				'add_new_item'  => esc_html__( 'Add New Dish Tag', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'Dish Tags', 'xinniu-hotpot' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'menu-tag',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_spice_level',
		array( 'xinniu_dish', 'xinniu_malatang_item' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'Spice Levels', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'Spice Level', 'taxonomy singular name', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'Spice Levels', 'xinniu-hotpot' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'spice-level',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_allergen',
		array( 'xinniu_dish', 'xinniu_malatang_item' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'Allergens', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'Allergen', 'taxonomy singular name', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'Allergens', 'xinniu-hotpot' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'allergen',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_news_category',
		array( 'xinniu_news' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'News Categories', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'News Category', 'taxonomy singular name', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'News Categories', 'xinniu-hotpot' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'news-category',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_faq_category',
		array( 'xinniu_faq' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'FAQ Categories', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'FAQ Category', 'taxonomy singular name', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'FAQ Categories', 'xinniu-hotpot' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'faq-category',
				'with_front' => false,
			),
		)
	);

	register_taxonomy(
		'xinniu_malatang_category',
		array( 'xinniu_malatang_item' ),
		array(
			'labels'            => array(
				'name'          => esc_html_x( 'Malatang Categories', 'taxonomy general name', 'xinniu-hotpot' ),
				'singular_name' => esc_html_x( 'Malatang Category', 'taxonomy singular name', 'xinniu-hotpot' ),
				'menu_name'     => esc_html__( 'Malatang Categories', 'xinniu-hotpot' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'malatang-category',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'xinniu_register_taxonomies' );

