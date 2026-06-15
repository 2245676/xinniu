<?php
/**
 * JSON-LD schema output.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build restaurant schema from theme options.
 *
 * @return array<string, mixed>
 */
function xinniu_get_restaurant_schema() {
	$schema = array(
		'@type' => array( 'Restaurant', 'LocalBusiness' ),
		'@id'   => home_url( '/#restaurant' ),
		'name'  => get_bloginfo( 'name' ),
		'url'   => home_url( '/' ),
	);

	$description = (string) xinniu_get_option( 'brand_summary' );
	if ( '' === $description ) {
		$description = xinniu_get_default_intro();
	}
	$schema['description'] = $description;

	$phone = (string) xinniu_get_option( 'phone' );
	if ( '' !== $phone ) {
		$schema['telephone'] = $phone;
	}

	$address = (string) xinniu_get_option( 'address' );
	if ( '' !== $address ) {
		$schema['address'] = array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $address,
			'postalCode'      => (string) xinniu_get_option( 'postal_code' ),
			'addressCountry'  => 'JP',
			'addressLocality' => 'Fukuoka',
		);
	}

	$map_url = (string) xinniu_get_option( 'google_map_url' );
	if ( '' !== $map_url ) {
		$schema['hasMap'] = $map_url;
	}

	$same_as = array_filter(
		array(
			(string) xinniu_get_option( 'instagram_url' ),
			(string) xinniu_get_option( 'facebook_url' ),
			(string) xinniu_get_option( 'tiktok_url' ),
			(string) xinniu_get_option( 'line_url' ),
		)
	);

	if ( ! empty( $same_as ) ) {
		$schema['sameAs'] = array_values( $same_as );
	}

	return $schema;
}

/**
 * Build breadcrumb schema.
 *
 * @return array<string, mixed>
 */
function xinniu_get_breadcrumb_schema() {
	$items = array(
		array(
			'@type'    => 'ListItem',
			'position' => 1,
			'name'     => __( 'Home', 'xinniu-hotpot' ),
			'item'     => home_url( '/' ),
		),
	);

	if ( is_singular() ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => 2,
			'name'     => wp_strip_all_tags( get_the_title() ),
			'item'     => get_permalink(),
		);
	} elseif ( is_post_type_archive( 'xinniu_dish' ) ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => 2,
			'name'     => __( 'Menu', 'xinniu-hotpot' ),
			'item'     => get_post_type_archive_link( 'xinniu_dish' ),
		);
	} elseif ( is_post_type_archive( 'xinniu_news' ) ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => 2,
			'name'     => __( 'News', 'xinniu-hotpot' ),
			'item'     => get_post_type_archive_link( 'xinniu_news' ),
		);
	}

	return array(
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $items,
	);
}

/**
 * Build page-level schema graph.
 *
 * @return array<string, mixed>
 */
function xinniu_get_schema_graph() {
	$graph = array(
		xinniu_get_restaurant_schema(),
		array(
			'@type' => 'WebSite',
			'@id'   => home_url( '/#website' ),
			'name'  => get_bloginfo( 'name' ),
			'url'   => home_url( '/' ),
		),
		xinniu_get_breadcrumb_schema(),
	);

	if ( is_singular( 'xinniu_news' ) || is_singular( 'post' ) ) {
		$graph[] = array(
			'@type'         => 'Article',
			'headline'      => wp_strip_all_tags( get_the_title() ),
			'datePublished' => get_the_date( DATE_W3C ),
			'dateModified'  => get_the_modified_date( DATE_W3C ),
			'mainEntityOfPage' => get_permalink(),
		);
	}

	if ( is_singular( 'xinniu_dish' ) ) {
		$price = get_post_meta( get_the_ID(), '_xinniu_price', true );
		$item  = array(
			'@type'       => 'MenuItem',
			'name'        => wp_strip_all_tags( get_the_title() ),
			'description' => wp_strip_all_tags( get_the_excerpt() ),
			'url'         => get_permalink(),
		);

		if ( '' !== $price ) {
			$item['offers'] = array(
				'@type'         => 'Offer',
				'price'         => $price,
				'priceCurrency' => 'JPY',
			);
		}

		$graph[] = $item;
	}

	if ( is_post_type_archive( 'xinniu_dish' ) ) {
		$graph[] = array(
			'@type'       => 'Menu',
			'name'        => __( 'Xinniu Hotpot Menu', 'xinniu-hotpot' ),
			'url'         => get_post_type_archive_link( 'xinniu_dish' ),
			'provider'    => array(
				'@id' => home_url( '/#restaurant' ),
			),
		);
	}

	if ( is_page_template( 'page-templates/template-malatang.php' ) ) {
		$faq_query = new WP_Query(
			array(
				'post_type'      => 'xinniu_faq',
				'posts_per_page' => 8,
				'orderby'        => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'no_found_rows'  => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'xinniu_faq_category',
						'field'    => 'slug',
						'terms'    => array( 'malatang', 'mala-tang', 'maratan' ),
					),
				),
			)
		);

		$questions = array();

		while ( $faq_query->have_posts() ) {
			$faq_query->the_post();
			$questions[] = array(
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( get_the_title() ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => wp_strip_all_tags( get_the_content() ),
				),
			);
		}

		wp_reset_postdata();

		if ( ! empty( $questions ) ) {
			$graph[] = array(
				'@type'      => 'FAQPage',
				'mainEntity' => $questions,
			);
		}

		$graph[] = array(
			'@type'       => 'Menu',
			'name'        => __( 'Malatang Menu', 'xinniu-hotpot' ),
			'description' => __( 'Sichuan-style malatang menu with soup bases, ingredients, toppings, and selectable spice levels in Fukuoka.', 'xinniu-hotpot' ),
			'url'         => get_permalink(),
			'provider'    => array(
				'@id' => home_url( '/#restaurant' ),
			),
		);
	}

	return apply_filters( 'xinniu_json_ld_data', array( '@context' => 'https://schema.org', '@graph' => $graph ) );
}

/**
 * Output JSON-LD schema.
 */
function xinniu_output_schema() {
	if ( xinniu_has_seo_plugin() || ! (int) xinniu_get_option( 'enable_theme_schema', 1 ) ) {
		return;
	}

	$schema = xinniu_get_schema_graph();

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'xinniu_output_schema', 20 );
