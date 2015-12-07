<?php
  class MilConfig {
 
    function __construct(){
		
	}
 
    public function getPage($page_id){
      if(!$page_id or !is_numeric($page_id)) : return false; endif;
      $origin_slug = get_post_meta($page_id, 'milpage_slug', true);
      $data = new stdClass();
      $data->ID             	= $page_id;
      $data->title          	= get_the_title($page_id);
      $data->slug           	= 'mil_'.$origin_slug;
      $data->oslug          	= $origin_slug;
      $data->shortcode      	= get_post_meta($page_id, 'milpage_shortcode', true);
	  $data->color_mandatory	= get_post_meta($page_id, 'milpage_color_mandatory', true);
	  $data->color_core			= get_post_meta($page_id, 'milpage_color_core', true);
	  $data->color_support		= get_post_meta($page_id, 'milpage_color_support', true);
	  
      return apply_filters('get_page_data_after', $data, $page_id);
    }

  }
?>