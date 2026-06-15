<?php
/**
 * Front page FAQ.
 *
 * @package Xinniu_Hotpot
 */

$faq_query = new WP_Query(
	array(
		'post_type'      => 'xinniu_faq',
		'posts_per_page' => 4,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'  => true,
	)
);

if ( ! $faq_query->have_posts() ) {
	return;
}
?>

<section class="front-section front-section--faq" aria-labelledby="front-faq-title">
	<div class="front-section__inner">
		<div class="front-section__header">
			<p class="front-section__eyebrow"><?php esc_html_e( 'FAQ', 'xinniu-hotpot' ); ?></p>
			<h2 id="front-faq-title"><?php esc_html_e( 'Common Questions', 'xinniu-hotpot' ); ?></h2>
			<a class="front-section__link" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'More FAQ', 'xinniu-hotpot' ); ?></a>
		</div>

		<div class="faq-list">
			<?php
			while ( $faq_query->have_posts() ) :
				$faq_query->the_post();
				?>
				<article class="faq-item">
					<h3><?php echo esc_html( get_the_title() ); ?></h3>
					<div><?php the_content(); ?></div>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
