import React from "react";
import CookieConsent from "react-cookie-consent";

const CookiesNotice = ({ location, disableStyles, buttonText, guts }) => {
  return (
    <CookieConsent
      location={location}
      disableStyles={disableStyles}
      buttonText={buttonText}
      expires={150}>
      <div dangerouslySetInnerHTML={{ __html: guts }}></div>
    </CookieConsent>
  );
};

export default CookiesNotice;
