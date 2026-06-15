<?php
/**
 * Mobile action bar.
 *
 * @package Xinniu_Hotpot
 */
?>

<nav class="mobile-actions" aria-label="<?php esc_attr_e( 'Quick actions', 'xinniu-hotpot' ); ?>">
	<a class="mobile-actions__item" href="<?php echo esc_url( xinniu_get_reservation_url() ); ?>">
		<span><?php echo esc_html( xinniu_get_reservation_label() ); ?></span>
	</a>
	<a class="mobile-actions__item" href="<?php echo esc_url( home_url( '/menu/' ) ); ?>">
		<span><?php esc_html_e( 'Menu', 'xinniu-hotpot' ); ?></span>
	</a>
	<a class="mobile-actions__item" href="<?php echo esc_url( home_url( '/malatang/' ) ); ?>">
		<span><?php esc_html_e( 'Malatang', 'xinniu-hotpot' ); ?></span>
	</a>
</nav>
