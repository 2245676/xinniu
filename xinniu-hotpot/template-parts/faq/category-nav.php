<?php
/**
 * FAQ category navigation.
 *
 * @package Xinniu_Hotpot
 */

$categories = get_terms(
	array(
		'taxonomy'   => 'xinniu_faq_category',
		'hide_empty' => true,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);

if ( is_wp_error( $categories ) || empty( $categories ) ) {
	return;
}

$current_term_id = is_tax( 'xinniu_faq_category' ) ? (int) get_queried_object_id() : 0;
?>

<nav class="menu-filter faq-filter" aria-label="<?php esc_attr_e( 'FAQ categories', 'xinniu-hotpot' ); ?>">
	<a class="menu-filter__item <?php echo 0 === $current_term_id ? 'is-active' : ''; ?>" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">
		<?php esc_html_e( 'All', 'xinniu-hotpot' ); ?>
	</a>

	<?php foreach ( $categories as $category ) : ?>
		<a class="menu-filter__item <?php echo (int) $category->term_id === $current_term_id ? 'is-active' : ''; ?>" href="<?php echo esc_url( get_term_link( $category ) ); ?>">
			<?php echo esc_html( $category->name ); ?>
		</a>
	<?php endforeach; ?>
</nav>

