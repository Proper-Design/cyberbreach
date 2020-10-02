import React from "react";

const strings = window.contactStrings;

const Error = ({ closer }) => {
  return (
    <div className="modal-message-wrapper">
      <div className="modal-message">
        <h2>{strings.error.title}</h2>
        <p>{strings.error.content}</p>
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
};

export default Error;
