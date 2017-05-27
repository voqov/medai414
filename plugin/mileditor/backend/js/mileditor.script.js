jQuery( document ).ready(function( jQuery ) {
	//setting screen, mCanvas position
	var origin = jQuery("#content").offset();			
	jQuery("#screen").offset({ top: origin.top, left: origin.left});
	jQuery("#mCanvas").offset({ top: origin.top, left: origin.left});
	
	//setting type icon position
	// var origin_tablebg = jQuery(".type_icon").siblings().offset();
	// jQuery(".type_icon").offset({top:origin_tablebg.top - 7, left: origin_tablebg.left + 110});
	
	//setting subject name font size

	jQuery("#mil_subject_table tbody .table_bg").click(function(){
		
		// jQuery("#mil_subject_table tbody td").removeClass("clicked");	/* remove focus state from all input elements */
		// jQuery(this).addClass("clicked");								/* add focus state to currently clicked element */
		
		var current_id = jQuery(this).parent().attr("id");
		
		location.search="td_id="+current_id; //주소창에 td_id 적음
		
		// jQuery.post(ajax_object.ajax_url, {     //ajax object
        // action : 'get_presubjects',           //hook name
        // params : current_id				  //request parameter
      // }, function(data) {
		  // alert(data);
		  // jQuery('#td82 .table_bg').css('z-index', '3');
      // });
	});
	
	$("#subject_info").draggable();
	
	//window.onresize = function() { location.reload(); };
});

function reset_script(){
	jQuery("#subject_info").css("display", "none");
	jQuery("#mask").css("display", "none");
	jQuery(".table_bg").css("z-index", "0");
	//jQuery(".type_icon").css("z-index", "0");
}