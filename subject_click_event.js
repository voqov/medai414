$(document).ready(function(){
	$(".subject").click(function() {
		$(".subject").removeClass("clicked"); /* remove focus state from all input elements */
		$(this).addClass("clicked"); /* add focus state to currently clicked element */
		var current_id = $(this).attr("id");
		
		console.log(current_id);
		
		//set_popup_pos(this);
		$("#mark").show();
		$("#mCanvas").show();
		$.get("http://voqov.dothome.co.kr/get_popup_info.php", {code:current_id}, popup_data_loaded, "json");
  });
});

function popup_data_loaded(data, status, xhr) {
	console.log("hie!");
    var list = data.list;
	console.log("hi");
	for (var i = 0; i < list.length; i++) {
		var subject_name = "";
		var subject_type = "";
		var subject_detail = "";
		var subject_tool = "";
		var subject_relate = "";

		subject_name = list[i].name;
		if (list[i].isMandatory == "1") subject_type = "Mandatory";
		subject_detail = list[i].detail;
		subject_tool = "Tool : " + list[i].tool;
		subject_relate = list[i].relateSubject;
		
		$("#subject_name").html(subject_name);
		$("#subject_type").html(subject_type);
		$("#subject_detail").html(subject_detail);
		$("#subject_tool").html(subject_tool);
		console.log("hi");
		$("#subject_relate").html(subject_relate);
	}
	
	$("#subject_info").show();
	
}

function set_popup_pos(subject){	
	var origin = $(subject).offset();
	
	$("#subject_info").offset({ top: origin.top + 60, left: origin.left + 30 });
	
	var target = $("#subject_info").offset();

	if (target.top + 363 < 835 && target.left + 727 < 1260) $("#subject_info").offset({ top: target.top, left: target.left });
    if (target.top + 363 < 835 && target.left + 727 > 1260) $("#subject_info").offset({ top: target.top, left: origin.left - ((target.left + 727) - 1260) + 300 });
    if (target.top + 363 > 835 && target.left + 727 < 1260) $("#subject_info").offset({ top: origin.top - 363, left: target.left });
	if (target.top + 363 > 835 && target.left + 727 > 1260) $("#subject_info").offset({ top: origin.top - 363, left: origin.left - ((target.left + 727) - 1260) + 300 });
}

function close_subject_info(){
	$("#subject_info").hide();
	$("#mark").hide();
	$("#mCanvas").hide();
}