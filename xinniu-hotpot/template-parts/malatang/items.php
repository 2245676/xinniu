<?php
/**
 * Malatang item list.
 *
 * @package Xinniu_Hotpot
 */

$type = isset( $args['type'] ) ? sanitize_key( $args['type'] ) : 'ingredient';

$titles = array(
	'soup_base'  => __( 'Soup Bases', 'xinniu-hotpot' ),
	'ingredient' => __( 'Ingredients', 'xinniu-hotpot' ),
	'topping'    => __( 'Toppings', 'xinniu-hotpot' ),
	'set'        => __( 'Sets', 'xinniu-hotpot' ),
);

$query = new WP_Query(
	array(
		'post_type'      => 'xinniu_malatang_item',
		'posts_per_page' => 24,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'  => true,
		'meta_query'     => array(
			array(
				'key'   => '_xinniu_malatang_item_type',
				'value' => $type,
			),
			array(
				'key'   => '_xinniu_show_on_malatang_page',
				'value' => 1,
			),
		),
	)
);

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="malatang-section" aria-labelledby="malatang-<?php echo esc_attr( $type ); ?>-title">
	<h2 id="malatang-<?php echo esc_attr( $type ); ?>-title">
		<?php echo esc_html( isset( $titles[ $type ] ) ? $titles[ $type ] : $titles['ingredient'] ); ?>
	</h2>

	<div class="entry-grid">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			$price      = get_post_meta( get_the_ID(), '_xinniu_price', true );
			$price_note = get_post_meta( get_the_ID(), '_xinniu_price_note', true );
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card entry-card--malatang' ); ?>>
				<?php xinniu_post_thumbnail( 'xinniu-card' ); ?>
				<div class="entry-card__body">
					<h3 class="entry-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
					<?php if ( has_excerpt() ) : ?>
						<p class="entry-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
					<?php if ( '' !== $price ) : ?>
						<p class="entry-card__price">
							<?php echo esc_html( $price ); ?>
							<?php if ( '' !== $price_note ) : ?>
								<span><?php echo esc_html( $price_note ); ?></span>
							<?php endif; ?>
						</p>
					<?php endif; ?>
				</div>
			</article>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</section>
