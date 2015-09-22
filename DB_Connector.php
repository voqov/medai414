<?php
	
	$servername  = "localhost";
	$username  = "voqov";
	$password  = "jk1214";
	$dbname  = "test";

	function quote($s) { return "'". $s ."'"; }
	function sendQuery($conn,$str) { $conn->query($str); }
	
	function connect_and_create() {
		$servername  = "localhost";
		$username  = "voqov";
		$password  = "jk1214";
		$dbname  = "test";
	
		$conn = new mysqli($servername, $username, $password, $dbname);
		mysqli_set_charset($conn, "utf8");
		if( $conn->connect_error) {
			echo "Connection failed: " . $conn->connect_error;
			die("Connection failed: " . $conn->connect_error);
		}
		
		// // if subject table isn't, creat 'subject' table
		// $init_query = "CREATE TABLE IF NOT EXISTS Subject ( \n".
			// "code VARCHAR(15) NOT NULL PRIMARY KEY, \n".
			// "name VARCHAR(50) NOT NULL, \n".
			// "detail TEXT, \n".
			// "semester INT NOT NULL, \n".
			// "isMandatory TINYINT(1) NOT NULL DEFAULT 0, \n".
			// "tool VARCHAR(50) DEFAULT 'None' )";
			
			// if ($conn->query($init_query) === TRUE) {
		// echo "Table Subject created successfully";
		// } else {
		// echo "Error creating table: " . $conn->error;
		// }
		
		return $conn;
	}	
?>