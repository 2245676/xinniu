<?php
/**
 * Template Name: FAQ
 * Template Post Type: page
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main__inner">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
		?>

		<?php get_template_part( 'template-parts/faq/category-nav' ); ?>
		<?php get_template_part( 'template-parts/faq/faq-list' ); ?>
	</div>
</main>

<?php
get_footer();

