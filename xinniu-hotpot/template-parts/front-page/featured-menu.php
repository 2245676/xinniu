<?php
/**
 * Front page featured menu.
 *
 * @package Xinniu_Hotpot
 */

$featured_menu = new WP_Query(
	array(
		'post_type'      => 'xinniu_dish',
		'posts_per_page' => 3,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'  => true,
		'meta_query'     => array(
			'relation' => 'OR',
			array(
				'key'   => '_xinniu_is_signature',
				'value' => 1,
			),
			array(
				'key'   => '_xinniu_is_recommended',
				'value' => 1,
			),
		),
	)
);

if ( ! $featured_menu->have_posts() ) {
	return;
}
?>

<section class="front-section front-section--menu" aria-labelledby="front-menu-title">
	<div class="front-section__inner">
		<div class="front-section__header">
			<p class="front-section__eyebrow"><?php esc_html_e( 'Signature Menu', 'xinniu-hotpot' ); ?></p>
			<h2 id="front-menu-title"><?php esc_html_e( 'Recommended Dishes', 'xinniu-hotpot' ); ?></h2>
			<a class="front-section__link" href="<?php echo esc_url( home_url( '/menu/' ) ); ?>"><?php esc_html_e( 'View all', 'xinniu-hotpot' ); ?></a>
		</div>

		<div class="entry-grid">
			<?php
			while ( $featured_menu->have_posts() ) :
				$featured_menu->the_post();
				get_template_part( 'template-parts/menu/card', 'dish' );
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

