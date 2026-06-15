<?php
/**
 * Custom post types.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all theme custom post types.
 */
function xinniu_register_post_types() {
	$dish_labels = array(
		'name'               => esc_html_x( 'Dishes', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'Dish', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'Dishes', 'admin menu', 'xinniu-hotpot' ),
		'name_admin_bar'     => esc_html_x( 'Dish', 'add new on admin bar', 'xinniu-hotpot' ),
		'add_new'            => esc_html_x( 'Add New', 'dish', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New Dish', 'xinniu-hotpot' ),
		'new_item'           => esc_html__( 'New Dish', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit Dish', 'xinniu-hotpot' ),
		'view_item'          => esc_html__( 'View Dish', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All Dishes', 'xinniu-hotpot' ),
		'search_items'       => esc_html__( 'Search Dishes', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No dishes found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No dishes found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_dish',
		array(
			'labels'             => $dish_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'menu',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => 'menu',
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          => 'dashicons-food',
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		)
	);

	$news_labels = array(
		'name'               => esc_html_x( 'News', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'News Item', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'News', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New News Item', 'xinniu-hotpot' ),
		'new_item'           => esc_html__( 'New News Item', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit News Item', 'xinniu-hotpot' ),
		'view_item'          => esc_html__( 'View News Item', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All News', 'xinniu-hotpot' ),
		'search_items'       => esc_html__( 'Search News', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No news found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No news found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_news',
		array(
			'labels'             => $news_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'news',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => 'news',
			'hierarchical'       => false,
			'menu_position'      => 21,
			'menu_icon'          => 'dashicons-megaphone',
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
		)
	);

	$faq_labels = array(
		'name'               => esc_html_x( 'FAQs', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'FAQ', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'FAQs', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New FAQ', 'xinniu-hotpot' ),
		'new_item'           => esc_html__( 'New FAQ', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit FAQ', 'xinniu-hotpot' ),
		'view_item'          => esc_html__( 'View FAQ', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All FAQs', 'xinniu-hotpot' ),
		'search_items'       => esc_html__( 'Search FAQs', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No FAQs found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No FAQs found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_faq',
		array(
			'labels'             => $faq_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'faq',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 22,
			'menu_icon'          => 'dashicons-editor-help',
			'supports'           => array( 'title', 'editor', 'page-attributes', 'revisions' ),
		)
	);

	$store_labels = array(
		'name'               => esc_html_x( 'Stores', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'Store', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'Stores', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New Store', 'xinniu-hotpot' ),
		'new_item'           => esc_html__( 'New Store', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit Store', 'xinniu-hotpot' ),
		'view_item'          => esc_html__( 'View Store', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All Stores', 'xinniu-hotpot' ),
		'search_items'       => esc_html__( 'Search Stores', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No stores found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No stores found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_store',
		array(
			'labels'             => $store_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'store',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 23,
			'menu_icon'          => 'dashicons-store',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		)
	);

	$home_section_labels = array(
		'name'               => esc_html_x( 'Home Sections', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'Home Section', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'Home Sections', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New Home Section', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit Home Section', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All Home Sections', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No home sections found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No home sections found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_home_section',
		array(
			'labels'          => $home_section_labels,
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'menu_position'   => 24,
			'menu_icon'       => 'dashicons-layout',
			'supports'        => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
		)
	);

	$malatang_labels = array(
		'name'               => esc_html_x( 'Malatang Items', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'Malatang Item', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'Malatang Items', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New Malatang Item', 'xinniu-hotpot' ),
		'new_item'           => esc_html__( 'New Malatang Item', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit Malatang Item', 'xinniu-hotpot' ),
		'view_item'          => esc_html__( 'View Malatang Item', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All Malatang Items', 'xinniu-hotpot' ),
		'search_items'       => esc_html__( 'Search Malatang Items', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No malatang items found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No malatang items found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_malatang_item',
		array(
			'labels'             => $malatang_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array(
				'slug'       => 'malatang-item',
				'with_front' => false,
			),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 25,
			'menu_icon'          => 'dashicons-carrot',
			'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		)
	);

	$promo_labels = array(
		'name'               => esc_html_x( 'Promotions', 'post type general name', 'xinniu-hotpot' ),
		'singular_name'      => esc_html_x( 'Promotion', 'post type singular name', 'xinniu-hotpot' ),
		'menu_name'          => esc_html_x( 'Promotions', 'admin menu', 'xinniu-hotpot' ),
		'add_new_item'       => esc_html__( 'Add New Promotion', 'xinniu-hotpot' ),
		'edit_item'          => esc_html__( 'Edit Promotion', 'xinniu-hotpot' ),
		'all_items'          => esc_html__( 'All Promotions', 'xinniu-hotpot' ),
		'not_found'          => esc_html__( 'No promotions found.', 'xinniu-hotpot' ),
		'not_found_in_trash' => esc_html__( 'No promotions found in Trash.', 'xinniu-hotpot' ),
	);

	register_post_type(
		'xinniu_promo',
		array(
			'labels'          => $promo_labels,
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'menu_position'   => 26,
			'menu_icon'       => 'dashicons-star-filled',
			'supports'        => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		)
	);
}
add_action( 'init', 'xinniu_register_post_types' );

