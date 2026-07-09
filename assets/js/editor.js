( function ( blocks, element, components, blockEditor, serverSideRender, i18n ) {
	const el = element.createElement;
	const __ = i18n.__;
	const InspectorControls = blockEditor.InspectorControls;
	const MediaUpload = blockEditor.MediaUpload;
	const MediaUploadCheck = blockEditor.MediaUploadCheck;
	const PanelBody = components.PanelBody;
	const TextControl = components.TextControl;
	const TextareaControl = components.TextareaControl;
	const ToggleControl = components.ToggleControl;
	const RangeControl = components.RangeControl;
	const Button = components.Button;
	const ServerSideRender = serverSideRender;

	const sections = {
		'site-header': 'JD Site Header',
		hero: 'JD Hero',
		services: 'JD Services',
		why: 'JD Why Hire Me',
		solutions: 'JD Solutions',
		process: 'JD Process',
		packages: 'JD Packages',
		projects: 'JD Projects',
		stack: 'JD Tech Stack',
		testimonials: 'JD Testimonials',
		faq: 'JD FAQ',
		cta: 'JD Final CTA',
		'site-footer': 'JD Site Footer',
		'contact-modal': 'JD Contact Modal'
	};

	const copyFields = [
		[ 'brand', __( 'Brand', 'jawad-dev' ) ],
		[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
		[ 'title', __( 'Title', 'jawad-dev' ) ],
		[ 'description', __( 'Description', 'jawad-dev' ), 'textarea' ],
		[ 'buttonText', __( 'Primary Button', 'jawad-dev' ) ],
		[ 'secondaryText', __( 'Secondary Button', 'jawad-dev' ) ],
		[ 'ctaText', __( 'Header CTA', 'jawad-dev' ) ]
	];

	Object.keys( sections ).forEach( function ( slug ) {
		const name = 'jawad-dev/' + slug;
		blocks.registerBlockType( name, {
			edit: function ( props ) {
				const attrs = props.attributes;
				const set = function ( key ) {
					return function ( value ) {
						const next = {};
						next[ key ] = value;
						props.setAttributes( next );
					};
				};

				const controls = [
					el( ToggleControl, {
						key: 'enabled',
						label: __( 'Show this section', 'jawad-dev' ),
						checked: attrs.enabled !== false,
						onChange: set( 'enabled' )
					} )
				];

				copyFields.forEach( function ( field ) {
					if ( attrs[ field[ 0 ] ] === undefined && [ 'site-header', 'site-footer' ].indexOf( slug ) === -1 && field[ 0 ] === 'brand' ) {
						return;
					}
					if ( attrs[ field[ 0 ] ] === undefined && slug !== 'site-header' && field[ 0 ] === 'ctaText' ) {
						return;
					}
					const Control = field[ 2 ] === 'textarea' ? TextareaControl : TextControl;
					controls.push( el( Control, {
						key: field[ 0 ],
						label: field[ 1 ],
						value: attrs[ field[ 0 ] ] || '',
						onChange: set( field[ 0 ] )
					} ) );
				} );

				if ( slug === 'hero' ) {
					controls.push( el( ToggleControl, {
						key: 'showBadge',
						label: __( 'Show availability badge', 'jawad-dev' ),
						checked: attrs.showBadge !== false,
						onChange: set( 'showBadge' )
					} ) );
					controls.push( el( MediaUploadCheck, { key: 'media-check' },
						el( MediaUpload, {
							onSelect: function ( media ) {
								props.setAttributes( { imageId: media.id, imageUrl: media.url } );
							},
							allowedTypes: [ 'image' ],
							value: attrs.imageId,
							render: function ( obj ) {
								return el( Button, { variant: 'secondary', onClick: obj.open }, attrs.imageUrl ? __( 'Replace portrait', 'jawad-dev' ) : __( 'Choose portrait', 'jawad-dev' ) );
							}
						} )
					) );
				}

				if ( slug === 'projects' ) {
					controls.push( el( RangeControl, {
						key: 'postsToShow',
						label: __( 'Projects to show', 'jawad-dev' ),
						min: 1,
						max: 12,
						value: attrs.postsToShow || 4,
						onChange: set( 'postsToShow' )
					} ) );
				}

				return el( 'div', { className: 'jawad-dev-editor-preview' },
					el( InspectorControls, {},
						el( PanelBody, { title: __( 'Section Settings', 'jawad-dev' ), initialOpen: true }, controls )
					),
					el( ServerSideRender, { block: name, attributes: attrs } )
				);
			},
			save: function () {
				return null;
			}
		} );
	} );
} )( window.wp.blocks, window.wp.element, window.wp.components, window.wp.blockEditor, window.wp.serverSideRender, window.wp.i18n );
