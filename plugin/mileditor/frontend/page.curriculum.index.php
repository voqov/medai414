<div class="admin_page_header">
	<div class="admin_page_title">
		<p>교과과정 편집</p>
	</div>
</div>
<div class="admin_page_content">
	<table class="wp-list-table widefat fixed unite_table_items">
		<thead>
		<tr>
		  <th width="100px">ID</th>
		  <th width="20%">페이지 이름</th>
		  <th width="25%">Shortcode</th>
		  <th width="50%">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$milconfig	= new MilConfig();
			$lists		= mil_get_pages();
			if($lists){
				foreach($lists as $list){
				$pdata = $milconfig->getPage($list->ID);
		?>
		<tr>
			<td><?php echo $pdata->ID;?></td>
			<td><a href="?page=mileditor&view=modify&id=<?php echo $pdata->ID;?>"><?php echo $pdata->title;?></a></td>
			<td><?php echo $pdata->shortcode;?></td>
			<td>
			<a href="?page=mileditor&view=type&id=<?php echo $pdata->ID;?>" class="mil_btn mil_blue_btn">[과목 등록]</a>
			<a href="?page=mileditor&view=modify&id=<?php echo $pdata->ID;?>" class="mil_btn mil_green_btn">[페이지 수정]</a>
			<a class="mil_btn mil_red_btn mil_page_remove_btn" data="<?php echo $pdata->ID;?>">[삭제]</a>
			<?php
				$added_post_lists = check_page_shortcode_using( "milpage ".$pdata->oslug );
				if($added_post_lists){
					$link = get_the_permalink($added_post_lists[0]);
			?>
				<a href="<?php echo $link;?>" target="_blank" class="mil_btn mil_yellow_btn" original-title="교과과정표 보기">[페이지 보기]</a>
			<?php
				} else {
			?>
				<a class="mil_btn mil_gray_btn" original-title="페이지 또는 포스트에 숏코드를 등록 하셔야 교과과정표 보기를 하실 수 있습니다.">[페이지 보기]</a>
			<?php
				}
			?>
		</tr>
		<?php
			}
		} else {
		?>
		<tr>
			<td colspan="6">신규 교과과정표를 생성 하세요.</td>
		</tr>
		<?php
		}
		?>
		</tbody>
	</table>
	<div class="admin_page_tool_bar">
	  <a href="?page=mileditor&view=create" class="mil_btn mil_blue_btn">새로운 교과과정표 생성</a>
	</div>
</div>