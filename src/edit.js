/**
 * Retrieves the translation of text.
 *
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used.
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Editor syles.
 */
import './editor.scss';

/**
 * The edit function
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const {
		title
	} = attributes
	return (
		<div { ...useBlockProps() }>
			{ __( 'A-Z ordered posts below', 'az-order' ) }
		</div>
	);
}
