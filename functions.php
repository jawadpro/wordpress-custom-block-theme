<?php
/**
 * Jawad Dev theme bootstrap.
 *
 * @package JawadDev
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JAWAD_DEV_VERSION', '1.1.9' );
define( 'JAWAD_DEV_DIR', get_template_directory() );
define( 'JAWAD_DEV_URI', get_template_directory_uri() );

require_once JAWAD_DEV_DIR . '/inc/render.php';

add_action( 'after_setup_theme', 'jawad_dev_setup' );
function jawad_dev_setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_editor_style( array( 'assets/css/theme.css', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap' ) );
}

add_action( 'wp_head', 'jawad_dev_output_seo_fallbacks', 4 );
function jawad_dev_output_seo_fallbacks(): void {
	if ( ! is_front_page() ) {
		return;
	}

	$description = 'Hire Jawad Ilyas, a WordPress developer for fast, SEO-friendly websites, WooCommerce stores, Elementor builds, speed optimization, and AI workflow automation.';
	if ( ! jawad_dev_has_seo_plugin() ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'ProfessionalService',
		'name'        => 'Jawad Ilyas - WordPress Developer',
		'url'         => home_url( '/' ),
		'description' => $description,
		'image'       => get_site_icon_url() ?: '',
		'areaServed'  => 'Worldwide',
		'serviceType' => array(
			'WordPress Website Development',
			'Elementor Development',
			'WooCommerce Development',
			'WordPress Speed Optimization',
			'AI Workflow Automation',
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( array_filter( $schema ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

add_action( 'wp_head', 'jawad_dev_output_site_icon_fallback', 98 );
function jawad_dev_output_site_icon_fallback(): void {
	if ( ! has_site_icon() ) {
		return;
	}

	$icon_32  = get_site_icon_url( 32 );
	$icon_180 = get_site_icon_url( 180 );
	$icon_270 = get_site_icon_url( 270 );
	if ( $icon_32 ) {
		echo '<link rel="icon" href="' . esc_url( $icon_32 ) . '" sizes="32x32">' . "\n";
	}
	if ( $icon_180 ) {
		echo '<link rel="apple-touch-icon" href="' . esc_url( $icon_180 ) . '">' . "\n";
	}
	if ( $icon_270 ) {
		echo '<meta name="msapplication-TileImage" content="' . esc_url( $icon_270 ) . '">' . "\n";
	}
}

function jawad_dev_has_seo_plugin(): bool {
	return defined( 'WPSEO_VERSION' )
		|| defined( 'RANK_MATH_VERSION' )
		|| defined( 'AIOSEO_VERSION' )
		|| defined( 'SEOPRESS_VERSION' );
}

add_action( 'wp_enqueue_scripts', 'jawad_dev_enqueue_assets' );
function jawad_dev_enqueue_assets(): void {
	wp_enqueue_style( 'jawad-dev-fonts', 'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap', array(), null );
	wp_enqueue_style( 'jawad-dev-theme', JAWAD_DEV_URI . '/assets/css/theme.css', array( 'jawad-dev-fonts' ), JAWAD_DEV_VERSION );
	wp_enqueue_script( 'jawad-dev-theme', JAWAD_DEV_URI . '/assets/js/theme.js', array(), JAWAD_DEV_VERSION, true );
	wp_localize_script(
		'jawad-dev-theme',
		'JawadDev',
		array(
			'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
			'projectNonce' => wp_create_nonce( 'jawad_dev_project_modal' ),
		)
	);
}

add_action( 'enqueue_block_editor_assets', 'jawad_dev_enqueue_editor_assets' );
function jawad_dev_enqueue_editor_assets(): void {
	wp_enqueue_style( 'jawad-dev-editor', JAWAD_DEV_URI . '/assets/css/editor.css', array( 'wp-components' ), JAWAD_DEV_VERSION );
}

add_action( 'init', 'jawad_dev_register_project_content' );
function jawad_dev_register_project_content(): void {
	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'          => __( 'Projects', 'jawad-dev' ),
				'singular_name' => __( 'Project', 'jawad-dev' ),
				'add_new_item'  => __( 'Add New Project', 'jawad-dev' ),
				'edit_item'     => __( 'Edit Project', 'jawad-dev' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'projects' ),
		)
	);

	foreach ( array( 'project_type' => __( 'Project Types', 'jawad-dev' ), 'project_technology' => __( 'Technologies', 'jawad-dev' ) ) as $taxonomy => $label ) {
		register_taxonomy(
			$taxonomy,
			'project',
			array(
				'label'        => $label,
				'public'       => true,
				'show_in_rest' => true,
				'hierarchical' => 'project_type' === $taxonomy,
				'rewrite'      => array( 'slug' => str_replace( '_', '-', $taxonomy ) ),
			)
		);
	}

	$meta = array(
		'project_link'        => 'uri',
		'project_client'      => 'text',
		'project_year'        => 'text',
		'project_result'      => 'text',
		'project_accent'      => 'text',
		'project_button_text' => 'text',
	);

	foreach ( $meta as $key => $format ) {
		register_post_meta(
			'project',
			$key,
			array(
				'type'              => 'string',
				'single'            => true,
				'show_in_rest'      => true,
				'sanitize_callback' => 'uri' === $format ? 'esc_url_raw' : 'sanitize_text_field',
				'auth_callback'     => static function (): bool {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}

add_action( 'add_meta_boxes_project', 'jawad_dev_add_project_meta_box' );
function jawad_dev_add_project_meta_box(): void {
	add_meta_box( 'jawad-dev-project-details', __( 'Project Details', 'jawad-dev' ), 'jawad_dev_render_project_meta_box', 'project', 'normal', 'high' );
}

function jawad_dev_render_project_meta_box( WP_Post $post ): void {
	wp_nonce_field( 'jawad_dev_save_project_meta', 'jawad_dev_project_nonce' );
	$fields = array(
		'project_link'        => __( 'Live Project Link', 'jawad-dev' ),
		'project_client'      => __( 'Client / Industry', 'jawad-dev' ),
		'project_year'        => __( 'Year', 'jawad-dev' ),
		'project_result'      => __( 'Result / Outcome', 'jawad-dev' ),
		'project_accent'      => __( 'Accent color hex', 'jawad-dev' ),
		'project_button_text' => __( 'Button text', 'jawad-dev' ),
	);
	echo '<div class="jawad-dev-meta-grid">';
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, $key, true );
		printf(
			'<p><label for="%1$s"><strong>%2$s</strong></label><input id="%1$s" name="%1$s" type="text" value="%3$s" class="widefat"></p>',
			esc_attr( $key ),
			esc_html( $label ),
			esc_attr( $value )
		);
	}
	echo '<p>' . esc_html__( 'Use the featured image for the project screenshot. Use Project Types and Technologies for the tags shown on the card.', 'jawad-dev' ) . '</p></div>';
}

add_action( 'save_post_project', 'jawad_dev_save_project_meta' );
function jawad_dev_save_project_meta( int $post_id ): void {
	if ( ! isset( $_POST['jawad_dev_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['jawad_dev_project_nonce'] ) ), 'jawad_dev_save_project_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	foreach ( array( 'project_link', 'project_client', 'project_year', 'project_result', 'project_accent', 'project_button_text' ) as $key ) {
		$value = isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
		update_post_meta( $post_id, $key, 'project_link' === $key ? esc_url_raw( $value ) : $value );
	}
}

add_action( 'wp_ajax_jawad_dev_project_modal', 'jawad_dev_project_modal' );
add_action( 'wp_ajax_nopriv_jawad_dev_project_modal', 'jawad_dev_project_modal' );
function jawad_dev_project_modal(): void {
	check_ajax_referer( 'jawad_dev_project_modal', 'nonce' );

	$project_id = isset( $_POST['projectId'] ) ? absint( $_POST['projectId'] ) : 0;
	$post       = $project_id ? get_post( $project_id ) : null;
	if ( ! $post || 'project' !== $post->post_type || 'publish' !== $post->post_status ) {
		wp_send_json_error( array( 'message' => __( 'Project not found.', 'jawad-dev' ) ), 404 );
	}

	$image = get_the_post_thumbnail_url( $project_id, 'large' );
	$link  = get_post_meta( $project_id, 'project_link', true );
	$terms = get_the_terms( $project_id, 'project_technology' );
	$tags  = array();
	if ( $terms && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) {
			$tags[] = $term->name;
		}
	}

	wp_send_json_success(
		array(
			'title'      => get_the_title( $project_id ),
			'image'      => $image ?: '',
			'content'    => apply_filters( 'the_content', $post->post_content ),
			'link'       => $link ? esc_url_raw( $link ) : '',
			'client'     => get_post_meta( $project_id, 'project_client', true ),
			'year'       => get_post_meta( $project_id, 'project_year', true ),
			'result'     => get_post_meta( $project_id, 'project_result', true ),
			'tags'       => $tags,
			'buttonText' => get_post_meta( $project_id, 'project_button_text', true ) ?: __( 'Visit Project', 'jawad-dev' ),
		)
	);
}

add_action( 'init', 'jawad_dev_register_blocks' );
function jawad_dev_register_blocks(): void {
	wp_register_script(
		'jawad-dev-blocks-editor',
		JAWAD_DEV_URI . '/assets/js/editor.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-block-editor', 'wp-server-side-render', 'wp-i18n' ),
		JAWAD_DEV_VERSION,
		true
	);

	$block_meta = array();
	foreach ( jawad_dev_block_sections() as $slug => $section ) {
		$block_json = JAWAD_DEV_DIR . '/blocks/' . $slug . '/block.json';
		if ( file_exists( $block_json ) ) {
			$metadata = json_decode( (string) file_get_contents( $block_json ), true );
			if ( is_array( $metadata ) ) {
				$block_meta[ $slug ] = array_intersect_key(
					$metadata,
					array_flip( array( 'title', 'description', 'category', 'icon', 'supports', 'attributes' ) )
				);
			}
		}

		register_block_type(
			JAWAD_DEV_DIR . '/blocks/' . $slug,
			array(
				'render_callback' => static function ( array $attributes, string $content, WP_Block $block ) use ( $slug ): string {
					return jawad_dev_render_section( $slug, $attributes, $content, $block );
				},
			)
		);
	}

	wp_add_inline_script(
		'jawad-dev-blocks-editor',
		'window.JawadDevBlockMeta = ' . wp_json_encode( $block_meta, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . ';',
		'before'
	);
}
