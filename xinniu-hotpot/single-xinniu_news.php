<?php
/**
 * Single news template.
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
			get_template_part( 'template-parts/news/single', 'news' );
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();

