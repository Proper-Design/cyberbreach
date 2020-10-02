import React from "react";
import PropTypes from "prop-types";

const strings = window.contactStrings;

const Thanks = ({ message, closer }) => (
  <div className="modal-message-wrapper">
    <div className="modal-message">
      <h2>{strings.thanks.title}</h2>
      <p>{(message && message) || strings.thanks.title}</p>
      {closer && (
        <div className="button-wrapper">
          <button className="button-cta" onClick={closer}>
            {strings.close}
          </button>
        </div>
      )}
    </div>
  </div>
);

Thanks.propTypes = { message: PropTypes.string };

export default Thanks;
