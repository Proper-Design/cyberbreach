import React from "react";
import { ShareButtons, generateShareIcon } from "react-share";

// React-share
const {
  FacebookShareButton,
  TwitterShareButton,
  EmailShareButton,
  LinkedinShareButton
} = ShareButtons;
const FacebookIcon = generateShareIcon("facebook");
const TwitterIcon = generateShareIcon("twitter");
const EmailIcon = generateShareIcon("email");
const LinkedinIcon = generateShareIcon("linkedin");

const Share = () => (
  <aside className="share">
    <div>
      <h3>Share</h3>
    </div>
    <div className="share-buttons">
      <FacebookShareButton url={window.location.href}>
        <FacebookIcon size={48} />
      </FacebookShareButton>
      <TwitterShareButton url={window.location.href}>
        <TwitterIcon size={48} />
      </TwitterShareButton>
      <EmailShareButton url={window.location.href}>
        <EmailIcon size={48} />
      </EmailShareButton>
    </div>
  </aside>
);

export default Share;
