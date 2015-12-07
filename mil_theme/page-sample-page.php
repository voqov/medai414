<?php
/*
Template Name: Custom Template
*/
?>
<?php get_header(); ?>
<div id="container">
		<div id="content1" >

				<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>


	
		</div><!-- #content -->
	</div><!-- #container --></section>
<?php get_sidebar(); ?>
<?php get_sidebar( 'second' ); ?>

<?php get_footer(); ?>