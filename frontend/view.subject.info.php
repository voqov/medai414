<?php
function view_subject_info($td_id){
	
	$subject = get_subject_info($td_id);

	foreach ( $subject as $info ) {
		$subject_code = $info->code;
		$subject_name = $info->name;
		$subject_semester = $info->semester;
		$subject_detail = $info->detail;
		$subject_isMandatory = $info->is_mandatory;
		$subject_related = $info->relate_subject;
		$subject_tool = $info->tool;
	}
	$subject_prereq_info = get_prereq_subject($subject_code);
	$subject_prereq = "None";
	foreach ( $subject_prereq_info as $info ) {
		$subject_prereq = $info->name;
	}
	
	$page_title = get_the_title();
	$subject_type = get_subject_type($subject_code, $page_title);
?>
<div id="subject_info">
<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/01_title.png'); width:620px; height:55px;"></div>
<div style="float:left; width:310px; height:298px;">
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/02_title_course.png'); width:310px; height:32px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/07_course.png'); width:310px; height:26px;"><div class="popup_content"><p><?php echo $subject_name;?></p></div></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/08_type_title.png'); width:310px; height:34px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/10_type.png'); width:310px; height:25px;">
		<div class="popup_content">
			<p>
			<?php
				if($subject_isMandatory == "T"){
					echo "Mandatory";
					if($subject_type == "core") echo ", Core";
					elseif($subject_type == "support") echo ", Support";
					else echo "";
				}else{
					if($subject_type == "core") echo "Core";
					elseif($subject_type == "support") echo "Support";
					else echo "";
				}
			?>
			</p>
		</div>
	</div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/12_detail_title.png'); width:310px; height:37px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/14_detail.png'); width:310px; height:144px;"><div class="popup_content" style="height:130px;"><p><?php echo $subject_detail;?></p></div></div>
</div>
<div style="float:left; width:310px; height:298px;">
	<div style="width:310px; height:58px;"> <!--page type-->
		<?php
			$page_id = get_page_id($page_title);
			$page_type = get_post_meta($page_id, 'milpage_type', true);
			$isGame = $isDF = $isDD = $isIT = "";
			foreach($page_type as $type) {
				if($type == "game") $isGame = 1;
				if($type == "df") $isDF = 1;
				if($type == "dd") $isDD = 1;
				if($type == "it") $isIT = 1;
			}
		?>
		<div style="float:left; background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/<?php if($isDD) echo "03_dd_color"; else echo "03_dd";?>.png'); width:83px; height:58px;">
		</div>
		<div style="float:left; background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/<?php if($isDF) echo "04_df_color"; else echo "04_df";?>.png'); width:75px; height:58px;">
		</div>
		<div style="float:left; background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/<?php if($isIT) echo "05_rd_color"; else echo "05_rd";?>.png'); width:75px; height:58px;">
		</div>
		<div style="float:left; background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/<?php if($isGame) echo "06_game_color"; else echo "06_game";?>.png'); width:77px; height:58px;">
		</div>
	</div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/09_tool_title.png'); width:310px; height:34px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/11_tool.png'); width:310px; height:25px;"><div class="popup_content"><p><?php echo $subject_tool;?></p></div></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/13_presubject_title.png'); width:310px; height:37px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/15_presubject.png'); width:310px; height:23px;"><div class="popup_content"><p><?php echo $subject_prereq;?></p></div></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/16_relsubject_title.png'); width:310px; height:35px;"></div>
	<div style="background:url('<?php echo MILEDITOR_PLUGINS_URL;?>/frontend/image/popup/17_relsubject.png'); width:310px; height:86px;"><div class="popup_content" style="height:70px;"><p><?php echo $subject_related;?></p></div></div>
</div>
</div>
<div id="screen" onclick="reset_script()"></div>
<canvas id="mCanvas" width="1238" height="850"></canvas>
<?php
}
?>