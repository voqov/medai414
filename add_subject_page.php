<!DOCTYPE html>
<html>
<head>
<title>add subject page</title>
<meta charset="utf-8" />
</head>
<body>
	<form method="post" action="add_subject_query.php">
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
		Details <textarea name="detail" rows="5" cols="40"></textarea>
		</div>
		<div><input type="checkbox" name="mandatory" value="1">Mandatory</div>
		<div>
		Type
		<input type="radio" name="type" value="core">Core
		<input type="radio" name="type" value="support">Support
		</div>
		Tool <textarea name="tool" rows="5" cols="40"></textarea>
		</div>
		<div><input type="submit" value="Create Subject"></div>
		<!-- Prerequisite Subject
			<select name="prereq_subject">
				<option value="1">1-1</option>
				<option value="2">1-2</option>
				<option value="3">2-1</option>
				<option value="4">2-2</option>
				<option value="5">3-1</option>
				<option value="6">3-2</option>
				<option value="7">4-1</option>
				<option value="8">4-2</option>
			</select> -->
	</form>
</body>
<html>