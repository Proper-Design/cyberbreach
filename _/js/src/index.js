import "babel-polyfill";
import "promise-polyfill/src/polyfill";
import React from "react";
import { render } from "react-dom";
import Share from "./Share";
import SubmissionModal from "./SubmissionModal";
import svg4everybody from "svg4everybody";
import squishMenu from "squishMenu";

// Set up Squish
document.addEventListener("DOMContentLoaded", () => {
  squishMenu({
    containerId: "siteNav-wrapper",
    toggleId: "siteNav-toggle"
  });

  svg4everybody();
});

const shareRoot = document.querySelector("#share-root");

if (shareRoot) {
  render(<Share />, shareRoot);
}

/* This is a bit different because there could be multiple contact CTAs in a given page, so recursively bind to all instances of the className */
Array.prototype.forEach.call(
  document.getElementsByClassName("submissionModal-root"),
  target => {
    // Get the classNames and children of the first child
    render(
      <SubmissionModal
        childClassName={target.firstElementChild.className}
        childNodeId={target.firstElementChild.id}
        childInnerHTML={target.firstElementChild.innerHTML}
        recipient={target.getAttribute("recipient")}
        enableAttachment={
          (target.getAttribute("enableAttachment") === "true" && true) || false
        }
        nonce={target.getAttribute("nonce")}
        form={target.getAttribute("form")}
        inline={(target.getAttribute("inline") === "true" && true) || false}
        thankYouMessage={target.getAttribute("thankYouMessage")}
        subject={target.getAttribute("subject")}
        editableSubject={
          (target.getAttribute("editableSubject") === "true" && true) || false
        }
        rootNode={target}
      />,
      target
    );
  }
);

// Overwrites native 'firstElementChild' prototype.
// Adds Document & DocumentFragment support for IE9 & Safari.
// Returns array instead of HTMLCollection.
(function(constructor) {
  if (
    constructor &&
    constructor.prototype &&
    constructor.prototype.firstElementChild == null
  ) {
    Object.defineProperty(constructor.prototype, "firstElementChild", {
      get: function() {
        var node,
          nodes = this.childNodes,
          i = 0;
        while ((node = nodes[i++])) {
          if (node.nodeType === 1) {
            return node;
          }
        }
        return null;
      }
    });
  }
})(window.Node || window.Element);
