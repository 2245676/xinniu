<?php
/**
 * WooCommerce compatibility.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adjust WooCommerce wrappers to match the theme layout.
 */
function xinniu_woocommerce_setup() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	add_action( 'woocommerce_before_main_content', 'xinniu_woocommerce_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'xinniu_woocommerce_wrapper_end', 10 );
}
add_action( 'after_setup_theme', 'xinniu_woocommerce_setup' );

/**
 * Open WooCommerce content wrapper.
 */
function xinniu_woocommerce_wrapper_start() {
	echo '<main id="primary" class="site-main site-main--woocommerce"><div class="site-main__inner">';
}

/**
 * Close WooCommerce content wrapper.
 */
function xinniu_woocommerce_wrapper_end() {
	echo '</div></main>';
}

/**
 * Set WooCommerce product grid columns.
 *
 * @return int
 */
function xinniu_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'xinniu_woocommerce_loop_columns' );

