import React from 'react';

const Textarea = ( { fieldConfig, field } ) => {
	const { name, required } = fieldConfig;
	return (
		<textarea { ...field } name={ name } require={ required }></textarea>
	);
};

export default Textarea;
