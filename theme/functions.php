<?php

add_action( 'after_setup_theme', 'greenapples_add_editor_styles' );
add_action( 'after_setup_theme', 'miltheme_setup' );
function miltheme_setup(){
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	function register_my_menu() {
	  register_nav_menu('main', 'Main Menu');
	}
	add_action( 'init', 'register_my_menu' );
}

function greenapples_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_theme_support( 'custom-background' );

add_action( 'wp_enqueue_scripts', 'miltheme_load_styles_scripts' );
function miltheme_load_styles_scripts(){
	// css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/include/bootstrap-3.3.6-dist/css/bootstrap.min.css', array(), null, 'all' );
	// js
	wp_enqueue_script( 'jquery-min', 'http://code.jquery.com/jquery-latest.min.js', array(), null, true );
	wp_enqueue_script( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.js', array(), null, true );
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/include/bootstrap-3.3.6-dist/js/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/script.js', array(), null, true );
}

add_action( 'comment_form_before', 'greenapples_enqueue_comment_reply_script' );
function greenapples_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'greenapples_title' );
function greenapples_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'greenapples_filter_wp_title' );
function greenapples_filter_wp_title( $title ){
return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'miltheme_widgets_init' );
function miltheme_widgets_init(){
	register_sidebar( array (
		'name' => 'Major List Area',
		'id' => 'major_list_area',
		'before_widget' => '<li id="%1$s" class="list_container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget_title">',
		'after_title' => '</div>',
	));

	register_sidebar( array (
		'name' => 'Job List Area',
		'id' => 'job_list_area',
		'before_widget' => '<li id="%1$s" class="list_container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget_title">',
		'after_title' => '</div>',
	));
	
	register_sidebar( array (
		'name' => 'Industry List Area',
		'id' => 'industry_list_area',
		'before_widget' => '<li id="%1$s" class="list_container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget_title">',
		'after_title' => '</div>',
	));

}



