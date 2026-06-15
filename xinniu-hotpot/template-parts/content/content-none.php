<?php
/**
 * Empty content state.
 *
 * @package Xinniu_Hotpot
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing found', 'xinniu-hotpot' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'No matching content was found. Try a different search term.', 'xinniu-hotpot' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>

