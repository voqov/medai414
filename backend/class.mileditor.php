<?php

  class MilEditor extends MilConfig {

    function __construct(){}

    public function CreatePage($settings){

      if(!$settings['page_name'] or !$settings['page_slug']){
        $result['status']   = 'error';
        $result['message']  = __('게시판 명과 슬러그는 반드시 기입하셔야 합니다.', 'mileditor');
      } else {
        $settings['page_slug'] = strtolower($settings['page_slug']); 
		
        /* 커스텀 DB 를 집어넣는다. */
        $status = $this->insertpage($settings);
		
        if($status != false && is_numeric($status)){
          $result['status']     = 'success';
          $result['message']    = __('교육과정이 등록되었습니다', 'mileditor');
          $result['page_id']   = $status;
        } else {
          $result['status']     = 'error';
          $result['message']    = __('교육과정 등록이 실패하였습니다', 'mileditor');
        }
      }
      return $result;
    }

    public function Modifypage($page_id, $settings){
      $result           = array();

      /* 커스텀 DB 를 집어넣는다. */
      $page_ID = $this->updatepage($page_id, $settings['page_name']);

      if(is_wp_error($page_ID)){
        $result['status']     = 'error';
        $result['message']    = __('게시판 수정에 오류가 발생하였습니다.', 'mileditor');
      } else {
        update_post_meta( $page_ID, 'milpage_title', $settings['page_name'] );
		update_post_meta( $page_ID, 'milpage_type', $settings['page_type']);
        update_post_meta( $page_ID, 'milpage_color_mandatory', $settings['page_mandatory_color'] );
        update_post_meta( $page_ID, 'milpage_color_core', $settings['page_core_color'] );
        update_post_meta( $page_ID, 'milpage_color_support', $settings['page_support_color'] );
		update_post_meta( $page_ID, 'milpage_bordercolor_mandatory', $settings['page_mandatory_bordercolor'] );
        update_post_meta( $page_ID, 'milpage_bordercolor_core', $settings['page_core_bordercolor'] );
        update_post_meta( $page_ID, 'milpage_bordercolor_support', $settings['page_support_bordercolor'] );
		
        $result['status']     = 'success';
        $result['message']    = __('교육과정이 수정되었습니다', 'mileditor');
      }
      $this->page_id = $page_ID;
      return $result;
    }

    public function updatepage($page_id, $page_name){
        $page = array();
        $page = array(
          'ID'            => $page_id,
          'post_title'    => $page_name
        );

        $page_Status = wp_update_post( $page );

        return $page_Status;
    }

    public function insertpage($settings){
      $page = array(
        'post_title'    => $settings['page_name'],
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'milpage',
        'post_author'   => 1
      );

      $page_ID = wp_insert_post( $page );

      if(is_wp_error($page_ID)){
        $result['status']     = 'error';
        $result['message']    = __('페이지 신규 생성에 오류가 발생하였습니다.', 'mileditor');
        $callback             = false;
      } else {
        update_post_meta( $page_ID, 'milpage_title', $settings['page_name'] );
		update_post_meta( $page_ID, 'milpage_slug', $settings['page_slug'] );
		update_post_meta( $page_ID, 'milpage_shortcode', $settings['page_shortcode'] );
		update_post_meta( $page_ID, 'milpage_type', $settings['page_type']);
        update_post_meta( $page_ID, 'milpage_color_mandatory', $settings['page_mandatory_color'] );
        update_post_meta( $page_ID, 'milpage_color_core', $settings['page_core_color'] );
        update_post_meta( $page_ID, 'milpage_color_support', $settings['page_support_color'] );
		update_post_meta( $page_ID, 'milpage_bordercolor_mandatory', $settings['page_mandatory_bordercolor'] );
        update_post_meta( $page_ID, 'milpage_bordercolor_core', $settings['page_core_bordercolor'] );
        update_post_meta( $page_ID, 'milpage_bordercolor_support', $settings['page_support_bordercolor'] );
        $callback = $page_ID;
      }
      return $callback;
    }

    public function MilEditor_Slug($page_id){
      return $page_id;
    }

  }

?>