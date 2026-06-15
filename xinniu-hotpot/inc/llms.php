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

	$lines = array_merge( $lines, xinniu_get_llms_dynamic_lines() );

	header( 'Content-Type: text/plain; charset=' . get_bloginfo( 'charset' ) );
	echo esc_html( implode( "\n", apply_filters( 'xinniu_llms_txt_lines', $lines ) ) );
	exit;
}
add_action( 'template_redirect', 'xinniu_render_llms_txt' );

/**
 * Build dynamic llms.txt lines from public content.
 *
 * @return string[]
 */
function xinniu_get_llms_dynamic_lines() {
	$lines = array();

	$dishes = new WP_Query(
		array(
			'post_type'      => 'xinniu_dish',
			'posts_per_page' => 12,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'date'       => 'DESC',
			),
			'no_found_rows'  => true,
		)
	);

	if ( $dishes->have_posts() ) {
		$lines[] = '';
		$lines[] = '## Menu highlights';

		while ( $dishes->have_posts() ) {
			$dishes->the_post();
			$price = get_post_meta( get_the_ID(), '_xinniu_price', true );
			$line  = '- ' . wp_strip_all_tags( get_the_title() ) . ': ' . get_permalink();

			if ( '' !== $price ) {
				$line .= ' (' . $price . ')';
			}

			$lines[] = $line;
		}

		wp_reset_postdata();
	}

	$faqs = new WP_Query(
		array(
			'post_type'      => 'xinniu_faq',
			'posts_per_page' => 8,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'no_found_rows'  => true,
		)
	);

	if ( $faqs->have_posts() ) {
		$lines[] = '';
		$lines[] = '## FAQ questions';

		while ( $faqs->have_posts() ) {
			$faqs->the_post();
			$lines[] = '- ' . wp_strip_all_tags( get_the_title() );
		}

		wp_reset_postdata();
	}

	return $lines;
}

/**
 * Add llms.txt to virtual robots.txt output.
 *
 * @param string $output Existing robots output.
 * @param bool   $public Whether the site is public.
 * @return string
 */
function xinniu_robots_txt( $output, $public ) {
	if ( ! $public ) {
		return $output;
	}

	$output .= "\nAllow: /llms.txt\n";
	$output .= 'Sitemap: ' . home_url( '/wp-sitemap.xml' ) . "\n";

	return $output;
}
add_filter( 'robots_txt', 'xinniu_robots_txt', 10, 2 );
