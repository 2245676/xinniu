<?php
/**
 * Single content.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</div>
	</header>

	<?php xinniu_post_thumbnail( 'xinniu-hero' ); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>

