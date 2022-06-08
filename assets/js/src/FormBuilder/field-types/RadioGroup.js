import React from 'react';

const RadioGroup = ( { fieldConfig, form } ) => {
	const { name, options } = fieldConfig;
	return (
		<ul className="radioGroup">
			{ options.map( ( option ) => (
				<li className="radioItem" key={ option.name }>
					<input
						type="radio"
						name={ name }
						id={ `${ name }[${ option.name }]` }
						value={ option.name }
						onChange={ () =>
							form.setFieldValue( name, option.value )
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

export default RadioGroup;
