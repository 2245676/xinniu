<?php
/**
 * Site header.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'xinniu-hotpot' ); ?>
	</a>

	<header id="masthead" class="site-header">
		<div class="site-header__inner">
			<?php xinniu_site_branding(); ?>

			<button class="site-navigation-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
				<span class="site-navigation-toggle__label"><?php esc_html_e( 'Menu', 'xinniu-hotpot' ); ?></span>
			</button>

			<nav id="site-navigation" class="site-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'xinniu-hotpot' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'site-navigation__menu',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>

			<a class="site-header__cta" href="<?php echo esc_url( xinniu_get_reservation_url() ); ?>">
				<?php echo esc_html( xinniu_get_reservation_label() ); ?>
			</a>
		</div>
	</header>

	<?php xinniu_breadcrumbs(); ?>
