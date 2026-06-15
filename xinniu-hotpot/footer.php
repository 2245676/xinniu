<?php
/**
 * Site footer.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer id="colophon" class="site-footer">
		<div class="site-footer__inner">
			<div class="site-footer__brand">
				<?php xinniu_site_branding(); ?>
				<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
			</div>

			<nav class="site-footer__navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'xinniu-hotpot' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'site-footer__menu',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>

			<p class="site-footer__copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
			</p>
		</div>
	</footer>
	<?php get_template_part( 'template-parts/global/mobile-actions' ); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
