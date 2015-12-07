<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript" src="http://media414.dothome.co.kr/wp-content/themes/mil_theme/script.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrap" class="hfeed">
<div id="header_wrap">
<header id="header" role="banner">
	<section id="homepage_title">
		<?php if ( ! is_singular() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( ! is_singular() ) { echo '</h1>'; } ?>
		<!--<div class="description"><?php //bloginfo( 'description' ); ?></div>-->
	</section>
	<nav id="main_nav" role="navigation"><?php wp_nav_menu(array('menu' => 'mainmenu')); ?></nav>
	<section id="login">
		<ul id="login_ul">
			<li><a href="http://media414.dothome.co.kr/wp-login.php">LOGIN</a></li>
		</ul>
	</section>
</header>
</div>