<?php
/**
 * SEO meta output.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Detect common SEO plugins to avoid duplicate output.
 *
 * @return bool
 */
function xinniu_has_seo_plugin() {
	return defined( 'WPSEO_VERSION' )
		|| defined( 'RANK_MATH_VERSION' )
		|| defined( 'SEOPRESS_VERSION' )
		|| class_exists( 'AIOSEO\\Plugin\\AIOSEO' );
}

/**
 * Get meta value with fallback.
 *
 * @param string $key      Meta key.
 * @param string $fallback Fallback.
 * @return string
 */
function xinniu_get_meta_or_default( $key, $fallback = '' ) {
	if ( is_singular() ) {
		$value = get_post_meta( get_the_ID(), $key, true );

		if ( '' !== $value ) {
			return (string) $value;
		}
	}

	return $fallback;
}

/**
 * Build SEO description.
 *
 * @return string
 */
function xinniu_get_seo_description() {
	$description = xinniu_get_meta_or_default( '_xinniu_seo_description' );

	if ( '' !== $description ) {
		return $description;
	}

	if ( is_singular() && has_excerpt() ) {
		return wp_strip_all_tags( get_the_excerpt() );
	}

	$option_description = (string) xinniu_get_option( 'default_seo_description' );

	if ( '' !== $option_description ) {
		return $option_description;
	}

	return get_bloginfo( 'description' );
}

/**
 * Output canonical, robots, and social meta when no SEO plugin owns them.
 */
function xinniu_output_seo_meta() {
	if ( xinniu_has_seo_plugin() ) {
		return;
	}

	$canonical = xinniu_get_meta_or_default( '_xinniu_canonical_url', xinniu_get_current_url() );
	$robots    = array();

	if ( is_singular() ) {
		if ( get_post_meta( get_the_ID(), '_xinniu_robots_noindex', true ) ) {
			$robots[] = 'noindex';
		}

		if ( get_post_meta( get_the_ID(), '_xinniu_robots_nofollow', true ) ) {
			$robots[] = 'nofollow';
		}
	}

	if ( empty( $robots ) ) {
		$robots[] = 'index';
		$robots[] = 'follow';
	}

	$description = xinniu_get_seo_description();

	if ( '' !== $description ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( $description ) ) );
	}

	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $canonical ) );
	printf( '<meta name="robots" content="%s">' . "\n", esc_attr( implode( ',', $robots ) ) );

	if ( ! (int) xinniu_get_option( 'enable_theme_ogp', 1 ) ) {
		return;
	}

	$title       = xinniu_get_meta_or_default( '_xinniu_og_title', wp_get_document_title() );
	$description = xinniu_get_meta_or_default( '_xinniu_og_description', $description );
	$image       = '';

	if ( is_singular() && has_post_thumbnail() ) {
		$image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	}

	if ( ! $image ) {
		$image = (string) xinniu_get_option( 'default_og_image_url' );
	}

	printf( '<meta property="og:type" content="%s">' . "\n", is_singular() ? 'article' : 'website' );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $canonical ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );

	if ( $image ) {
		printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
	}

	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $description ) );
}
add_action( 'wp_head', 'xinniu_output_seo_meta', 2 );
