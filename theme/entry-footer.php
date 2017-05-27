<footer class="entry-footer"><div class="alignright edit"><span class="tiny-pencil"><?php edit_post_link(); ?></span></div>
<div class="center"><span class="tiny-category"><?php the_category( ', ' ); ?></span>
<span class="tag-links"><?php the_tags(); ?></span>
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="tiny-comments"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'greenapples' ) ) . '</a></span>';
} ?></div>
</footer> 