<?php
/**
 * Page template.
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

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</div>
</main>

<?php
get_footer();

