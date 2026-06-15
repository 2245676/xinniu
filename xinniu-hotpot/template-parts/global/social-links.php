<?php
/**
 * Social links.
 *
 * @package Xinniu_Hotpot
 */

$links = array(
	'instagram_url' => __( 'Instagram', 'xinniu-hotpot' ),
	'facebook_url'  => __( 'Facebook', 'xinniu-hotpot' ),
	'tiktok_url'    => __( 'TikTok', 'xinniu-hotpot' ),
	'line_url'      => __( 'LINE', 'xinniu-hotpot' ),
);

$visible_links = array();

foreach ( $links as $key => $label ) {
	$url = (string) xinniu_get_option( $key );

	if ( '' !== $url ) {
		$visible_links[] = array(
			'url'   => $url,
			'label' => $label,
		);
	}
}

if ( empty( $visible_links ) ) {
	return;
}
?>

<nav class="social-links" aria-label="<?php esc_attr_e( 'Social links', 'xinniu-hotpot' ); ?>">
	<?php foreach ( $visible_links as $link ) : ?>
		<a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer">
			<?php echo esc_html( $link['label'] ); ?>
		</a>
	<?php endforeach; ?>
</nav>

