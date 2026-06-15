<?php
/**
 * Dish card.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card entry-card--dish' ); ?>>
	<a class="entry-card__link" href="<?php the_permalink(); ?>">
		<?php xinniu_post_thumbnail( 'xinniu-card' ); ?>
		<div class="entry-card__body">
			<?php
			$is_signature   = (int) get_post_meta( get_the_ID(), '_xinniu_is_signature', true );
			$is_recommended = (int) get_post_meta( get_the_ID(), '_xinniu_is_recommended', true );
			$is_limited     = (int) get_post_meta( get_the_ID(), '_xinniu_is_limited', true );
			?>
			<?php if ( $is_signature || $is_recommended || $is_limited ) : ?>
				<div class="dish-badges" aria-label="<?php esc_attr_e( 'Dish labels', 'xinniu-hotpot' ); ?>">
					<?php if ( $is_signature ) : ?>
						<span class="dish-badge"><?php esc_html_e( 'Signature', 'xinniu-hotpot' ); ?></span>
					<?php endif; ?>
					<?php if ( $is_recommended ) : ?>
						<span class="dish-badge"><?php esc_html_e( 'Recommended', 'xinniu-hotpot' ); ?></span>
					<?php endif; ?>
					<?php if ( $is_limited ) : ?>
						<span class="dish-badge"><?php esc_html_e( 'Limited', 'xinniu-hotpot' ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php the_title( '<h2 class="entry-card__title">', '</h2>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="entry-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
			<?php
			$price      = get_post_meta( get_the_ID(), '_xinniu_price', true );
			$price_note = get_post_meta( get_the_ID(), '_xinniu_price_note', true );
			?>
			<?php if ( '' !== $price ) : ?>
				<p class="entry-card__price">
					<?php echo esc_html( $price ); ?>
					<?php if ( '' !== $price_note ) : ?>
						<span><?php echo esc_html( $price_note ); ?></span>
					<?php endif; ?>
				</p>
			<?php endif; ?>

			<?php
			$category_terms = get_the_terms( get_the_ID(), 'xinniu_dish_category' );
			$spice_terms    = get_the_terms( get_the_ID(), 'xinniu_spice_level' );
			?>
			<?php if ( ( ! is_wp_error( $category_terms ) && ! empty( $category_terms ) ) || ( ! is_wp_error( $spice_terms ) && ! empty( $spice_terms ) ) ) : ?>
				<div class="dish-card-meta">
					<?php if ( ! is_wp_error( $category_terms ) && ! empty( $category_terms ) ) : ?>
						<span><?php echo esc_html( $category_terms[0]->name ); ?></span>
					<?php endif; ?>
					<?php if ( ! is_wp_error( $spice_terms ) && ! empty( $spice_terms ) ) : ?>
						<span><?php echo esc_html( $spice_terms[0]->name ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</a>
</article>
