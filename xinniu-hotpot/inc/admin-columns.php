<?php
/**
 * Admin list table helpers.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add useful dish admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function xinniu_dish_admin_columns( $columns ) {
	$new_columns = array();

	foreach ( $columns as $key => $label ) {
		$new_columns[ $key ] = $label;

		if ( 'title' === $key ) {
			$new_columns['xinniu_price'] = __( 'Price', 'xinniu-hotpot' );
			$new_columns['xinniu_flags'] = __( 'Labels', 'xinniu-hotpot' );
		}
	}

	return $new_columns;
}
add_filter( 'manage_xinniu_dish_posts_columns', 'xinniu_dish_admin_columns' );

/**
 * Render custom dish admin columns.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function xinniu_render_dish_admin_columns( $column, $post_id ) {
	if ( 'xinniu_price' === $column ) {
		$price = get_post_meta( $post_id, '_xinniu_price', true );
		echo '' !== $price ? esc_html( $price ) : '&mdash;';
	}

	if ( 'xinniu_flags' === $column ) {
		$labels = array();

		if ( get_post_meta( $post_id, '_xinniu_is_signature', true ) ) {
			$labels[] = __( 'Signature', 'xinniu-hotpot' );
		}

		if ( get_post_meta( $post_id, '_xinniu_is_recommended', true ) ) {
			$labels[] = __( 'Recommended', 'xinniu-hotpot' );
		}

		if ( get_post_meta( $post_id, '_xinniu_is_limited', true ) ) {
			$labels[] = __( 'Limited', 'xinniu-hotpot' );
		}

		echo ! empty( $labels ) ? esc_html( implode( ', ', $labels ) ) : '&mdash;';
	}
}
add_action( 'manage_xinniu_dish_posts_custom_column', 'xinniu_render_dish_admin_columns', 10, 2 );

/**
 * Add malatang admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function xinniu_malatang_admin_columns( $columns ) {
	$columns['xinniu_type']  = __( 'Type', 'xinniu-hotpot' );
	$columns['xinniu_price'] = __( 'Price', 'xinniu-hotpot' );
	$columns['xinniu_show']  = __( 'Shown', 'xinniu-hotpot' );

	return $columns;
}
add_filter( 'manage_xinniu_malatang_item_posts_columns', 'xinniu_malatang_admin_columns' );

/**
 * Render malatang custom columns.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function xinniu_render_malatang_admin_columns( $column, $post_id ) {
	if ( 'xinniu_type' === $column ) {
		$type = get_post_meta( $post_id, '_xinniu_malatang_item_type', true );
		echo '' !== $type ? esc_html( ucwords( str_replace( '_', ' ', $type ) ) ) : '&mdash;';
	}

	if ( 'xinniu_price' === $column ) {
		$price = get_post_meta( $post_id, '_xinniu_price', true );
		echo '' !== $price ? esc_html( $price ) : '&mdash;';
	}

	if ( 'xinniu_show' === $column ) {
		echo get_post_meta( $post_id, '_xinniu_show_on_malatang_page', true ) ? esc_html__( 'Yes', 'xinniu-hotpot' ) : '&mdash;';
	}
}
add_action( 'manage_xinniu_malatang_item_posts_custom_column', 'xinniu_render_malatang_admin_columns', 10, 2 );

/**
 * Add FAQ admin columns.
 *
 * @param array<string, string> $columns Existing columns.
 * @return array<string, string>
 */
function xinniu_faq_admin_columns( $columns ) {
	$columns['xinniu_faq_category'] = __( 'FAQ Category', 'xinniu-hotpot' );

	return $columns;
}
add_filter( 'manage_xinniu_faq_posts_columns', 'xinniu_faq_admin_columns' );

/**
 * Render FAQ custom columns.
 *
 * @param string $column  Column key.
 * @param int    $post_id Post ID.
 */
function xinniu_render_faq_admin_columns( $column, $post_id ) {
	if ( 'xinniu_faq_category' !== $column ) {
		return;
	}

	$terms = get_the_term_list( $post_id, 'xinniu_faq_category', '', ', ' );
	echo $terms ? wp_kses_post( $terms ) : '&mdash;';
}
add_action( 'manage_xinniu_faq_posts_custom_column', 'xinniu_render_faq_admin_columns', 10, 2 );

