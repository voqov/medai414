<?php get_header(); ?>
<div id="container">
		<div id="content1" >
<section id="content" role="main">
<header class="header">
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( __( 'Daily Archives: %s', 'greenapples' ), get_the_time( get_option( 'date_format' ) ) ); }
elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'greenapples' ), get_the_time( 'F Y' ) ); }
elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'greenapples' ), get_the_time( 'Y' ) ); }
else { _e( 'Archives', 'greenapples' ); }
?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
</div><!-- #content -->
	</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_sidebar( 'second' ); ?>

<?php get_footer(); ?>