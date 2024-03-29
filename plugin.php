<?php
/**
 * Plugin Name: A-Z Order 
 * Plugin URI: http:/it.ivdimova.com/
 * Author: ivdimova
 * Description: Simple plugin to display posts in alplhabetical order according to specified post type 
 * Author URI: http://it.ivdimova.com/
 * Version: 2.0
 * License: GPL2
*/
namespace AZOrder;

require_once __DIR__ . '/inc/namespace.php';
function az_order_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', __NAMESPACE__ . '\\az_order_init' );
