import React from 'react';

const Close = ({ className = 'icon' }) => {
	return (
		<svg className={className} viewBox="0 0 100 100">
			<g strokeWidth={10}>
				<line x1={10} y1={10} x2={90} y2={90} />
				<line x1={90} y1={10} x2={10} y2={90} />
			</g>
		</svg>
	);
};

export default Close;
