<?php

	/*********************
		Table 칸 ID로 과목의 코드를 받아오고
		그 코드로 과목의 이름을 받아온다
	*********************/
	function set_subject(){
		global $wpdb;
		$position_table = $wpdb->prefix.'mil_position';
		$subject_table = $wpdb->prefix.'mil_subject';
		
		$results = $wpdb->get_results("SELECT * FROM $position_table");
		
		echo "<script>";
		foreach ( $results as $result ) 
		{
			$td_id = $result->td_id;
			$code = $result->subject;
			
			$name = $wpdb->get_var("SELECT name FROM $subject_table WHERE code = '$code'");
			$len_name = strlen($name);
			
			//echo "console.log('".$name.", ".$len_name."');";
			
			echo "var td = document.getElementById('$td_id');";
			echo "var bg = document.createElement('DIV');";
			echo "bg.className='table_bg';";
			echo "var text_wrap = document.createElement('SPAN');";
			echo "var text = document.createTextNode('".$name."');";
			echo "text_wrap.appendChild(text);";
			
			if(strlen($name) > 32){
				echo "text_wrap.style.fontSize = '0.7em';";
			}elseif(strlen($name) > 29){
				echo "text_wrap.style.fontSize = '0.75em';";
			}else{
				echo "text_wrap.style.fontSize = '0.8em';";
			}
			echo "bg.appendChild(text_wrap);";
			echo "td.appendChild(bg);";
		}
		echo "</script>";
	}
	
	/*********************
		Table 칸의 아이디로 과목 코드를 받아오고
		그 과목코드로 과목 정보들을 가져온다(선수과목 제외)
	*********************/
	
  add_action( 'wp_ajax_get_subject_info', 'get_subject_info');
  
	function get_subject_info($td_id){
		global $wpdb;
		$subject_table = $wpdb->prefix . 'mil_subject';
		$position_table = $wpdb->prefix . 'mil_position';
		
		$subject_code = $wpdb->get_var( "SELECT subject FROM $position_table WHERE td_id = '$td_id'" );
		$results = $wpdb->get_results("SELECT * FROM $subject_table WHERE code = '$subject_code'");
		
		return $results;
	}
	
	/*********************
		선수과목의 정보를 가져온다
	*********************/
	
	add_action('wp_ajax_get_prereq_subject' , 'get_prereq_subject');
	add_action('wp_ajax_nopriv_get_prereq_subject', 'get_prereq_subject' );
	function get_prereq_subject($subject_code){
		global $wpdb;
		$subject_table = $wpdb->prefix . 'mil_subject';
		$pre_table = $wpdb->prefix . 'mil_prerequisite_subjects';
		
		$prereq_subject = $wpdb->get_var("SELECT pre_subject FROM $pre_table WHERE subject = '$subject_code'");
		$results = $wpdb->get_results("SELECT code, name FROM $subject_table WHERE code = '$prereq_subject'");
		
		return $results;
	}
	
	/*********************
		선수과목 표시를 위해 만든 함수
		여러개의 선수과목을 배열에 저장하여 리턴한다
	*********************/

	add_action('wp_ajax_get_presubjects' , 'get_presubjects');	
    add_action( 'wp_ajax_nopriv_get_presubjects', 'get_presubjects' );
	function get_presubjects($subject_code) {
		
		$presubject_info = get_prereq_subject($subject_code);
		foreach ( $presubject_info as $info ) {
			$presubject_code = $info->code;
		}
		$result = get_subject_pos($presubject_code);
	
		return $result;
		
		// $origin = get_subject_pos($subject_code);
		// $results[0] = "td82";
		
		// $presubject_info = get_prereq_subject($subject_code);
		
		// if($presubject_info != ""){		
			// foreach ( $presubject_info as $info ) {
				// $presubject_code = $info->code;
			// }
			// $result = get_subject_pos($presubject_code);
				
			// while($result != ""){
				// array_push($results, $result);
				
				// $presubject_info = get_prereq_subject($presubject_code);
				// if($presubject_info != ""){		
					// foreach ( $presubject_info as $info ) {
						// $presubject_code = $info->code;
					// }
					// $result = get_subject_pos($presubject_code);
				// }else{
					// $result = "";
				// }
			// }
	
			// return $results;
		// }else{
			// return $results;
		// }
	}
	
	add_action('wp_ajax_get_subject_pos' , 'get_subject_pos');	
    add_action( 'wp_ajax_nopriv_get_subject_pos', 'get_subject_pos' );
	add_action('wp_ajax_get_subject_code' , 'get_subject_code');	
    add_action( 'wp_ajax_nopriv_get_subject_code', 'get_subject_code' );
	
	/*********************
		과목이 위치한 표의 칸 아이디를 돌려준다
	*********************/
	function get_subject_pos($subject){
		global $wpdb;
		$position_table = $wpdb->prefix . 'mil_position';
		
		$td_id = $wpdb->get_var("SELECT td_id FROM $position_table WHERE subject = '$subject'");
		
		return $td_id;
	}
	
	/*********************
		선택한 칸에 있는 과목의 코드 값을 돌려준다
	*********************/
	
	function get_subject_code($td_id){
		global $wpdb;
		$position_table = $wpdb->prefix . 'mil_position';
		
		$subject = $wpdb->get_var("SELECT subject FROM $position_table WHERE td_id = '$td_id'");
		
		return $subject;

	}
	
	/*********************
		관리자 페이지에서 등록된 교육과정을 보여준다
	*********************/
	
	function mil_get_pages(){
      global $wpdb;
      $post_table   = $wpdb->prefix.'posts';
      $results      = $wpdb->get_results("SELECT ID FROM $post_table WHERE post_type = 'milpage' and post_status = 'publish'");
      if(!$results) :return false; endif;
      return $results;
    }
	
	/*********************
		교육과정 페이지 등록창에서 등록을 누르면 DB에 저장되는 값들을 선언
		
		이 부분은 킹콩보드의 코드를 참조하였습니다.
	*********************/
	
  add_action( 'wp_ajax_create_milpage', 'create_milpage');
  
  function create_milpage(){
    $result         = array();
    $BasicSettings  = array();
	
    parse_str($_POST['data'], $options);

    $milpage_name       = $options['milpage_name'];
	$page_type			= $options['page_type'];

    if(isset($options['milpage_slug'])){
      $milpage_slug     = $options['milpage_slug'];
    } else {
      $milpage_slug     = null;
    }

    if(isset($options['milpage_shortcode'])){
      $milpage_shortcode = $options['milpage_shortcode'];
    } else {
      $milpage_shortcode = null;
    }
	
	$milpage_page_type				= $options['milpage_page_type'];
    $milpage_color_mandatory		= $options['milpage_color_mandatory'];
    $milpage_color_core				= $options['milpage_color_core'];
    $milpage_color_support			= $options['milpage_color_support'];
	$milpage_bordercolor_mandatory	= $options['milpage_bordercolor_mandatory'];
    $milpage_bordercolor_core		= $options['milpage_bordercolor_core'];
    $milpage_bordercolor_support	= $options['milpage_bordercolor_support'];

    $settings    = array(
      'page_name'					=> $milpage_name,
      'page_slug'					=> $milpage_slug,
	  'page_type'					=> $milpage_page_type,
      'page_shortcode'				=> $milpage_shortcode,
      'page_mandatory_color'		=> $milpage_color_mandatory,
      'page_core_color'				=> $milpage_color_core,
      'page_support_color'			=> $milpage_color_support,
	  'page_mandatory_bordercolor'	=> $milpage_bordercolor_mandatory,
      'page_core_bordercolor'		=> $milpage_bordercolor_core,
      'page_support_bordercolor'	=> $milpage_bordercolor_support
    );

    $MilEditor = new MilEditor();

    switch($page_type){
      case "create" :
        $Status             = $MilEditor->CreatePage($settings);
        ($Status['status'] == 'success') ? $page_id = $Status['page_id'] : $page_id = null;
      break;

      case "modify" :
        $page_id         = $options['page_id'];
        $Status           = $MilEditor->ModifyPage($page_id, $settings); 
      break;
    }

    $result['status']   = $Status['status'];
    $result['message']  = $Status['message'];
    $result['page_id'] = $page_id;

    header( "Content-Type: application/json" );
    echo json_encode($result);  
    //echo $result;
    exit();

  }
  
  add_action( 'wp_ajax_remove_milpage', 'remove_milpage');

  	/*********************
		교육과정 페이지 삭제를 하는 함수
		
		이 부분은 킹콩보드의 코드를 참조하였습니다.
	*********************/
  
  function remove_milpage(){
    global $wpdb;

    $WillRemoves = array();
    $page_id = sanitize_text_field($_POST['page_id']);
    $result = array();

    $Page = new MilConfig();
    $Page = $Page->getPage($page_id);

    $args = array(
      'post_type'       => $Page->slug,
      'posts_per_page'  => -1
    );

    $WillRemoves = get_posts($args);

    foreach($WillRemoves as $Remove){
      wp_delete_post($Remove->ID);
    }

    $meta_table = $wpdb->prefix."mil_subject_in_milpage";

    $wpdb->delete($meta_table, array('page_id' => $page_id));

    $status = wp_delete_post($page_id);

    if(is_wp_error($status)){
      $result['status']   = 'cancel';
      $result['message']  = __('삭제도중 오류가 발생하였습니다.', 'mileditor');
    } else {
      $result['status']   = 'success';
      $result['message']  = __('정상적으로 삭제 되었습니다.', 'mileditor');      
    }

    header( "Content-Type: application/json" );
    echo json_encode($result);  

    exit();
  }
  
  add_action( 'wp_ajax_regidit_subject_in_milpage', 'regidit_subject_in_milpage');
  
  	/*********************
		교육과정에 포함되는 과목의 타입을 정해 저장하는 함수
	*********************/
  function regidit_subject_in_milpage(){
	global $wpdb;
	$result = array();
	
    parse_str($_POST['data'], $options);

	$page_id		= $options['page_id'];
	$td_id			= $options['td_id'];
	$subject_type	= $options['milpage_subject_type'];
	
	$subject_table = $wpdb->prefix . 'mil_subject';
	$position_table = $wpdb->prefix . 'mil_position';
	
	$subject_code = $wpdb->get_var( "SELECT subject FROM $position_table WHERE td_id = '$td_id'" );
	
	$table_name = $wpdb->prefix . 'mil_subject_in_milpage';
	
	$result_ = $wpdb->insert( $table_name,
				array(
					'page_id'	=> $page_id,
					'subject'	=> $subject_code,
					'type'		=> $subject_type
				), 
				array(
					'%s',
					'%s',
					'%s'
		));
			
	if($result_ == false){
	$result['status']   = 'cancel';
	$result['message']  = __('failed.', 'mileditor');
	} else {
		$result['status']   = 'success';
		$result['message']  = __('inserted.', 'mileditor');
	}
    header( "Content-Type: application/json" );
    echo json_encode($result);  
    //echo $result;
    exit();
	  
  }
  
  add_action( 'wp_ajax_modify_subject_in_milpage', 'modify_subject_in_milpage');
  
  	/*********************
		교육과정에 포함되었던 과목의 정보를 수정하는 함수
	*********************/
  
  function modify_subject_in_milpage(){
	global $wpdb;
	$result = array();
	
    parse_str($_POST['data'], $options);

	$page_id		= $options['page_id'];
	$td_id			= $options['td_id'];
	$subject_type	= $options['milpage_subject_type'];
	
	$subject_table = $wpdb->prefix . 'mil_subject';
	$position_table = $wpdb->prefix . 'mil_position';
	
	$subject_code = $wpdb->get_var( "SELECT subject FROM $position_table WHERE td_id = '$td_id'" );
	
	$table_name = $wpdb->prefix . 'mil_subject_in_milpage';
	
	$result_ = $wpdb->update( $table_name,
				array(
					'page_id'	=> $page_id,
					'subject'	=> $subject_code,
					'type'		=> $subject_type
				),
				array(
					'page_id' => $page_id,
					'subject' => $subject_code
				),
				array(
					'%s',
					'%s',
					'%s'
				),
				array(
					'%s',
					'%s'
				)
			);
			
	if($result_ == false){
		$result['status']   = 'cancel';
		$result['message']  = __('failed.', 'mileditor');
	} else {
		$result['status']   = 'success';
		$result['message']  = __('modified.', 'mileditor');
	}
    header( "Content-Type: application/json" );
    echo json_encode($result);  
    //echo $result;
    exit();
	  
  }
  
  	/*********************
		관리자 페이지에서 보는 교육과정 페이지에 속한 과목들에 색깔을 입히는 함수.
	*********************/
  
  function admin_coloring_suject(){
	global $wpdb;
	$position_table = $wpdb->prefix.'mil_position';
	$subjectinpage_table = $wpdb->prefix.'mil_subject_in_milpage';
	$subject_table = $wpdb->prefix.'mil_subject';
	
	$page_id = sanitize_text_field($_GET['id']);
	
	$color_mandatory	= get_post_meta( $page_id, 'milpage_color_mandatory', true );
    $color_core			= get_post_meta( $page_id, 'milpage_color_core', true );
    $color_support		= get_post_meta( $page_id, 'milpage_color_support', true );
	
	$results = $wpdb->get_results("SELECT subject, type FROM $subjectinpage_table WHERE page_id = '$page_id'");
	
	echo "<script>";
	foreach ( $results as $result ) 
	{
		$code = $result->subject;
		$subject_type = $result->type;
		$td_id = $wpdb->get_var("SELECT td_id FROM $position_table WHERE subject='$code'");
		
		switch($subject_type){
			case 'core':
				echo "jQuery('#".$td_id."').find('div').css({'background-color': '".$color_core."', 'border-color':'".$color_core."'});";
			break;
			case 'support':
				echo "jQuery('#".$td_id."').find('div').css({'background-color': '".$color_support."', 'border-color':'".$color_support."'});";
			break;			
		}
	}
	
	$results_ = $wpdb->get_results("SELECT * FROM $position_table");
	foreach ( $results_ as $result_ ) 
	{
		$td_id = $result_->td_id;
		$code = $result_->subject;
			
		$mandatory = $wpdb->get_var("SELECT is_mandatory FROM $subject_table WHERE code = '$code'");
			
		if($mandatory == 'T') echo "jQuery('#".$td_id."').find('div').css({'background-color': '".$color_mandatory."', 'border-color':'".$color_mandatory."'});";
	}
	echo "</script>";
  }
  
  add_action('wp_ajax_mileditor_coloring_suject','mileditor_coloring_suject');
  add_action('wp_ajax_nopriv_mileditor_coloring_suject','mileditor_coloring_suject');
  
	/*********************
		이용자가 보는 교육과정 페이지에 속한 과목들에 색깔을 입히는 함수.
	*********************/
  
  function mileditor_coloring_suject(){
	global $wpdb;
	$position_table = $wpdb->prefix.'mil_position';
	$subjectinpage_table = $wpdb->prefix.'mil_subject_in_milpage';
	$subject_table = $wpdb->prefix.'mil_subject';
	
	$page_title = get_the_title();
	
	$page_id = $wpdb->get_var("SELECT post_id FROM wp_postmeta WHERE meta_value='$page_title'");
	
	$color_mandatory		= get_post_meta( $page_id, 'milpage_color_mandatory', true );
    $color_core				= get_post_meta( $page_id, 'milpage_color_core', true );
    $color_support			= get_post_meta( $page_id, 'milpage_color_support', true );
	$bordercolor_mandatory	= get_post_meta( $page_id, 'milpage_bordercolor_mandatory', true );
    $bordercolor_core		= get_post_meta( $page_id, 'milpage_bordercolor_core', true );
    $bordercolor_support	= get_post_meta( $page_id, 'milpage_bordercolor_support', true );
	
	$results = $wpdb->get_results("SELECT subject, type FROM $subjectinpage_table WHERE page_id = '$page_id'");
	
	echo "<script>";
	echo "console.log('".$page_title."');";
	echo "jQuery('#mandatory_icon').css({'background-color':'".$color_mandatory."', 'border-color':'".$bordercolor_mandatory."'});";
	echo "jQuery('#core_icon').css({'background-color': '".$color_core."', 'border-color':'".$bordercolor_core."'});";
	echo "jQuery('#support_icon').css({'background-color':'".$color_support."', 'border-color':'".$bordercolor_support."'});";
	echo "console.log('".$page_id."');";
	foreach ( $results as $result ) 
	{
		$code = $result->subject;
		$subject_type = $result->type;
		$td_id = $wpdb->get_var("SELECT td_id FROM $position_table WHERE subject='$code'");
		
		switch($subject_type){
			case 'core':
				echo "jQuery('#".$td_id."').find('.table_bg').css({'background-color':'".$color_core."', 'border-color':'".$bordercolor_core."'});";
				echo "var icon = document.createElement('DIV');";
				echo "icon.className='type_icon';";
				echo "icon.style.backgroundColor='".$color_core."';";
				echo "icon.style.borderColor='".$bordercolor_core."';";
				echo "var text = document.createTextNode('C');";
				echo "icon.appendChild(text);";
				echo "document.getElementById('".$td_id."').appendChild(icon);";
				echo "var origin_tablebg = jQuery('#".$td_id."').find('.table_bg').offset();";
			echo "jQuery('#".$td_id."').find('.type_icon').offset({top:origin_tablebg.top - 7, left: origin_tablebg.left + 110});";
			break;
			case 'support':
				echo "jQuery('#".$td_id."').find('.table_bg').css({'background-color':'".$color_support."', 'border-color':'".$bordercolor_support."'});";
				echo "var icon = document.createElement('DIV');";
				echo "icon.className='type_icon';";
				echo "icon.style.backgroundColor='".$color_support."';";
				echo "icon.style.borderColor='".$bordercolor_support."';";
				echo "var text = document.createTextNode('S');";
				echo "icon.appendChild(text);";
				echo "document.getElementById('".$td_id."').appendChild(icon);";
				echo "var origin_tablebg = jQuery('#".$td_id."').find('.table_bg').offset();";
			echo "jQuery('#".$td_id."').find('.type_icon').offset({top:origin_tablebg.top - 7, left: origin_tablebg.left + 110});";
			break;			
		}
	}
	
	$results_ = $wpdb->get_results("SELECT * FROM $position_table");
	foreach ( $results_ as $result_ ) 
	{
		$td_id = $result_->td_id;
		$code = $result_->subject;
			
		$mandatory = $wpdb->get_var("SELECT is_mandatory FROM $subject_table WHERE code = '$code'");
			
		if($mandatory == 'T'){
			echo "jQuery('#".$td_id."').find('.table_bg').css({'background-color':'".$color_mandatory."', 'border-color':'".$bordercolor_mandatory."'});";
			echo "if(jQuery('#".$td_id." .type_icon').length>0) {";
			echo "jQuery('#".$td_id." .type_icon').text('M');";
			echo "jQuery('#".$td_id." .type_icon').css({'background-color':'".$color_mandatory."', 'border-color':'".$bordercolor_mandatory."'});";
			echo "}else {";
			echo "var icon = document.createElement('DIV');";
			echo "icon.className='type_icon';";
			echo "icon.style.backgroundColor='".$color_mandatory."';";
			echo "icon.style.borderColor='".$bordercolor_mandatory."';";
			echo "var text = document.createTextNode('M');";
			echo "icon.appendChild(text);";
			echo "document.getElementById('".$td_id."').appendChild(icon);";
			echo "}";
			echo "var origin_tablebg = jQuery('#".$td_id."').find('.table_bg').offset();";
			echo "jQuery('#".$td_id."').find('.type_icon').offset({top:origin_tablebg.top - 7, left: origin_tablebg.left + 110});";
		}
	}
	echo "</script>";
  }
  
  add_action('wp_ajax_get_subject_type', 'get_subject_type', 10, 2);
  
	/*********************
		과목의 타입(핵심/보조) 값을 돌려준다
	*********************/
  
  function get_subject_type($subject, $page_title){
	  global $wpdb;
	  
	  $subjectinpage_table = $wpdb->prefix.'mil_subject_in_milpage';
	  
	  $page_id = $wpdb->get_var("SELECT post_id FROM wp_postmeta WHERE meta_value='$page_title'");
	  
	  $result = $wpdb->get_var("SELECT type FROM $subjectinpage_table WHERE page_id = '$page_id' AND subject = '$subject'");
	  
	  return $result;
  }
  
  add_action('wp_ajax_get_page_id', 'get_page_id');
  add_action('wp_ajax_nopriv_get_page_id', 'get_page_id');
  
  /*********************
		선택한 페이지의 id값을 돌려준다
	*********************/
  
  function get_page_id($page_title){
	  global $wpdb;
	  
	  $result = $wpdb->get_var("SELECT post_id FROM wp_postmeta WHERE meta_value='$page_title'");
	  
	  return $result;
  }

  add_action( 'wp_ajax_mil_create_subject', 'mil_create_subject');
  
  /*********************
		교과목을 등록하는 함수
	*********************/
  
  function mil_create_subject(){
	global $wpdb;
	$position_table = $wpdb->prefix.'mil_position';
	$subject_table = $wpdb->prefix.'mil_subject';
	$prereq_table = $wpdb->prefix.'mil_prerequisite_subjects';
	$result         = array();
	//$BasicSettings  = array();
	parse_str($_POST['data'], $options);

	//do_action('mil_create_subject_before', $options);

	$td_id				= $options['td_id'];
	$subject_code		= $options['mil_subject_code'];
	$subject_name		= $options['mil_subject_name'];
	$subject_semester	= $options['mil_subject_semester'];
	$subject_detail		= $options['mil_subject_detail'];
	$subject_mandatory	= $options['mil_subject_mandatory'];
	$subject_tool		= $options['mil_subject_tool'];
	$subject_presubject	= $options['mil_subject_presubject_select'];
	$subject_relsubject	= $options['mil_subject_relsubject'];
	
	$wpdb->insert( $position_table,
					array(
						'td_id'		=>	$td_id,
						'subject'	=>	$subject_code
					), 
					array(
						'%s',
						'%s'
					));
	
	$result_ = $wpdb->insert( $subject_table,
					array(
					  'code'			=>	$subject_code,
					  'name'			=>	$subject_name,
					  'detail'			=>	$subject_detail,
					  'semester'		=>	$subject_semester,
					  'tool'			=>	$subject_tool,
					  'is_manatory'		=>	$subject_manatory,
					  'relate_subject'	=>	$subject_relsubject
					),
					array(
						'%s',
						'%s',
						'%s',
						'%d',
						'%s',
						'%s',
						'%s'
					));
					
	$wpdb->insert( $prereq_table,
					array(
						'subject'		=> $subject_code,
						'pre_subject'	=> $subject_presubject
					),
					array(
						'%s',
						'%s'
					));

    if($result_ == false){
		$result['status']   = 'cancel';
		$result['message']  = __('failed.', 'mileditor');
    } else {
		$result['status']   = 'success';
		$result['message']  = __('inserted.', 'mileditor');	  
    }

    header( "Content-Type: application/json" );
    echo json_encode($result);  
    //echo $result;
    exit();

  }
  
    add_action( 'wp_ajax_mil_update_subject', 'mil_update_subject');
  
  /*********************
		교과목의 정보를 수정하는 함수
	*********************/
  
  function mil_update_subject(){
	global $wpdb;
	$position_table = $wpdb->prefix.'mil_position';
	$subject_table = $wpdb->prefix.'mil_subject';
	$prereq_table = $wpdb->prefix.'mil_prerequisite_subjects';
	$result         = array();
	//$BasicSettings  = array();
	parse_str($_POST['data'], $options);

	//do_action('mil_create_subject_before', $options);

	$td_id				= $options['td_id'];
	$subject_code		= $options['mil_subject_code'];
	$subject_name		= $options['mil_subject_name'];
	$subject_semester	= $options['mil_subject_semester'];
	$subject_detail		= $options['mil_subject_detail'];
	$subject_mandatory	= $options['mil_subject_mandatory'];
	$subject_tool		= $options['mil_subject_tool'];
	$subject_presubject	= $options['mil_subject_presubject_select'];
	$subject_relsubject	= $options['mil_subject_relsubject'];

	
	$result_ = $wpdb->replace( $subject_table,
					array(
					  'code'			=>	$subject_code,
					  'name'			=>	$subject_name,
					  'detail'			=>	$subject_detail,
					  'semester'		=>	$subject_semester,
					  'tool'			=>	$subject_tool,
					  'is_mandatory'	=>	$subject_mandatory,
					  'relate_subject'	=>	$subject_relsubject
					),
					// array( 'code' => $subject_code),
					array(
						'%s',
						'%s',
						'%s',
						'%d',
						'%s',
						'%s',
						'%s'
					)
					// array( '%s')
				);
					
	$wpdb->replace( $prereq_table, 
			array( 
				'subject'		=> $subject_code,
				'pre_subject'	=> $subject_presubject
			), 
			// array( 'subject'	=> $subject_code ), 
			array( 
				'%s',
				'%s'
			)
			// array( '%s' ) 
		);
					
	if($result_ == false){
		$result['status']   = 'cancel';
		$result['message']  = __('failed.', 'mileditor');
    } else {
		$result['status']   = 'success';
		$result['message']  = __('modified.', 'mileditor');	  
    }

    header( "Content-Type: application/json" );
    echo json_encode($result);  
    //echo $result;
    exit();

  }
  
  /*********************
		shortcode를 포함하는 페이지인지 확인하는 함수
		
		이 함수는 킹공보드를 참고하였습니다.
	*********************/
  
  function check_page_shortcode_using( $slug ) {

  $found = array();

  $args = array(
    'posts_per_page' => -1,
    'post_type'      => array('post', 'page'),
    'post_status'    => 'publish'
  );

  $posts = get_posts($args);

  if($posts){
    foreach($posts as $post){
      if( stripos($post->post_content, '['.$slug ) !== false ){
        $found[] = $post->ID;
      }
    }
  } else {
    $found = false;
  }
    return $found;
}
?>