import React from 'react';
import { Formik, Form } from 'formik';
import FieldSelector from './FieldSelector';

const RenderForm = ( { formConfig, onSubmit } ) => {
	const fields = formConfig.fieldsets
		.map( ( fieldset ) => fieldset.fields )
		.flat();

	const initialValues = Object.assign(
		{},
		...fields.map( ( field ) => ( {
			[ field.name ]: field.initialValue,
		} ) )
	);

	return (
		<Formik
			initialValues={ initialValues }
			onSubmit={ ( values ) => onSubmit( values ) }
		>
			{ ( { errors, touched } ) => (
				<Form>
					{ formConfig.fieldsets.map( ( fieldset, index ) => (
						<fieldset className="fieldset" key={ index }>
							{ fieldset.legend && (
								<legend className="fieldset-legend">
									{ fieldset.legend }
								</legend>
							) }
							<div className="fieldset-intro">
								{ fieldset.intro }
							</div>
							{ fieldset.fields.map( ( field ) => (
								<div
									className="field-wrapper"
									key={ field.name }
								>
									<FieldSelector
										fieldConfig={ field }
										formConfig={ formConfig }
									/>
									{ errors[ field.name ] &&
									touched[ field.name ] ? (
										<div className="field-error">
											{ errors[ field.name ] }
										</div>
									) : null }
								</div>
							) ) }
						</fieldset>
					) ) }
					{ Object.keys( errors ).length ? (
						<div className="field-error">
							{ formConfig.formError }
						</div>
					) : null }
					<div className="submit-wrapper">
						<button type="submit">{ formConfig.submit }</button>
					</div>
				</Form>
			) }
		</Formik>
	);
};

export default RenderForm;
