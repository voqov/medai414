<?php
  $page_id = sanitize_text_field($_GET['id']);

  if($page_id){
    $page_title					= get_the_title($page_id);
    $page_slug					= get_post_meta($page_id, 'milpage_slug', true);
    $page_shortcode				= get_post_meta($page_id, 'milpage_shortcode', true);
	$page_type					= get_post_meta($page_id, 'milpage_type', true);
    $page_color_mandatory		= get_post_meta($page_id, 'milpage_color_mandatory', true);
    $page_color_core			= get_post_meta($page_id, 'milpage_color_core', true);
    $page_color_support			= get_post_meta($page_id, 'milpage_color_support', true);
	$page_bordercolor_mandatory	= get_post_meta($page_id, 'milpage_bordercolor_mandatory', true);
    $page_bordercolor_core		= get_post_meta($page_id, 'milpage_bordercolor_core', true);
    $page_bordercolor_support	= get_post_meta($page_id, 'milpage_bordercolor_support', true);
?>
	<form id="admin_create_curriculum_page_form">
		<input type="hidden" name="page_type" value="modify">
		<input type="hidden" name="page_id" value="<?php echo $page_id;?>">
		<div class="setting_title">교과과정표 설정</div>
		<div class="setting_table_wrap">
			<table>
				<tr>
					<th>페이지 명:</th>
					<td>
						<input type="text" class="mil_input" name="milpage_name" value="<?php echo $page_title;?>">
						<div class="description_container">
						<span class="description">보여질 페이지의 이름입니다. 예 : Game</span>
						</div>
					</td>
				</tr>
				<tr>
					<th>페이지 슬러그:</th>
					<td>
						<input type="text" class="mil_input" name="milpage_slug" value="<?php echo $page_slug;?>" disabled>
						<div class="description_container">
						<span class="description">게시판 슬러그는 초기 설정값에서 변경할 수 없습니다.</span>
						</div>
					</td>
				</tr>
				<tr>
					<th>페이지 숏코드:</th>
					<td>
						<input type="text" class="mil_input" name="milpage_shortcode" value="<?php echo $page_shortcode;?>" disabled>
						<div class="description_container">
						<span class="description">이 숏코드를 만든 Page에 붙여넣으면 교과과정표가 보여집니다.</span>
						</div>
					</td>
				</tr>
				<tr>
					<th>Mandatory</th>
					<td>
						<div class="view_color" style="background:<?php echo $page_color_mandatory;?>"></div>
						<input type="text" class="mil_input" name="milpage_color_mandatory" value="<?php echo $page_color_mandatory;?>">
						<div class="description_container">
						<span class="description">Mandatory 과목의 배경색을 지정하세요.</span>
						</div>
						
						<div class="view_color" style="background:<?php echo $page_bordercolor_mandatory;?>"></div>
						<input type="text" class="mil_input" name="milpage_bordercolor_mandatory" value="<?php echo $page_bordercolor_mandatory;?>">
						<div class="description_container">
						<span class="description">Mandatory 과목의 선색을 지정하세요.</span>
						</div>
					</td>
				</tr>
				<tr>
					<th>Core</th>
					<td>
						<div class="view_color" style="background:<?php echo $page_color_core;?>"></div>
						<input type="text" class="mil_input" name="milpage_color_core" value="<?php echo $page_color_core;?>">
						<div class="description_container">
						<span class="description">Core 과목의 색을 지정하세요.</span>
						</div>
						
						<div class="view_color" style="background:<?php echo $page_bordercolor_core;?>"></div>
						<input type="text" class="mil_input" name="milpage_bordercolor_core" value="<?php echo $page_bordercolor_core;?>">
						<div class="description_container">
						<span class="description">Core 과목의 선색을 지정하세요.</span>
						</div>
					</td>
				</tr>
				<tr>
					<th>Support</th>
					<td>
						<div class="view_color" style="background:<?php echo $page_color_support;?>"></div>
						<input type="text" class="mil_input" name="milpage_color_support" value="<?php echo $page_color_support;?>">
						<div class="description_container">
						<span class="description">Support 과목의 색을 지정하세요.</span>
						</div>
						
						<div class="view_color" style="background:<?php echo $page_bordercolor_support;?>"></div>
						<input type="text" class="mil_input" name="milpage_bordercolor_support" value="<?php echo $page_bordercolor_support;?>">
						<div class="description_container">
						<span class="description">Support 과목의 선색을 지정하세요.</span>
						</div>
					</td>
				</tr>
				<tr>
				<th>Type</th>
				<td>
					<?php
						$isGame = $isDF = $isDD = $isIT = "";
						foreach($page_type as $type) {
							if($type == "game") $isGame = 1;
							if($type == "df") $isDF = 1;
							if($type == "dd") $isDD = 1;
							if($type == "it") $isIT = 1;
						}
					?>
					<input type="checkbox" name="milpage_page_type[]" value="game" <?php if($isGame == 1) echo "checked";?>>Game
					<input type="checkbox" name="milpage_page_type[]" value="df" <?php if($isDF == 1) echo "checked";?>>Digital Film <br/>
					<input type="checkbox" name="milpage_page_type[]" value="dd" <?php if($isDD == 1) echo "checked";?>>Digital Design
					<input type="checkbox" name="milpage_page_type[]" value="it" <?php if($isIT == 1) echo "checked";?>>IT Programming
					<div class="description_container">
					<span class="description">이 교육과정이 포함하고 있는 분야를 선택해주세요. (중복 가능)</span>
					</div>
				</td>
			</tr>
			</table>
		<br><br>
		<button type="button" class="mil_btn mil_green_btn mil_create_page_button">페이지 수정</button>
		<a href="?page=mileditor" class="mil_btn mil_red_btn">취소</a>
		</div>
	</form>
<?php
	}
?>