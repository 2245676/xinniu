<?php
/**
 * Front page malatang entry.
 *
 * @package Xinniu_Hotpot
 */

$cta_label = (string) xinniu_get_option( 'malatang_cta_label' );
$cta_url   = (string) xinniu_get_option( 'malatang_cta_url' );

if ( '' === $cta_label ) {
	$cta_label = __( 'Explore Malatang', 'xinniu-hotpot' );
}

if ( '' === $cta_url ) {
	$cta_url = home_url( '/malatang/' );
}
?>

<section class="front-section front-section--malatang" aria-labelledby="front-malatang-title">
	<div class="front-section__inner front-malatang">
		<div>
			<p class="front-section__eyebrow"><?php esc_html_e( 'Mala Tang', 'xinniu-hotpot' ); ?></p>
			<h2 id="front-malatang-title"><?php esc_html_e( 'Malatang in Fukuoka and Hakata', 'xinniu-hotpot' ); ?></h2>
			<p><?php esc_html_e( 'A dedicated page for soup bases, ingredients, spice levels, FAQ, and search-friendly malatang information.', 'xinniu-hotpot' ); ?></p>
		</div>
		<a class="button button--primary" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?></a>
	</div>
</section>

