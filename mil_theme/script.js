$( document ).ready(function() { 
	$("#survey_wrap").draggable(); //div를 마우스로 움직일 수 있다.
 
	$("#menu-item-456 a").click(function () {
		$("#survey_wrap").css("display", "block");
		$("#survey_wrap").offset({top:100, left:500});
	});
	
	$("#survey_close").click(function(){
		$("#survey_wrap").css("display", "none");
	});
});