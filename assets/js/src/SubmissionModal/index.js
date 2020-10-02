import { Fragment } from "@wordpress/element";

import Modal from "react-modal";
import request from "superagent";

import ContactForm from "./ContactForm";
import Thanks from "./Thanks";
import Error from "./Error";
import Loading from "./Loading";

const initialState = {
  showModal: false,
  loading: false,
  error: false,
  complete: false,
};

class ContactModal extends React.Component {
  constructor() {
    super();
    this.state = initialState;

    this.handleOpenModal = this.handleOpenModal.bind(this);
    this.handleCloseModal = this.handleCloseModal.bind(this);
  }

  handleOpenModal = () => {
    this.setState({ showModal: true });
  };

  handleCloseModal = () => {
    this.setState(initialState);
  };

  UNSAFE_componentWillMount = () => {
    Modal.setAppElement(this.props.rootNode);
  };

  onSubmit = (values, url, complete) => {
    this.onSubmitStart();
    values.nonce = this.props.nonce;
    request
      .post(url)
      .send(values)
      .end((err, res) => {
        if (err) {
          console.log(err.rawResponse);
          this.setState({ complete: false, loading: false, error: true });
        }
        this.onSubmitComplete(complete);
      });
  };

  onSubmitStart = () => {
    this.setState({ loading: true });
  };

  onSubmitComplete = (cb) => {
    this.setState({ complete: true, loading: false });
    cb();
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
      inline,
    } = this.props;

    const Form = ContactForm;

    const Guts = () => (
      <Fragment>
        {this.state.loading && <Loading />}
        {this.state.complete && !this.state.error && (
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
          overlayClassName="formModal-wrapper"
        >
          <div className="formModal-header">
            <button className="formModal-close" onClick={this.handleCloseModal}>
              <svg className="formModal-close-icon" viewBox="0 0 10 10">
                <g
                  stroke="white"
                  strokeWidth="1"
                  strokeLinecap="round"
                  fill="transparent"
                >
                  <path d="M1 1, 9 9"></path>
                  <path d=" M9 1 1 9"></path>
                </g>
              </svg>
            </button>
          </div>
          <div className="formModal-content">
            <Guts />
          </div>
        </Modal>
      </Fragment>
    );
  }
}

export default ContactModal;
