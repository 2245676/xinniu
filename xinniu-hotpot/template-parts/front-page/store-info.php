<?php
/**
 * Front page store information summary.
 *
 * @package Xinniu_Hotpot
 */

$address = trim( (string) xinniu_get_option( 'address' ) );
$phone   = trim( (string) xinniu_get_option( 'phone' ) );
$hours   = trim( (string) xinniu_get_option( 'business_hours' ) );

if ( '' === $address && '' === $phone && '' === $hours ) {
	return;
}
?>

<section class="front-section front-section--store" aria-labelledby="front-store-title">
	<div class="front-section__inner">
		<div class="front-section__header">
			<p class="front-section__eyebrow"><?php esc_html_e( 'Access', 'xinniu-hotpot' ); ?></p>
			<h2 id="front-store-title"><?php esc_html_e( 'Store Information', 'xinniu-hotpot' ); ?></h2>
			<a class="front-section__link" href="<?php echo esc_url( home_url( '/access/' ) ); ?>"><?php esc_html_e( 'Details', 'xinniu-hotpot' ); ?></a>
		</div>

		<div class="front-info-list">
			<?php if ( '' !== $address ) : ?>
				<p><strong><?php esc_html_e( 'Address', 'xinniu-hotpot' ); ?></strong><span><?php echo nl2br( esc_html( $address ) ); ?></span></p>
			<?php endif; ?>
			<?php if ( '' !== $phone ) : ?>
				<p><strong><?php esc_html_e( 'Phone', 'xinniu-hotpot' ); ?></strong><span><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></span></p>
			<?php endif; ?>
			<?php if ( '' !== $hours ) : ?>
				<p><strong><?php esc_html_e( 'Hours', 'xinniu-hotpot' ); ?></strong><span><?php echo nl2br( esc_html( $hours ) ); ?></span></p>
			<?php endif; ?>
		</div>
	</div>
</section>

