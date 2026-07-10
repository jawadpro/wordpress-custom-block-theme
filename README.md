# Jawad Ilyas Block Theme

Full-site-editing WordPress block theme converted from the supplied HTML export.

## What is included

- Individual Gutenberg blocks for header, hero, platform logos, services, why-hire, solutions, process, packages, projects, stack, testimonials, FAQ, CTA, footer, and contact modal.
- `project` custom post type for portfolio work.
- Project fields: live link, client/industry, year, result/outcome, accent color, button text, featured image.
- Project taxonomies: Project Types and Technologies.
- Multi-step AJAX project request form with nonce validation, honeypot, IP rate limiting, sanitization, and `wp_mail()` delivery.
- Cursor glow, modal, FAQ/details, hover, floating card, and responsive styling from the HTML version.

## Setup

1. Copy this folder to `wp-content/themes/wordpress-custom-block-theme`.
2. Activate **Jawad Ilyas Block Theme** in WordPress.
3. Go to **Appearance > Editor** to edit sections. Each section is its own block.
4. Add projects under **Projects**. Use the featured image for the screenshot, taxonomies for card tags, and Project Details fields for the card metadata.
5. Configure site email delivery with an SMTP plugin so WordPress mail is reliable.

## Form recipient

By default, project requests go to the site admin email. Developers can change it with:

```php
add_filter( 'jawad_dev_project_request_to', function () {
	return 'hello@example.com';
} );
```
