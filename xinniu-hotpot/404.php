<?php
/**
 * 404 template.
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main__inner">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Page not found', 'xinniu-hotpot' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'The page you are looking for may have moved. Please use search or return to the homepage.', 'xinniu-hotpot' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>
	</div>
</main>

<?php
get_footer();

