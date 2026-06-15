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
</main>

<?php
get_footer();

