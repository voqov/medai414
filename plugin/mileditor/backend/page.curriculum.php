<?php
function mileditor_menu_curriculum(){
?>
<div class="mileditor_wrap">
<?php

	if(isset($_GET['view'])){
	$view = sanitize_text_field($_GET['view']);
	} else {
	$view = '';
	}

	if(isset($_GET['id'])){
	$board_id = sanitize_text_field($_GET['id']);
	} else {
	$board_id = null;
	}

	switch($view){
	case "create" :
	require_once MILEDITOR_ABSPATH.'/frontend/page.curriculum.create.php';
	break;

	case "modify" :
	require_once MILEDITOR_ABSPATH.'/frontend/page.curriculum.modify.php';
	break;
	
	case "type" :
	require_once MILEDITOR_ABSPATH.'/frontend/page.curriculum.type.php';
	break;

	default :
	require_once MILEDITOR_ABSPATH.'/frontend/page.curriculum.index.php';
	break;
	}
?>
</div>
<?php
}
?>