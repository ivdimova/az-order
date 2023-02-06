<?php
/**
 * AZ Order Shortcode.
*/

namespace AZOrder\Shortcode;

use WP_Query;

/**
 * Start it all.
 *
 * @return void.
*/
function bootstrap() : void {
	add_action( 'init', __NAMESPACE__ . '\\az_shortcode_init' );
}

/**
 * Call the shortcode.
 * 
 * @return void.
*/
function az_shortcode_init() : void {
	add_shortcode( 'az-order', __NAMESPACE__ . '\\az_order_shortcode' );
}

/**
 * Shortcode output.
 * 
 * @return string $output The shortcode content.
*/
function az_order_shortcode() {
	$az_order_letters = [];
	$output = '';
	$post_type = null != ( get_option( 'az_post_type' ) ) ? get_option( 'az_post_type' ) : 'post';
	$taxonomy = get_option( 'az_taxonomy' );
	$args = [
		'post_type'	=>	$post_type,
		'orderby'	=>	'title',
		'order'		=>	'ASC',
		'posts_per_page' => -1,
	];

	if ( ! empty( $taxonomy )  ) {
		$args['tax_query'] = [
			[
				'taxonomy' => $taxonomy,
			]
		];
	}

	$az_posts = new WP_Query ( $args );
	if ( $az_posts->have_posts() ) {
		foreach ( $az_posts->posts as $post) {
			$post_title = get_the_title( $post );
			$first_letter = mb_substr( $post_title, 0, 1 );
			$first_letter =  mb_strtoupper( $first_letter );
			if ( ! array_key_exists( $first_letter, $az_order_letters ) ) {
				$az_order_letters[ $first_letter ][] = $post_title;
			} else {
				$az_order_letters[ $first_letter ][] = $post_title;
			}
			
		}
		wp_reset_query();
		$output = '<div class="az-order">';
		foreach ( $az_order_letters as $letter => $titles ) {
			$output .= '<p><span>' . esc_html( $letter ) . '</span></br>';
			foreach ( $titles as $title ) {
				$output .= '<span>' . esc_html( $title ) . '</span></br>';
			}	
			$output .= '</p>';
		}
		$output .= '</div>';
	}
	return $output;
}
