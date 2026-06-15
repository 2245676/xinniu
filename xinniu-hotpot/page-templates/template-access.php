<?php
/**
 * Template Name: Access
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
			get_template_part( 'template-parts/global/store-info' );
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();

