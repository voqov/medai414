<!DOCTYPE html>
<html>
<head>
<title>add subject page</title>
<meta charset="utf-8" />
</head>
<body>
	<form name="add_subject" method="post" action="add_subject_query.php">
		<div>Subject Code <input type="text" name="code"></div>
		<div>Subject Name <input type="text" name="name"></div>
		<div>
		Semester
			<select name="semester">
				<option value="1">1-1</option>
				<option value="2">1-2</option>
				<option value="3">2-1</option>
				<option value="4">2-2</option>
				<option value="5">3-1</option>
				<option value="6">3-2</option>
				<option value="7">4-1</option>
				<option value="8">4-2</option>
			</select>
		</div>
		<div>
		Details <input type="text" name="detail" rows="5" cols="40">
		</div>
		<div><input type="checkbox" name="mandatory" value="1">Mandatory</div>
		<div>Tool <input type="text" name="tool" rows="5" cols="40"></div>
		<div>
		Prerequisite Subject
			<select name="prereq_subject">
				<option value="None">None</option>
				<?php
					require "DB_Connector.php";
					
					$conn = connect_and_create();
					
					$sql = "SELECT code, name FROM Subject";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value='" . $row["code"] . "'>" . $row["name"] . "</option>";
						}
					}
					
					$conn->close();
				?>
			</select>
		</div>
		<div>
		Related Subject
			<select name="relate_subject_select" onChange="subject_select()" multiple>
				<option value="None">None</option>
				<?php
					$conn = connect_and_create();
					
					$sql = "SELECT name FROM Subject";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
						}
					}
					
					$conn->close();
				?>
			</select>
			<input type="text" name="relate_subject">
		</div>	
		<div><input type="submit" value="Create Subject"></div>
	</form>
	
	<script>
		function subject_select(){ 
			i = document.add_subject.relate_subject_select.selectedIndex; // 선택항목의 인덱스 번호
			var select_subj = document.add_subject.relate_subject_select.options[i].value; // 선택항목 value
			if(document.add_subject.relate_subject.value.length > 0) document.add_subject.relate_subject.value += ", ";
			document.add_subject.relate_subject.value += select_subj;
		}
	</script>
	
</body>
</html>