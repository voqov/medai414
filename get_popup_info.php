<?php
	require "DB_Connector.php";
	
	$conn = connect_and_create();
	
	$id = $_GET["code"];
	$result = $conn->query("SELECT * FROM Subject WHERE code = '$id'");
	
	$str = "{". quote("list") . ":[" ;
	$i = 0;
	while( $row = $result->fetch_assoc()) {
		$str .= "{" . sjson("name",$row) . "," . sjson("isMandatory",$row) . ",";
		$str .= sjson("detail",$row) . "," . sjson("tool",$row) .  "," . sjson("relateSubject",$row) . "}";
		if( ++$i<$result->num_rows) $str.=",";
	}
	
	$str .= "]}";
		
	echo $str;

?>
