import React from 'react';
import CookieConsent from 'react-cookie-consent';

const CookiesNotice = ({ strings }) => {
	return (
		<CookieConsent
			className="cookiesNotice"
			buttonText={strings.buttonText}
			expires={150}
		>
			<div dangerouslySetInnerHTML={{ __html: strings.message }}></div>
		</CookieConsent>
	);
};

export default CookiesNotice;
