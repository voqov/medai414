<form id="admin_create_curriculum_page_form">
	<input type="hidden" name="page_type" value="create">
	<input type="hidden" name="page_id">
	<div class="setting_title">교육과정표 설정</div>
	<div class="setting_table_wrap">
		<table>
			<tr>
				<th>페이지 명:</th>
				<td>
					<input type="text" class="mil_input" name="milpage_name">
					<div class="description_container">
					<span class="description">보여질 페이지의 이름입니다. 예 : Game</span>
					</div>
				</td>
				</tr>
			<tr>
				<th>페이지 슬러그:</th>
				<td>
					<input type="text" class="mil_input" name="milpage_slug">
					<div class="description_container">
					<span class="description">페이지 슬러그는 게시판을 붙여넣을 때 필요합니다. 영문으로 작성하시기 바랍니다. 예 : game</span>
					</div>
				</td>
			</tr>
			<tr>
				<th>페이지 숏코드:</th>
				<td>
					<input type="text" class="mil_input" name="milpage_shortcode">
					<div class="description_container">
					<span class="description">이 숏코드를 만든 Page에 붙여넣으면 교과과정표가 보여집니다.</span>
					</div>
				</td>
			</tr>
			<tr>
				<th>Mandatory</th>
				<td>
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_color_mandatory">
					<div class="description_container">
					<span class="description">Mandatory 과목의 배경색을 지정하세요.</span>
					</div>
					
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_bordercolor_mandatory">
					<div class="description_container">
					<span class="description">Mandatory 과목의 선색을 지정하세요.</span>
					</div>
				</td>
			</tr>
			<tr>
				<th>Core</th>
				<td>
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_color_core">
					<div class="description_container">
					<span class="description">Core 과목의 색을 지정하세요.</span>
					</div>
					
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_bordercolor_core">
					<div class="description_container">
					<span class="description">Core 과목의 선색을 지정하세요.</span>
					</div>
				</td>
			</tr>
			<tr>
				<th>Support</th>
				<td>
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_color_support">
					<div class="description_container">
					<span class="description">Support 과목의 색을 지정하세요.</span>
					</div>
					
					<div class="view_color"></div>
					<input type="text" class="mil_input" name="milpage_bordercolor_support">
					<div class="description_container">
					<span class="description">Support 과목의 선색을 지정하세요.</span>
					</div>
				</td>
			</tr>
			<tr>
				<th>Type</th>
				<td>
					<input type="checkbox" name="milpage_page_type[]" value="game">Game
					<input type="checkbox" name="milpage_page_type[]" value="df">Digital Film <br/>
					<input type="checkbox" name="milpage_page_type[]" value="dd">Digital Design
					<input type="checkbox" name="milpage_page_type[]" value="it">IT Programming
					<div class="description_container">
					<span class="description">이 교육과정이 포함하고 있는 분야를 선택해주세요. (중복 가능)</span>
					</div>
				</td>
			</tr>
		</table>
		<br><br>
		<button type="button" class="mil_btn mil_green_btn mil_create_page_button">페이지 생성</button>
		<a href="http://media-jobs.ajou.ac.kr/wp-admin/admin.php?page=mileditor" class="mil_btn mil_red_btn">취소</a>
	</div>
</form>