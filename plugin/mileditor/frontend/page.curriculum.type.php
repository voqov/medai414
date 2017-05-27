<div class="setting_block">
	<div class="setting_block_left">
	<div class="setting_title">교육과정 설정</div>
		<?php 
			$page_id = sanitize_text_field($_GET['id']);
			view_curriculum();
			set_subject();
			admin_coloring_suject();
		?>
		<div class="description_container">
			<span class="description">과목을 클릭하여 core인지 support인지 정해주세요.</span>
		</div>
	</div>
	<div class="setting_block_right">
		<form id="regidit_subject_type">
		<div class="setting_title">과목 type 설정</div>
			<input type="hidden" name="page_id" value=<?php echo $page_id;?>>
			<input type="hidden" name="td_id">
			<input type="radio" name="milpage_subject_type" value="core">Core
			<input type="radio" name="milpage_subject_type" value="support">Support
			<br>
			<button type="button" class="mil_btn mil_green_btn milpage_regidit_type_button">등록</button>
			<button type="button" class="mil_btn mil_blue_btn milpage_modify_type_button">수정</button>
			<button type="button" class="mil_btn mil_red_btn milpage_delete_type_button">삭제</button>
		</form>
	</div>
</div>