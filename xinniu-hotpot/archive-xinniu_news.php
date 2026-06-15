<?php
/**
 * News archive template.
 *
 * @package Xinniu_Hotpot
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main__inner">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'News', 'xinniu-hotpot' ); ?></h1>
			<p><?php esc_html_e( 'Latest opening updates, seasonal information, announcements, and events.', 'xinniu-hotpot' ); ?></p>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="news-list">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/news/card', 'news' );
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
