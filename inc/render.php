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
		'platform-logos' => array( 'title' => 'JD Platform Logos' ),
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
		'platform-logos' => array(
			'label' => 'Trusted across modern web platforms',
			'items' => jawad_dev_platform_logo_items(),
		),
		'services'      => array( 'eyebrow' => '// SERVICES', 'title' => 'WordPress Services I Offer', 'description' => 'From full website builds to small fixes, I help businesses create fast, clean, professional, and easy-to-manage WordPress websites.', 'items' => jawad_dev_cards_services() ),
		'why'           => array( 'eyebrow' => '// WHY HIRE ME', 'title' => 'Why Businesses Hire Me as Their WordPress Developer', 'items' => jawad_dev_why_items() ),
		'solutions'     => array( 'eyebrow' => '// SOLUTIONS', 'title' => 'Built for Real Business Needs', 'items' => jawad_dev_solution_items() ),
		'process'       => array( 'eyebrow' => '// PROCESS', 'title' => 'My Website Development Process', 'items' => jawad_dev_process_items() ),
		'packages'      => array( 'eyebrow' => '// PACKAGES', 'title' => 'Website Development Packages', 'items' => jawad_dev_package_items() ),
		'projects'      => array( 'enabled' => true, 'eyebrow' => '// PORTFOLIO', 'title' => 'Recent Website Work', 'description' => 'A few representative WordPress builds, optimization projects, and WooCommerce improvements.', 'postsToShow' => 4 ),
		'stack'         => array( 'eyebrow' => '// STACK', 'title' => 'Tools & Technologies I Work With', 'items' => jawad_dev_stack_items() ),
		'testimonials'  => array( 'eyebrow' => '// TESTIMONIALS', 'title' => 'Trusted by Clients Worldwide', 'items' => jawad_dev_testimonial_items() ),
		'faq'           => array( 'eyebrow' => '// FAQ', 'title' => 'Frequently Asked Questions', 'items' => jawad_dev_faq_items() ),
		'cta'           => array( 'title' => 'Have a WordPress project in mind?', 'description' => 'Tell me what you want to build, fix, or improve. I’ll help you choose the right approach and next steps.', 'buttonText' => 'Hire Me Now', 'buttonUrl' => '#contact', 'secondaryText' => 'Discuss Your Project', 'secondaryUrl' => '#contact' ),
		'site-footer'   => array(
			'brand'       => 'Jawad Ilyas',
			'description' => 'WordPress Developer & Full-Stack Web Designer',
			'pagesTitle'  => 'PAGES',
			'pagesLinks'  => array(
				array( 'label' => 'Services', 'url' => '#services' ),
				array( 'label' => 'Work', 'url' => '#work' ),
				array( 'label' => 'Packages', 'url' => '#packages' ),
				array( 'label' => 'Process', 'url' => '#process' ),
				array( 'label' => 'FAQ', 'url' => '#faq' ),
				array( 'label' => 'Contact', 'url' => '#contact' ),
			),
			'socialTitle' => 'FIND ME ON',
			'socialLinks' => array(
				array( 'label' => 'LinkedIn', 'url' => '#' ),
				array( 'label' => 'GitHub', 'url' => 'https://github.com/jawadpro' ),
			),
			'copyright'   => 'Jawad Ilyas · jawadjd.dev — All rights reserved.',
			'codeText'    => 'built_with: WordPress · care · clean_code',
		),
		'contact-modal' => array(
			'gravityFormShortcode' => '[gravityform id="1" title="false"]',
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
	return array_key_exists( 'items', $a ) && is_array( $a['items'] ) ? $a['items'] : $fallback;
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

function jawad_dev_brand_svg( string $name ): string {
	$icons = array(
		'shopify'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15.337 23.979l7.216-1.561s-2.604-17.613-2.625-17.73c-.018-.116-.114-.192-.211-.192s-1.929-.136-1.929-.136-1.275-1.274-1.439-1.411c-.045-.037-.075-.057-.121-.074l-.914 21.104h.023zM11.71 11.305s-.81-.424-1.774-.424c-1.447 0-1.504.906-1.504 1.141 0 1.232 3.24 1.715 3.24 4.629 0 2.295-1.44 3.76-3.406 3.76-2.354 0-3.54-1.465-3.54-1.465l.646-2.086s1.245 1.066 2.28 1.066c.675 0 .975-.545.975-.932 0-1.619-2.654-1.694-2.654-4.359-.034-2.237 1.571-4.416 4.827-4.416 1.257 0 1.875.361 1.875.361l-.945 2.715-.02.01zM11.17.83c.136 0 .271.038.405.135-.984.465-2.064 1.639-2.508 3.992-.656.213-1.293.405-1.889.578C7.697 3.75 8.951.84 11.17.84V.83zm1.235 2.949v.135c-.754.232-1.583.484-2.394.736.466-1.777 1.333-2.645 2.085-2.971.193.501.309 1.176.309 2.1zm.539-2.234c.694.074 1.141.867 1.429 1.755-.349.114-.735.231-1.158.366v-.252c0-.752-.096-1.371-.271-1.871v.002zm2.992 1.289c-.02 0-.06.021-.078.021s-.289.075-.714.21c-.423-1.233-1.176-2.37-2.508-2.37h-.115C12.135.209 11.669 0 11.265 0 8.159 0 6.675 3.877 6.21 5.846c-1.194.365-2.063.636-2.16.674-.675.213-.694.232-.772.87-.075.462-1.83 14.063-1.83 14.063L15.009 24l.927-21.166z"></path></svg>',
		'wordpress' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.833-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61.001.014zM12 22.784c-1.059 0-2.081-.153-3.048-.437l3.237-9.406 3.315 9.087c.024.053.05.101.078.149-1.12.393-2.325.609-3.582.609M1.211 12c0-1.564.336-3.05.935-4.39L7.29 21.709C3.694 19.96 1.212 16.271 1.211 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"></path></svg>',
		'toptal'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.227 10.038L10.188 0l-2.04 2.04 3.773 3.769-8.155 8.153L13.807 24l2.039-2.039-3.772-3.771 8.16-8.152h-.007zM8.301 14.269l6.066-6.063 1.223 1.223-6.064 6.113-1.223-1.26-.002-.013z"></path></svg>',
		'upwork'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.561 13.158c-1.102 0-2.135-.467-3.074-1.227l.228-1.076.008-.042c.207-1.143.849-3.06 2.839-3.06 1.492 0 2.703 1.212 2.703 2.703-.001 1.489-1.212 2.702-2.704 2.702zm0-8.14c-2.539 0-4.51 1.649-5.31 4.366-1.22-1.834-2.148-4.036-2.687-5.892H7.828v7.112c-.002 1.406-1.141 2.546-2.547 2.548-1.405-.002-2.543-1.143-2.545-2.548V3.492H0v7.112c0 2.914 2.37 5.303 5.281 5.303 2.913 0 5.283-2.389 5.283-5.303v-1.19c.529 1.107 1.182 2.229 1.974 3.221l-1.673 7.873h2.797l1.213-5.71c1.063.679 2.285 1.109 3.686 1.109 3 0 5.439-2.452 5.439-5.45 0-3-2.439-5.439-5.439-5.439z"></path></svg>',
		'fiverr'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23.004 15.588a.995.995 0 1 0 .002-1.99.995.995 0 0 0-.002 1.99zm-.996-3.705h-.85c-.546 0-.84.41-.84 1.092v2.466h-1.61v-3.558h-.684c-.547 0-.84.41-.84 1.092v2.466h-1.61v-4.874h1.61v.74c.264-.574.626-.74 1.163-.74h1.972v.74c.264-.574.625-.74 1.162-.74h.527v1.316zm-6.786 1.501h-3.359c.088.546.43.858 1.006.858.43 0 .732-.175.83-.487l1.425.4c-.351.848-1.22 1.364-2.255 1.364-1.748 0-2.549-1.355-2.549-2.515 0-1.14.703-2.505 2.45-2.505 1.856 0 2.471 1.384 2.471 2.408 0 .224-.01.37-.02.477zm-1.562-.945c-.04-.42-.342-.81-.889-.81-.508 0-.81.225-.908.81h1.797zM7.508 15.44h1.416l1.767-4.874h-1.62l-.86 2.837-.878-2.837H5.72l1.787 4.874zm-6.6 0H2.51v-3.558h1.524v3.558h1.591v-4.874H2.51v-.302c0-.332.235-.536.606-.536h.918V8.412H2.85c-1.162 0-1.943.712-1.943 1.755v.4H0v1.316h.908v3.558z"></path></svg>',
		'vercel'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 1.608 12 20.784H0Z"></path></svg>',
		'aws'       => '<svg viewBox="0 0 42 24" aria-hidden="true"><text x="2" y="15" font-family="Space Grotesk, Arial, sans-serif" font-size="13" font-weight="800" fill="currentColor">AWS</text><path d="M8 18.1c7.2 3.4 16.4 3.2 23.8-.7" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path><path d="M29.6 16.1l3.4.8-1.4 3.2" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
	);
	return $icons[ $name ] ?? '';
}

function jawad_dev_render_site_header( array $a ): string {
	$links = array( 'Services' => '#services', 'Work' => '#work', 'Packages' => '#packages', 'Process' => '#process', 'FAQ' => '#faq', 'Blog' => home_url( '/blog/' ), 'Contact' => '#contact' );
	$brand_url = is_front_page() ? '#top' : home_url( '/' );
	ob_start();
	echo jawad_dev_icon_defs();
	?>
	<div class="jd-grid-bg"></div><div class="jd-cursor-glow" aria-hidden="true"></div>
	<nav class="jd-nav" aria-label="<?php esc_attr_e( 'Main navigation', 'jawad-dev' ); ?>">
		<div class="jd-container jd-nav__inner">
			<a class="jd-brand" href="<?php echo esc_url( $brand_url ); ?>"><span class="jd-brand__mark">&lt;/&gt;</span><span><?php echo wp_kses_post( str_replace( '.dev', '<span>.dev</span>', esc_html( $a['brand'] ) ) ); ?></span></a>
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
	$title_html = esc_html( $a['title'] );
	$title_html = preg_replace( '/(Fast, Modern &amp; SEO-Friendly|Fast, Modern & SEO-Friendly)/', '<span class="jd-hero__accent">$1</span>', $title_html );
	?>
	<header id="top" class="jd-hero jd-section">
		<div class="jd-orb jd-orb--hero-a"></div><div class="jd-orb jd-orb--hero-b"></div>
		<div class="jd-container jd-hero__grid">
			<div class="jd-hero__copy">
				<?php if ( ! empty( $a['showBadge'] ) ) : ?><div class="jd-pill"><span></span><?php echo esc_html( $a['eyebrow'] ); ?></div><?php endif; ?>
				<h1><?php echo wp_kses_post( $title_html ); ?></h1>
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

function jawad_dev_render_platform_logos( array $a ): string {
	$logos = jawad_dev_attr_items( $a, jawad_dev_platform_logo_items() );
	ob_start();
	?>
	<section class="jd-section jd-platform-logos" aria-label="<?php esc_attr_e( 'Platforms and marketplaces', 'jawad-dev' ); ?>">
		<div class="jd-container jd-logo-strip" data-reveal>
			<?php if ( ! empty( $a['label'] ) ) : ?><div class="jd-logo-strip__label"><?php echo esc_html( $a['label'] ); ?></div><?php endif; ?>
			<div class="jd-logo-strip__items">
				<div class="jd-logo-strip__track">
					<?php for ( $set = 0; $set < 3; $set++ ) : ?>
						<?php foreach ( $logos as $logo ) : ?>
							<?php
							$name   = $logo['name'] ?? '';
							$icon   = $logo['icon'] ?? '';
							$accent = sanitize_hex_color( $logo['accent'] ?? '' ) ?: '#22d3ee';
							if ( ! $name ) {
								continue;
							}
							?>
							<span class="jd-logo-strip__logo" style="--jd-logo-accent: <?php echo esc_attr( $accent ); ?>"><span class="jd-logo-strip__icon"><?php echo jawad_dev_brand_svg( $icon ); ?></span><?php echo esc_html( $name ); ?></span>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section>
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

function jawad_dev_platform_logo_items(): array {
	return array(
		array( 'name' => 'Shopify Plus', 'icon' => 'shopify', 'accent' => '#95bf47' ),
		array( 'name' => 'WordPress VIP', 'icon' => 'wordpress', 'accent' => '#38bdf8' ),
		array( 'name' => 'Toptal', 'icon' => 'toptal', 'accent' => '#2dd4bf' ),
		array( 'name' => 'Upwork', 'icon' => 'upwork', 'accent' => '#6fda44' ),
		array( 'name' => 'Fiverr', 'icon' => 'fiverr', 'accent' => '#1dbf73' ),
		array( 'name' => 'Vercel', 'icon' => 'vercel', 'accent' => '#f8fafc' ),
		array( 'name' => 'AWS', 'icon' => 'aws', 'accent' => '#ff9900' ),
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

function jawad_dev_gravity_shortcode_id( string $shortcode ): int {
	if ( preg_match( '/\bid=(["\']?)(\d+)\1/i', $shortcode, $matches ) ) {
		return absint( $matches[2] );
	}

	return 0;
}

function jawad_dev_gravity_ajax_shortcode( string $shortcode ): string {
	$shortcode = trim( $shortcode );
	if ( '' === $shortcode ) {
		return '';
	}

	if ( preg_match( '/\bajax=/i', $shortcode ) ) {
		return preg_replace( '/\bajax=(["\']?)(?:true|false|0|1)\1/i', 'ajax="true"', $shortcode );
	}

	return preg_replace( '/\]\s*$/', ' ajax="true"]', $shortcode );
}

function jawad_dev_render_gravity_form_shortcode( string $shortcode, array $gravity_params ): string {
	if ( ! shortcode_exists( 'gravityform' ) ) {
		return '<div class="jd-form-alert">' . esc_html__( 'Gravity Forms is selected, but the Gravity Forms plugin is not active or is not loaded.', 'jawad-dev' ) . '</div>';
	}

	$shortcode = jawad_dev_gravity_ajax_shortcode( $shortcode );
	$form_id = jawad_dev_gravity_shortcode_id( $shortcode );
	if ( class_exists( 'GFAPI' ) ) {
		$form = GFAPI::get_form( $form_id );
		if ( empty( $form ) ) {
			return '<div class="jd-form-alert">' . sprintf( esc_html__( 'Gravity Form ID %d was not found. Check the shortcode in the Contact Modal block settings.', 'jawad-dev' ), $form_id ) . '</div>';
		}
	}

	$GLOBALS['jawad_dev_gravity_param_map'] = $gravity_params;
	$markup = do_shortcode( $shortcode );
	unset( $GLOBALS['jawad_dev_gravity_param_map'] );

	if ( '' === trim( (string) $markup ) ) {
		return '<div class="jd-form-alert">' . esc_html__( 'The Gravity Forms shortcode did not return any markup. Make sure the form exists and the shortcode is valid.', 'jawad-dev' ) . '</div>';
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
			$button = get_post_meta( get_the_ID(), 'project_button_text', true ) ?: __( 'View Project', 'jawad-dev' );
			?>
			<article class="jd-project" style="--jd-accent:<?php echo esc_attr( $accent ); ?>">
				<a class="jd-project__media jd-open-project" data-project-id="<?php echo esc_attr( get_the_ID() ); ?>" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } else { echo '<span>Project Screenshot</span>'; } ?></a>
				<div><h3><?php the_title(); ?></h3><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php if ( $result ) : ?><strong><?php echo esc_html( $result ); ?></strong><?php endif; ?><div class="jd-tags"><?php if ( $tags && ! is_wp_error( $tags ) ) { foreach ( array_slice( $tags, 0, 3 ) as $tag ) { echo '<span>' . esc_html( $tag->name ) . '</span>'; } } ?></div><a class="jd-open-project" data-project-id="<?php echo esc_attr( get_the_ID() ); ?>" href="<?php the_permalink(); ?>"><?php echo esc_html( $button ); ?> <?php echo jawad_dev_svg( 'arrow-sm' ); ?></a></div>
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
	<?php echo jawad_dev_render_project_modal(); ?>
	<?php
	return ob_get_clean();
}

function jawad_dev_render_project_modal(): string {
	ob_start();
	?>
	<div class="jd-modal jd-project-modal" hidden>
		<div class="jd-modal__dialog jd-project-modal__dialog" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Project details', 'jawad-dev' ); ?>">
			<div class="jd-window-dots"><span></span><span></span><span></span><em>~/project-details</em><button type="button" class="jd-modal__close jd-project-modal__close" aria-label="<?php esc_attr_e( 'Close project details', 'jawad-dev' ); ?>">×</button></div>
			<div class="jd-project-modal__body">
				<div class="jd-project-modal__loading"><?php esc_html_e( 'Loading project…', 'jawad-dev' ); ?></div>
				<div class="jd-project-modal__content" hidden></div>
			</div>
		</div>
	</div>
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
	?><section id="contact" class="jd-section jd-cta"><div class="jd-container"><div class="jd-cta__box" data-reveal><h2><?php echo esc_html( $a['title'] ); ?></h2><p><?php echo esc_html( $a['description'] ); ?></p><div class="jd-actions"><a class="jd-btn jd-open-form jd-hire-anim-lg" href="<?php echo esc_url( $a['buttonUrl'] ); ?>"><?php echo esc_html( $a['buttonText'] ); ?></a><a class="jd-btn jd-btn--ghost jd-no-modal" href="<?php echo esc_url( $a['secondaryUrl'] ); ?>"><?php echo esc_html( $a['secondaryText'] ); ?></a></div></div></div></section><?php
	return ob_get_clean();
}

function jawad_dev_render_site_footer( array $a ): string {
	$pages_links  = ! empty( $a['pagesLinks'] ) && is_array( $a['pagesLinks'] ) ? $a['pagesLinks'] : array();
	$social_links = ! empty( $a['socialLinks'] ) && is_array( $a['socialLinks'] ) ? $a['socialLinks'] : array();
	ob_start();
	?><footer class="jd-footer"><div class="jd-container"><div class="jd-footer__top"><div><div class="jd-brand"><span class="jd-brand__mark">&lt;/&gt;</span><span><?php echo esc_html( $a['brand'] ); ?></span></div><p><?php echo esc_html( $a['description'] ); ?></p></div><nav><strong><?php echo esc_html( $a['pagesTitle'] ); ?></strong><?php foreach ( $pages_links as $link ) : ?><?php if ( ! empty( $link['label'] ) ) : ?><a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"><?php echo esc_html( $link['label'] ); ?></a><?php endif; ?><?php endforeach; ?></nav><nav><strong><?php echo esc_html( $a['socialTitle'] ); ?></strong><?php foreach ( $social_links as $link ) : ?><?php if ( ! empty( $link['label'] ) ) : ?><a href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"><?php echo esc_html( $link['label'] ); ?></a><?php endif; ?><?php endforeach; ?></nav></div><div class="jd-footer__bottom"><span>© <?php echo esc_html( gmdate( 'Y' ) . ' ' . $a['copyright'] ); ?></span><code><?php echo esc_html( $a['codeText'] ); ?></code></div></div></footer><?php
	return ob_get_clean();
}

function jawad_dev_render_contact_modal( array $a ): string {
	$GLOBALS['jawad_dev_contact_modal_rendered'] = true;
	$form_shortcode = isset( $a['gravityFormShortcode'] ) ? trim( (string) $a['gravityFormShortcode'] ) : '';
	$form_id        = $form_shortcode ? jawad_dev_gravity_shortcode_id( $form_shortcode ) : 0;
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
							<?php echo jawad_dev_render_gravity_form_shortcode( $form_shortcode, $gravity_params ); ?>
						<?php else : ?>
							<div class="jd-form-alert"><?php esc_html_e( 'Add a Gravity Forms shortcode in the Contact Modal block settings.', 'jawad-dev' ); ?></div>
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
