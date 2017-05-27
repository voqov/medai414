<?php get_header(); ?>
<div id="container">
		<div id="content1" ><section id="content" role="main">
<header class="header">
<h1 class="entry-title"><?php _e( 'Tag Archives: ', 'greenapples' ); ?><?php single_tag_title(); ?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section></div></div>
<?php get_sidebar(); ?>
<?php get_sidebar( 'second' ); ?>
<?php get_footer(); ?>