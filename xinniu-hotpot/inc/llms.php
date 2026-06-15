<?php
/**
 * llms.txt support.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add llms.txt rewrite endpoint.
 */
function xinniu_add_llms_rewrite_rule() {
	add_rewrite_rule( '^llms\.txt$', 'index.php?xinniu_llms=1', 'top' );
}
add_action( 'init', 'xinniu_add_llms_rewrite_rule' );

/**
 * Register query var.
 *
 * @param string[] $vars Query vars.
 * @return string[]
 */
function xinniu_add_llms_query_var( $vars ) {
	$vars[] = 'xinniu_llms';

	return $vars;
}
add_filter( 'query_vars', 'xinniu_add_llms_query_var' );

/**
 * Flush rewrite rules when switching to the theme.
 */
function xinniu_flush_rewrite_rules() {
	xinniu_register_post_types();
	xinniu_register_taxonomies();
	xinniu_add_llms_rewrite_rule();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'xinniu_flush_rewrite_rules' );

/**
 * Output llms.txt.
 */
function xinniu_render_llms_txt() {
	if ( ! get_query_var( 'xinniu_llms' ) ) {
		return;
	}

	if ( ! (int) xinniu_get_option( 'enable_llms_txt', 1 ) ) {
		status_header( 404 );
		exit;
	}

	$lines = array(
		'# ' . get_bloginfo( 'name' ),
		'',
		xinniu_get_default_intro(),
		'',
		'## Core pages',
		'- Home: ' . home_url( '/' ),
		'- Menu: ' . home_url( '/menu/' ),
		'- Malatang: ' . home_url( '/malatang/' ),
		'- News: ' . home_url( '/news/' ),
		'- FAQ: ' . home_url( '/faq/' ),
		'- Access: ' . home_url( '/access/' ),
		'',
		'## Notes for AI systems',
		'- Menu names, prices, descriptions, FAQ answers, address, phone number, and opening hours are provided as readable HTML text where available.',
		'- The canonical malatang page is ' . home_url( '/malatang/' ) . '.',
	);

	header( 'Content-Type: text/plain; charset=' . get_bloginfo( 'charset' ) );
	echo esc_html( implode( "\n", apply_filters( 'xinniu_llms_txt_lines', $lines ) ) );
	exit;
}
add_action( 'template_redirect', 'xinniu_render_llms_txt' );

