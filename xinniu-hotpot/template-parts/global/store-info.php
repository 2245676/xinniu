<?php
/**
 * Store information block.
 *
 * @package Xinniu_Hotpot
 */

$address      = (string) xinniu_get_option( 'address' );
$phone        = (string) xinniu_get_option( 'phone' );
$hours        = (string) xinniu_get_option( 'business_hours' );
$closed_days  = (string) xinniu_get_option( 'closed_days' );
$map_url      = (string) xinniu_get_option( 'google_map_url' );
$map_embed    = (string) xinniu_get_option( 'google_map_embed' );
?>

<section class="store-info" aria-labelledby="store-info-title">
	<h2 id="store-info-title"><?php esc_html_e( 'Store Information', 'xinniu-hotpot' ); ?></h2>

	<?php if ( '' !== $address ) : ?>
		<p><strong><?php esc_html_e( 'Address', 'xinniu-hotpot' ); ?>:</strong> <?php echo nl2br( esc_html( $address ) ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $phone ) : ?>
		<p><strong><?php esc_html_e( 'Phone', 'xinniu-hotpot' ); ?>:</strong> <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
	<?php endif; ?>

	<?php if ( '' !== $hours ) : ?>
		<p><strong><?php esc_html_e( 'Business Hours', 'xinniu-hotpot' ); ?>:</strong><br><?php echo nl2br( esc_html( $hours ) ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $closed_days ) : ?>
		<p><strong><?php esc_html_e( 'Closed Days', 'xinniu-hotpot' ); ?>:</strong> <?php echo esc_html( $closed_days ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $map_url ) : ?>
		<p><a class="button button--primary" href="<?php echo esc_url( $map_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Open Google Map', 'xinniu-hotpot' ); ?></a></p>
	<?php endif; ?>

	<?php if ( '' !== $map_embed ) : ?>
		<div class="store-info__map"><?php echo xinniu_sanitize_embed( $map_embed ); ?></div>
	<?php endif; ?>
</section>

