<?php
/**
 * Custom meta boxes.
 *
 * @package Xinniu_Hotpot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get field definitions for post meta.
 *
 * @return array<string, array<string, mixed>>
 */
function xinniu_get_meta_fields() {
	return array(
		'_xinniu_price'                 => array(
			'label'    => __( 'Price', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'dish', 'malatang' ),
		),
		'_xinniu_price_note'            => array(
			'label'    => __( 'Price Note', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'dish', 'malatang' ),
		),
		'_xinniu_ingredients'           => array(
			'label'    => __( 'Ingredients', 'xinniu-hotpot' ),
			'type'     => 'textarea',
			'sanitize' => 'textarea',
			'contexts' => array( 'dish' ),
		),
		'_xinniu_is_signature'          => array(
			'label'    => __( 'Signature Dish', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'dish' ),
		),
		'_xinniu_is_recommended'        => array(
			'label'    => __( 'Recommended', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'dish', 'malatang' ),
		),
		'_xinniu_is_limited'            => array(
			'label'    => __( 'Limited', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'dish' ),
		),
		'_xinniu_woocommerce_product_id' => array(
			'label'    => __( 'WooCommerce Product ID', 'xinniu-hotpot' ),
			'type'     => 'number',
			'sanitize' => 'absint',
			'contexts' => array( 'dish' ),
		),
		'_xinniu_malatang_item_type'    => array(
			'label'    => __( 'Malatang Item Type', 'xinniu-hotpot' ),
			'type'     => 'select',
			'sanitize' => 'key',
			'contexts' => array( 'malatang' ),
			'options'  => array(
				'ingredient' => __( 'Ingredient', 'xinniu-hotpot' ),
				'soup_base'  => __( 'Soup Base', 'xinniu-hotpot' ),
				'topping'    => __( 'Topping', 'xinniu-hotpot' ),
				'set'        => __( 'Set', 'xinniu-hotpot' ),
			),
		),
		'_xinniu_show_on_malatang_page' => array(
			'label'    => __( 'Show on Malatang Page', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'malatang' ),
		),
		'_xinniu_store_postal_code'     => array(
			'label'    => __( 'Postal Code', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_address'         => array(
			'label'    => __( 'Address', 'xinniu-hotpot' ),
			'type'     => 'textarea',
			'sanitize' => 'textarea',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_phone'           => array(
			'label'    => __( 'Phone', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_business_hours'  => array(
			'label'    => __( 'Business Hours', 'xinniu-hotpot' ),
			'type'     => 'textarea',
			'sanitize' => 'textarea',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_closed_days'     => array(
			'label'    => __( 'Closed Days', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_google_map_url'  => array(
			'label'    => __( 'Google Map URL', 'xinniu-hotpot' ),
			'type'     => 'url',
			'sanitize' => 'url',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_latitude'        => array(
			'label'    => __( 'Latitude', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'store' ),
		),
		'_xinniu_store_longitude'       => array(
			'label'    => __( 'Longitude', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'store' ),
		),
		'_xinniu_cta_label'             => array(
			'label'    => __( 'CTA Label', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'home_section', 'promo' ),
		),
		'_xinniu_cta_url'               => array(
			'label'    => __( 'CTA URL', 'xinniu-hotpot' ),
			'type'     => 'url',
			'sanitize' => 'url',
			'contexts' => array( 'home_section', 'promo' ),
		),
		'_xinniu_is_enabled'            => array(
			'label'    => __( 'Enabled', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'home_section', 'promo' ),
		),
		'_xinniu_seo_title'             => array(
			'label'    => __( 'SEO Title', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_seo_description'       => array(
			'label'    => __( 'SEO Description', 'xinniu-hotpot' ),
			'type'     => 'textarea',
			'sanitize' => 'textarea',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_canonical_url'         => array(
			'label'    => __( 'Canonical URL', 'xinniu-hotpot' ),
			'type'     => 'url',
			'sanitize' => 'url',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_og_title'              => array(
			'label'    => __( 'Open Graph Title', 'xinniu-hotpot' ),
			'type'     => 'text',
			'sanitize' => 'text',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_og_description'        => array(
			'label'    => __( 'Open Graph Description', 'xinniu-hotpot' ),
			'type'     => 'textarea',
			'sanitize' => 'textarea',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_robots_noindex'        => array(
			'label'    => __( 'Noindex', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'seo' ),
		),
		'_xinniu_robots_nofollow'       => array(
			'label'    => __( 'Nofollow', 'xinniu-hotpot' ),
			'type'     => 'checkbox',
			'sanitize' => 'checkbox',
			'contexts' => array( 'seo' ),
		),
	);
}

/**
 * Get contexts by post type.
 *
 * @param string $post_type Post type.
 * @return string[]
 */
function xinniu_get_meta_contexts_for_post_type( $post_type ) {
	$contexts = array( 'seo' );

	switch ( $post_type ) {
		case 'xinniu_dish':
			$contexts[] = 'dish';
			break;
		case 'xinniu_malatang_item':
			$contexts[] = 'malatang';
			break;
		case 'xinniu_store':
			$contexts[] = 'store';
			break;
		case 'xinniu_home_section':
			$contexts[] = 'home_section';
			break;
		case 'xinniu_promo':
			$contexts[] = 'promo';
			break;
	}

	return $contexts;
}

/**
 * Register meta boxes.
 */
function xinniu_add_meta_boxes() {
	$post_types = array( 'post', 'page', 'xinniu_dish', 'xinniu_news', 'xinniu_faq', 'xinniu_store', 'xinniu_home_section', 'xinniu_malatang_item', 'xinniu_promo' );

	foreach ( $post_types as $post_type ) {
		$contexts = xinniu_get_meta_contexts_for_post_type( $post_type );

		if ( count( $contexts ) > 1 ) {
			add_meta_box(
				'xinniu_details',
				esc_html__( 'Xinniu Details', 'xinniu-hotpot' ),
				'xinniu_render_details_meta_box',
				$post_type,
				'normal',
				'default'
			);
		}

		add_meta_box(
			'xinniu_seo',
			esc_html__( 'Xinniu SEO', 'xinniu-hotpot' ),
			'xinniu_render_seo_meta_box',
			$post_type,
			'normal',
			'low'
		);
	}
}
add_action( 'add_meta_boxes', 'xinniu_add_meta_boxes' );

/**
 * Render details meta box.
 *
 * @param WP_Post $post Current post.
 */
function xinniu_render_details_meta_box( $post ) {
	wp_nonce_field( 'xinniu_save_meta', 'xinniu_meta_nonce' );
	$contexts = xinniu_get_meta_contexts_for_post_type( $post->post_type );
	xinniu_render_meta_fields( $post, $contexts, false );
}

/**
 * Render SEO meta box.
 *
 * @param WP_Post $post Current post.
 */
function xinniu_render_seo_meta_box( $post ) {
	wp_nonce_field( 'xinniu_save_meta', 'xinniu_meta_nonce' );
	xinniu_render_meta_fields( $post, array( 'seo' ), true );
}

/**
 * Render fields for matching contexts.
 *
 * @param WP_Post  $post             Current post.
 * @param string[] $contexts         Context names.
 * @param bool     $include_seo_only Whether only SEO fields are being rendered.
 */
function xinniu_render_meta_fields( $post, $contexts, $include_seo_only ) {
	$fields = xinniu_get_meta_fields();
	?>
	<div class="xinniu-meta-fields">
		<?php
		foreach ( $fields as $key => $field ) {
			$field_contexts = isset( $field['contexts'] ) && is_array( $field['contexts'] ) ? $field['contexts'] : array();
			$matches        = array_intersect( $contexts, $field_contexts );

			if ( empty( $matches ) ) {
				continue;
			}

			if ( $include_seo_only && ! in_array( 'seo', $field_contexts, true ) ) {
				continue;
			}

			if ( ! $include_seo_only && in_array( 'seo', $field_contexts, true ) ) {
				continue;
			}

			xinniu_render_meta_field( $post, $key, $field );
		}
		?>
	</div>
	<?php
}

/**
 * Render one meta field.
 *
 * @param WP_Post              $post  Current post.
 * @param string               $key   Meta key.
 * @param array<string, mixed> $field Field definition.
 */
function xinniu_render_meta_field( $post, $key, $field ) {
	$value = get_post_meta( $post->ID, $key, true );
	$type  = isset( $field['type'] ) ? (string) $field['type'] : 'text';
	?>
	<p class="xinniu-admin-field">
		<label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label><br>
		<?php if ( 'textarea' === $type ) : ?>
			<textarea id="<?php echo esc_attr( $key ); ?>" class="large-text" rows="3" name="xinniu_meta[<?php echo esc_attr( $key ); ?>]"><?php echo esc_textarea( $value ); ?></textarea>
		<?php elseif ( 'checkbox' === $type ) : ?>
			<label>
				<input id="<?php echo esc_attr( $key ); ?>" type="checkbox" name="xinniu_meta[<?php echo esc_attr( $key ); ?>]" value="1" <?php checked( 1, (int) $value ); ?>>
				<?php esc_html_e( 'Yes', 'xinniu-hotpot' ); ?>
			</label>
		<?php elseif ( 'select' === $type ) : ?>
			<select id="<?php echo esc_attr( $key ); ?>" name="xinniu_meta[<?php echo esc_attr( $key ); ?>]">
				<?php foreach ( $field['options'] as $option_key => $option_label ) : ?>
					<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>>
						<?php echo esc_html( $option_label ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php else : ?>
			<input id="<?php echo esc_attr( $key ); ?>" class="regular-text" type="<?php echo esc_attr( $type ); ?>" name="xinniu_meta[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $value ); ?>">
		<?php endif; ?>
	</p>
	<?php
}

/**
 * Save meta box data.
 *
 * @param int $post_id Post ID.
 */
function xinniu_save_post_meta( $post_id ) {
	if ( ! isset( $_POST['xinniu_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['xinniu_meta_nonce'] ) ), 'xinniu_save_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$raw_meta = isset( $_POST['xinniu_meta'] ) && is_array( $_POST['xinniu_meta'] ) ? wp_unslash( $_POST['xinniu_meta'] ) : array();
	$fields   = xinniu_get_meta_fields();

	foreach ( $fields as $key => $field ) {
		$raw_value = isset( $raw_meta[ $key ] ) ? $raw_meta[ $key ] : '';

		switch ( $field['sanitize'] ) {
			case 'textarea':
				$value = xinniu_sanitize_textarea( $raw_value );
				break;
			case 'checkbox':
				$value = xinniu_sanitize_checkbox( $raw_value );
				break;
			case 'url':
				$value = xinniu_sanitize_url( $raw_value );
				break;
			case 'absint':
				$value = absint( $raw_value );
				break;
			case 'key':
				$value = sanitize_key( $raw_value );
				break;
			default:
				$value = sanitize_text_field( is_scalar( $raw_value ) ? (string) $raw_value : '' );
				break;
		}

		if ( '' === $value || 0 === $value ) {
			delete_post_meta( $post_id, $key );
		} else {
			update_post_meta( $post_id, $key, $value );
		}
	}
}
add_action( 'save_post', 'xinniu_save_post_meta' );
