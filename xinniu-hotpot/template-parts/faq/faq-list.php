<?php
/**
 * FAQ list.
 *
 * @package Xinniu_Hotpot
 */

$faq_query = new WP_Query(
	array(
		'post_type'      => 'xinniu_faq',
		'posts_per_page' => 30,
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

<section class="faq-section" aria-labelledby="faq-list-title">
	<h2 id="faq-list-title"><?php esc_html_e( 'Frequently Asked Questions', 'xinniu-hotpot' ); ?></h2>
	<div class="faq-list">
		<?php
		while ( $faq_query->have_posts() ) :
			$faq_query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'faq-item' ); ?>>
				<h3><?php echo esc_html( get_the_title() ); ?></h3>
				<div><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</section>

