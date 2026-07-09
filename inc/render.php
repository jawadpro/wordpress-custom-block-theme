<?php
/**
 * Block render helpers.
 *
 * @package JawadDev
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function jawad_dev_block_sections(): array {
	return array(
		'site-header'   => array( 'title' => 'JD Site Header' ),
		'hero'          => array( 'title' => 'JD Hero' ),
		'services'      => array( 'title' => 'JD Services' ),
		'why'           => array( 'title' => 'JD Why Hire Me' ),
		'solutions'     => array( 'title' => 'JD Solutions' ),
		'process'       => array( 'title' => 'JD Process' ),
		'packages'      => array( 'title' => 'JD Packages' ),
		'projects'      => array( 'title' => 'JD Projects' ),
		'stack'         => array( 'title' => 'JD Tech Stack' ),
		'testimonials'  => array( 'title' => 'JD Testimonials' ),
		'faq'           => array( 'title' => 'JD FAQ' ),
		'cta'           => array( 'title' => 'JD Final CTA' ),
		'site-footer'   => array( 'title' => 'JD Site Footer' ),
		'contact-modal' => array( 'title' => 'JD Contact Modal' ),
	);
}

function jawad_dev_default_attrs( string $slug ): array {
	$defaults = array(
		'eyebrow'     => '',
		'title'       => '',
		'description' => '',
		'buttonText'  => '',
		'buttonUrl'   => '#contact',
		'enabled'     => true,
	);

	$by_slug = array(
		'site-header'   => array( 'brand' => 'jawad.dev', 'ctaText' => 'Hire Me' ),
		'hero'          => array(
			'eyebrow'      => 'TOP RATED WORDPRESS DEVELOPER',
			'title'        => 'WordPress Developer for Fast, Modern & SEO-Friendly Websites',
			'description'  => 'I’m Jawad Ilyas, a WordPress developer and full-stack web designer helping businesses build fast, mobile-friendly, SEO-ready, and conversion-focused websites. I specialize in Elementor, WooCommerce, custom WordPress development, website fixes, speed optimization, landing pages, and AI workflow automation that turns visitors into clients.',
			'buttonText'   => 'Hire WordPress Developer',
			'secondaryText'=> 'View My Work',
			'imageId'      => 0,
			'imageUrl'     => '',
			'showBadge'    => true,
			'secondaryUrl' => '#work',
			'stats'        => array(
				array( 'value' => '10+', 'label' => 'Years Experience' ),
				array( 'value' => '500+', 'label' => 'Projects Completed' ),
				array( 'value' => '420+', 'label' => 'Happy Clients' ),
				array( 'value' => '2K+', 'label' => 'Positive Reviews' ),
			),
		),
		'services'      => array( 'eyebrow' => '// SERVICES', 'title' => 'WordPress Services I Offer', 'description' => 'From full website builds to small fixes, I help businesses create fast, clean, professional, and easy-to-manage WordPress websites.', 'items' => jawad_dev_cards_services() ),
		'why'           => array( 'eyebrow' => '// WHY HIRE ME', 'title' => 'Why Businesses Hire Me as Their WordPress Developer', 'items' => jawad_dev_why_items() ),
		'solutions'     => array( 'eyebrow' => '// SOLUTIONS', 'title' => 'Built for Real Business Needs', 'items' => jawad_dev_solution_items() ),
		'process'       => array( 'eyebrow' => '// PROCESS', 'title' => 'My Website Development Process', 'items' => jawad_dev_process_items() ),
		'packages'      => array( 'eyebrow' => '// PACKAGES', 'title' => 'Website Development Packages', 'items' => jawad_dev_package_items() ),
		'projects'      => array( 'eyebrow' => '// PORTFOLIO', 'title' => 'Recent Website Work', 'description' => 'A few representative WordPress builds, optimization projects, and WooCommerce improvements.', 'postsToShow' => 4 ),
		'stack'         => array( 'eyebrow' => '// STACK', 'title' => 'Tools & Technologies I Work With', 'items' => jawad_dev_stack_items() ),
		'testimonials'  => array( 'eyebrow' => '// TESTIMONIALS', 'title' => 'Trusted by Clients Worldwide', 'items' => jawad_dev_testimonial_items() ),
		'faq'           => array( 'eyebrow' => '// FAQ', 'title' => 'Frequently Asked Questions', 'items' => jawad_dev_faq_items() ),
		'cta'           => array( 'title' => 'Have a WordPress project in mind?', 'description' => 'Tell me what you want to build, fix, or improve. I’ll help you choose the right approach and next steps.', 'buttonText' => 'Hire Me Now', 'buttonUrl' => '#contact', 'secondaryText' => 'Discuss Your Project', 'secondaryUrl' => '#contact' ),
		'site-footer'   => array( 'brand' => 'Jawad Ilyas', 'description' => 'WordPress Developer & Full-Stack Web Designer' ),
		'contact-modal' => array(
			'gravityFormId'  => 0,
			'modalTitle'     => 'Start a project request',
			'modalSubtitle'  => 'Tell me what you need and I’ll reply with next steps.',
			'gravityEyebrow' => '> project_request',
			'gravityServiceParam' => 'service',
			'gravityBudgetParam'  => 'budget',
			'gravityTimelineParam'=> 'timeline',
		),
	);

	return array_merge( $defaults, $by_slug[ $slug ] ?? array() );
}

function jawad_dev_attrs( string $slug, array $attrs ): array {
	return array_merge( jawad_dev_default_attrs( $slug ), $attrs );
}

function jawad_dev_attr_items( array $a, array $fallback ): array {
	return ! empty( $a['items'] ) && is_array( $a['items'] ) ? $a['items'] : $fallback;
}

function jawad_dev_lines( $value ): array {
	if ( is_array( $value ) ) {
		return array_values( array_filter( array_map( 'strval', $value ) ) );
	}

	if ( is_string( $value ) ) {
		return array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $value ) ) ) );
	}

	return array();
}

function jawad_dev_render_section( string $slug, array $attributes = array(), string $content = '', ?WP_Block $block = null ): string {
	$a = jawad_dev_attrs( $slug, $attributes );
	if ( empty( $a['enabled'] ) ) {
		return '';
	}
	$fn = 'jawad_dev_render_' . str_replace( '-', '_', $slug );
	if ( function_exists( $fn ) ) {
		return $fn( $a );
	}
	return '';
}

function jawad_dev_icon_defs(): string {
	return '<svg width="0" height="0" class="jd-icon-defs" aria-hidden="true"><defs><linearGradient id="icoA" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#60a5fa"></stop><stop offset="1" stop-color="#22d3ee"></stop></linearGradient><linearGradient id="icoB" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#818cf8"></stop><stop offset="1" stop-color="#c084fc"></stop></linearGradient></defs></svg>';
}

function jawad_dev_svg( string $name ): string {
	$icons = array(
		'menu'       => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round"></path></svg>',
		'arrow'      => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'arrow-sm'   => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'check'      => '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12.5 10 17.5 19 7" stroke="#22d3ee" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'done'       => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12.5 10 17.5 19 7" stroke="#34d399" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'wordpress'  => '<svg width="17" height="17" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="url(#icoA)" stroke-width="1.6"></circle><path d="M4.5 9h4.2l2.1 6.5L13 9h3.6l2 6.5" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'elementor'  => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="3" stroke="url(#icoB)" stroke-width="1.6"></rect><path d="M8.5 8.5v7M12 8.5h3.5M12 12h3.5M12 15.5h3.5" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'woo'        => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16l-1.5 9.5a2 2 0 0 1-2 1.7h-9a2 2 0 0 1-2-1.7L4 7Z" stroke="#34d399" stroke-width="1.6" stroke-linejoin="round"></path><path d="M9 10.5c.4 1.6 1.5 2.6 3 2.6s2.6-1 3-2.6" stroke="#34d399" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'ai'         => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v3M12 18v3M4.5 12h3M16.5 12h3M6.8 6.8l2.1 2.1M15.1 15.1l2.1 2.1M17.2 6.8l-2.1 2.1M8.9 15.1l-2.1 2.1" stroke="#a78bfa" stroke-width="1.6" stroke-linecap="round"></path><circle cx="12" cy="12" r="4" stroke="#22d3ee" stroke-width="1.6"></circle><circle cx="12" cy="12" r="1.2" fill="#a78bfa"></circle></svg>',
		'service-1'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2.5" stroke="url(#icoA)" stroke-width="1.6"></rect><path d="M3 8.5h18M6 12.5h5M6 15.5h8" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'service-2'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="3" width="8" height="8" rx="2" stroke="url(#icoB)" stroke-width="1.6"></rect><rect x="13" y="3" width="8" height="8" rx="2" stroke="url(#icoB)" stroke-width="1.6"></rect><rect x="3" y="13" width="8" height="8" rx="2" stroke="url(#icoB)" stroke-width="1.6"></rect><rect x="13" y="13" width="8" height="8" rx="2" stroke="url(#icoB)" stroke-width="1.6"></rect></svg>',
		'service-3'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16l-1.5 9.5a2 2 0 0 1-2 1.7h-9a2 2 0 0 1-2-1.7L4 7Z" stroke="url(#icoA)" stroke-width="1.6" stroke-linejoin="round"></path><path d="M8.5 7V6a3.5 3.5 0 0 1 7 0v1M9 11c.4 1.6 1.5 2.6 3 2.6s2.6-1 3-2.6" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'service-4'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><ellipse cx="12" cy="13" rx="5" ry="6" stroke="url(#icoA)" stroke-width="1.6"></ellipse><path d="M12 10v4M9 4l1.8 2.2M15 4l-1.8 2.2M4 10h3M4 16h3.5M20 10h-3M20 16h-3.5" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'service-5'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 20a8 8 0 1 1 8-8" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round"></path><path d="M12 12l4.5-4.5" stroke="url(#icoB)" stroke-width="1.8" stroke-linecap="round"></path><circle cx="12" cy="12" r="1.6" fill="url(#icoB)"></circle></svg>',
		'service-6'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="7" height="14" rx="2" stroke="url(#icoA)" stroke-width="1.6"></rect><rect x="14" y="5" width="7" height="14" rx="2" stroke="url(#icoA)" stroke-width="1.6"></rect><path d="M10.5 12h3m-1.2-1.5 1.5 1.5-1.5 1.5" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'service-7'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2.5" stroke="url(#icoA)" stroke-width="1.6"></rect><path d="M3 8h18" stroke="url(#icoA)" stroke-width="1.6"></path><rect x="6" y="11" width="7" height="3" rx="1" fill="url(#icoA)" opacity="0.7"></rect><path d="M6 17h9" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'service-8'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-3 8.4-7 10-4-1.6-7-5.5-7-10V6l7-3Z" stroke="url(#icoB)" stroke-width="1.6" stroke-linejoin="round"></path><path d="M9 12l2 2 4-4.5" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'service-9'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8.5 7.5 4 12l4.5 4.5M15.5 7.5 20 12l-4.5 4.5M13.2 5l-2.4 14" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'service-10' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="6" cy="6" r="2.5" stroke="url(#icoA)" stroke-width="1.6"></circle><circle cx="18" cy="6" r="2.5" stroke="url(#icoA)" stroke-width="1.6"></circle><circle cx="12" cy="18" r="2.5" stroke="url(#icoA)" stroke-width="1.6"></circle><path d="M7.8 7.8 10.5 16M16.2 7.8 13.5 16M8.5 6h7" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'service-11' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3v3M12 18v3M4.5 12h3M16.5 12h3M6.8 6.8l2.1 2.1M15.1 15.1l2.1 2.1M17.2 6.8l-2.1 2.1M8.9 15.1l-2.1 2.1" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round"></path><circle cx="12" cy="12" r="4.3" stroke="url(#icoA)" stroke-width="1.6"></circle><path d="M10.4 12.2 11.5 13.3 14 10.7" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
		'solution-1' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="4" width="18" height="13" rx="2" stroke="url(#icoA)" stroke-width="1.6"></rect><path d="M8 20.5h8M12 17v3.5M6.5 8.5h5M6.5 11.5h8" stroke="url(#icoA)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'solution-2' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M13 3 5 13.5h5L9.5 21 18 10.5h-5L13 3Z" stroke="url(#icoA)" stroke-width="1.6" stroke-linejoin="round"></path></svg>',
		'solution-3' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16l-1.5 9.5a2 2 0 0 1-2 1.7h-9a2 2 0 0 1-2-1.7L4 7Z" stroke="url(#icoB)" stroke-width="1.6" stroke-linejoin="round"></path><path d="M8.5 7V6a3.5 3.5 0 0 1 7 0v1" stroke="url(#icoB)" stroke-width="1.6" stroke-linecap="round"></path></svg>',
		'solution-4' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M14.5 6.5a4.5 4.5 0 0 0-6 6L4 17v3h3l4.5-4.5a4.5 4.5 0 0 0 6-6L14 13l-3-3 3.5-3.5Z" stroke="url(#icoA)" stroke-width="1.6" stroke-linejoin="round"></path></svg>',
		'star'       => '<svg width="15" height="15" viewBox="0 0 24 24" fill="#fbbf24" aria-hidden="true"><path d="m12 2 3 6.6 7 .8-5.2 4.8 1.4 7L12 17.7 5.8 21.2l1.4-7L2 9.4l7-.8L12 2Z"></path></svg>',
	);
	return $icons[ $name ] ?? '';
}

function jawad_dev_render_site_header( array $a ): string {
	$links = array( 'Services' => '#services', 'Work' => '#work', 'Packages' => '#packages', 'Process' => '#process', 'FAQ' => '#faq', 'Contact' => '#contact' );
	ob_start();
	echo jawad_dev_icon_defs();
	?>
	<div class="jd-grid-bg"></div><div class="jd-cursor-glow" aria-hidden="true"></div>
	<nav class="jd-nav" aria-label="<?php esc_attr_e( 'Main navigation', 'jawad-dev' ); ?>">
		<div class="jd-container jd-nav__inner">
			<a class="jd-brand" href="#top"><span class="jd-brand__mark">&lt;/&gt;</span><span><?php echo wp_kses_post( str_replace( '.dev', '<span>.dev</span>', esc_html( $a['brand'] ) ) ); ?></span></a>
			<div class="jd-nav__links">
				<?php foreach ( $links as $label => $url ) : ?>
					<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
				<?php endforeach; ?>
			</div>
			<a class="jd-btn jd-btn--small jd-open-form jd-hire-anim" href="#contact"><?php echo esc_html( $a['ctaText'] ); ?></a>
			<button type="button" class="jd-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'jawad-dev' ); ?>" aria-expanded="false"><?php echo jawad_dev_svg( 'menu' ); ?></button>
		</div>
		<div class="jd-mobile-menu">
			<?php foreach ( $links as $label => $url ) : ?>
				<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
			<a class="jd-hire-anim jd-open-form" href="#contact"><?php echo esc_html( $a['ctaText'] ); ?></a>
		</div>
	</nav>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_hero( array $a ): string {
	$stats = ! empty( $a['stats'] ) && is_array( $a['stats'] ) ? $a['stats'] : jawad_dev_default_attrs( 'hero' )['stats'];
	$image = $a['imageUrl'] ? $a['imageUrl'] : '';
	if ( ! $image && ! empty( $a['imageId'] ) ) {
		$image = wp_get_attachment_image_url( (int) $a['imageId'], 'large' );
	}
	ob_start();
	?>
	<header id="top" class="jd-hero jd-section">
		<div class="jd-orb jd-orb--hero-a"></div><div class="jd-orb jd-orb--hero-b"></div>
		<div class="jd-container jd-hero__grid">
			<div class="jd-hero__copy">
				<?php if ( ! empty( $a['showBadge'] ) ) : ?><div class="jd-pill"><span></span><?php echo esc_html( $a['eyebrow'] ); ?></div><?php endif; ?>
				<h1><?php echo wp_kses_post( preg_replace( '/(Fast, Modern &amp; SEO-Friendly|Fast, Modern & SEO-Friendly)/', '<span>$1</span>', esc_html( $a['title'] ) ) ); ?></h1>
				<p><?php echo esc_html( $a['description'] ); ?></p>
				<div class="jd-actions"><a class="jd-btn jd-open-form" href="<?php echo esc_url( $a['buttonUrl'] ); ?>"><?php echo esc_html( $a['buttonText'] ); ?> <?php echo jawad_dev_svg( 'arrow' ); ?></a><a class="jd-btn jd-btn--ghost" href="<?php echo esc_url( $a['secondaryUrl'] ); ?>"><?php echo esc_html( $a['secondaryText'] ); ?></a></div>
				<div class="jd-stats"><?php foreach ( $stats as $stat ) : ?><div><strong><?php echo esc_html( $stat['value'] ?? ( $stat[0] ?? '' ) ); ?></strong><span><?php echo esc_html( $stat['label'] ?? ( $stat[1] ?? '' ) ); ?></span></div><?php endforeach; ?></div>
			</div>
			<div class="jd-hero-visual">
				<div class="jd-portrait"><?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( 'Portrait of Jawad Ilyas', 'jawad-dev' ); ?>"><?php else : ?><div class="jd-portrait__placeholder">JI</div><?php endif; ?></div>
				<div class="jd-float-card jd-code-card"><div class="jd-window-dots"><span></span><span></span><span></span><em>functions.php</em></div><code><b>add_action</b>('need_website_help',<br><i>'hire_jawad'</i>);<br><small>// your business solution</small></code></div>
				<div class="jd-float-card jd-speed-card"><div class="jd-score"><span>98</span></div><div><strong>PageSpeed</strong><span>Core Web Vitals ✓</span></div></div>
				<div class="jd-badge-stack"><span><?php echo jawad_dev_svg( 'wordpress' ); ?>WordPress</span><span><?php echo jawad_dev_svg( 'elementor' ); ?>Elementor</span><span><?php echo jawad_dev_svg( 'woo' ); ?>WooCommerce</span><span><?php echo jawad_dev_svg( 'ai' ); ?>AI Automation</span></div>
			</div>
		</div>
	</header>
	<?php
	return ob_get_clean();
}

function jawad_dev_section_heading( array $a, string $id ): string {
	return '<div class="jd-heading"><div class="jd-eyebrow">' . esc_html( $a['eyebrow'] ) . '</div><h2 id="' . esc_attr( $id ) . '">' . esc_html( $a['title'] ) . '</h2>' . ( $a['description'] ? '<p>' . esc_html( $a['description'] ) . '</p>' : '' ) . '</div>';
}

function jawad_dev_cards_services(): array {
	return array(
		array( 'title' => 'Custom WordPress Website Design', 'text' => 'Complete business websites designed and built from scratch, clean, modern, and easy for you to manage.', 'code' => 'wp_custom_build()', 'icon' => 'service-1' ),
		array( 'title' => 'Elementor & Elementor Pro Development', 'text' => 'Pixel-perfect, responsive Elementor builds with clean structure, global styles, and reusable templates.', 'code' => 'elementor.pro', 'icon' => 'service-2' ),
		array( 'title' => 'WooCommerce Store Development', 'text' => 'Product pages, cart, checkout, payment gateways, and store layouts that feel smooth and trustworthy.', 'code' => 'woocommerce_store()', 'icon' => 'service-3' ),
		array( 'title' => 'WordPress Bug Fixing', 'text' => 'Theme, plugin, Elementor, WooCommerce, responsive, and layout issues debugged carefully.', 'code' => 'debug_wp_issue()', 'icon' => 'service-4' ),
		array( 'title' => 'WordPress Speed Optimization', 'text' => 'Core Web Vitals improvements, image optimization, cache setup, script cleanup, and performance fixes.', 'code' => 'optimize_assets()', 'icon' => 'service-5' ),
		array( 'title' => 'Figma to WordPress', 'text' => 'Responsive builds from Figma designs using Elementor, custom themes, or clean frontend development.', 'code' => 'figma_to_wp()', 'icon' => 'service-6' ),
		array( 'title' => 'Landing Page Design', 'text' => 'Focused pages for services, products, ads, and lead generation with clear CTAs.', 'code' => 'landing_page()', 'icon' => 'service-7' ),
		array( 'title' => 'Maintenance & Security', 'text' => 'Updates, backups, malware cleanup, monitoring, and dependable ongoing care.', 'code' => 'site_care()', 'icon' => 'service-8' ),
		array( 'title' => 'ACF, CPT & Custom Theme Development', 'text' => 'Custom post types, flexible fields, and lightweight custom themes built with clean PHP.', 'code' => 'register_post_type()', 'icon' => 'service-9' ),
		array( 'title' => 'API Integration & Automation', 'text' => 'CRMs, payment gateways, webhooks, and workflow automation connected to your WordPress site.', 'code' => 'POST /api/v1/connect', 'icon' => 'service-10' ),
		array( 'title' => 'AI Workflow Automation', 'text' => 'AI chatbots, lead qualification, content workflows, CRM handoffs, and smart automations connected to your WordPress website.', 'code' => 'ai_automation()', 'icon' => 'service-11' ),
	);
}

function jawad_dev_solution_items(): array {
	return array(
		array( 'title' => 'Business Websites', 'text' => 'Professional websites for companies, consultants, and service providers.', 'icon' => 'solution-1' ),
		array( 'title' => 'Landing Pages', 'text' => 'High-converting pages for coaches, SaaS, campaigns, and lead generation.', 'icon' => 'solution-2' ),
		array( 'title' => 'WooCommerce Stores', 'text' => 'Clean product pages, checkout setup, payment settings, and store optimization.', 'icon' => 'solution-3' ),
		array( 'title' => 'Website Fixes & Optimization', 'text' => 'For slow, broken, outdated, or poorly designed WordPress websites.', 'icon' => 'solution-4' ),
	);
}

function jawad_dev_why_items(): array {
	return array(
		array( 'text' => 'Clean, modern, and responsive website design' ),
		array( 'text' => 'Strong WordPress, Elementor, WooCommerce, PHP, JavaScript, and custom development experience' ),
		array( 'text' => 'SEO-friendly page structure and fast-loading websites' ),
		array( 'text' => 'Clear communication and reliable delivery' ),
		array( 'text' => 'Ability to fix complex WordPress issues, not just basic design edits' ),
		array( 'text' => 'Experience with business websites, eCommerce stores, landing pages, agencies, and service-based websites' ),
	);
}

function jawad_dev_process_items(): array {
	return array(
		array( 'number' => '01', 'title' => 'Discovery & Strategy', 'text' => 'I understand your business, goals, audience, and website requirements.' ),
		array( 'number' => '02', 'title' => 'Design Direction', 'text' => 'I plan the page structure, user flow, sections, and conversion-focused layout.' ),
		array( 'number' => '03', 'title' => 'WordPress Development', 'text' => 'I build a responsive, SEO-friendly, and easy-to-manage WordPress website.' ),
		array( 'number' => '04', 'title' => 'Testing & Optimization', 'text' => 'I check mobile layout, speed, forms, browser compatibility, and SEO basics.' ),
	);
}

function jawad_dev_package_items(): array {
	return array(
		array( 'title' => 'Landing Page', 'price' => '$500 – $1,500', 'text' => 'One focused conversion page', 'features' => array( 'Custom layout', 'Responsive design', 'Contact form/CTA setup', 'Basic SEO setup' ), 'buttonText' => 'Build My Landing Page', 'service' => 'landing', 'featured' => false, 'badgeText' => '' ),
		array( 'title' => 'Business Website', 'price' => '$1,500 – $3,500', 'text' => 'Complete website for service businesses', 'features' => array( 'Homepage + inner pages', 'Elementor or block editor setup', 'Contact forms', 'Speed and SEO basics', 'Launch support' ), 'buttonText' => 'Start My Website', 'service' => 'site', 'featured' => true, 'badgeText' => 'Most Popular' ),
		array( 'title' => 'WooCommerce Store', 'price' => '$3,500 – $6,000', 'text' => 'Store setup and conversion cleanup', 'features' => array( 'Product and checkout setup', 'Payment/shipping configuration', 'Mobile store layout', 'Basic performance optimization' ), 'buttonText' => 'Build My Store', 'service' => 'store', 'featured' => false, 'badgeText' => '' ),
	);
}

function jawad_dev_stack_items(): array {
	return array(
		array( 'text' => 'WordPress', 'colorStart' => '#60a5fa', 'colorEnd' => '#22d3ee' ),
		array( 'text' => 'Elementor', 'colorStart' => '#818cf8', 'colorEnd' => '#c084fc' ),
		array( 'text' => 'WooCommerce', 'colorStart' => '#34d399', 'colorEnd' => '#22d3ee' ),
		array( 'text' => 'PHP', 'colorStart' => '#60a5fa', 'colorEnd' => '#818cf8' ),
		array( 'text' => 'JavaScript', 'colorStart' => '#fbbf24', 'colorEnd' => '#f59e0b' ),
		array( 'text' => 'jQuery', 'colorStart' => '#60a5fa', 'colorEnd' => '#22d3ee' ),
		array( 'text' => 'HTML5', 'colorStart' => '#fb923c', 'colorEnd' => '#f87171' ),
		array( 'text' => 'CSS3', 'colorStart' => '#38bdf8', 'colorEnd' => '#60a5fa' ),
		array( 'text' => 'Tailwind CSS', 'colorStart' => '#22d3ee', 'colorEnd' => '#06b6d4' ),
		array( 'text' => 'ACF', 'colorStart' => '#34d399', 'colorEnd' => '#10b981' ),
		array( 'text' => 'CPT UI', 'colorStart' => '#60a5fa', 'colorEnd' => '#818cf8' ),
		array( 'text' => 'WP Rocket', 'colorStart' => '#fbbf24', 'colorEnd' => '#f59e0b' ),
		array( 'text' => 'Rank Math', 'colorStart' => '#c084fc', 'colorEnd' => '#818cf8' ),
		array( 'text' => 'OpenAI API', 'colorStart' => '#22d3ee', 'colorEnd' => '#a78bfa' ),
		array( 'text' => 'Zapier / Make', 'colorStart' => '#fb923c', 'colorEnd' => '#fbbf24' ),
		array( 'text' => 'n8n', 'colorStart' => '#f472b6', 'colorEnd' => '#a78bfa' ),
		array( 'text' => 'Framer', 'colorStart' => '#22d3ee', 'colorEnd' => '#60a5fa' ),
		array( 'text' => 'Shopify', 'colorStart' => '#34d399', 'colorEnd' => '#a3e635' ),
		array( 'text' => 'Webflow', 'colorStart' => '#3b82f6', 'colorEnd' => '#60a5fa' ),
		array( 'text' => 'Next.js', 'colorStart' => '#e2e8f0', 'colorEnd' => '#94a3b8' ),
	);
}

function jawad_dev_testimonial_items(): array {
	return array(
		array( 'quote' => 'Jawad rebuilt our law firm’s WordPress website with Elementor and it was the best decision we made. The site is fast, professional, easy to update — and our Google rankings improved within weeks of launch.', 'author' => 'Sarah Mitchell', 'meta' => 'MSED Law · Business Website', 'initials' => 'SM', 'color' => '#60a5fa' ),
		array( 'quote' => 'Our WooCommerce store was slow and checkout kept breaking. Jawad fixed every bug, brought load time from 6 seconds to under 2, and cleaned up the whole checkout flow. Sales improved almost immediately.', 'author' => 'David Kramer', 'meta' => 'Western Office Equipment · WooCommerce Store', 'initials' => 'DK', 'color' => '#a78bfa' ),
		array( 'quote' => 'He converted my Figma design into a pixel-perfect WordPress landing page in under a week — mobile responsive, SEO-friendly, and it converts far better than the old page. Clear communication the whole way.', 'author' => 'Amina Yusuf', 'meta' => 'Growth Coach · Landing Page', 'initials' => 'AY', 'color' => '#34d399' ),
	);
}

function jawad_dev_faq_items(): array {
	return array(
		array( 'question' => 'Do you build complete WordPress websites?', 'answer' => 'Yes, I build complete WordPress websites for businesses, agencies, coaches, eCommerce stores, and service providers. I can design, develop, optimize, and launch the full website.' ),
		array( 'question' => 'Can you fix WordPress issues or bugs?', 'answer' => 'Yes, I can fix WordPress bugs, layout issues, Elementor problems, WooCommerce errors, plugin conflicts, responsive issues, and speed problems.' ),
		array( 'question' => 'Do you work with Elementor?', 'answer' => 'Yes, I work with Elementor and Elementor Pro to build custom, responsive, and easy-to-manage WordPress websites and landing pages.' ),
		array( 'question' => 'Can you improve my WordPress website speed?', 'answer' => 'Yes, I can optimize WordPress speed by checking images, plugins, cache settings, theme performance, scripts, and Core Web Vitals basics.' ),
		array( 'question' => 'Do you build WooCommerce stores?', 'answer' => 'Yes, I can set up and customize WooCommerce stores, product pages, cart, checkout, payment settings, and store layouts.' ),
		array( 'question' => 'Can you convert Figma designs to WordPress?', 'answer' => 'Yes, I can convert Figma designs into responsive WordPress websites using Elementor, custom themes, or clean frontend development depending on the project.' ),
		array( 'question' => 'Can you add AI automation to my WordPress website?', 'answer' => 'Yes, I can add AI chatbots, lead qualification, smart contact forms, content workflows, CRM handoffs, webhook automations, and other AI-assisted systems that connect cleanly with your WordPress website.' ),
	);
}

add_filter( 'gform_pre_render', 'jawad_dev_gravity_dynamic_field_classes' );
function jawad_dev_gravity_dynamic_field_classes( array $form ): array {
	if ( empty( $GLOBALS['jawad_dev_gravity_param_map'] ) || empty( $form['fields'] ) ) {
		return $form;
	}

	$param_map = $GLOBALS['jawad_dev_gravity_param_map'];
	foreach ( $form['fields'] as &$field ) {
		$input_name = isset( $field->inputName ) ? (string) $field->inputName : '';
		if ( '' === $input_name ) {
			continue;
		}

		foreach ( $param_map as $key => $param_name ) {
			if ( $input_name !== $param_name ) {
				continue;
			}

			$classes = preg_split( '/\s+/', (string) $field->cssClass, -1, PREG_SPLIT_NO_EMPTY );
			$classes[] = 'jd-gf-' . $key;
			$field->cssClass = implode( ' ', array_unique( $classes ) );
		}
	}
	unset( $field );

	return $form;
}

function jawad_dev_render_gravity_form( int $form_id, array $gravity_params ): string {
	if ( ! function_exists( 'gravity_form' ) ) {
		return '<div class="jd-form-alert">' . esc_html__( 'Gravity Forms is selected, but the Gravity Forms plugin is not active or is not loaded.', 'jawad-dev' ) . '</div>';
	}

	if ( class_exists( 'GFAPI' ) ) {
		$form = GFAPI::get_form( $form_id );
		if ( empty( $form ) ) {
			return '<div class="jd-form-alert">' . sprintf( esc_html__( 'Gravity Form ID %d was not found. Check the form ID in the Contact Modal block settings.', 'jawad-dev' ), $form_id ) . '</div>';
		}
	}

	$GLOBALS['jawad_dev_gravity_param_map'] = $gravity_params;
	$markup = gravity_form( $form_id, false, false, true, null, true, 0, false );
	unset( $GLOBALS['jawad_dev_gravity_param_map'] );

	if ( '' === trim( (string) $markup ) && shortcode_exists( 'gravityform' ) ) {
		$markup = do_shortcode( sprintf( '[gravityform id="%d" title="false" description="false" ajax="true"]', $form_id ) );
	}

	if ( '' === trim( (string) $markup ) ) {
		return '<div class="jd-form-alert">' . sprintf( esc_html__( 'Gravity Form ID %d did not return any markup. Make sure the form exists and is not trashed.', 'jawad-dev' ), $form_id ) . '</div>';
	}

	return $markup;
}

function jawad_dev_render_services( array $a ): string {
	return jawad_dev_render_card_grid( 'services', 'services-h', $a, jawad_dev_attr_items( $a, jawad_dev_cards_services() ), 'jd-card--service' );
}

function jawad_dev_render_solutions( array $a ): string {
	return jawad_dev_render_card_grid( 'solutions', 'solutions-h', $a, jawad_dev_attr_items( $a, jawad_dev_solution_items() ), 'jd-card--solution' );
}

function jawad_dev_render_card_grid( string $section, string $heading_id, array $a, array $cards, string $class ): string {
	ob_start();
	?>
	<section id="<?php echo esc_attr( $section ); ?>" class="jd-section">
		<div class="jd-container">
			<?php echo jawad_dev_section_heading( $a, $heading_id ); ?>
			<div class="jd-card-grid" data-reveal-group>
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$title = $card['title'] ?? ( $card[0] ?? '' );
					$text  = $card['text'] ?? ( $card[1] ?? '' );
					$code  = $card['code'] ?? ( $card[2] ?? '' );
					$icon  = $card['icon'] ?? ( $card[3] ?? '' );
					?>
					<article class="jd-card <?php echo esc_attr( $class ); ?>">
						<div class="jd-card__icon"><?php echo jawad_dev_svg( $icon ); ?></div>
						<h3><?php echo esc_html( $title ); ?></h3>
						<p><?php echo esc_html( $text ); ?></p>
						<?php if ( ! empty( $code ) ) : ?><code><?php echo esc_html( $code ); ?></code><?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_why( array $a ): string {
	$items = jawad_dev_attr_items( $a, jawad_dev_why_items() );
	ob_start();
	?>
	<section id="why" class="jd-section jd-why">
		<div class="jd-orb jd-orb--left"></div>
		<div class="jd-container jd-split">
			<div data-reveal><?php echo jawad_dev_section_heading( $a, 'why-h' ); ?><ul class="jd-check-list"><?php foreach ( $items as $item ) : ?><li><span><?php echo jawad_dev_svg( 'check' ); ?></span><?php echo esc_html( $item['text'] ?? $item ); ?></li><?php endforeach; ?></ul></div>
			<div class="jd-health-panel" data-reveal><div class="jd-window-dots"><span></span><span></span><span></span><em>site-health — jawadjd.dev</em></div><?php foreach ( array( 'performance' => 98, 'seo_structure' => 100, 'mobile_responsive' => 100 ) as $label => $score ) : ?><div class="jd-meter"><span><?php echo esc_html( $label ); ?></span><b><?php echo esc_html( $score ); ?>/100</b><i style="width:<?php echo esc_attr( $score ); ?>%"></i></div><?php endforeach; ?><code>✓ plugin conflicts — resolved<br>✓ core web vitals — passing<br>✓ checkout flow — tested<br>➜ deploy --production</code></div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_process( array $a ): string {
	$steps = jawad_dev_attr_items( $a, jawad_dev_process_items() );
	ob_start();
	?>
	<section id="process" class="jd-section jd-process"><div class="jd-container jd-narrow"><?php echo jawad_dev_section_heading( $a, 'process-h' ); ?><div class="jd-timeline" data-reveal-group><?php foreach ( $steps as $step ) : ?><article><span><?php echo esc_html( $step['number'] ?? ( $step[0] ?? '' ) ); ?></span><div><h3><?php echo esc_html( $step['title'] ?? ( $step[1] ?? '' ) ); ?></h3><p><?php echo esc_html( $step['text'] ?? ( $step[2] ?? '' ) ); ?></p></div></article><?php endforeach; ?></div></div></section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_packages( array $a ): string {
	$packages = jawad_dev_attr_items( $a, jawad_dev_package_items() );
	ob_start();
	?>
	<section id="packages" class="jd-section"><div class="jd-container"><?php echo jawad_dev_section_heading( $a, 'packages-h' ); ?><div class="jd-package-grid" data-reveal-group><?php foreach ( $packages as $i => $p ) : ?><?php $featured = isset( $p['featured'] ) ? (bool) $p['featured'] : 1 === $i; $price = $p['price'] ?? ( $p[1] ?? '' ); $badge = $p['badgeText'] ?? ( $featured ? 'Most Popular' : '' ); ?><article class="jd-package <?php echo $featured ? 'is-featured' : ''; ?>"><?php if ( $featured && $badge ) : ?><span class="jd-package__badge"><?php echo esc_html( $badge ); ?></span><?php endif; ?><h3><?php echo esc_html( $p['title'] ?? ( $p[0] ?? '' ) ); ?></h3><strong><?php echo esc_html( $price ); ?></strong><p><?php echo esc_html( $p['text'] ?? ( $p[2] ?? '' ) ); ?></p><ul><?php foreach ( jawad_dev_lines( $p['features'] ?? ( $p[3] ?? array() ) ) as $item ) : ?><li><span><?php echo jawad_dev_svg( 'check' ); ?></span><?php echo esc_html( $item ); ?></li><?php endforeach; ?></ul><a class="jd-btn <?php echo $featured ? '' : 'jd-btn--ghost'; ?> jd-open-form" data-service="<?php echo esc_attr( $p['service'] ?? ( $p[5] ?? '' ) ); ?>" data-budget="<?php echo esc_attr( $price ); ?>" href="#contact"><?php echo esc_html( $p['buttonText'] ?? ( $p[4] ?? '' ) ); ?></a></article><?php endforeach; ?></div></div></section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_projects( array $a ): string {
	$q = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => max( 1, (int) $a['postsToShow'] ), 'post_status' => 'publish', 'no_found_rows' => true ) );
	ob_start();
	?>
	<section id="work" class="jd-section"><div class="jd-container"><?php echo jawad_dev_section_heading( $a, 'work-h' ); ?><div class="jd-project-grid" data-reveal-group>
	<?php
	if ( $q->have_posts() ) :
		while ( $q->have_posts() ) :
			$q->the_post();
			$link   = get_post_meta( get_the_ID(), 'project_link', true ) ?: get_permalink();
			$result = get_post_meta( get_the_ID(), 'project_result', true );
			$accent = get_post_meta( get_the_ID(), 'project_accent', true ) ?: '#22d3ee';
			$tags   = get_the_terms( get_the_ID(), 'project_technology' );
			?>
			<article class="jd-project" style="--jd-accent:<?php echo esc_attr( $accent ); ?>">
				<a class="jd-project__media" href="<?php echo esc_url( $link ); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } else { echo '<span>Project Screenshot</span>'; } ?></a>
				<div><h3><?php the_title(); ?></h3><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php if ( $result ) : ?><strong><?php echo esc_html( $result ); ?></strong><?php endif; ?><div class="jd-tags"><?php if ( $tags && ! is_wp_error( $tags ) ) { foreach ( array_slice( $tags, 0, 3 ) as $tag ) { echo '<span>' . esc_html( $tag->name ) . '</span>'; } } ?></div><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_post_meta( get_the_ID(), 'project_button_text', true ) ?: 'View Project' ); ?> <?php echo jawad_dev_svg( 'arrow-sm' ); ?></a></div>
			</article>
			<?php
		endwhile;
		wp_reset_postdata();
	else :
		foreach ( array( 'Business Website Redesign', 'WooCommerce Catalog Build', 'Landing Page System', 'Store Speed Optimization' ) as $title ) :
			?>
			<article class="jd-project"><div class="jd-project__media"><span>Project Screenshot</span></div><div><h3><?php echo esc_html( $title ); ?></h3><p><?php esc_html_e( 'Add Projects in WordPress admin to replace this sample card with live project data.', 'jawad-dev' ); ?></p><div class="jd-tags"><span>WordPress</span><span>Performance</span></div><a href="#work">View Project <?php echo jawad_dev_svg( 'arrow-sm' ); ?></a></div></article>
			<?php
		endforeach;
	endif;
	?>
	</div></div></section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_stack( array $a ): string {
	$items = jawad_dev_attr_items( $a, jawad_dev_stack_items() );
	ob_start();
	?><section id="stack" class="jd-section jd-stack" aria-labelledby="stack-h"><div class="jd-container"><?php echo jawad_dev_section_heading( $a, 'stack-h' ); ?><div class="jd-stack__items" data-reveal-group><?php foreach ( $items as $item ) : ?><?php $label = $item['text'] ?? $item; $start = sanitize_hex_color( $item['colorStart'] ?? ( $item['color'] ?? '' ) ) ?: '#60a5fa'; $end = sanitize_hex_color( $item['colorEnd'] ?? ( $item['color'] ?? '' ) ) ?: '#22d3ee'; ?><span style="--jd-stack-a: <?php echo esc_attr( $start ); ?>; --jd-stack-b: <?php echo esc_attr( $end ); ?>"><i></i><?php echo esc_html( $label ); ?></span><?php endforeach; ?></div></div></section><?php
	return ob_get_clean();
}

function jawad_dev_render_testimonials( array $a ): string {
	$items = jawad_dev_attr_items( $a, jawad_dev_testimonial_items() );
	ob_start();
	?>
	<section id="testimonials" class="jd-section jd-testimonials" aria-labelledby="testimonials-h">
		<div class="jd-testimonials__orb"></div>
		<div class="jd-container">
			<?php echo jawad_dev_section_heading( $a, 'testimonials-h' ); ?>
			<div class="jd-testimonial-grid" data-reveal-group>
				<?php foreach ( $items as $item ) : ?>
					<?php
					$author   = $item['author'] ?? ( $item[1] ?? '' );
					$parts    = preg_split( '/\s+/', trim( $author ) );
					$initials = $item['initials'] ?? implode(
						'',
						array_map(
							static fn( string $part ): string => strtoupper( substr( $part, 0, 1 ) ),
							array_slice( $parts ?: array(), 0, 2 )
						)
					);
					$color = sanitize_hex_color( $item['color'] ?? '' ) ?: '#60a5fa';
					?>
					<figure class="jd-testimonial" style="--jd-avatar: <?php echo esc_attr( $color ); ?>">
						<div class="jd-stars" aria-label="<?php esc_attr_e( '5 star rating', 'jawad-dev' ); ?>"><?php echo str_repeat( jawad_dev_svg( 'star' ), 5 ); ?></div>
						<blockquote>“<?php echo esc_html( $item['quote'] ?? ( $item[0] ?? '' ) ); ?>”</blockquote>
						<figcaption>
							<span class="jd-avatar"><?php echo esc_html( $initials ); ?></span>
							<span><strong><?php echo esc_html( $author ); ?></strong><?php if ( ! empty( $item['meta'] ) ) : ?><em><?php echo esc_html( $item['meta'] ); ?></em><?php endif; ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_faq( array $a ): string {
	$items = jawad_dev_attr_items( $a, jawad_dev_faq_items() );
	ob_start();
	?><section id="faq" class="jd-section"><div class="jd-container jd-narrow"><?php echo jawad_dev_section_heading( $a, 'faq-h' ); ?><div class="jd-faq" data-reveal-group><?php foreach ( $items as $item ) : ?><details><summary><h3><?php echo esc_html( $item['question'] ?? ( $item[0] ?? '' ) ); ?></h3><span class="faq-x">+</span></summary><p><?php echo esc_html( $item['answer'] ?? ( $item[1] ?? '' ) ); ?></p></details><?php endforeach; ?></div></div></section><?php
	return ob_get_clean();
}

function jawad_dev_render_cta( array $a ): string {
	ob_start();
	?><section id="contact" class="jd-section jd-cta"><div class="jd-container"><div class="jd-cta__box" data-reveal><h2><?php echo esc_html( $a['title'] ); ?></h2><p><?php echo esc_html( $a['description'] ); ?></p><div class="jd-actions"><a class="jd-btn jd-open-form jd-hire-anim-lg" href="<?php echo esc_url( $a['buttonUrl'] ); ?>"><?php echo esc_html( $a['buttonText'] ); ?></a><a class="jd-btn jd-btn--ghost jd-open-form" href="<?php echo esc_url( $a['secondaryUrl'] ); ?>"><?php echo esc_html( $a['secondaryText'] ); ?></a></div></div></div></section><?php
	return ob_get_clean();
}

function jawad_dev_render_site_footer( array $a ): string {
	ob_start();
	?><footer class="jd-footer"><div class="jd-container"><div class="jd-footer__top"><div><div class="jd-brand"><span class="jd-brand__mark">&lt;/&gt;</span><span><?php echo esc_html( $a['brand'] ); ?></span></div><p><?php echo esc_html( $a['description'] ); ?></p></div><nav><strong>PAGES</strong><a href="#services">Services</a><a href="#work">Work</a><a href="#packages">Packages</a><a href="#process">Process</a><a href="#faq">FAQ</a><a href="#contact">Contact</a></nav><nav><strong>FIND ME ON</strong><a href="#contact">LinkedIn</a><a href="#contact">GitHub</a></nav></div><div class="jd-footer__bottom"><span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Jawad Ilyas · jawadjd.dev — All rights reserved.</span><code>built_with: WordPress · care · clean_code</code></div></div></footer><?php
	return ob_get_clean();
}

function jawad_dev_render_contact_modal( array $a ): string {
	$form_id     = isset( $a['gravityFormId'] ) ? absint( $a['gravityFormId'] ) : 0;
	$gravity_params = array(
		'service'  => sanitize_key( $a['gravityServiceParam'] ?? 'service' ) ?: 'service',
		'budget'   => sanitize_key( $a['gravityBudgetParam'] ?? 'budget' ) ?: 'budget',
		'timeline' => sanitize_key( $a['gravityTimelineParam'] ?? 'timeline' ) ?: 'timeline',
	);
	if ( $form_id && function_exists( 'gravity_form_enqueue_scripts' ) ) {
		gravity_form_enqueue_scripts( $form_id, true );
	}
	ob_start();
	?>
	<div class="jd-modal jd-modal--gravity" data-gf-service-param="<?php echo esc_attr( $gravity_params['service'] ); ?>" data-gf-budget-param="<?php echo esc_attr( $gravity_params['budget'] ); ?>" data-gf-timeline-param="<?php echo esc_attr( $gravity_params['timeline'] ); ?>" hidden>
		<div class="jd-modal__dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Start a project request', 'jawad-dev' ); ?>">
			<div class="jd-window-dots"><span></span><span></span><span></span><em>~/new-project-request</em><button type="button" class="jd-modal__close" aria-label="<?php esc_attr_e( 'Close form', 'jawad-dev' ); ?>">×</button></div>
			<div class="jd-progress"><span></span></div>
			<div class="jd-form jd-form--gravity">
				<div class="jd-form__step" data-step="1"><div class="jd-eyebrow">&gt; step_1: project_type</div><h3>What do you need built?</h3><p>Pick the closest match. Your answer will be attached to the final request.</p><div class="jd-choice-grid"><?php foreach ( array( 'site' => 'Full Website', 'landing' => 'Landing Page', 'store' => 'WooCommerce Store', 'automation' => 'AI Automation', 'fix' => 'Fix & Optimize', 'other' => 'Something Else' ) as $key => $label ) : ?><button type="button" data-name="service" data-value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?><span><?php echo esc_html( $key ); ?></span></button><?php endforeach; ?></div></div>
				<div class="jd-form__step" data-step="2" hidden><div class="jd-eyebrow">&gt; step_2: scope</div><h3>Budget & timeline</h3><p>A rough range is fine. These values go into hidden Gravity Forms fields.</p><label>budget_range *</label><div class="jd-chip-row"><?php foreach ( array( '$500 – $1,500', '$1,500 – $3,500', '$3,500 – $6,000', '$6,000+' ) as $value ) : ?><button type="button" data-name="budget" data-value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></button><?php endforeach; ?></div><label>timeline *</label><div class="jd-chip-row"><?php foreach ( array( 'ASAP', '1–2 weeks', 'This month', 'Flexible' ) as $value ) : ?><button type="button" data-name="timeline" data-value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></button><?php endforeach; ?></div></div>
				<div class="jd-form__step jd-form__step--gravity" data-step="3" hidden>
					<div class="jd-gravity-form">
						<div class="jd-eyebrow"><?php echo esc_html( $a['gravityEyebrow'] ); ?></div>
						<h3><?php echo esc_html( $a['modalTitle'] ); ?></h3>
						<?php if ( ! empty( $a['modalSubtitle'] ) ) : ?><p><?php echo esc_html( $a['modalSubtitle'] ); ?></p><?php endif; ?>
						<?php if ( $form_id ) : ?>
							<?php echo jawad_dev_render_gravity_form( $form_id, $gravity_params ); ?>
						<?php else : ?>
							<div class="jd-form-alert"><?php esc_html_e( 'Add a Gravity Form ID in the Contact Modal block settings.', 'jawad-dev' ); ?></div>
						<?php endif; ?>
					</div>
				</div>
				<div class="jd-form__footer"><span class="jd-form__trace">&gt; awaiting_input...</span><button type="button" class="jd-form__back" hidden>← Back</button><button type="button" class="jd-form__next">Continue →</button></div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
