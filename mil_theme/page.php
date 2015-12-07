<?php
/*
Template Name: Page Template
*/
?>
<?php get_header(); ?>

<div id="container">
<?php get_sidebar(); ?>
<div id="content_wrap">
		<?php call_survey();?>
	<section id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!--<header class="header">
				<h1 class="entry_title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
			</header>-->
			<section class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			<?php the_content(); ?>
			<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>
		</article>
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_sidebar( 'second' ); ?>

</div>


<?php get_footer(); ?>