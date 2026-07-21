<?php
/**
 * SEO service page data, patterns, and schema fallbacks.
 *
 * @package JawadDev
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function jawad_dev_seo_service_pages(): array {
	return array(
		'elementor-developer' => array(
			'title'       => 'Elementor Developer for Hire',
			'keyword'     => 'hire elementor developer',
			'secondary'   => array( 'Elementor Pro developer', 'WordPress Elementor expert', 'custom Elementor website', 'Elementor landing page developer' ),
			'seoTitle'    => 'Hire Elementor Developer | Jawad Ilyas',
			'meta'        => 'Hire an Elementor developer for fast, responsive WordPress pages, custom templates, clean structure, and conversion-focused builds.',
			'h1'          => 'Hire an Elementor Developer for a Fast, Clean WordPress Website',
			'summary'     => 'If your Elementor site looks inconsistent, loads slowly, or is hard to update, I can rebuild the structure, templates, and responsive layouts so the site feels professional and easier to manage.',
			'process'     => array( 'Audit the current Elementor setup, theme, plugins, and template structure.', 'Rebuild pages with global styles, reusable sections, and responsive spacing.', 'Clean up unnecessary widgets, scripts, and layout decisions that slow the site down.', 'Test forms, mobile views, Core Web Vitals, and editor usability before launch.' ),
			'faq'         => array(
				array( 'q' => 'Can you work on an existing Elementor website?', 'a' => 'Yes. I can improve existing Elementor pages, fix responsive issues, rebuild templates, or create new landing pages inside your current setup.' ),
				array( 'q' => 'Do you use Elementor Pro?', 'a' => 'Yes. I can work with Elementor and Elementor Pro, including Theme Builder templates, forms, popups, custom fields, and WooCommerce layouts.' ),
			),
			'related'     => array( 'wordpress-speed-optimization', 'landing-page-design', 'figma-to-wordpress' ),
		),
		'wordpress-speed-optimization' => array(
			'title'       => 'WordPress Speed Optimization',
			'keyword'     => 'wordpress speed optimization service',
			'secondary'   => array( 'Core Web Vitals WordPress', 'speed up slow WordPress site', 'WordPress PageSpeed optimization', 'fix slow Elementor website' ),
			'seoTitle'    => 'WordPress Speed Optimization Service',
			'meta'        => 'Speed up your WordPress site with Core Web Vitals fixes, cache setup, image optimization, script cleanup, and careful testing.',
			'h1'          => 'WordPress Speed Optimization for Slow Business Websites',
			'summary'     => 'A slow WordPress website costs leads before visitors ever read your offer. I diagnose the real bottlenecks, clean up front-end weight, tune caching, and test the site so it stays stable.',
			'process'     => array( 'Run a performance audit across mobile, desktop, hosting, plugins, images, fonts, and scripts.', 'Fix high-impact issues first: LCP, render blocking, oversized assets, layout shifts, and cache gaps.', 'Optimize images, fonts, plugin output, and theme behavior without breaking the design.', 'Retest Core Web Vitals and document what changed.' ),
			'faq'         => array(
				array( 'q' => 'Will speed optimization break my design?', 'a' => 'The goal is to preserve the design while removing bottlenecks. I test key pages and forms after optimization.' ),
				array( 'q' => 'Can you optimize Elementor and WooCommerce sites?', 'a' => 'Yes. Elementor and WooCommerce need careful optimization because they often load extra assets and dynamic features.' ),
			),
			'related'     => array( 'elementor-developer', 'woocommerce-developer', 'fix-wordpress-website' ),
		),
		'woocommerce-developer' => array(
			'title'       => 'WooCommerce Developer for Hire',
			'keyword'     => 'woocommerce developer for hire',
			'secondary'   => array( 'WooCommerce checkout developer', 'WooCommerce store setup', 'fix WooCommerce checkout', 'WooCommerce product page design' ),
			'seoTitle'    => 'WooCommerce Developer for Hire',
			'meta'        => 'Hire a WooCommerce developer for store setup, checkout fixes, product pages, payments, responsive layouts, and conversion cleanup.',
			'h1'          => 'WooCommerce Developer for Stores That Need to Sell Smoothly',
			'summary'     => 'WooCommerce can be powerful, but small checkout, product, or mobile issues quickly reduce trust. I build and fix stores with clean product flows, clear CTAs, and reliable checkout behavior.',
			'process'     => array( 'Review the store flow from product discovery to checkout confirmation.', 'Fix checkout errors, payment/shipping configuration, plugin conflicts, or layout issues.', 'Improve product, cart, and checkout pages for mobile users.', 'Test orders, emails, forms, and tracking before launch.' ),
			'faq'         => array(
				array( 'q' => 'Can you fix WooCommerce checkout errors?', 'a' => 'Yes. I debug checkout, payment, shipping, email, plugin conflict, and theme layout problems.' ),
				array( 'q' => 'Can you improve an existing store instead of rebuilding it?', 'a' => 'Yes. Many stores only need targeted fixes, better mobile layout, and performance cleanup.' ),
			),
			'related'     => array( 'wordpress-speed-optimization', 'fix-wordpress-website', 'wordpress-maintenance' ),
		),
		'fix-wordpress-website' => array(
			'title'       => 'Fix WordPress Website',
			'keyword'     => 'fix broken wordpress website',
			'secondary'   => array( 'fix slow WordPress site', 'WordPress bug fixing service', 'WordPress plugin conflict fix', 'fix Elementor layout issues' ),
			'seoTitle'    => 'Fix Broken WordPress Website',
			'meta'        => 'Need to fix a broken, slow, or messy WordPress website? Get careful debugging for plugin conflicts, layout issues, forms, and errors.',
			'h1'          => 'Fix a Broken, Slow, or Unstable WordPress Website',
			'summary'     => 'When a WordPress site breaks, guessing usually makes it worse. I trace the issue carefully, protect the current site, and fix the root cause rather than patching symptoms.',
			'process'     => array( 'Collect symptoms, recent changes, access details, and affected pages.', 'Check plugins, theme files, console errors, PHP logs, forms, and responsive views.', 'Apply the safest fix in staging or with backups where available.', 'Retest the affected workflow and explain what caused the issue.' ),
			'faq'         => array(
				array( 'q' => 'Can you fix plugin conflicts?', 'a' => 'Yes. I identify which plugin, theme, or custom code is causing the conflict and apply a stable fix.' ),
				array( 'q' => 'Do you handle urgent WordPress fixes?', 'a' => 'If availability allows, yes. Share the issue, URL, and screenshots so I can estimate the safest next step.' ),
			),
			'related'     => array( 'wordpress-speed-optimization', 'elementor-developer', 'wordpress-maintenance' ),
		),
		'figma-to-wordpress' => array(
			'title'       => 'Figma to WordPress Conversion',
			'keyword'     => 'figma to wordpress conversion',
			'secondary'   => array( 'convert Figma to WordPress', 'Figma to Elementor', 'Figma to WordPress developer', 'pixel perfect WordPress build' ),
			'seoTitle'    => 'Figma to WordPress Conversion',
			'meta'        => 'Convert your Figma design into a responsive, editable, SEO-friendly WordPress website using Elementor or a custom theme.',
			'h1'          => 'Figma to WordPress Conversion That Stays Editable',
			'summary'     => 'A good Figma to WordPress build should look close to the design, work on real devices, and remain easy to edit after launch. I turn approved designs into structured WordPress pages.',
			'process'     => array( 'Review the Figma file, breakpoints, components, assets, and interaction needs.', 'Choose the right build approach: Elementor, block theme, or custom template.', 'Build responsive sections with clean spacing, optimized assets, and editable content.', 'QA against the design and test mobile, forms, speed, and browser behavior.' ),
			'faq'         => array(
				array( 'q' => 'Can you build from Figma using Elementor?', 'a' => 'Yes. I can build editable Elementor pages from Figma while keeping global styles and reusable sections organized.' ),
				array( 'q' => 'Do you optimize the site after conversion?', 'a' => 'Yes. I optimize images, spacing, responsiveness, and basic performance as part of the build.' ),
			),
			'related'     => array( 'elementor-developer', 'landing-page-design', 'wordpress-speed-optimization' ),
		),
		'landing-page-design' => array(
			'title'       => 'Landing Page Design Developer',
			'keyword'     => 'high converting landing page developer',
			'secondary'   => array( 'WordPress landing page developer', 'Elementor landing page design', 'conversion focused landing page', 'lead generation landing page' ),
			'seoTitle'    => 'High-Converting Landing Page Developer',
			'meta'        => 'Get a focused WordPress landing page built for leads, campaigns, service offers, ads, and clear conversion paths.',
			'h1'          => 'High-Converting WordPress Landing Pages for Clear Offers',
			'summary'     => 'A landing page should make one offer easy to understand and easy to act on. I design and build focused WordPress landing pages with clear messaging, structure, and CTA flow.',
			'process'     => array( 'Clarify the audience, offer, traffic source, and conversion goal.', 'Plan the page sections: promise, proof, benefits, process, FAQ, and CTA.', 'Build the page in WordPress with responsive spacing and fast-loading assets.', 'Test forms, tracking, mobile layout, and CTA behavior.' ),
			'faq'         => array(
				array( 'q' => 'Can you build a landing page for ads?', 'a' => 'Yes. I can build focused pages for paid campaigns, service offers, launches, and lead magnets.' ),
				array( 'q' => 'Can you connect the form to my CRM?', 'a' => 'Yes. I can connect WordPress forms to email, CRMs, webhooks, or automation workflows.' ),
			),
			'related'     => array( 'elementor-developer', 'figma-to-wordpress', 'wordpress-speed-optimization' ),
		),
		'wordpress-maintenance' => array(
			'title'       => 'WordPress Maintenance Service',
			'keyword'     => 'wordpress maintenance service',
			'secondary'   => array( 'WordPress care plan', 'WordPress updates and backups', 'WordPress security maintenance', 'ongoing WordPress support' ),
			'seoTitle'    => 'WordPress Maintenance Service',
			'meta'        => 'Keep your WordPress site stable with updates, backups, security checks, uptime awareness, small fixes, and ongoing support.',
			'h1'          => 'WordPress Maintenance for Stable Business Websites',
			'summary'     => 'WordPress maintenance is not just clicking update. I help keep your website stable, backed up, secure, and ready for small improvements without surprise downtime.',
			'process'     => array( 'Review the current WordPress setup, plugins, hosting, backups, and update history.', 'Set a safe update, backup, and testing routine.', 'Monitor common issues such as forms, layout breaks, plugin conflicts, and security warnings.', 'Handle small fixes and recommendations before they become expensive problems.' ),
			'faq'         => array(
				array( 'q' => 'Do you include backups before updates?', 'a' => 'Yes. Updates should be handled with a backup and a testing process whenever possible.' ),
				array( 'q' => 'Can maintenance include small content or layout fixes?', 'a' => 'Yes. Maintenance can include small fixes, troubleshooting, and ongoing improvements depending on scope.' ),
			),
			'related'     => array( 'fix-wordpress-website', 'wordpress-speed-optimization', 'woocommerce-developer' ),
		),
	);
}

function jawad_dev_keyword_map(): array {
	return array(
		array( 'keyword' => 'hire elementor developer', 'intent' => 'Hire an implementation expert', 'url' => '/elementor-developer/', 'difficulty' => 'Medium-low' ),
		array( 'keyword' => 'elementor pro developer for hire', 'intent' => 'Hire Elementor Pro specialist', 'url' => '/elementor-developer/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'wordpress speed optimization service', 'intent' => 'Fix performance/Core Web Vitals', 'url' => '/wordpress-speed-optimization/', 'difficulty' => 'Medium' ),
		array( 'keyword' => 'fix slow elementor website', 'intent' => 'Troubleshoot Elementor performance', 'url' => '/wordpress-speed-optimization/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'woocommerce developer for hire', 'intent' => 'Hire store developer', 'url' => '/woocommerce-developer/', 'difficulty' => 'Medium' ),
		array( 'keyword' => 'fix woocommerce checkout errors', 'intent' => 'Urgent store repair', 'url' => '/woocommerce-developer/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'fix broken wordpress website', 'intent' => 'Urgent troubleshooting', 'url' => '/fix-wordpress-website/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'figma to wordpress conversion', 'intent' => 'Convert approved design', 'url' => '/figma-to-wordpress/', 'difficulty' => 'Medium' ),
		array( 'keyword' => 'figma to elementor wordpress', 'intent' => 'Editable page build', 'url' => '/figma-to-wordpress/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'high converting landing page developer', 'intent' => 'Build campaign page', 'url' => '/landing-page-design/', 'difficulty' => 'Low' ),
		array( 'keyword' => 'wordpress maintenance service for small business', 'intent' => 'Ongoing care', 'url' => '/wordpress-maintenance/', 'difficulty' => 'Low' ),
	);
}

add_action( 'init', 'jawad_dev_register_seo_service_patterns' );
function jawad_dev_register_seo_service_patterns(): void {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category( 'jawad-dev', array( 'label' => __( 'Jawad Dev', 'jawad-dev' ) ) );
	}

	foreach ( jawad_dev_seo_service_pages() as $slug => $page ) {
		register_block_pattern(
			'jawad-dev/service-' . $slug,
			array(
				'title'       => sprintf( __( 'SEO Service Page: %s', 'jawad-dev' ), $page['title'] ),
				'description' => sprintf( __( 'Conversion-focused service page pattern for %s.', 'jawad-dev' ), $page['keyword'] ),
				'categories'  => array( 'jawad-dev' ),
				'content'     => jawad_dev_service_pattern_content( $slug, $page ),
			)
		);
	}
}

function jawad_dev_service_url_for_title( string $title ): string {
	$map = array(
		'Elementor & Elementor Pro Development' => '/elementor-developer/',
		'WooCommerce Store Development'        => '/woocommerce-developer/',
		'WordPress Bug Fixing'                 => '/fix-wordpress-website/',
		'Custom WordPress Website Design'      => '/fix-wordpress-website/',
		'WordPress Speed Optimization'         => '/wordpress-speed-optimization/',
		'Figma to WordPress'                   => '/figma-to-wordpress/',
		'Landing Page Design'                  => '/landing-page-design/',
		'Maintenance & Security'               => '/wordpress-maintenance/',
	);

	return isset( $map[ $title ] ) ? home_url( $map[ $title ] ) : '';
}

function jawad_dev_service_pattern_content( string $slug, array $page ): string {
	$related = array();
	foreach ( $page['related'] as $related_slug ) {
		$related[] = '<a href="' . esc_url( home_url( '/' . $related_slug . '/' ) ) . '">' . esc_html( jawad_dev_seo_service_pages()[ $related_slug ]['title'] ?? $related_slug ) . '</a>';
	}

	$process = array_map(
		static fn( $item ) => '<li><span></span>' . esc_html( $item ) . '</li>',
		$page['process']
	);
	$faq = '';
	foreach ( $page['faq'] as $item ) {
		$faq .= '<details><summary><h3>' . esc_html( $item['q'] ) . '</h3><span>+</span></summary><p>' . esc_html( $item['a'] ) . '</p></details>';
	}

	$secondary = array_map(
		static fn( $item ) => '<span>' . esc_html( $item ) . '</span>',
		$page['secondary']
	);

	return '<!-- wp:group {"align":"full","className":"jd-service-page","layout":{"type":"default"}} --><div class="wp-block-group alignfull jd-service-page">'
		. '<section class="jd-service-hero"><div class="jd-container jd-service-hero__grid">'
		. '<div class="jd-service-hero__copy"><div class="jd-eyebrow">// ' . esc_html( strtoupper( str_replace( '-', ' ', $slug ) ) ) . '</div><h1>' . esc_html( $page['h1'] ) . '</h1><p>' . esc_html( $page['summary'] ) . '</p><div class="jd-service-keywords">' . implode( '', $secondary ) . '</div><a class="jd-btn jd-open-form jd-hire-anim-lg" href="#contact">Start a project request</a></div>'
		. '<div class="jd-service-visual" aria-hidden="true"><div class="jd-service-window"><div class="jd-window-dots"><span></span><span></span><span></span><em>' . esc_html( $slug ) . '.php</em></div><div class="jd-service-orbit"><i></i><i></i><i></i></div><code><b>add_action</b>(<i>\'need_website_help\'</i>,<br><i>\'hire_jawad\'</i>);<br><small>// fast, editable, conversion-ready</small></code><div class="jd-service-bars"><span></span><span></span><span></span></div></div></div>'
		. '</div></section>'
		. '<section class="jd-service-band"><div class="jd-container jd-service-layout"><article><h2>What this service solves</h2><p>This page targets <strong>' . esc_html( $page['keyword'] ) . '</strong>. Add one real project, screenshots, before/after notes, and client proof before publishing so the page feels useful, specific, and trustworthy.</p></article><article><h2>My process</h2><ul class="jd-service-process">' . implode( '', $process ) . '</ul></article></div></section>'
		. '<section class="jd-service-band jd-service-band--soft"><div class="jd-container"><div class="jd-service-section-head"><span>// RELATED</span><h2>Related WordPress services</h2></div><div class="jd-service-related">' . implode( '', $related ) . '</div></div></section>'
		. '<section class="jd-service-band"><div class="jd-container jd-service-faq-wrap"><div class="jd-service-section-head"><span>// FAQ</span><h2>Questions before you start</h2></div><div class="jd-faq jd-service-faq">' . $faq . '</div></div></section>'
		. '</div><!-- /wp:group -->';
}

function jawad_dev_current_service_page(): ?array {
	if ( ! is_page() ) {
		return null;
	}

	$post = get_post();
	if ( ! $post ) {
		return null;
	}

	$slug = $post->post_name;
	$pages = jawad_dev_seo_service_pages();

	return $pages[ $slug ] ?? null;
}

add_filter( 'document_title_parts', 'jawad_dev_service_title_fallback' );
function jawad_dev_service_title_fallback( array $parts ): array {
	if ( jawad_dev_has_seo_plugin() ) {
		return $parts;
	}

	$page = jawad_dev_current_service_page();
	if ( ! $page ) {
		return $parts;
	}

	$parts['title'] = $page['seoTitle'];

	return $parts;
}

add_action( 'wp_head', 'jawad_dev_output_service_meta_fallback', 5 );
function jawad_dev_output_service_meta_fallback(): void {
	if ( jawad_dev_has_seo_plugin() ) {
		return;
	}

	$page = jawad_dev_current_service_page();
	if ( ! $page ) {
		return;
	}

	echo '<meta name="description" content="' . esc_attr( $page['meta'] ) . '">' . "\n";
}

add_action( 'wp_head', 'jawad_dev_output_service_schema_fallbacks', 12 );
function jawad_dev_output_service_schema_fallbacks(): void {
	$page = jawad_dev_current_service_page();
	if ( ! $page ) {
		return;
	}

	$graph = array();
	if ( ! jawad_dev_has_seo_plugin() ) {
		$graph[] = array(
			'@type'      => 'Person',
			'@id'        => home_url( '/#jawad-ilyas' ),
			'name'       => 'Jawad Ilyas',
			'jobTitle'   => 'WordPress Developer',
			'url'        => home_url( '/' ),
			'knowsAbout' => array( 'WordPress', 'Elementor', 'WooCommerce', 'Core Web Vitals', 'Figma to WordPress', 'AI workflow automation' ),
		);
	}

	$graph[] = array(
		'@type'       => 'Service',
		'name'        => $page['title'],
		'description' => $page['meta'],
		'provider'    => array( '@id' => home_url( '/#jawad-ilyas' ) ),
		'areaServed'  => array( 'United States', 'Canada', 'United Kingdom', 'Pakistan', 'Worldwide' ),
		'serviceType' => $page['keyword'],
		'url'         => get_permalink(),
	);

	$graph[] = array(
		'@type'      => 'FAQPage',
		'mainEntity' => array_map(
			static fn( $item ) => array(
				'@type'          => 'Question',
				'name'           => $item['q'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $item['a'],
				),
			),
			$page['faq']
		),
	);

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
