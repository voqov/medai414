<?php
function mileditor_menu_subject(){
?>
<div class="setting_block">
	<div class="setting_block_left">
	<div class="setting_title">Subject List</div>
<?php
	if(isset($_GET['id'])){
		$td_id = sanitize_text_field($_GET['id']);
	} else {
		$td_id = null;
	}
	
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
	
	foreach ( $subject_prereq_info as $info ) {
		$subject_prereq = $info->name;
	}
	
	
	view_curriculum();
?>
	</div>
	<div class="setting_block_right">
		<form id="mil_create_subject_form">
			<input type="hidden" name="td_id" value="<?php echo $td_id;?>">
			<div class="setting_title">Subject Info</div>
			<div class="setting_table_wrap">
			  <table>
				<tr>
				  <th>과목 코드</th>
				  <td>
					<input type="text" class="mil_input" name="mil_subject_code" value="<?php echo $subject_code;?>">
					<div class="description_container">
					  <span class="description">과목 코드를 입력해주세요. (ex : DMED100)</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>과목 이름</th>
				  <td>
					<input type="text" class="mil_input" name="mil_subject_name" value="<?php echo $subject_name;?>">
					<div class="description_container">
					  <span class="description">과목 이름을 입력해주세요. (ex : 디지털미디어)</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>권장 이수 학기</th>
				  <td>
					<select class="mil_input_select" name="mil_subject_semester">
						<option value="1" <?php if($subject_semester==1) echo 'selected';?>>1-1</option>
						<option value="2" <?php if($subject_semester==2) echo 'selected';?>>1-2</option>
						<option value="3" <?php if($subject_semester==3) echo 'selected';?>>2-1</option>
						<option value="4" <?php if($subject_semester==4) echo 'selected';?>>2-2</option>
						<option value="5" <?php if($subject_semester==5) echo 'selected';?>>3-1</option>
						<option value="6" <?php if($subject_semester==6) echo 'selected';?>>3-2</option>
						<option value="7" <?php if($subject_semester==7) echo 'selected';?>>4-1</option>
						<option value="8" <?php if($subject_semester==8) echo 'selected';?>>4-2</option>
					</select>
					<div class="description_container">
					  <span class="description">과목의 권장 이수 학기를 선택해주세요.</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>과목 요강</th>
				  <td>
					<textarea class="mil_input" name="mil_subject_detail" rows="4" cols="50"><?php echo $subject_detail;?></textarea>
					<div class="description_container">
					  <span class="description">과목의 설명을 입력해주세요.</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>전공 과목 여부</th>
				  <td>
					<input type="checkbox" name="mil_subject_mandatory" value="T" <?php if($subject_isMandatory=='T') echo 'checked';?>> 전공 과목
					<div class="description_container">
					  <span class="description">과목이 전공 과목이면 체크해주세요.</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>사용 프로그램</th>
				  <td>
					<input type="text" class="mil_input" name="mil_subject_tool"  value="<?php echo $subject_tool;?>">
					<div class="description_container">
					  <span class="description">과목에서 사용하는 프로그램을 입력해주세요. (ex : Maya)<br/>없으면 입력하지 않아도 됩니다.</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>선수 과목</th>
				  <td>
					<select class="mil_input_select" name="mil_subject_presubject_select">
						<option value="None">None</option>
						<?php
							global $wpdb;
							
							$table_name = $wpdb->prefix.'mil_subject';
							
							$lists = $wpdb->get_results( "SELECT code, name FROM $table_name" );
							
							if($lists){
								foreach($lists as $list){
									echo "<option value='".$list->code."'>".$list->name."</option>";
								}
							} 

						?>
					</select>
					<br/>
					<input type="text" class="mil_input" name="mil_subject_presubject" value=<?php echo $subject_prereq;?>>
					<div class="description_container">
					  <span class="description">과목의 선수 과목을 선택해주세요.</span>
					</div>
				  </td>
				</tr>
				<tr>
				  <th>연계 과목</th>
				  <td>
					<select class="mil_input_select" name="mil_subject_relsubject_select">
						<option value="None">None</option>
						<?php
							global $wpdb;
							
							$table_name = $wpdb->prefix.'mil_subject';
							
							$lists = $wpdb->get_results( "SELECT code, name FROM $table_name" );
							
							if($lists){
								foreach($lists as $list){
									echo "<option value='".$list->code."'>".$list->name."</option>";
								}
							} 

						?>
					</select>
					<br/>
					<textarea class="mil_input" name="mil_subject_relsubject" rows="4" cols="50"><?php echo $subject_related;?></textarea>
					<div class="description_container">
					  <span class="description">과목의 연계 과목을 선택해주세요.</span>
					</div>
				  </td>
				</tr>
			</table>
			<br><br>
			<button type="button" class="mil_btn mil_green_btn mil_create_subject_button">과목 생성</button>
			<button type="button" class="mil_btn mil_blue_btn mil_modify_subject_button">과목 수정</button>
			<button type="button" class="mil_btn mil_red_btn mil_delete_subject_button">과목 삭제</button>
		</form>
	</div>
</div>
<?php
	set_subject();
}
?>