<?php
/**
 * News card.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-card' ); ?>>
	<a class="news-card__link" href="<?php the_permalink(); ?>">
		<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		<h2 class="news-card__title"><?php echo esc_html( get_the_title() ); ?></h2>
		<?php if ( has_excerpt() ) : ?>
			<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>
	</a>
</article>
