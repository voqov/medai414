<?php
/*
Plugin Name: MIL Editor
Plugin URI: http://
Description: MIL Editor
Version: 1.0
Author: voQov
Author URI: http://
License: GPL2
*/

define('PLUGING_ABSPATH', plugin_dir_path(__FILE__));             // 플러그인 절대경로
define('PLUGINS_URL', plugins_url('', __FILE__));         // 플러그인 상대경로
define('ROOT', __FILE__);

/** Step 2 (from text above). */
add_action( 'admin_menu', 'add_menu' );

/** Step 1. */
function add_menu() {
	wp_enqueue_style( 'admin_panel_style', 'http://media414.dothome.co.kr/style.css' );
	add_menu_page( 'MIL Editor', 'MIL Editor', 'administrator', 'mileditor', 'setting_page' );
}

/** Step 3. */
function setting_page() {
	include 'index.html';
}
?>