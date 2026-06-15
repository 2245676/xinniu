<?php
/**
 * Front page news.
 *
 * @package Xinniu_Hotpot
 */

$news_query = new WP_Query(
	array(
		'post_type'      => 'xinniu_news',
		'posts_per_page' => 3,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
	)
);

if ( ! $news_query->have_posts() ) {
	return;
}
?>

<section class="front-section front-section--news" aria-labelledby="front-news-title">
	<div class="front-section__inner">
		<div class="front-section__header">
			<p class="front-section__eyebrow"><?php esc_html_e( 'News', 'xinniu-hotpot' ); ?></p>
			<h2 id="front-news-title"><?php esc_html_e( 'Latest Updates', 'xinniu-hotpot' ); ?></h2>
			<a class="front-section__link" href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><?php esc_html_e( 'All news', 'xinniu-hotpot' ); ?></a>
		</div>

		<div class="front-news-list">
			<?php
			while ( $news_query->have_posts() ) :
				$news_query->the_post();
				?>
				<article class="front-news-item">
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
