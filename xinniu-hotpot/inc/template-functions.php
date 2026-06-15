<?php
/**
 * Template helper functions.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add semantic body classes.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function xinniu_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'is-singular';
	}

	if ( is_front_page() ) {
		$classes[] = 'is-front-page';
	}

	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$classes[] = 'is-woocommerce';
	}

	return $classes;
}
add_filter( 'body_class', 'xinniu_body_classes' );

/**
 * Redirect long-term malatang keyword aliases to the canonical page.
 */
function xinniu_redirect_malatang_aliases() {
	if ( is_admin() ) {
		return;
	}

	$request_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH ) : '';
	$request_path = trim( (string) $request_path, '/' );

	if ( in_array( $request_path, array( 'mala-tang', 'maratan' ), true ) ) {
		wp_safe_redirect( home_url( '/malatang/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'xinniu_redirect_malatang_aliases' );

/**
 * Return a short default site description for empty front page content.
 *
 * @return string
 */
function xinniu_get_default_intro() {
	return esc_html__(
		'Premium Chinese hotpot dining in Fukuoka, blending modern hospitality with refined East Asian dining culture.',
		'xinniu-hotpot'
	);
}

/**
 * Get current canonical-style URL.
 *
 * @return string
 */
function xinniu_get_current_url() {
	if ( is_singular() ) {
		return get_permalink();
	}

	if ( is_post_type_archive( 'xinniu_dish' ) ) {
		return get_post_type_archive_link( 'xinniu_dish' );
	}

	if ( is_post_type_archive( 'xinniu_news' ) ) {
		return get_post_type_archive_link( 'xinniu_news' );
	}

	if ( is_front_page() ) {
		return home_url( '/' );
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/';

	return home_url( $request_uri );
}

/**
 * Get the primary reservation URL.
 *
 * @return string
 */
function xinniu_get_reservation_url() {
	$url   = (string) xinniu_get_option( 'header_cta_url' );
	$phone = (string) xinniu_get_option( 'reservation_phone' );

	if ( '' !== $url ) {
		return $url;
	}

	if ( '' !== $phone ) {
		return 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
	}

	return home_url( '/reservation/' );
}

/**
 * Get the primary reservation label.
 *
 * @return string
 */
function xinniu_get_reservation_label() {
	$label = (string) xinniu_get_option( 'header_cta_label' );

	return '' !== $label ? $label : __( 'Reserve', 'xinniu-hotpot' );
}
