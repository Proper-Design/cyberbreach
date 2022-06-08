import React from 'react';

const CheckboxGroup = ( { fieldConfig, form } ) => {
	const { options, name } = fieldConfig;
	return (
		<ul className="checkboxGroup">
			{ options.map( ( option ) => (
				<li className="checkboxItem" key={ option.name }>
					<input
						type="checkbox"
						id={ `${ name }[${ option.name }]` }
						name={ `${ name }[${ option.name }]` }
						value={ option.name }
						onChange={ ( e ) =>
							form.setFieldValue(
								`${ name }[${ option.name }]`,
								e.target.checked
							)
						}
					/>
					<label htmlFor={ `${ name }[${ option.name }]` }>
						{ option.label }
					</label>
				</li>
			) ) }
		</ul>
	);
};

export default CheckboxGroup;
