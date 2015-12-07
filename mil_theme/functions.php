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

add_action( 'wp_enqueue_scripts', 'miltheme_load_scripts' );
function miltheme_load_scripts(){
	wp_enqueue_script( 'jquery' );
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
	'name' => 'Left Widget Area',
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<div class="widget_title">',
	'after_title' => '</div>',
	));

	register_sidebar( array (
	'name' => 'Right Widget Area',
	'id' => 'secondary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<div class="widget_title">',
	'after_title' => '</div>',
	));

}

function call_survey(){
	echo "<section id='survey_wrap'>";
	echo "<div id='survey_title'><p>SURVEY</p>";
	echo "<div id='survey_close'>X</div></div>";
	echo "<script>(function(t,e,n,c){var o,s,i;t.SMCX=t.SMCX||[],e.getElementById(c)||(o=e.getElementsByTagName(n),s=o[o.length-1],i=e.createElement(n),i.type='text/javascript',i.async=!0,i.id=c,i.src=['https:'===location.protocol?'https://':'http://','widget.surveymonkey.com/collect/website/js/6RV1GHmUN4_2FZ0F2d1E87CQQZYif_2BIpcP2N255_2BPA9LI2T0GnvJDlnb1wNIgVHfv_2F.js'].join(''),s.parentNode.insertBefore(i,s))})(window,document,'script','smcx-sdk');</script>";
	echo "</section>";
	
}

function greenapples_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'greenapples_comments_number' );
function greenapples_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}