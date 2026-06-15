<?php
/**
 * Footer store summary.
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

<div class="site-footer__store">
	<?php if ( '' !== $address ) : ?>
		<p><strong><?php esc_html_e( 'Address', 'xinniu-hotpot' ); ?></strong><br><?php echo nl2br( esc_html( $address ) ); ?></p>
	<?php endif; ?>
	<?php if ( '' !== $phone ) : ?>
		<p><strong><?php esc_html_e( 'Phone', 'xinniu-hotpot' ); ?></strong><br><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
	<?php endif; ?>
	<?php if ( '' !== $hours ) : ?>
		<p><strong><?php esc_html_e( 'Hours', 'xinniu-hotpot' ); ?></strong><br><?php echo nl2br( esc_html( $hours ) ); ?></p>
	<?php endif; ?>
</div>

