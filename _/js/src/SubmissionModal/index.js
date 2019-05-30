import React, { Fragment } from "react";
import Modal from "react-modal";
import request from "superagent";

import ContactForm from "./ContactForm";
import Thanks from "./Thanks";
import Error from "./Error";
import Loading from "./Loading";

class ContactModal extends React.Component {
  constructor() {
    super();
    this.state = this.initialState;

    this.handleOpenModal = this.handleOpenModal.bind(this);
    this.handleCloseModal = this.handleCloseModal.bind(this);
  }

  initialState = {
    showModal: false,
    loading: false,
    error: false,
    complete: false
  };

  handleOpenModal = () => {
    this.setState({ showModal: true });
  };

  handleCloseModal = () => {
    this.setState(this.initialState);
  };

  UNSAFE_componentWillMount = () => {
    Modal.setAppElement(this.props.rootNode);
  };

  onSubmit = (values, url, complete) => {
    this.setState({ loading: true });
    values.nonce = this.props.nonce;
    request
      .post(url)
      .send(values)
      .end((err, res) => {
        if (err) {
          console.log(err.rawResponse);
          this.setState({ complete: false, loading: false, error: true });
        }
        this.setState({ complete: true, loading: false });
        complete();
      });
  };

  render() {
    const {
      recipient,
      childClassName,
      rootNode,
      childNodeId,
      childInnerHTML,
      thankYouMessage,
      subject,
      editableSubject,
      enableAttachment,
      nonce,
      form,
      inline
    } = this.props;

    let Form;
    switch (form) {
      case "contact":
        Form = ContactForm;
        break;

      default:
        Form = ContactForm;
        break;
    }

    const Guts = () => (
      <Fragment>
        {this.state.loading && <Loading />}
        {this.state.complete && (
          <Thanks message={thankYouMessage} closer={this.handleCloseModal} />
        )}
        {this.state.error && <Error closer={this.handleCloseModal} />}
        {!this.state.error && !this.state.loading && !this.state.complete && (
          <Form
            onSubmit={this.onSubmit}
            subject={subject}
            editableSubject={editableSubject}
            enableAttachment={enableAttachment}
          />
        )}
      </Fragment>
    );

    if (inline) {
      return <Guts />;
    }

    return (
      <Fragment>
        <button
          id={childNodeId}
          onClick={this.handleOpenModal}
          className={childClassName}
          dangerouslySetInnerHTML={{ __html: childInnerHTML }}
        />
        <Modal
          isOpen={this.state.showModal}
          contentLabel="onRequestClose Example"
          onRequestClose={this.handleCloseModal}
          className="formModal"
          overlayClassName="formModal-wrapper">
          <button className="formModal-close" onClick={this.handleCloseModal}>
            Close
          </button>
          <div className="formModal-content">
            <Guts />
          </div>
        </Modal>
      </Fragment>
    );
  }
}

export default ContactModal;
