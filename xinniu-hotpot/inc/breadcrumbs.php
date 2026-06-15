<?php
/**
 * Breadcrumb navigation.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build breadcrumb items.
 *
 * @return array<int, array{name:string,url:string}>
 */
function xinniu_get_breadcrumb_items() {
	$items = array(
		array(
			'name' => __( 'Home', 'xinniu-hotpot' ),
			'url'  => home_url( '/' ),
		),
	);

	if ( is_front_page() ) {
		return $items;
	}

	if ( is_singular( 'xinniu_dish' ) ) {
		$items[] = array(
			'name' => __( 'Menu', 'xinniu-hotpot' ),
			'url'  => get_post_type_archive_link( 'xinniu_dish' ),
		);
	} elseif ( is_singular( 'xinniu_news' ) ) {
		$items[] = array(
			'name' => __( 'News', 'xinniu-hotpot' ),
			'url'  => get_post_type_archive_link( 'xinniu_news' ),
		);
	}

	if ( is_singular() ) {
		$items[] = array(
			'name' => wp_strip_all_tags( get_the_title() ),
			'url'  => get_permalink(),
		);
	} elseif ( is_post_type_archive( 'xinniu_dish' ) ) {
		$items[] = array(
			'name' => __( 'Menu', 'xinniu-hotpot' ),
			'url'  => get_post_type_archive_link( 'xinniu_dish' ),
		);
	} elseif ( is_post_type_archive( 'xinniu_news' ) ) {
		$items[] = array(
			'name' => __( 'News', 'xinniu-hotpot' ),
			'url'  => get_post_type_archive_link( 'xinniu_news' ),
		);
	} elseif ( is_search() ) {
		$items[] = array(
			'name' => __( 'Search', 'xinniu-hotpot' ),
			'url'  => get_search_link(),
		);
	} elseif ( is_404() ) {
		$items[] = array(
			'name' => __( 'Page not found', 'xinniu-hotpot' ),
			'url'  => '',
		);
	}

	return $items;
}

/**
 * Print breadcrumb navigation.
 */
function xinniu_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$items = xinniu_get_breadcrumb_items();

	if ( count( $items ) < 2 ) {
		return;
	}
	?>
	<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'xinniu-hotpot' ); ?>">
		<ol class="breadcrumbs__list">
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="breadcrumbs__item">
					<?php if ( $index < count( $items ) - 1 && ! empty( $item['url'] ) ) : ?>
						<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['name'] ); ?></a>
					<?php else : ?>
						<span aria-current="page"><?php echo esc_html( $item['name'] ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>
	</nav>
	<?php
}

