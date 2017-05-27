<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=1920">
    <title><?php wp_title(' | ', true, 'right'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
    <script>var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', 'relative' ); ?>'</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrap" class="hfeed">
    <div id="header_wrap">
        <header id="header" role="banner">
            <section id="homepage_title">
                <?php /* if ( ! is_singular() ) { echo '<p>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( ! is_singular() ) { echo '</p>'; } */ ?>
                <!--<div class="description"><?php //bloginfo( 'description' ); ?></div>-->
                <a href="<?php echo get_option('home'); ?>/"><img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/images/Resource/01_Home/MIL_logo.png"
                        alt="<?php bloginfo('name'); ?>"/></a>
            </section>
            <nav id="main_nav" role="navigation"><?php wp_nav_menu(array('menu' => 'mainmenu')); ?></nav>
        </header>
    </div>
</div>
<hr>