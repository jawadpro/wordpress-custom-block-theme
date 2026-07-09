( function ( blocks, element, components, blockEditor, serverSideRender, i18n ) {
	const el = element.createElement;
	const __ = i18n.__;
	const InspectorControls = blockEditor.InspectorControls;
	const MediaUpload = blockEditor.MediaUpload;
	const MediaUploadCheck = blockEditor.MediaUploadCheck;
	const useBlockProps = blockEditor.useBlockProps;
	const PanelBody = components.PanelBody;
	const TextControl = components.TextControl;
	const TextareaControl = components.TextareaControl;
	const ToggleControl = components.ToggleControl;
	const RangeControl = components.RangeControl;
	const SelectControl = components.SelectControl;
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

	const sectionFields = {
		'site-header': [
			[ 'brand', __( 'Brand', 'jawad-dev' ) ],
			[ 'ctaText', __( 'CTA text', 'jawad-dev' ) ]
		],
		hero: [
			[ 'eyebrow', __( 'Badge text', 'jawad-dev' ) ],
			[ 'title', __( 'Headline', 'jawad-dev' ) ],
			[ 'description', __( 'Intro text', 'jawad-dev' ), 'textarea' ],
			[ 'buttonText', __( 'Primary button text', 'jawad-dev' ) ],
			[ 'buttonUrl', __( 'Primary button URL', 'jawad-dev' ) ],
			[ 'secondaryText', __( 'Secondary button text', 'jawad-dev' ) ],
			[ 'secondaryUrl', __( 'Secondary button URL', 'jawad-dev' ) ]
		],
		services: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ],
			[ 'description', __( 'Intro text', 'jawad-dev' ), 'textarea' ]
		],
		why: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		solutions: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		process: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		packages: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		projects: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ],
			[ 'description', __( 'Intro text', 'jawad-dev' ), 'textarea' ]
		],
		stack: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		testimonials: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		faq: [
			[ 'eyebrow', __( 'Eyebrow', 'jawad-dev' ) ],
			[ 'title', __( 'Heading', 'jawad-dev' ) ]
		],
		cta: [
			[ 'title', __( 'Heading', 'jawad-dev' ) ],
			[ 'description', __( 'Intro text', 'jawad-dev' ), 'textarea' ],
			[ 'buttonText', __( 'Primary button text', 'jawad-dev' ) ],
			[ 'buttonUrl', __( 'Primary button URL', 'jawad-dev' ) ],
			[ 'secondaryText', __( 'Secondary button text', 'jawad-dev' ) ],
			[ 'secondaryUrl', __( 'Secondary button URL', 'jawad-dev' ) ]
		],
		'site-footer': [
			[ 'brand', __( 'Brand', 'jawad-dev' ) ],
			[ 'description', __( 'Description', 'jawad-dev' ), 'textarea' ]
		],
		'contact-modal': [
			[ 'modalTitle', __( 'Modal title', 'jawad-dev' ) ],
			[ 'modalSubtitle', __( 'Modal subtitle', 'jawad-dev' ), 'textarea' ],
			[ 'gravityEyebrow', __( 'Modal eyebrow', 'jawad-dev' ) ],
			[ 'gravityFormShortcode', __( 'Gravity shortcode', 'jawad-dev' ) ],
			[ 'gravityServiceParam', __( 'GF service parameter', 'jawad-dev' ) ],
			[ 'gravityBudgetParam', __( 'GF budget parameter', 'jawad-dev' ) ],
			[ 'gravityTimelineParam', __( 'GF timeline parameter', 'jawad-dev' ) ]
		]
	};

	const repeaterConfigs = {
		hero: {
			key: 'stats',
			title: __( 'Hero Stats', 'jawad-dev' ),
			addLabel: __( 'Add stat', 'jawad-dev' ),
			empty: { value: '100+', label: 'Result' },
			fields: [
				[ 'value', __( 'Value', 'jawad-dev' ) ],
				[ 'label', __( 'Label', 'jawad-dev' ) ]
			]
		},
		services: {
			key: 'items',
			title: __( 'Service Cards', 'jawad-dev' ),
			addLabel: __( 'Add service', 'jawad-dev' ),
			empty: { title: 'New Service', text: '', code: '', icon: 'service-1' },
			fields: [
				[ 'title', __( 'Service title', 'jawad-dev' ) ],
				[ 'text', __( 'Description', 'jawad-dev' ), 'textarea' ],
				[ 'code', __( 'Code label', 'jawad-dev' ) ],
				[ 'icon', __( 'Icon key', 'jawad-dev' ) ]
			]
		},
		why: {
			key: 'items',
			title: __( 'Checklist Items', 'jawad-dev' ),
			addLabel: __( 'Add item', 'jawad-dev' ),
			empty: { text: 'New reason' },
			fields: [ [ 'text', __( 'Reason', 'jawad-dev' ), 'textarea' ] ]
		},
		solutions: {
			key: 'items',
			title: __( 'Solution Cards', 'jawad-dev' ),
			addLabel: __( 'Add solution', 'jawad-dev' ),
			empty: { title: 'New Solution', text: '', icon: 'solution-1' },
			fields: [
				[ 'title', __( 'Solution title', 'jawad-dev' ) ],
				[ 'text', __( 'Description', 'jawad-dev' ), 'textarea' ],
				[ 'icon', __( 'Icon key', 'jawad-dev' ) ]
			]
		},
		process: {
			key: 'items',
			title: __( 'Process Steps', 'jawad-dev' ),
			addLabel: __( 'Add step', 'jawad-dev' ),
			empty: { number: '05', title: 'New Step', text: '' },
			fields: [
				[ 'number', __( 'Step number', 'jawad-dev' ) ],
				[ 'title', __( 'Step title', 'jawad-dev' ) ],
				[ 'text', __( 'Description', 'jawad-dev' ), 'textarea' ]
			]
		},
		packages: {
			key: 'items',
			title: __( 'Packages', 'jawad-dev' ),
			addLabel: __( 'Add package', 'jawad-dev' ),
			empty: { title: 'New Package', price: '$0', text: '', features: [], buttonText: 'Start Project', service: 'site', featured: false, badgeText: '' },
			fields: [
				[ 'title', __( 'Package title', 'jawad-dev' ) ],
				[ 'price', __( 'Price range', 'jawad-dev' ) ],
				[ 'text', __( 'Short description', 'jawad-dev' ), 'textarea' ],
				[ 'features', __( 'Features', 'jawad-dev' ), 'lines' ],
				[ 'buttonText', __( 'Button text', 'jawad-dev' ) ],
				[ 'service', __( 'Form service key', 'jawad-dev' ) ],
				[ 'featured', __( 'Featured package', 'jawad-dev' ), 'toggle' ],
				[ 'badgeText', __( 'Badge text', 'jawad-dev' ) ]
			]
		},
		stack: {
			key: 'items',
			title: __( 'Stack Items', 'jawad-dev' ),
			addLabel: __( 'Add tool', 'jawad-dev' ),
			empty: { text: 'New Tool', colorStart: '#60a5fa', colorEnd: '#22d3ee' },
			fields: [
				[ 'text', __( 'Tool name', 'jawad-dev' ) ],
				[ 'colorStart', __( 'Dot gradient start', 'jawad-dev' ) ],
				[ 'colorEnd', __( 'Dot gradient end', 'jawad-dev' ) ]
			]
		},
		testimonials: {
			key: 'items',
			title: __( 'Testimonials', 'jawad-dev' ),
			addLabel: __( 'Add testimonial', 'jawad-dev' ),
			empty: { quote: 'Client feedback goes here.', author: 'Client Name' },
			fields: [
				[ 'quote', __( 'Quote', 'jawad-dev' ), 'textarea' ],
				[ 'author', __( 'Author', 'jawad-dev' ) ],
				[ 'meta', __( 'Company / project', 'jawad-dev' ) ],
				[ 'initials', __( 'Avatar initials', 'jawad-dev' ) ],
				[ 'color', __( 'Avatar color', 'jawad-dev' ) ]
			]
		},
		faq: {
			key: 'items',
			title: __( 'FAQ Items', 'jawad-dev' ),
			addLabel: __( 'Add FAQ', 'jawad-dev' ),
			empty: { question: 'New question?', answer: 'Answer text.' },
			fields: [
				[ 'question', __( 'Question', 'jawad-dev' ) ],
				[ 'answer', __( 'Answer', 'jawad-dev' ), 'textarea' ]
			]
		}
	};

	function fieldControl( attrs, set, field ) {
		const Control = field[ 2 ] === 'textarea' ? TextareaControl : TextControl;
		return el( Control, {
			key: field[ 0 ],
			label: field[ 1 ],
			value: attrs[ field[ 0 ] ] || '',
			onChange: set( field[ 0 ] )
		} );
	}

	function repeaterTitle( item, index, config ) {
		const fallback = config.title + ' #' + ( index + 1 );
		return ( item && ( item.title || item.question || item.author || item.text || item.label || item.value ) ) || fallback;
	}

	function repeaterMeta( item ) {
		if ( ! item ) {
			return '';
		}
		if ( item.price ) {
			return item.price;
		}
		if ( item.meta ) {
			return item.meta;
		}
		if ( item.code ) {
			return item.code;
		}
		if ( item.service ) {
			return item.service;
		}
		return '';
	}

	function repeaterControls( attrs, setAttributes, config ) {
		const items = Array.isArray( attrs[ config.key ] ) ? attrs[ config.key ] : [];
		const updateItem = function ( index, field, value ) {
			const next = items.slice();
			next[ index ] = Object.assign( {}, next[ index ], { [ field ]: value } );
			setAttributes( { [ config.key ]: next } );
		};
		const removeItem = function ( index ) {
			setAttributes( { [ config.key ]: items.filter( function ( item, i ) { return i !== index; } ) } );
		};
		const moveItem = function ( index, direction ) {
			const target = index + direction;
			if ( target < 0 || target >= items.length ) {
				return;
			}
			const next = items.slice();
			const current = next[ index ];
			next[ index ] = next[ target ];
			next[ target ] = current;
			setAttributes( { [ config.key ]: next } );
		};

		return el( PanelBody, { title: config.title + ' (' + items.length + ')', initialOpen: false },
			items.map( function ( item, index ) {
				const itemFields = config.fields.map( function ( field ) {
					const type = field[ 2 ];
					const value = item && item[ field[ 0 ] ] !== undefined ? item[ field[ 0 ] ] : '';
					if ( type === 'toggle' ) {
						return el( ToggleControl, {
							key: field[ 0 ],
							label: field[ 1 ],
							checked: !! value,
							onChange: function ( next ) {
								updateItem( index, field[ 0 ], next );
							}
						} );
					}
					if ( type === 'lines' ) {
						return el( TextareaControl, {
							key: field[ 0 ],
							label: field[ 1 ],
							value: Array.isArray( value ) ? value.join( '\n' ) : value,
							onChange: function ( next ) {
								updateItem( index, field[ 0 ], next.split( /\r\n|\r|\n/ ).filter( Boolean ) );
							}
						} );
					}
					const Control = type === 'textarea' ? TextareaControl : TextControl;
					return el( Control, {
						key: field[ 0 ],
						label: field[ 1 ],
						value: value,
						onChange: function ( next ) {
							updateItem( index, field[ 0 ], next );
						}
					} );
				} );
				const meta = repeaterMeta( item );

				return el( 'details', { key: index, className: 'jd-editor-repeater-item', defaultOpen: index === items.length - 1 },
					el( 'summary', { className: 'jd-editor-repeater-summary' },
						el( 'span', { className: 'jd-editor-repeater-index' }, String( index + 1 ).padStart( 2, '0' ) ),
						el( 'span', { className: 'jd-editor-repeater-heading' },
							el( 'strong', {}, repeaterTitle( item, index, config ) ),
							meta ? el( 'small', {}, meta ) : null
						),
						el( 'span', { className: 'jd-editor-repeater-chevron', 'aria-hidden': true }, '⌄' )
					),
					el( 'div', { className: 'jd-editor-repeater-body' },
						itemFields,
						el( 'div', { className: 'jd-editor-repeater-actions' },
							el( Button, { variant: 'secondary', size: 'small', onClick: function () { moveItem( index, -1 ); }, disabled: index === 0 }, __( 'Up', 'jawad-dev' ) ),
							el( Button, { variant: 'secondary', size: 'small', onClick: function () { moveItem( index, 1 ); }, disabled: index === items.length - 1 }, __( 'Down', 'jawad-dev' ) ),
							el( Button, { variant: 'tertiary', size: 'small', isDestructive: true, onClick: function () { removeItem( index ); } }, __( 'Remove', 'jawad-dev' ) )
						)
					)
				);
			} ),
			el( Button, {
				className: 'jd-editor-repeater-add',
				variant: 'primary',
				onClick: function () {
					setAttributes( { [ config.key ]: items.concat( [ Object.assign( {}, config.empty ) ] ) } );
				}
			}, config.addLabel )
		);
	}

	Object.keys( sections ).forEach( function ( slug ) {
		const name = 'jawad-dev/' + slug;
		blocks.registerBlockType( name, {
			edit: function ( props ) {
				const attrs = props.attributes;
				const blockProps = useBlockProps( { className: 'jawad-dev-editor-preview' } );
				const set = function ( key ) {
					return function ( value ) {
						const next = {};
						next[ key ] = value;
						props.setAttributes( next );
					};
				};

				const sectionControls = [
					el( ToggleControl, {
						key: 'enabled',
						label: __( 'Show this section', 'jawad-dev' ),
						checked: attrs.enabled !== false,
						onChange: set( 'enabled' )
					} )
				].concat( ( sectionFields[ slug ] || [] ).map( function ( field ) {
					return fieldControl( attrs, set, field );
				} ) );

				if ( slug === 'hero' ) {
					sectionControls.push( el( ToggleControl, {
						key: 'showBadge',
						label: __( 'Show badge', 'jawad-dev' ),
						checked: attrs.showBadge !== false,
						onChange: set( 'showBadge' )
					} ) );
					sectionControls.push( el( MediaUploadCheck, { key: 'media-check' },
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
					sectionControls.push( el( RangeControl, {
						key: 'postsToShow',
						label: __( 'Projects to show', 'jawad-dev' ),
						min: 1,
						max: 12,
						value: attrs.postsToShow || 4,
						onChange: set( 'postsToShow' )
					} ) );
				}

				return el( 'div', blockProps,
					el( InspectorControls, {},
						el( PanelBody, { title: __( 'Section Settings', 'jawad-dev' ), initialOpen: true }, sectionControls ),
						repeaterConfigs[ slug ] ? repeaterControls( attrs, props.setAttributes, repeaterConfigs[ slug ] ) : null
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
