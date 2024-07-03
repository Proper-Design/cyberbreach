import React, { Fragment } from 'react';
import { Field } from 'formik';
import CheckboxGroup from './field-types/CheckboxGroup';
import RadioGroup from './field-types/RadioGroup';
import Textarea from './field-types/Textarea';

const FieldSelector = ({ fieldConfig, formConfig }) => {
	const {
		name,
		label,
		help,
		type = 'text',
		errorMessage,
		options,
		required,
		multiple,
		min,
		max,
	} = fieldConfig;

	if (type === 'textarea') {
		return (
			<Field name={name} id={name} required={required}>
				{({ field }) => (
					<Fragment>
						<label className="field-question" htmlFor={name}>
							{label}
						</label>
						{help && <div className="field-help">{help}</div>}
						<Textarea
							required={fieldConfig.required}
							fieldConfig={fieldConfig}
							field={field}
						/>
					</Fragment>
				)}
			</Field>
		);
	} else if (type === 'list' && multiple) {
		return (
			<Field id={name} name={name} required={required}>
				{({ form }) => (
					<Fragment>
						<div className="field-question">{label}</div>
						{help && <div className="field-help">{help}</div>}
						<CheckboxGroup fieldConfig={fieldConfig} form={form} />
					</Fragment>
				)}
			</Field>
		);
	} else if (type === 'list') {
		return (
			<Fragment>
				<div className="field-question">{label}</div>
				{help && <div className="field-help">{help}</div>}
				<Field id={name} name={name} required={required}>
					{({ form }) => <RadioGroup fieldConfig={fieldConfig} form={form} />}
				</Field>
			</Fragment>
		);
	} else if (type === 'select') {
		return (
			<Fragment>
				<label className="field-question" htmlFor={name}>
					{label}
				</label>
				{help && <div className="field-help">{help}</div>}

				<Field name={name} as="select" required={required}>
					{options.map((option) => (
						<option key={option.value} value={option.value}>
							{option.label}
						</option>
					))}
				</Field>
			</Fragment>
		);
	} else {
		return (
			<Fragment>
				<label className="field-question" htmlFor={name}>
					{label}
				</label>
				{help && <div className="field-help">{help}</div>}
				<Field
					id={name}
					name={name}
					type={type}
					min={min}
					max={max}
					required={required}
				/>
			</Fragment>
		);
	}
};

export default FieldSelector;
