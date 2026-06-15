<?php
/**
 * Malatang CTA.
 *
 * @package Xinniu_Hotpot
 */

$label = (string) xinniu_get_option( 'malatang_cta_label' );
$url   = (string) xinniu_get_option( 'malatang_cta_url' );

if ( '' === $label ) {
	$label = __( 'Reserve a Table', 'xinniu-hotpot' );
}

if ( '' === $url ) {
	$url = home_url( '/reservation/' );
}
?>

<section class="malatang-cta">
	<h2><?php esc_html_e( 'Enjoy Malatang in Fukuoka', 'xinniu-hotpot' ); ?></h2>
	<p><?php esc_html_e( 'Choose your soup, ingredients, and spice level, then enjoy a warm Sichuan-style bowl at Xinniu Hotpot.', 'xinniu-hotpot' ); ?></p>
	<a class="button button--primary" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
</section>

