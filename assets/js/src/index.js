const { render } = wp.element;
import squishMenu from 'squishMenu';

// Squish
document.addEventListener('DOMContentLoaded', () => {
	squishMenu({
		containerId: 'siteNav-wrapper',
		toggleClass: 'siteNav-toggle',
	});
});


import CookiesNotice from "./CookiesNotice";

const cookiesRoot = document.getElementById('cookiesRoot');
const cookieStrings = window.cookieStrings;

render(
	<CookiesNotice strings={cookieStrings}/>,
	cookiesRoot
	);
	
	
import { GoogleReCaptchaProvider } from 'react-google-recaptcha-v3';
import ContactForm from './ContactForm';

document.querySelectorAll('.contactForm').forEach((target) => {
	render(
		<GoogleReCaptchaProvider
			useRecaptchaNet
			reCaptchaKey="Change-me"
			scriptProps={{ async: true, defer: true, appendTo: 'body' }}
		>
			<ContactForm formConfig={window.contactFormConfig} />
		</GoogleReCaptchaProvider>,
		target
	);
});
