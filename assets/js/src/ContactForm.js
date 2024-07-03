const { useState, useEffect } = wp.element;
import Form from './FormBuilder/RenderForm';
import Modal from 'react-modal';
import { useGoogleReCaptcha } from 'react-google-recaptcha-v3';

const ContactForm = ({ formConfig, label }) => {
	const { executeRecaptcha } = useGoogleReCaptcha();
	const [token, setToken] = useState('');
	const [sending, setSending] = useState(false);
	const [complete, setComplete] = useState(false);
	const [modalOpen, setModalOpen] = useState(false);

	useEffect(() => {
		if (!executeRecaptcha) {
			return;
		}

		const handleReCaptchaVerify = async () => {
			const newToken = await executeRecaptcha();
			setToken(newToken);
		};

		handleReCaptchaVerify();
	}, [executeRecaptcha]);

	const sendEmail = ({ formValues }) => {
		const email = {
			recipient: formConfig.recipient ? formConfig.recipient : undefined,
			sender_name: formValues.name,
			sender_email: formValues.email,
			email_message: formValues.message,
			email_subject: formConfig.subject,
		};

		if (token) {
			wp.ajax
				.post('proper_send_mail', email)
				.done(() => {
					setSending(false);
					setComplete(true);
				})
				.fail(() => {
					setSending(false);
					setComplete(true);
				});
		}
	};

	return (
		<>
			<button className="cta-button" onMouseDown={() => setModalOpen(true)}>
				{label}
			</button>
			<Modal
				className="modal"
				appElement={document.querySelector('.siteWrapper')}
				overlayClassName="modal-overlay"
				isOpen={modalOpen}
				onRequestClose={() => setModalOpen(false)}
			>
				<div className="modal-header">
					<button onMouseDown={() => setModalOpen(false)}>X</button>
				</div>
				<div className="modal-content">
					{!sending && !complete && (
						<Form
							formConfig={formConfig}
							onSubmit={(values) =>
								sendEmail({
									formConfig,
									formValues: values,
								})
							}
							submitting={sending}
						/>
					)}
					{sending && (
						<div>
							<p>Sending Email</p>
						</div>
					)}
					{complete && (
						<div>
							<p>Thanks for your Email</p>
						</div>
					)}
				</div>
			</Modal>
		</>
	);
};

export default ContactForm;
