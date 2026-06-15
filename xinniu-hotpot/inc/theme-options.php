<?php
/**
 * Theme options.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get default theme options.
 *
 * @return array<string, mixed>
 */
function xinniu_get_default_options() {
	return array(
		'brand_name_ja'          => '',
		'brand_name_zh'          => '',
		'brand_summary'          => '',
		'phone'                  => '',
		'reservation_phone'      => '',
		'email'                  => '',
		'address'                => '',
		'postal_code'            => '',
		'business_hours'         => '',
		'closed_days'            => '',
		'google_map_url'         => '',
		'google_map_embed'       => '',
		'instagram_url'          => '',
		'facebook_url'           => '',
		'tiktok_url'             => '',
		'line_url'               => '',
		'header_cta_label'       => '',
		'header_cta_url'         => '',
		'default_seo_title'      => '',
		'default_seo_description' => '',
		'enable_theme_schema'    => 1,
		'enable_theme_ogp'       => 1,
		'enable_llms_txt'        => 1,
		'malatang_page_id'       => 0,
		'malatang_cta_label'     => '',
		'malatang_cta_url'       => '',
		'malatang_keywords_ja'   => '',
		'malatang_keywords_zh'   => '',
	);
}

/**
 * Get all theme options.
 *
 * @return array<string, mixed>
 */
function xinniu_get_options() {
	$options = get_option( 'xinniu_options', array() );

	if ( ! is_array( $options ) ) {
		$options = array();
	}

	return wp_parse_args( $options, xinniu_get_default_options() );
}

/**
 * Get one theme option.
 *
 * @param string $key     Option key.
 * @param mixed  $default Fallback value.
 * @return mixed
 */
function xinniu_get_option( $key, $default = '' ) {
	$options = xinniu_get_options();

	return array_key_exists( $key, $options ) ? $options[ $key ] : $default;
}

/**
 * Sanitize the full options array.
 *
 * @param mixed $input Raw settings input.
 * @return array<string, mixed>
 */
function xinniu_sanitize_options( $input ) {
	$input    = is_array( $input ) ? $input : array();
	$defaults = xinniu_get_default_options();
	$output   = array();

	foreach ( $defaults as $key => $default ) {
		$value = isset( $input[ $key ] ) ? $input[ $key ] : $default;

		switch ( $key ) {
			case 'google_map_url':
			case 'instagram_url':
			case 'facebook_url':
			case 'tiktok_url':
			case 'line_url':
			case 'header_cta_url':
			case 'malatang_cta_url':
				$output[ $key ] = xinniu_sanitize_url( $value );
				break;

			case 'brand_summary':
			case 'address':
			case 'business_hours':
			case 'malatang_keywords_ja':
			case 'malatang_keywords_zh':
				$output[ $key ] = xinniu_sanitize_textarea( $value );
				break;

			case 'default_seo_description':
				$output[ $key ] = xinniu_sanitize_textarea( $value );
				break;

			case 'google_map_embed':
				$output[ $key ] = xinniu_sanitize_embed( $value );
				break;

			case 'enable_theme_schema':
			case 'enable_theme_ogp':
			case 'enable_llms_txt':
				$output[ $key ] = xinniu_sanitize_checkbox( $value );
				break;

			case 'malatang_page_id':
				$output[ $key ] = absint( $value );
				break;

			case 'email':
				$output[ $key ] = sanitize_email( is_scalar( $value ) ? (string) $value : '' );
				break;

			default:
				$output[ $key ] = sanitize_text_field( is_scalar( $value ) ? (string) $value : '' );
				break;
		}
	}

	return $output;
}

/**
 * Register settings.
 */
function xinniu_register_theme_options() {
	register_setting(
		'xinniu_options_group',
		'xinniu_options',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'xinniu_sanitize_options',
			'default'           => xinniu_get_default_options(),
		)
	);
}
add_action( 'admin_init', 'xinniu_register_theme_options' );

/**
 * Add options page under Appearance.
 */
function xinniu_add_options_page() {
	add_theme_page(
		esc_html__( 'Xinniu Hotpot Settings', 'xinniu-hotpot' ),
		esc_html__( 'Xinniu Hotpot', 'xinniu-hotpot' ),
		'manage_options',
		'xinniu-hotpot',
		'xinniu_render_options_page'
	);
}
add_action( 'admin_menu', 'xinniu_add_options_page' );

/**
 * Render a text input.
 *
 * @param string $key   Option key.
 * @param string $label Field label.
 * @param string $type  Input type.
 */
function xinniu_render_text_option( $key, $label, $type = 'text' ) {
	$value = xinniu_get_option( $key );
	?>
	<tr>
		<th scope="row">
			<label for="xinniu-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
		</th>
		<td>
			<input
				id="xinniu-<?php echo esc_attr( $key ); ?>"
				class="regular-text"
				type="<?php echo esc_attr( $type ); ?>"
				name="xinniu_options[<?php echo esc_attr( $key ); ?>]"
				value="<?php echo esc_attr( $value ); ?>"
			>
		</td>
	</tr>
	<?php
}

/**
 * Render a textarea option.
 *
 * @param string $key   Option key.
 * @param string $label Field label.
 */
function xinniu_render_textarea_option( $key, $label ) {
	$value = xinniu_get_option( $key );
	?>
	<tr>
		<th scope="row">
			<label for="xinniu-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
		</th>
		<td>
			<textarea
				id="xinniu-<?php echo esc_attr( $key ); ?>"
				class="large-text"
				rows="4"
				name="xinniu_options[<?php echo esc_attr( $key ); ?>]"
			><?php echo esc_textarea( $value ); ?></textarea>
		</td>
	</tr>
	<?php
}

/**
 * Render a checkbox option.
 *
 * @param string $key   Option key.
 * @param string $label Field label.
 */
function xinniu_render_checkbox_option( $key, $label ) {
	$value = (int) xinniu_get_option( $key );
	?>
	<tr>
		<th scope="row"><?php echo esc_html( $label ); ?></th>
		<td>
			<label>
				<input type="checkbox" name="xinniu_options[<?php echo esc_attr( $key ); ?>]" value="1" <?php checked( 1, $value ); ?>>
				<?php esc_html_e( 'Enabled', 'xinniu-hotpot' ); ?>
			</label>
		</td>
	</tr>
	<?php
}

/**
 * Render the settings page.
 */
function xinniu_render_options_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Xinniu Hotpot Settings', 'xinniu-hotpot' ); ?></h1>
		<form action="options.php" method="post">
			<?php settings_fields( 'xinniu_options_group' ); ?>

			<h2><?php esc_html_e( 'Brand', 'xinniu-hotpot' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				xinniu_render_text_option( 'brand_name_ja', __( 'Japanese Brand Name', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'brand_name_zh', __( 'Chinese Brand Name', 'xinniu-hotpot' ) );
				xinniu_render_textarea_option( 'brand_summary', __( 'Brand Summary', 'xinniu-hotpot' ) );
				?>
			</table>

			<h2><?php esc_html_e( 'Contact and Store', 'xinniu-hotpot' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				xinniu_render_text_option( 'phone', __( 'Phone', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'reservation_phone', __( 'Reservation Phone', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'email', __( 'Email', 'xinniu-hotpot' ), 'email' );
				xinniu_render_text_option( 'postal_code', __( 'Postal Code', 'xinniu-hotpot' ) );
				xinniu_render_textarea_option( 'address', __( 'Address', 'xinniu-hotpot' ) );
				xinniu_render_textarea_option( 'business_hours', __( 'Business Hours', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'closed_days', __( 'Closed Days', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'google_map_url', __( 'Google Map URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_textarea_option( 'google_map_embed', __( 'Google Map Embed', 'xinniu-hotpot' ) );
				?>
			</table>

			<h2><?php esc_html_e( 'Social and CTA', 'xinniu-hotpot' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				xinniu_render_text_option( 'instagram_url', __( 'Instagram URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_text_option( 'facebook_url', __( 'Facebook URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_text_option( 'tiktok_url', __( 'TikTok URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_text_option( 'line_url', __( 'LINE URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_text_option( 'header_cta_label', __( 'Header CTA Label', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'header_cta_url', __( 'Header CTA URL', 'xinniu-hotpot' ), 'url' );
				?>
			</table>

			<h2><?php esc_html_e( 'SEO and AI', 'xinniu-hotpot' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				xinniu_render_text_option( 'default_seo_title', __( 'Default SEO Title', 'xinniu-hotpot' ) );
				xinniu_render_textarea_option( 'default_seo_description', __( 'Default SEO Description', 'xinniu-hotpot' ) );
				xinniu_render_checkbox_option( 'enable_theme_schema', __( 'Theme Schema Output', 'xinniu-hotpot' ) );
				xinniu_render_checkbox_option( 'enable_theme_ogp', __( 'Theme Open Graph Output', 'xinniu-hotpot' ) );
				xinniu_render_checkbox_option( 'enable_llms_txt', __( 'llms.txt Output', 'xinniu-hotpot' ) );
				?>
			</table>

			<h2><?php esc_html_e( 'Malatang', 'xinniu-hotpot' ); ?></h2>
			<table class="form-table" role="presentation">
				<?php
				xinniu_render_text_option( 'malatang_page_id', __( 'Malatang Page ID', 'xinniu-hotpot' ), 'number' );
				xinniu_render_text_option( 'malatang_cta_label', __( 'Malatang CTA Label', 'xinniu-hotpot' ) );
				xinniu_render_text_option( 'malatang_cta_url', __( 'Malatang CTA URL', 'xinniu-hotpot' ), 'url' );
				xinniu_render_textarea_option( 'malatang_keywords_ja', __( 'Japanese Malatang Keywords', 'xinniu-hotpot' ) );
				xinniu_render_textarea_option( 'malatang_keywords_zh', __( 'Chinese Malatang Keywords', 'xinniu-hotpot' ) );
				?>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}
