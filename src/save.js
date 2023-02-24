import React, { ReactNode } from 'react';

import { useBlockProps, RichText } from '@wordpress/block-editor';

/**
 * Block output.
 *
 * @param {object} props - Component props.
 * @returns {ReactNode} Component.
 */
function save( props ) {
	const { attributes } = props;
	const {
		title
	} = attributes
	return (

		<p { ...useBlockProps }>
			<RichText.Content
					className="az-order__title"
					tagName="h2"
					value={ title }
				/>
		</p>
	);
}
export default save;