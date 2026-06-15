<?php
/**
 * Reservation CTA.
 *
 * @package Xinniu_Hotpot
 */

$label = (string) xinniu_get_option( 'header_cta_label' );
$url   = (string) xinniu_get_option( 'header_cta_url' );
$phone = (string) xinniu_get_option( 'reservation_phone' );

if ( '' === $label ) {
	$label = __( 'Reserve a Table', 'xinniu-hotpot' );
}

if ( '' === $url && '' !== $phone ) {
	$url = 'tel:' . preg_replace( '/[^0-9+]/', '', $phone );
}

if ( '' === $url ) {
	$url = home_url( '/access/' );
}
?>

<section class="reservation-cta">
	<h2><?php esc_html_e( 'Reservations', 'xinniu-hotpot' ); ?></h2>
	<p><?php esc_html_e( 'For business meals, family dining, and group visits, please reserve before visiting whenever possible.', 'xinniu-hotpot' ); ?></p>
	<a class="button button--primary" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
</section>

