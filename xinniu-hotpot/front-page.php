<?php
/**
 * Front page template.
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="front-hero">
		<div class="front-hero__inner">
			<p class="front-hero__eyebrow"><?php esc_html_e( 'Fukuoka Chinese Hotpot', 'xinniu-hotpot' ); ?></p>
			<h1 class="front-hero__title"><?php bloginfo( 'name' ); ?></h1>
			<p class="front-hero__summary">
				<?php echo esc_html( get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : xinniu_get_default_intro() ); ?>
			</p>
			<div class="front-hero__actions">
				<a class="button button--primary" href="<?php echo esc_url( xinniu_get_reservation_url() ); ?>">
					<?php echo esc_html( xinniu_get_reservation_label() ); ?>
				</a>
				<a class="button button--secondary" href="<?php echo esc_url( home_url( '/menu/' ) ); ?>">
					<?php esc_html_e( 'View Menu', 'xinniu-hotpot' ); ?>
				</a>
				<a class="button button--ghost" href="<?php echo esc_url( home_url( '/malatang/' ) ); ?>">
					<?php esc_html_e( 'Malatang', 'xinniu-hotpot' ); ?>
				</a>
			</div>
		</div>
	</section>

	<div class="site-main__inner">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				if ( '' !== trim( get_the_content() ) ) :
					get_template_part( 'template-parts/content/content', 'page' );
				endif;
			endwhile;
		endif;
		?>
	</div>

	<?php get_template_part( 'template-parts/front-page/featured-menu' ); ?>
	<?php get_template_part( 'template-parts/front-page/malatang-entry' ); ?>
	<?php get_template_part( 'template-parts/front-page/store-info' ); ?>
	<?php get_template_part( 'template-parts/front-page/news' ); ?>
	<?php get_template_part( 'template-parts/front-page/faq' ); ?>
</main>

<?php
get_footer();
