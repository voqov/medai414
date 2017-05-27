<?php
/*
Template Name: Second
*/
?>
<section id="side2" class="sides">
    <div id="right1" class="widget-area">
        <div class="side_title noselect">jobs</div>
        <hr/>
        <ul class="side_list noselect ">
            <?php dynamic_sidebar('job_list_area'); ?>
        </ul>
    </div>
    <img id="drag-icon-left" class="noselect" src="<?php echo get_stylesheet_directory_uri(); ?>/images/drag-icon.png" \>
    <img id="drag-icon-right" class="noselect" src="<?php echo get_stylesheet_directory_uri(); ?>/images/drag-icon.png" \>

    <!--<div id="right2" class="widget-area">-->
    <!--<div class="side_title">industry list</div>-->
    <!--<hr/>-->
    <!--<ul class="side_list">-->
    <?php //dynamic_sidebar( 'industry_list_area' ); ?>
    <!--</ul>-->
    <!--</div>-->

</section>