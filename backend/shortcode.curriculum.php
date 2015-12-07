<?php
add_shortcode("milpage","milpage");

function milpage($attr){	
	view_curriculum();
	set_subject();
	?>
<div id="table_footer">
	<div class="table_footer_item"><div id="mandatory_icon" class="table_footer_icon">M</div>Mandatory</div>
	<div class="table_footer_item"><div id="core_icon" class="table_footer_icon">C</div>Core</div>
	<div class="table_footer_item" id="table_footer_support"><div id="support_icon" class="table_footer_icon">S</div>Support</div>
</div>
<?php
	mileditor_coloring_suject();

	if(isset($_GET['td_id'])){
	$td_id = sanitize_text_field($_GET['td_id']);
	view_subject_info($td_id);
	
	$subject_code = get_subject_code($td_id);	
	$presubjects_pos = get_presubjects($subject_code);

?>
	<script>
	
		jQuery("#<?php echo $td_id;?> .table_bg").css('z-index', '3');
		jQuery("#<?php echo $td_id;?> .type_icon").css('z-index', '4');
		
		if(<?php echo "'$presubjects_pos'";?> != ''){
			jQuery("#<?php echo $presubjects_pos;?> .table_bg").css('z-index', '3');
			jQuery("#<?php echo $presubjects_pos;?> .type_icon").css('z-index', '4');
			//drawLine(jQuery("#<?php echo $presubjects_pos;?> .table_bg"), jQuery("#<?php echo $td_id;?> .table_bg"));
			
			if(<?php
				$old_presubject_pos = $presubjects_pos;
				$old_presubject_code = get_subject_code($old_presubject_pos);
				$presubjects_pos = get_presubjects($old_presubject_code);
				echo "'$presubjects_pos'"?> != ''){
			
				jQuery("#<?php echo $presubjects_pos;?> .table_bg").css('z-index', '3');
				jQuery("#<?php echo $presubjects_pos;?> .type_icon").css('z-index', '4');
				//drawLine(jQuery("#<?php echo $presubjects_pos;?> .table_bg"), jQuery("#<?php echo $old_presubject_pos;?> .table_bg"));
				
				if(<?php
					$old_presubject_pos = $presubjects_pos;
					$old_presubject_code = get_subject_code($old_presubject_pos);
					$presubjects_pos = get_presubjects($old_presubject_code);
					echo "'$presubjects_pos'"?> != ''){
				
					jQuery("#<?php echo $presubjects_pos;?> .table_bg").css('z-index', '3');
					jQuery("#<?php echo $presubjects_pos;?> .type_icon").css('z-index', '4');
					//drawLine(jQuery("#<?php echo $presubjects_pos;?> .table_bg"), jQuery("#<?php echo $old_presubject_pos;?> .table_bg"));
					
					if(<?php
						$old_presubject_pos = $presubjects_pos;
						$old_presubject_code = get_subject_code($old_presubject_pos);
						$presubjects_pos = get_presubjects($old_presubject_code);
						echo "'$presubjects_pos'"?> != ''){
					
						jQuery("#<?php echo $presubjects_pos;?> .table_bg").css('z-index', '3');
						jQuery("#<?php echo $presubjects_pos;?> .type_icon").css('z-index', '4');
						//drawLine(jQuery("#<?php echo $presubjects_pos;?> .table_bg"), jQuery("#<?php echo $old_presubject_pos;?> .table_bg"));
					}
				}
			}
		}
		
		// <?php
			// for($i = 0; $i < count($presubjects_pos); $i++){
				// ?>
				// jQuery("#<?php echo $presubjects_pos[$i];?> .table_bg").css('z-index', '3');
				// console.log(<?php echo $presubjects_pos[$i];?>);
				// jQuery("#<?php echo $presubjects_pos[$i];?> .type_icon").css('z-index', '4');
				// drawLine(jQuery("#<?php echo $presubjects_pos[$i+1];?> .table_bg"), jQuery("#<?php echo $presubjects_pos[$i];?> .table_bg"));
				// <?php
			// }
		// ?>
		
		var origin = jQuery("#<?php echo $td_id;?> .table_bg").offset();			
		jQuery("#subject_info").offset({ top: origin.top + 50, left: origin.left + 30 });

		var target = jQuery("#subject_info").offset();

		if (target.top + 353 < 850 && target.left + 620 < 1238) jQuery("#subject_info").offset({ top: target.top, left: target.left });
		if (target.top + 353 < 850 && target.left + 620 > 1238) jQuery("#subject_info").offset({ top: target.top, left: origin.left - ((target.left + 620) - 1208)});
		if (target.top + 353 > 850 && target.left + 620 < 1238) jQuery("#subject_info").offset({ top: origin.top - 363, left: target.left });
		if (target.top + 353 > 850 && target.left + 620 > 1238) jQuery("#subject_info").offset({ top: origin.top - 363, left: origin.left - ((target.left + 620) - 1208)});
		
		function drawLine(start, end) {

			var startPos = $(start).position();
			var endPos = $(end).position();
			
			console.log(startPos);

			var startX = startPos.left;
			var startY = startPos.top;
			var endX = endPos.left;
			var endY = endPos.top;
			
			var c = document.getElementById("mCanvas");
			var ctx = c.getContext("2d");

			ctx.beginPath();
			ctx.lineWidth = "2";
			ctx.strokeStyle = "black";
			ctx.moveTo(startX - 183, startY - 40);
			ctx.lineTo(startX - 170, startY - 40);
			ctx.lineTo(startX - 170, endY - 40);
			ctx.lineTo(endX - 313, endY - 40);
			ctx.lineTo(endX - 323, endY - 45);
			ctx.lineTo(endX - 313, endY - 40);
			ctx.lineTo(endX - 323, endY - 35);
			ctx.lineTo(endX - 313, endY - 40);

			ctx.stroke(); // Draw it
}
	</script>
<?php
	} else {
		$td_id = null;
	}
}
?>