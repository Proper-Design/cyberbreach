const { render } = wp.element;
import squishMenu from "squishMenu";
// import SubmissionModal from "./SubmissionModal";

// Squish
document.addEventListener("DOMContentLoaded", () => {
  squishMenu({
    containerId: "siteNav-wrapper",
    toggleClass: "siteNav-toggle",
  });
});

// Sumission Modal
// Array.prototype.forEach.call(
//   document.getElementsByClassName("submissionModal-root"),
//   (target) => {
//     // Get the classNames and children of the first child
//     render(
//       <SubmissionModal
//         childClassName={target.firstElementChild.className}
//         childNodeId={target.firstElementChild.id}
//         childInnerHTML={target.firstElementChild.innerHTML}
//         recipient={target.getAttribute("recipient")}
//         enableAttachment={
//           (target.getAttribute("enableAttachment") === "true" && true) || false
//         }
//         nonce={target.getAttribute("nonce")}
//         form={target.getAttribute("form")}
//         inline={(target.getAttribute("inline") === "true" && true) || false}
//         thankYouMessage={target.getAttribute("thankYouMessage")}
//         subject={target.getAttribute("subject")}
//         editableSubject={
//           (target.getAttribute("editableSubject") === "true" && true) || false
//         }
//         rootNode={target}
//       />,
//       target
//     );
//   }
// );
