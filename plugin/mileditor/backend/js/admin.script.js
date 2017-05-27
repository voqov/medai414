jQuery( document ).ready(function( $ ) {
	jQuery("#mil_subject_table tbody td").click(function(){
		jQuery("#mil_subject_table tbody td").removeClass("clicked");	/* remove focus state from all input elements */
		jQuery(this).addClass("clicked");								/* add focus state to currently clicked element */

		var current_id = $(this).attr("id");

		var td_id = getQueryString()["id"];
		var page = getQueryString()["page"];

		switch(page){
			case 'mileditor':
				jQuery("[name=td_id]").val(current_id);
				jQuery("#regidit_subject_type").show();
			break;
			default:
				location.replace("http://127.0.0.1/wordpress/wp-admin/admin.php?page=mileditor_subject&id="+current_id);
			/*http://media-jobs.ajou.ac.kr/*/
		}
  	});

	jQuery(".milpage_regidit_type_button").click(function(){
		var data = {
			'action' 	: 'regidit_subject_in_milpage',
			'data'		: jQuery("#regidit_subject_type").serialize()
		};

		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				switch(response.status){
					case 'success' :
						alert(response.message);
						break;

					case 'error' :
						alert(response.message);
						break;

					default :
						alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)");
						break;
				}
			} else {
				alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
			}
		});
		//$("#regidit_subject_type").hide();
		location.reload();
	});

	jQuery(".milpage_modify_type_button").click(function(){

		var data = {
			'action' 	: 'modify_subject_in_milpage',
			'data'		: jQuery("#regidit_subject_type").serialize()
		};

		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				switch(response.status){
					case 'success' :
						alert(response.message);
						break;

					case 'error' :
						alert(response.message);
						break;

					default :
						alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)");
						break;
				}
			} else {
				alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
			}
		});
		//$("#regidit_subject_type").hide();
		location.reload();
	});

	jQuery(".milpage_delete_type_button").click(function(){

		var data = {
			'action' 	: 'delete_subject_in_milpage',
			'data'		: jQuery("#regidit_subject_type").serialize()
		};

		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				switch(response.status){
					case 'success' :
						alert(response.message);
						break;

					case 'error' :
						alert(response.message);
						break;

					default :
						alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)");
						break;
				}
			} else {
				alert("선택에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
			}
		});
		//$("#regidit_subject_type").hide();
		location.reload();
	});

  	jQuery(".mil_create_page_button").click(function(){
		var page_name = jQuery("[name=milpage_name]").val();
		var page_slug = jQuery("[name=milpage_slug]").val();

		if(!page_name || !page_slug){
			alert('게시판 명과 슬러그는 반드시 입력하셔야 합니다.');
		}else {
			var data = {
				'action' 	: 'create_milpage',
				'data'		: jQuery("#admin_create_curriculum_page_form").serialize()
			};

			jQuery.post(ajaxurl, data, function(response) {
				if(response){
					switch(response.status){
						case 'success' :
							alert(response.message);
							location.replace("http://media-jobs.ajou.ac.kr/wp-admin/admin.php?page=mileditor&view=type&id="+response.page_id);
						break;

						case 'error' :
							alert(response.message);
						break;

						default :
							alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)");
						break;
					}
				} else {
					alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
				}
			});
			location.reload();
		}

	});

	jQuery(".mil_page_remove_btn").click(function(){
		var origin = jQuery(this);
		if(confirm("페이지 정보가 영구적으로 삭제 됩니다.\n삭제하시겠습니까?") == true){

			var data = {
				'action' 	: 'remove_milpage',
				'page_id'	: jQuery(this).attr("data")
			}
			jQuery.post(ajaxurl, data, function(response) {
				if(response.status == 'success'){
					origin.parent().parent().css("background", "red");
					origin.parent().parent().animate({opacity : 0}, {duration:600, complete : function(){
						jQuery(this).remove();
						alert(response.status);
					}});
				} else {
					alert(response.status);
				}
			});

		}
	});

	jQuery("[name=milpage_slug]").keyup(function(){
		var repSlug = jQuery(this).val();
			repSlug = repSlug.replace(" ", "_");
			repSlug = repSlug.replace(" ", "");
		jQuery("[name=milpage_shortcode]").val("[milpage "+repSlug+"]");
	});

	jQuery("[name=milpage_slug]").change(function(){
		var repSlug = jQuery(this).val();
			repSlug = repSlug.replace(" ", "_");
			repSlug = repSlug.replace(" ", "");
			jQuery(this).val(repSlug);
	});

	jQuery(".mil_modify_subject_button").click(function(){
		var data = {
			'action' 	: 'mil_update_subject',
			'data'		: jQuery("#mil_create_subject_form").serialize()
		};
		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				switch(response.status){
					case 'success' :
						alert(response.message);
						break;

					case 'error' :
						alert(response.message);
						break;

					default :
						alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)"+JSON.stringify(response, null,2));
						break;
				}
			} else {
				alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
			}
		});
		location.reload();
	});

	jQuery(".mil_delete_subject_button").click(function(){
		var data = {
			'action' 	: 'mil_delete_subject',
			'data'		: jQuery("#mil_create_subject_form").serialize()
		};
		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				switch(response.status){
					case 'success' :
						alert(response.message);
						break;

					case 'error' :
						alert(response.message);
						break;

					default :
						alert("삭제에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)"+JSON.stringify(response, null,2));
						break;
				}
			} else {
				alert("삭제에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
			}
		});
		location.reload();
	});

	/****
	 * 과목 생성 - not used
	 */
	// jQuery(".mil_create_subject_button").click(function(){
	// 	var data = {
	// 			'action' 	: 'mil_create_subject',
	// 			'data'		: jQuery("#mil_create_subject_form").serialize()
	// 	};
    //
	// 	jQuery.post(ajaxurl, data, function(response) {
	// 		if(response){
	// 			switch(response.status){
	// 				case 'success' :
	// 					alert(response.message);
	// 				break;
    //
	// 				case 'error' :
	// 					alert(response.message);
	// 				break;
    //
	// 				default :
	// 					alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(1)");
	// 				break;
	// 			}
	// 		} else {
	// 				alert("생성에 문제가 발생하였습니다. 기술지원에 문의하시기 바랍니다.(2)");
	// 		}
	// 	});
	// });
});

function getQueryString()
{
    var queryString= [];
    var hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        queryString.push(hash[0]);
        queryString[hash[0]] = hash[1];
    }
    return queryString;
}
