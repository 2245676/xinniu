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
		</div>
	</a>
</article>
