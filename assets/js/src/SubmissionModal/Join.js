import React, { Fragment, useState } from "react";
import OrganisationJoinForm from "./OrganisationJoinForm";
import IndividualJoinForm from "./IndividualJoinForm";

const strings = window.joinStrings;

const Join = ({ onSubmit, onSubmitStart, onSubmitComplete }) => {
  const [joinType, setJoinType] = useState("");
  return (
    <Fragment>
      <div className="joinForm-header">
        <h2>{strings.title}</h2>
        <p dangerouslySetInnerHTML={{ __html: strings.content }} />
        <h3>{strings.options.title}</h3>
        <button
          className={
            (joinType === "individual" && "joinForm-header-option active") ||
            "joinForm-header-option"
          }
          onClick={() => setJoinType("individual")}
        >
          {strings.options.individual}
        </button>
        <button
          className={
            (joinType === "organisation" && "joinForm-header-option active") ||
            "joinForm-header-option"
          }
          onClick={() => setJoinType("organisation")}
        >
          {strings.options.org}
        </button>
      </div>
      {joinType === "individual" && <IndividualJoinForm onSubmit={onSubmit} />}
      {joinType === "organisation" && (
        <OrganisationJoinForm onSubmit={onSubmit} />
      )}
    </Fragment>
  );
};

export default Join;
