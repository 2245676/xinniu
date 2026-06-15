<?php
/**
 * Template tags.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print the site branding.
 */
function xinniu_site_branding() {
	?>
	<div class="site-branding">
		<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} else {
			?>
			<a class="site-branding__name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
			<?php
		}
		?>
	</div>
	<?php
}

/**
 * Print a post thumbnail with a consistent wrapper.
 *
 * @param string $size Image size.
 */
function xinniu_post_thumbnail( $size = 'xinniu-card' ) {
	if ( ! has_post_thumbnail() ) {
		return;
	}
	?>
	<figure class="entry-media">
		<?php the_post_thumbnail( $size ); ?>
	</figure>
	<?php
}

