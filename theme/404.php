<?php get_header(); ?>
<div id="container">
		<div id="content1"><section id="content" role="main">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="entry-title"><?php _e( 'Not Found', 'greenapples' ); ?></h1>
</header>
<section class="entry-content">
<p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'greenapples' ); ?></p>
<?php get_search_form(); ?>
</section>
</article>
</section>
</div><!-- #content -->
	</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_sidebar( 'second' ); ?>

<?php get_footer(); ?>