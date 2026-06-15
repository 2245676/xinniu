<?php
/**
 * Malatang FAQ list.
 *
 * @package Xinniu_Hotpot
 */

$query = new WP_Query(
	array(
		'post_type'      => 'xinniu_faq',
		'posts_per_page' => 8,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'  => true,
		'tax_query'      => array(
			array(
				'taxonomy' => 'xinniu_faq_category',
				'field'    => 'slug',
				'terms'    => array( 'malatang', 'mala-tang', 'maratan' ),
			),
		),
	)
);

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="malatang-section" aria-labelledby="malatang-faq-title">
	<h2 id="malatang-faq-title"><?php esc_html_e( 'Malatang FAQ', 'xinniu-hotpot' ); ?></h2>
	<div class="faq-list">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			?>
			<article class="faq-item">
				<h3><?php the_title(); ?></h3>
				<div><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</section>

