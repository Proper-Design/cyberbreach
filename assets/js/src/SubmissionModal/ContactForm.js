import React, { Component, Fragment } from "react";
import PropTypes from "prop-types";
import FileBase64 from "react-file-base64";
import { Formik, Field } from "formik";
import * as Yup from "yup";
import ReCAPTCHA from "react-google-recaptcha";

const strings = window.contactStrings;

class Form extends Component {
  state = {
    "email-attachment-size": 0
  };

  uploadLimit = 10 * 1024 * 1024;

  handleFile = file => {
    this.setState({
      "email-attachment": file.base64,
      "email-attachment-filename": file.name,
      "email-attachment-size": file.file.size
    });
  };

  render() {
    const { onSubmit, subject, enableAttachment, editableSubject } = this.props;

    return (
      <Formik
        initialValues={{
          sender_name: "",
          sender_email: "",
          email_subject: this.props.subject,
          email_message: "",
          recaptcha: ""
        }}
        onSubmit={(values, { setSubmitting }) => {
          onSubmit(values, "/wp-json/wen/v1/contact", () =>
            setSubmitting(false)
          );
        }}
        validationSchema={Yup.object().shape({
          sender_name: Yup.string().required("Required"),
          sender_email: Yup.string()
            .email("Please enter a valid email address")
            .required("Required"),
          email_subject: Yup.string().required("Required"),
          email_message: Yup.string().required("Required"),
          recaptcha: Yup.string().required("Please complete the captcha")
        })}
      >
        {({ isSubmitting, handleSubmit, setFieldValue }) => {
          return (
            <form onSubmit={handleSubmit}>
              <fieldset>
                <h1>{strings.title}</h1>
                <div className="field-wrapper">
                  <label htmlFor="sender_name">{strings.form.name}</label>
                  <Field
                    type="text"
                    id="sender_name"
                    name="sender_name"
                    required
                  />
                </div>
                <div className="field-wrapper">
                  <label htmlFor="sender_email">{strings.form.email}</label>
                  <Field
                    type="email"
                    id="sender_email"
                    name="sender_email"
                    required
                  />
                </div>
                <div className="field-wrapper">
                  <label htmlFor="email_subject">{strings.form.subject}</label>
                  <Field
                    type="text"
                    id="email_subject"
                    name="email_subject"
                    disabled={!editableSubject}
                    required
                  />
                </div>
                <div className="field-wrapper">
                  <label htmlFor="email_message">{strings.form.message}</label>
                  <Field
                    component="textarea"
                    id="email_message"
                    name="email_message"
                    required
                    rows="6"
                  />
                </div>
                <div className="field-wrapper">
                  <ReCAPTCHA
                    sitekey="6LfWErkUAAAAAORjxRI8nwXr0_Q0JQHjeL9U0CS0"
                    onChange={value => {
                      setFieldValue("recaptcha", value);
                    }}
                    size="compact"
                  />
                </div>
                <button type="submit" disabled={isSubmitting}>
                  {strings.submit}
                </button>
              </fieldset>
            </form>
          );
        }}
      </Formik>
    );
  }
}

Form.propTypes = { onSubmit: PropTypes.func.isRequired };

export default Form;
