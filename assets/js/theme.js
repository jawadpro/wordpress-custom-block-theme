( function () {
	const state = { step: 1, service: '', budget: '', timeline: '' };

	function qs( selector, root ) {
		return ( root || document ).querySelector( selector );
	}

	function qsa( selector, root ) {
		return Array.prototype.slice.call( ( root || document ).querySelectorAll( selector ) );
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
		const modal = qs( '.jd-modal' );
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

		qsa( '.jd-open-form' ).forEach( function ( trigger ) {
			trigger.addEventListener( 'click', function ( ev ) {
				ev.preventDefault();
				open( trigger );
			} );
		} );

		qs( '.jd-modal__close', modal ).addEventListener( 'click', close );
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
	} );
} )();
