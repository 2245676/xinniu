<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main__inner site-main__inner--wide">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();

