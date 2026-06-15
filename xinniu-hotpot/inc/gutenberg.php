<?php
/**
 * Gutenberg integration.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register block pattern categories and patterns.
 */
function xinniu_register_block_patterns() {
	if ( ! function_exists( 'register_block_pattern_category' ) || ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	register_block_pattern_category(
		'xinniu',
		array(
			'label' => __( 'Xinniu Hotpot', 'xinniu-hotpot' ),
		)
	);

	register_block_pattern(
		'xinniu/reservation-cta',
		array(
			'title'      => __( 'Reservation CTA', 'xinniu-hotpot' ),
			'categories' => array( 'xinniu' ),
			'content'    => '<!-- wp:group {"className":"reservation-cta","layout":{"type":"constrained"}} --><div class="wp-block-group reservation-cta"><!-- wp:heading --><h2>' . esc_html__( 'Reservations', 'xinniu-hotpot' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__( 'Reserve a table for hotpot, malatang, business meals, or family dining.', 'xinniu-hotpot' ) . '</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"className":"button--primary"} --><div class="wp-block-button button--primary"><a class="wp-block-button__link wp-element-button" href="/reservation/">' . esc_html__( 'Reserve a Table', 'xinniu-hotpot' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'xinniu/malatang-intro',
		array(
			'title'      => __( 'Malatang Intro', 'xinniu-hotpot' ),
			'categories' => array( 'xinniu' ),
			'content'    => '<!-- wp:group {"className":"malatang-section","layout":{"type":"constrained"}} --><div class="wp-block-group malatang-section"><!-- wp:heading --><h2>' . esc_html__( 'Malatang in Fukuoka', 'xinniu-hotpot' ) . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__( 'Choose soup bases, ingredients, toppings, and spice levels with clear menu information for Fukuoka and Hakata visitors.', 'xinniu-hotpot' ) . '</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'xinniu_register_block_patterns' );

