import React from "react";
import {
  EmailIcon,
  FacebookIcon,
  LinkedinIcon,
  TwitterIcon,
  EmailShareButton,
  FacebookShareButton,
  LinkedinShareButton,
  TwitterShareButton
} from "react-share";

const Share = () => (
  <aside className="share">
    <div
      className="share-buttons"
      style={{ display: "flex", marginTop: "1rem" }}
    >
      <FacebookShareButton url={window.location.href}>
        <FacebookIcon size={48} />
      </FacebookShareButton>
      <TwitterShareButton url={window.location.href}>
        <TwitterIcon size={48} />
      </TwitterShareButton>
      <LinkedinShareButton url={window.location.href}>
        <LinkedinIcon size={48} />
      </LinkedinShareButton>
      <EmailShareButton url={window.location.href}>
        <EmailIcon size={48} />
      </EmailShareButton>
    </div>
  </aside>
);

export default Share;
