<?php
/**
 * Theme bootstrap.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'XINNIU_THEME_VERSION', '0.1.0' );
define( 'XINNIU_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'XINNIU_THEME_URI', trailingslashit( get_template_directory_uri() ) );

$xinniu_includes = array(
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/sanitize.php',
	'inc/theme-options.php',
	'inc/cpt.php',
	'inc/taxonomies.php',
	'inc/meta-boxes.php',
	'inc/seo.php',
	'inc/schema.php',
	'inc/llms.php',
	'inc/woocommerce.php',
	'inc/breadcrumbs.php',
	'inc/template-tags.php',
	'inc/template-functions.php',
);

foreach ( $xinniu_includes as $xinniu_file ) {
	$xinniu_path = XINNIU_THEME_DIR . $xinniu_file;

	if ( file_exists( $xinniu_path ) ) {
		require_once $xinniu_path;
	}
}

unset( $xinniu_includes, $xinniu_file, $xinniu_path );
