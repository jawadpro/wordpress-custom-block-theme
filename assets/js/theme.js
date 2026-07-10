( function () {
	const state = { step: 1, service: '', budget: '', timeline: '' };

	function qs( selector, root ) {
		return ( root || document ).querySelector( selector );
	}

	function qsa( selector, root ) {
		return Array.prototype.slice.call( ( root || document ).querySelectorAll( selector ) );
	}

	function escapeHtml( value ) {
		const div = document.createElement( 'div' );
		div.textContent = value || '';
		return div.innerHTML;
	}

	function setupGlow() {
		const glow = qs( '.jd-cursor-glow' );
		if ( ! glow ) return;
		let raf = null;
		window.addEventListener( 'mousemove', function ( ev ) {
			if ( raf ) return;
			raf = window.requestAnimationFrame( function () {
				raf = null;
				glow.style.background = 'radial-gradient(720px circle at ' + ( ev.clientX + 80 ) + 'px ' + ( ev.clientY + 80 ) + 'px, rgba(37,99,235,0.15) 0%, rgba(37,99,235,0.1) 22%, rgba(34,211,238,0.06) 42%, rgba(139,92,246,0.03) 58%, rgba(139,92,246,0.012) 70%, transparent 82%)';
			} );
		}, { passive: true } );
	}

	function setupModal() {
		const modal = qs( '.jd-modal--gravity' );
		if ( ! modal ) return;

		const form = qs( '.jd-form', modal );
		const progress = qs( '.jd-progress span', modal );
		const next = qs( '.jd-form__next', modal );
		const back = qs( '.jd-form__back', modal );
		const trace = qs( '.jd-form__trace', modal );
		const gravityWrap = qs( '.jd-gravity-form', modal );
		let gravitySynced = false;

		function open( trigger ) {
			state.step = 1;
			state.service = trigger && trigger.dataset.service ? trigger.dataset.service : state.service;
			state.budget = trigger && trigger.dataset.budget ? trigger.dataset.budget : state.budget;
			modal.hidden = false;
			document.documentElement.style.overflow = 'hidden';
			if ( form ) {
				render();
			}
		}

		function close() {
			modal.hidden = true;
			document.documentElement.style.overflow = '';
		}

		function render() {
			qsa( '.jd-form__step', form ).forEach( function ( step ) {
				step.hidden = Number( step.dataset.step ) !== state.step;
			} );
			qsa( '[data-name]', form ).forEach( function ( button ) {
				button.classList.toggle( 'is-selected', state[ button.dataset.name ] === button.dataset.value );
			} );
			const valid = isValid();
			next.disabled = ! valid;
			next.textContent = 'Continue →';
			next.hidden = state.step === 3;
			back.hidden = state.step === 1;
			progress.style.width = ( state.step === 1 ? 33 : state.step === 2 ? 66 : 92 ) + '%';
			const parts = [];
			if ( state.service ) parts.push( 'type: ' + state.service );
			if ( state.budget ) parts.push( 'budget: ' + state.budget.replace( /\s/g, '' ) );
			if ( state.timeline ) parts.push( 'eta: ' + state.timeline.toLowerCase() );
			trace.textContent = '> ' + ( parts.length ? parts.join( '  ·  ' ) : 'awaiting_input...' );
			if ( state.step === 3 ) {
				if ( ! gravitySynced ) {
					syncGravityFields();
					gravitySynced = true;
				}
				progress.style.width = '100%';
				trace.textContent = '> selections_added_to_gravity_fields';
			} else {
				gravitySynced = false;
			}
		}

		function isValid() {
			if ( state.step === 1 ) return !! state.service;
			if ( state.step === 2 ) return !! ( state.budget && state.timeline );
			return true;
		}

		function escapeSelectorValue( value ) {
			if ( window.CSS && window.CSS.escape ) {
				return window.CSS.escape( value );
			}
			return value.replace( /["\\]/g, '\\$&' );
		}

		function gravitySelectors( key ) {
			const param = modal.dataset[ 'gf' + key.charAt( 0 ).toUpperCase() + key.slice( 1 ) + 'Param' ] || key;
			const escaped = escapeSelectorValue( param );
			return [
				'input[name="' + escaped + '"]',
				'textarea[name="' + escaped + '"]',
				'select[name="' + escaped + '"]',
				'[data-gf-param="' + escaped + '"] input',
				'[data-gf-param="' + escaped + '"] textarea',
				'[data-gf-param="' + escaped + '"] select',
				'.jd-gf-' + key + ' input',
				'.jd-gf-' + key + ' textarea',
				'.jd-gf-' + key + ' select',
				'input.jd-gf-' + key,
				'textarea.jd-gf-' + key,
				'select.jd-gf-' + key
			];
		}

		function setGravityValue( selectors, value ) {
			qsa( selectors.join( ',' ), modal ).forEach( function ( field ) {
				if ( field.value === value ) return;
				field.value = value;
				field.dispatchEvent( new Event( 'change', { bubbles: true } ) );
			} );
		}

		function syncGravityFields() {
			setGravityValue( gravitySelectors( 'service' ), state.service );
			setGravityValue( gravitySelectors( 'budget' ), state.budget );
			setGravityValue( gravitySelectors( 'timeline' ), state.timeline );
		}

		function markGravitySuccess() {
			modal.classList.add( 'jd-modal--submitted' );
			progress.style.width = '100%';
			trace.textContent = '> request_sent_successfully';
			back.hidden = true;
			next.hidden = true;
		}

		function isContactTrigger( target ) {
			if ( ! target || ! target.closest ) {
				return null;
			}
			const trigger = target.closest( '.jd-open-form, a[href="#contact"], a[href$="/#contact"]' );
			if ( ! trigger ) {
				return null;
			}
			const href = trigger.getAttribute( 'href' ) || '';
			if ( trigger.classList.contains( 'jd-open-form' ) || href === '#contact' || href.endsWith( '/#contact' ) ) {
				return trigger;
			}
			return null;
		}

		document.addEventListener( 'click', function ( ev ) {
			const trigger = isContactTrigger( ev.target );
			if ( trigger ) {
				ev.preventDefault();
				open( trigger );
			}
		} );

		const closeButton = qs( '.jd-modal__close', modal );
		if ( closeButton ) {
			closeButton.addEventListener( 'click', close );
		}
		modal.addEventListener( 'click', function ( ev ) {
			if ( ev.target === modal ) close();
		} );
		document.addEventListener( 'keydown', function ( ev ) {
			if ( ev.key === 'Escape' && ! modal.hidden ) close();
		} );

		if ( ! form || ! next || ! back || ! progress || ! trace ) {
			return;
		}

		qsa( '[data-name]', form ).forEach( function ( button ) {
			button.addEventListener( 'click', function () {
				state[ button.dataset.name ] = button.dataset.value;
				render();
			} );
		} );

		next.addEventListener( 'click', function () {
			if ( state.step < 3 ) {
				if ( isValid() ) {
					state.step += 1;
					render();
				}
			}
		} );

		back.addEventListener( 'click', function () {
			state.step = Math.max( 1, state.step - 1 );
			render();
		} );

		qsa( '.jd-form__step:not(.jd-form__step--gravity) input, .jd-form__step:not(.jd-form__step--gravity) textarea', form ).forEach( function ( field ) {
			field.addEventListener( 'input', render );
		} );

		if ( window.jQuery ) {
			window.jQuery( document ).on( 'gform_confirmation_loaded', function () {
				if ( ! modal.hidden ) markGravitySuccess();
			} );
		}

		if ( gravityWrap && 'MutationObserver' in window ) {
			new MutationObserver( function () {
				if ( qs( '.gform_confirmation_message', gravityWrap ) ) {
					markGravitySuccess();
				}
			} ).observe( gravityWrap, { childList: true, subtree: true } );
		}
	}

	function setupProjectModal() {
		const modal = qs( '.jd-project-modal' );
		if ( ! modal ) return;

		const content = qs( '.jd-project-modal__content', modal );
		const loading = qs( '.jd-project-modal__loading', modal );
		const closeButton = qs( '.jd-project-modal__close', modal );

		function close() {
			modal.hidden = true;
			document.documentElement.style.overflow = '';
		}

		function setLoading() {
			loading.hidden = false;
			content.hidden = true;
			content.innerHTML = '';
		}

		function renderProject( project ) {
			const tags = Array.isArray( project.tags ) && project.tags.length
				? '<div class="jd-tags">' + project.tags.map( function ( tag ) { return '<span>' + escapeHtml( tag ) + '</span>'; } ).join( '' ) + '</div>'
				: '';
			const meta = [ project.client, project.year, project.result ].filter( Boolean ).map( escapeHtml );
			const image = project.image ? '<img class="jd-project-modal__image" src="' + encodeURI( project.image ) + '" alt="">' : '';
			const link = project.link ? '<a class="jd-btn jd-btn--small" target="_blank" rel="noopener" href="' + encodeURI( project.link ) + '">' + escapeHtml( project.buttonText ) + '</a>' : '';

			content.innerHTML = image + '<div class="jd-project-modal__inner"><div class="jd-eyebrow">// PROJECT</div><h2>' + escapeHtml( project.title ) + '</h2>' + ( meta.length ? '<p class="jd-project-modal__meta">' + meta.join( ' · ' ) + '</p>' : '' ) + tags + '<div class="jd-project-modal__post">' + project.content + '</div>' + link + '</div>';
			loading.hidden = true;
			content.hidden = false;
		}

		function open( trigger ) {
			const projectId = trigger.dataset.projectId;
			if ( ! window.JawadDev ) return;
			modal.hidden = false;
			document.documentElement.style.overflow = 'hidden';
			setLoading();

			const data = new FormData();
			data.append( 'action', 'jawad_dev_project_modal' );
			data.append( 'nonce', window.JawadDev.projectNonce || '' );
			data.append( 'projectId', projectId );
			data.append( 'projectUrl', trigger.href || '' );

			fetch( window.JawadDev.ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: data
			} )
				.then( function ( response ) { return response.json(); } )
				.then( function ( json ) {
					if ( ! json || ! json.success ) {
						throw new Error( json && json.data && json.data.message ? json.data.message : 'Unable to load project.' );
					}
					renderProject( json.data );
				} )
				.catch( function ( error ) {
					loading.textContent = error.message;
				} );
		}

		qsa( '.jd-open-project' ).forEach( function ( trigger ) {
			trigger.addEventListener( 'click', function ( ev ) {
				ev.preventDefault();
				open( trigger );
			} );
		} );

		closeButton.addEventListener( 'click', close );
		modal.addEventListener( 'click', function ( ev ) {
			if ( ev.target === modal ) close();
		} );
		document.addEventListener( 'keydown', function ( ev ) {
			if ( ev.key === 'Escape' && ! modal.hidden ) close();
		} );
	}

	function setupMobileMenu() {
		const toggle = qs( '.jd-menu-toggle' );
		const menu = qs( '.jd-mobile-menu' );
		if ( ! toggle || ! menu ) return;

		function close() {
			menu.classList.remove( 'is-open' );
			toggle.setAttribute( 'aria-expanded', 'false' );
		}

		toggle.addEventListener( 'click', function () {
			const open = ! menu.classList.contains( 'is-open' );
			menu.classList.toggle( 'is-open', open );
			toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
		} );

		qsa( 'a', menu ).forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				close();
			} );
		} );

		document.addEventListener( 'keydown', function ( ev ) {
			if ( ev.key === 'Escape' ) close();
		} );

		window.addEventListener( 'resize', function () {
			if ( window.innerWidth > 860 ) close();
		} );
	}

	function setupReveal() {
		const items = qsa( '[data-reveal], [data-reveal-group]' );
		if ( ! items.length ) return;
		if ( ! ( 'IntersectionObserver' in window ) ) {
			items.forEach( function ( item ) {
				item.classList.add( 'is-revealed' );
			} );
			return;
		}
		const observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-revealed' );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.15, rootMargin: '0px 0px -8% 0px' } );
		items.forEach( function ( item ) {
			observer.observe( item );
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		setupGlow();
		setupMobileMenu();
		setupReveal();
		setupModal();
		setupProjectModal();
	} );
} )();
