<?php
/**
 * Dish category archive template.
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main__inner">
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header>

		<?php get_template_part( 'template-parts/menu/category-nav' ); ?>

		<?php if ( have_posts() ) : ?>
			<div class="entry-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/menu/card', 'dish' );
				endwhile;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();

