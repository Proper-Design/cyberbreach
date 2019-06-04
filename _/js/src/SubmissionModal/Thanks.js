import React from "react";
import PropTypes from "prop-types";

const Thanks = ({ message, closer }) => (
  <div className="modal-message-wrapper">
    <div className="modal-message">
      <h2>Thanks for getting in touch</h2>
      <p>{(message && message) || "Thanks for getting in touch."}</p>
      {closer && (
        <div className="button-wrapper">
          <button className="button-cta" onClick={closer}>
            Close
          </button>
        </div>
      )}
    </div>
  </div>
);

Thanks.propTypes = { message: PropTypes.string };

export default Thanks;
