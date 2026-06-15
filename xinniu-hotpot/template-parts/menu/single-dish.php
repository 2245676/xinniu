<?php
/**
 * Single dish content.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--dish' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php xinniu_post_thumbnail( 'xinniu-hero' ); ?>

	<div class="dish-meta">
		<?php
		$price       = get_post_meta( get_the_ID(), '_xinniu_price', true );
		$price_note  = get_post_meta( get_the_ID(), '_xinniu_price_note', true );
		$ingredients = get_post_meta( get_the_ID(), '_xinniu_ingredients', true );
		?>

		<?php if ( '' !== $price ) : ?>
			<p class="dish-meta__price">
				<strong><?php esc_html_e( 'Price', 'xinniu-hotpot' ); ?>:</strong>
				<?php echo esc_html( $price ); ?>
				<?php if ( '' !== $price_note ) : ?>
					<span><?php echo esc_html( $price_note ); ?></span>
				<?php endif; ?>
			</p>
		<?php endif; ?>

		<?php if ( '' !== $ingredients ) : ?>
			<p>
				<strong><?php esc_html_e( 'Ingredients', 'xinniu-hotpot' ); ?>:</strong>
				<?php echo esc_html( $ingredients ); ?>
			</p>
		<?php endif; ?>

		<?php
		$taxonomies = array(
			'xinniu_dish_category' => __( 'Category', 'xinniu-hotpot' ),
			'xinniu_dish_tag'      => __( 'Tags', 'xinniu-hotpot' ),
			'xinniu_spice_level'   => __( 'Spice Level', 'xinniu-hotpot' ),
			'xinniu_allergen'      => __( 'Allergens', 'xinniu-hotpot' ),
		);

		foreach ( $taxonomies as $taxonomy => $label ) {
			$terms = get_the_term_list( get_the_ID(), $taxonomy, '', ', ' );

			if ( $terms ) {
				printf(
					'<p><strong>%1$s:</strong> %2$s</p>',
					esc_html( $label ),
					wp_kses_post( $terms )
				);
			}
		}
		?>
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
