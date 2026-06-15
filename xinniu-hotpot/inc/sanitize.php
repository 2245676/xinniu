<?php
/**
 * Sanitization helpers.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize a checkbox value.
 *
 * @param mixed $value Raw value.
 * @return int
 */
function xinniu_sanitize_checkbox( $value ) {
	return ! empty( $value ) ? 1 : 0;
}

/**
 * Sanitize a textarea while preserving line breaks.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function xinniu_sanitize_textarea( $value ) {
	return sanitize_textarea_field( is_scalar( $value ) ? (string) $value : '' );
}

/**
 * Sanitize a URL field.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function xinniu_sanitize_url( $value ) {
	return esc_url_raw( is_scalar( $value ) ? (string) $value : '' );
}

/**
 * Sanitize trusted embed HTML such as a Google Maps iframe.
 *
 * @param mixed $value Raw value.
 * @return string
 */
function xinniu_sanitize_embed( $value ) {
	$allowed_html = array(
		'iframe' => array(
			'src'             => true,
			'width'           => true,
			'height'          => true,
			'style'           => true,
			'allowfullscreen' => true,
			'loading'         => true,
			'referrerpolicy'  => true,
			'title'           => true,
		),
	);

	return wp_kses( is_scalar( $value ) ? (string) $value : '', $allowed_html );
}
