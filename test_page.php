<html>
<head>
	<meta charset="utf-8" />
	<title>test page</title>
</head>
<body>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div id="content">

</div>
<div id="setting">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Subject Code: <input type="text" name="code">
		Subject Name: <input type="text" name="name">
		Semester:
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
		Comment: <textarea name="comment" rows="5" cols="40"></textarea>
		<input type="checkbox" name="madatory" value="true">Mandatory
		Type:
		<input type="radio" name="type" value="core">Core
		<input type="radio" name="type" value="support">Support
		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>