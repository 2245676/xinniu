<?php
/**
 * Single dish template.
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
			get_template_part( 'template-parts/menu/single', 'dish' );
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();

