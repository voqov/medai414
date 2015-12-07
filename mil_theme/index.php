<?php get_header(); ?>
<div id="container">
<?php get_sidebar(); ?>
	<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
	</section>	
	<?php get_sidebar( 'second' ); ?>
</div><!-- #container -->
<?php get_footer(); ?>
