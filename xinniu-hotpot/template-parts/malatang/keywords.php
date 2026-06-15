<?php
/**
 * Malatang keywords.
 *
 * @package Xinniu_Hotpot
 */

$keywords_ja = trim( (string) xinniu_get_option( 'malatang_keywords_ja' ) );
$keywords_zh = trim( (string) xinniu_get_option( 'malatang_keywords_zh' ) );

if ( '' === $keywords_ja ) {
	$keywords_ja = "麻辣湯\nマーラータン\nマーラー湯\nマラタン\n中国麻辣湯\n四川麻辣湯\n福岡 麻辣湯\n博多 麻辣湯\n福岡 マーラータン\n博多 マーラータン";
}

if ( '' === $keywords_zh ) {
	$keywords_zh = "麻辣烫\n福冈麻辣烫\n博多麻辣烫\n日本麻辣烫\n福冈四川料理\n福冈火锅";
}
?>

<section class="malatang-section malatang-section--keywords" aria-labelledby="malatang-keywords-title">
	<h2 id="malatang-keywords-title"><?php esc_html_e( 'Malatang Search Guide', 'xinniu-hotpot' ); ?></h2>
	<div class="malatang-keywords">
		<div>
			<h3><?php esc_html_e( 'Japanese Keywords', 'xinniu-hotpot' ); ?></h3>
			<ul>
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $keywords_ja ) ) ) as $keyword ) : ?>
					<li><?php echo esc_html( $keyword ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div>
			<h3><?php esc_html_e( 'Chinese Keywords', 'xinniu-hotpot' ); ?></h3>
			<ul>
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $keywords_zh ) ) ) as $keyword ) : ?>
					<li><?php echo esc_html( $keyword ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

