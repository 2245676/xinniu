<?php
/**
 * Frontend and editor assets.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue frontend assets.
 */
function xinniu_enqueue_assets() {
	wp_enqueue_style(
		'xinniu-main',
		XINNIU_THEME_URI . 'assets/css/main.css',
		array(),
		XINNIU_THEME_VERSION
	);

	wp_enqueue_script(
		'xinniu-navigation',
		XINNIU_THEME_URI . 'assets/js/navigation.js',
		array(),
		XINNIU_THEME_VERSION,
		true
	);

	wp_enqueue_script(
		'xinniu-main',
		XINNIU_THEME_URI . 'assets/js/main.js',
		array(),
		XINNIU_THEME_VERSION,
		true
	);

	if ( function_exists( 'is_woocommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
		wp_enqueue_style(
			'xinniu-woocommerce',
			XINNIU_THEME_URI . 'assets/css/woocommerce.css',
			array( 'xinniu-main' ),
			XINNIU_THEME_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'xinniu_enqueue_assets' );

/**
 * Enqueue admin assets only on theme-related screens where needed.
 *
 * @param string $hook_suffix Current admin page hook.
 */
function xinniu_enqueue_admin_assets( $hook_suffix ) {
	$allowed_hooks = array(
		'appearance_page_xinniu-hotpot',
	);

	if ( ! is_string( $hook_suffix ) || ! in_array( $hook_suffix, $allowed_hooks, true ) ) {
		return;
	}

	wp_enqueue_style(
		'xinniu-admin',
		XINNIU_THEME_URI . 'assets/css/admin.css',
		array(),
		XINNIU_THEME_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'xinniu_enqueue_admin_assets' );
