# SEO Service Architecture Handoff

This document is the development-level SEO plan for jawadjd.dev. The theme now includes service-page data, block patterns, homepage service-card links, footer/header links, and service-page JSON-LD that complements Yoast SEO.

## Access Level

Development access only in this pass:

- Theme repository: available.
- WordPress admin, Yoast SEO UI, Search Console, sitemap submission, and live indexing data: not available in this pass.

## Keyword Map

| Keyword | Intent | Target URL | Difficulty estimate |
|---|---|---:|---|
| hire elementor developer | Hire an implementation expert | `/elementor-developer/` | Medium-low |
| elementor pro developer for hire | Hire Elementor Pro specialist | `/elementor-developer/` | Low |
| wordpress speed optimization service | Fix performance/Core Web Vitals | `/wordpress-speed-optimization/` | Medium |
| fix slow elementor website | Troubleshoot Elementor performance | `/wordpress-speed-optimization/` | Low |
| woocommerce developer for hire | Hire store developer | `/woocommerce-developer/` | Medium |
| fix woocommerce checkout errors | Urgent store repair | `/woocommerce-developer/` | Low |
| fix broken wordpress website | Urgent troubleshooting | `/fix-wordpress-website/` | Low |
| figma to wordpress conversion | Convert approved design | `/figma-to-wordpress/` | Medium |
| figma to elementor wordpress | Editable page build | `/figma-to-wordpress/` | Low |
| high converting landing page developer | Build campaign page | `/landing-page-design/` | Low |
| wordpress maintenance service for small business | Ongoing care | `/wordpress-maintenance/` | Low |

## Service Pages To Create

Create these pages in WordPress, set the exact slug, insert the matching pattern from the "Jawad Dev" pattern category, then expand each draft to 800-1,500 words with one real project/proof section.

### `/elementor-developer/`

- Target keyword: `hire elementor developer`
- SEO title: `Hire Elementor Developer | Jawad Ilyas`
- Meta description: `Hire an Elementor developer for fast, responsive WordPress pages, custom templates, clean structure, and conversion-focused builds.`
- H1: `Hire an Elementor Developer for a Fast, Clean WordPress Website`
- Secondary keywords: Elementor Pro developer, WordPress Elementor expert, custom Elementor website, Elementor landing page developer

### `/wordpress-speed-optimization/`

- Target keyword: `wordpress speed optimization service`
- SEO title: `WordPress Speed Optimization Service`
- Meta description: `Speed up your WordPress site with Core Web Vitals fixes, cache setup, image optimization, script cleanup, and careful testing.`
- H1: `WordPress Speed Optimization for Slow Business Websites`
- Secondary keywords: Core Web Vitals WordPress, speed up slow WordPress site, WordPress PageSpeed optimization, fix slow Elementor website

### `/woocommerce-developer/`

- Target keyword: `woocommerce developer for hire`
- SEO title: `WooCommerce Developer for Hire`
- Meta description: `Hire a WooCommerce developer for store setup, checkout fixes, product pages, payments, responsive layouts, and conversion cleanup.`
- H1: `WooCommerce Developer for Stores That Need to Sell Smoothly`
- Secondary keywords: WooCommerce checkout developer, WooCommerce store setup, fix WooCommerce checkout, WooCommerce product page design

### `/fix-wordpress-website/`

- Target keyword: `fix broken wordpress website`
- SEO title: `Fix Broken WordPress Website`
- Meta description: `Need to fix a broken, slow, or messy WordPress website? Get careful debugging for plugin conflicts, layout issues, forms, and errors.`
- H1: `Fix a Broken, Slow, or Unstable WordPress Website`
- Secondary keywords: fix slow WordPress site, WordPress bug fixing service, WordPress plugin conflict fix, fix Elementor layout issues

### `/figma-to-wordpress/`

- Target keyword: `figma to wordpress conversion`
- SEO title: `Figma to WordPress Conversion`
- Meta description: `Convert your Figma design into a responsive, editable, SEO-friendly WordPress website using Elementor or a custom theme.`
- H1: `Figma to WordPress Conversion That Stays Editable`
- Secondary keywords: convert Figma to WordPress, Figma to Elementor, Figma to WordPress developer, pixel perfect WordPress build

### `/landing-page-design/`

- Target keyword: `high converting landing page developer`
- SEO title: `High-Converting Landing Page Developer`
- Meta description: `Get a focused WordPress landing page built for leads, campaigns, service offers, ads, and clear conversion paths.`
- H1: `High-Converting WordPress Landing Pages for Clear Offers`
- Secondary keywords: WordPress landing page developer, Elementor landing page design, conversion focused landing page, lead generation landing page

### `/wordpress-maintenance/`

- Target keyword: `wordpress maintenance service`
- SEO title: `WordPress Maintenance Service`
- Meta description: `Keep your WordPress site stable with updates, backups, security checks, uptime awareness, small fixes, and ongoing support.`
- H1: `WordPress Maintenance for Stable Business Websites`
- Secondary keywords: WordPress care plan, WordPress updates and backups, WordPress security maintenance, ongoing WordPress support

## Yoast SEO Settings

Use Yoast SEO for titles, descriptions, canonicals, Open Graph, Twitter cards, breadcrumbs, and XML sitemaps. The theme adds Service + FAQ JSON-LD for the new service pages, while Yoast should continue handling normal SEO meta.

- Site representation: Person.
- Person name: Jawad Ilyas.
- Website name: Jawadjd.dev.
- Job positioning: WordPress Developer / Elementor Developer / WooCommerce Developer.
- Social profiles: add real LinkedIn, GitHub, and any public review/profile URLs.
- Breadcrumbs: enable Yoast breadcrumbs and add the breadcrumb block/shortcode to single/page templates if you want visible breadcrumbs.
- Search appearance: set each service page SEO title and meta description from this document.
- Schema: Yoast will output WebPage, WebSite, Organization/Person, and breadcrumb graph. The theme outputs extra Service + FAQPage schema on service pages.
- Reviews: only use Review/AggregateRating if real reviews exist with verifiable source details.

## Blog Calendar

| Working title | Target keyword | Angle | Link to |
|---|---|---|---|
| Why Is My Elementor Website So Slow? | fix slow elementor website | Diagnose Elementor bloat and fixes | `/wordpress-speed-optimization/` |
| WooCommerce Checkout Not Working: Common Causes | fix woocommerce checkout errors | Debug payment, shipping, plugin conflicts | `/woocommerce-developer/` |
| Figma to Elementor vs Custom WordPress Theme | figma to elementor wordpress | Compare build paths for business owners | `/figma-to-wordpress/` |
| How to Hire an Elementor Developer Without Regret | hire elementor developer | Buyer checklist and red flags | `/elementor-developer/` |
| WordPress Core Web Vitals Checklist for Small Businesses | wordpress speed optimization service | Practical performance checklist | `/wordpress-speed-optimization/` |
| Broken WordPress Site After an Update: What To Do | fix broken wordpress website | Safe recovery steps | `/fix-wordpress-website/` |
| What Should a WordPress Maintenance Plan Include? | wordpress maintenance service for small business | Explain care plan value | `/wordpress-maintenance/` |
| Product Page Fixes That Improve WooCommerce Trust | woocommerce product page design | Conversion-focused store improvements | `/woocommerce-developer/` |
| Landing Page Sections That Help Service Businesses Convert | high converting landing page developer | Structure and CTA strategy | `/landing-page-design/` |
| How to Prepare a Figma File for WordPress Development | figma to wordpress conversion | Designer/client handoff checklist | `/figma-to-wordpress/` |
| WordPress Plugin Conflicts: How Developers Debug Them | wordpress plugin conflict fix | Explain professional debugging | `/fix-wordpress-website/` |
| Elementor Global Styles: Why They Matter | custom elementor website | Maintainable Elementor structure | `/elementor-developer/` |

## MCP / Admin Tasks For Later

- Create and publish the seven service pages with the exact slugs.
- Insert the matching "SEO Service Page" pattern into each page.
- Expand each page with 800-1,500 words of real proof, screenshots, and one relevant project.
- Add Yoast title/meta for each page from this document.
- Confirm the theme Service + FAQ JSON-LD appears on each service page in Rich Results Test.
- Enable and verify Yoast breadcrumbs if you want visible breadcrumbs.
- Submit `/sitemap_index.xml` in Google Search Console.
- Confirm no service page is accidentally `noindex`.
- Inspect coverage/indexing and query data in Search Console after publishing.
- Add real testimonial details: real name, company, role, source URL where possible.
- Create an About page with experience, process, skills, location, and client-fit details.
- Add real Open Graph images for homepage, service pages, blog, and case studies.
- Validate mobile rendering of each service page after content is added.
