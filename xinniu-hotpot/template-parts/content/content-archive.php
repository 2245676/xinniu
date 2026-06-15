<?php
/**
 * Archive card content.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
	<a class="entry-card__link" href="<?php the_permalink(); ?>">
		<?php xinniu_post_thumbnail( 'xinniu-card' ); ?>
		<div class="entry-card__body">
			<?php the_title( '<h2 class="entry-card__title">', '</h2>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="entry-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>

