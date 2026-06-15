<?php
/**
 * Page content.
 *
 * @package Xinniu_Hotpot
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--page' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php xinniu_post_thumbnail( 'xinniu-hero' ); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xinniu-hotpot' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
</article>

