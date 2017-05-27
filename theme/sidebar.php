<section id="side1" class="sides">
	<?php if (is_active_sidebar('major_list_area')) : ?>
		<div id="left" class="widget-area">
			<div class="side_title noselect">area</div>
			<hr>
			<ul class="side_list noselect">
				<?php dynamic_sidebar('major_list_area'); ?>
			</ul>
		</div>
	<?php endif; ?>
</section>
