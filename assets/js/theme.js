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

		function open( trigger ) {
			state.step = 1;
			state.service = trigger && trigger.dataset.service ? trigger.dataset.service : state.service;
			state.budget = trigger && trigger.dataset.budget ? trigger.dataset.budget : state.budget;
			modal.hidden = false;
			document.documentElement.style.overflow = 'hidden';
			render();
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
			next.textContent = state.step === 3 ? 'Send Request ↵' : 'Continue →';
			back.hidden = state.step === 1;
			progress.style.width = ( state.step === 1 ? 33 : state.step === 2 ? 66 : 92 ) + '%';
			const parts = [];
			if ( state.service ) parts.push( 'type: ' + state.service );
			if ( state.budget ) parts.push( 'budget: ' + state.budget.replace( /\s/g, '' ) );
			if ( state.timeline ) parts.push( 'eta: ' + state.timeline.toLowerCase() );
			trace.textContent = '> ' + ( parts.length ? parts.join( '  ·  ' ) : 'awaiting_input...' );
		}

		function isValid() {
			if ( state.step === 1 ) return !! state.service;
			if ( state.step === 2 ) return !! ( state.budget && state.timeline );
			const name = qs( '[name="name"]', form ).value.trim();
			const email = qs( '[name="email"]', form ).value.trim();
			const message = qs( '[name="message"]', form ).value.trim();
			return !! ( name && email.indexOf( '@' ) > 0 && message );
		}

		function submit() {
			if ( ! isValid() ) return;
			next.disabled = true;
			next.textContent = 'Sending...';
			const data = new FormData( form );
			data.append( 'action', 'jawad_dev_project_request' );
			data.append( 'nonce', window.JawadDevForm ? window.JawadDevForm.nonce : '' );
			data.append( 'service', state.service );
			data.append( 'budget', state.budget );
			data.append( 'timeline', state.timeline );

			fetch( window.JawadDevForm.ajaxUrl, {
				method: 'POST',
				credentials: 'same-origin',
				body: data
			} )
				.then( function ( res ) { return res.json(); } )
				.then( function ( json ) {
					if ( ! json || ! json.success ) {
						throw new Error( json && json.data && json.data.message ? json.data.message : 'Unable to send request.' );
					}
					qsa( '.jd-form__step', form ).forEach( function ( step ) { step.hidden = true; } );
					qs( '.jd-form__done', form ).hidden = false;
					qs( '.jd-form__footer', form ).hidden = true;
					progress.style.width = '100%';
				} )
				.catch( function ( err ) {
					trace.textContent = '> error: ' + err.message;
					next.disabled = false;
					next.textContent = 'Send Request ↵';
				} );
		}

		qsa( '.jd-open-form' ).forEach( function ( trigger ) {
			trigger.addEventListener( 'click', function ( ev ) {
				ev.preventDefault();
				open( trigger );
			} );
		} );

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
			} else {
				submit();
			}
		} );

		back.addEventListener( 'click', function () {
			state.step = Math.max( 1, state.step - 1 );
			render();
		} );

		qsa( 'input, textarea', form ).forEach( function ( field ) {
			field.addEventListener( 'input', render );
		} );

		qs( '.jd-modal__close', modal ).addEventListener( 'click', close );
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
	} );
} )();
