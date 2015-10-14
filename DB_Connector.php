<?php
	function quote($s) { return '"'. $s .'"'; }
	function sendQuery($conn,$str) { $conn->query($str); }
	function sjson($n,$row) { return quote($n) . ":" . quote($row[$n]); }
	function ijson($n,$r) { return quote($n).":".$r[$n]; }
	
	function connect_and_create() {
		$servername  = "localhost";
		$username  = "voqov";
		$password  = "qmffld0408";
		$dbname  = "voqov";
	
		$conn = new mysqli($servername, $username, $password, $dbname);
		mysqli_set_charset($conn, "utf8");
		if( $conn->connect_error) {
			echo "Connection failed: " . $conn->connect_error;
			die("Connection failed: " . $conn->connect_error);
		}
		
		// if subject table isn't, creat 'subject' table
		$init_query = "CREATE TABLE IF NOT EXISTS Subject ( \n".
			"code VARCHAR(15) NOT NULL PRIMARY KEY, \n".
			"name VARCHAR(50) NOT NULL, \n".
			"detail TEXT, \n".
			"semester INT NOT NULL, \n".
			"isMandatory TINYINT(1) NOT NULL DEFAULT 0, \n".
			"tool VARCHAR(50) DEFAULT 'None', \n".
			"relateSubject TEXT )";
			
		$conn->query($init_query);
		
		// if subject table isn't, creat 'Preq_subject' table
		$init_query = "CREATE TABLE IF NOT EXISTS PreqSubject ( \n".
			"subject VARCHAR(15) NOT NULL, \n".
			"preqSubject VARCHAR(15) NOT NULL, \n".
			"CONSTRAINT pk_PreSubject PRIMARY KEY (subject,preqSubject), \n".
			"CONSTRAINT fk_PreSubject_1 FOREIGN KEY(subject) REFERENCES subject(code) on delete cascade, \n".
			"CONSTRAINT fk_PreSubject_2 FOREIGN KEY(preqSubject) REFERENCES subject(code) on delete cascade )";

		$conn->query($init_query);
		
		return $conn;
	}	
?>