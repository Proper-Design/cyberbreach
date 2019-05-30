import React from "react";

const Error = ({ closer }) => {
  return (
    <div className="modal-message-wrapper">
      <div className="modal-message">
        <h2>Whoops!</h2>
        <p>
          We seem to have experienced an error. If you're a logged in user, try
          logging out or using a private window.
        </p>
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
};

export default Error;
