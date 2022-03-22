const { render } = wp.element;
import squishMenu from 'squishMenu';
import { GoogleReCaptchaProvider } from 'react-google-recaptcha-v3';

// Squish
document.addEventListener( 'DOMContentLoaded', () => {
	squishMenu( {
		containerId: 'siteNav-wrapper',
		toggleClass: 'siteNav-toggle',
	} );
} );

import ContactForm from './ContactForm';

document.querySelectorAll( '.contactForm' ).forEach( ( target ) => {
	render(
		<GoogleReCaptchaProvider
			useRecaptchaNet
			reCaptchaKey="6LfuqVAdAAAAADkkMHgfBkLIDVAlcgM2X11XKfAB"
			scriptProps={ { async: true, defer: true, appendTo: 'body' } }
		>
			<ContactForm formConfig={ window.contactFormConfig } />
		</GoogleReCaptchaProvider>,
		target
	);
} );
