<?php
/**
 * Template Name: Malatang SEO Page
 * Template Post Type: page
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main site-main--malatang">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="malatang-hero">
			<div class="site-main__inner">
				<p class="front-hero__eyebrow"><?php esc_html_e( 'Fukuoka Malatang', 'xinniu-hotpot' ); ?></p>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<p class="malatang-hero__summary">
					<?php esc_html_e( 'Chinese Sichuan-style malatang in Fukuoka and Hakata, with selectable soup bases, ingredients, spice levels, and clear menu information.', 'xinniu-hotpot' ); ?>
				</p>
			</div>
		</section>

		<div class="site-main__inner">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--malatang' ); ?>>
				<?php xinniu_post_thumbnail( 'xinniu-hero' ); ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>

			<?php get_template_part( 'template-parts/malatang/keywords' ); ?>
			<?php get_template_part( 'template-parts/malatang/items', null, array( 'type' => 'soup_base' ) ); ?>
			<?php get_template_part( 'template-parts/malatang/items', null, array( 'type' => 'ingredient' ) ); ?>
			<?php get_template_part( 'template-parts/malatang/items', null, array( 'type' => 'topping' ) ); ?>
			<?php get_template_part( 'template-parts/malatang/faq' ); ?>
			<?php get_template_part( 'template-parts/malatang/cta' ); ?>
		</div>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();

