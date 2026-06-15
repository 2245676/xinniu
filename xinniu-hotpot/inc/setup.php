<?php
/**
 * Theme setup.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'xinniu_setup' ) ) {
	/**
	 * Register theme supports, menus, and image sizes.
	 */
	function xinniu_setup() {
		load_theme_textdomain( 'xinniu-hotpot', XINNIU_THEME_DIR . 'languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor.css' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 120,
				'width'       => 360,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'xinniu-hotpot' ),
				'footer'  => esc_html__( 'Footer Menu', 'xinniu-hotpot' ),
			)
		);

		add_image_size( 'xinniu-hero', 1920, 1080, true );
		add_image_size( 'xinniu-card', 720, 540, true );
	}
}
add_action( 'after_setup_theme', 'xinniu_setup' );

/**
 * Set default content width.
 */
function xinniu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xinniu_content_width', 760 );
}
add_action( 'after_setup_theme', 'xinniu_content_width', 0 );
