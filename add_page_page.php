<!DOCTYPE html>
<html>
<head>
<title>add page page</title>
<meta charset="utf-8" />
</head>
<body>
<form method="post" action="add_page_query.php">
	<div>
	Subject
		<select name="subject1">
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
	Type
		<input type="checkbox" value="core">core
		<input type="checkbox" value="support">support
	</div>
	<div>
	Subject
		<select name="subject">
			<?php					
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
	Type
		<input type="checkbox" value="core">core
		<input type="checkbox" value="support">support
	</div>
	<div>
	Subject
		<select name="subject">
			<?php					
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
	Type
		<input type="checkbox" value="core">core
		<input type="checkbox" value="support">support
	</div>
	<div>
	Subject
		<select name="subject">
			<?php					
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
	Type
		<input type="checkbox" value="core">core
		<input type="checkbox" value="support">support
	</div>
	<div><input type="button" value="과목추가" onclick=""></div>
	<div><input type="submit" value="Create Subject"></div>
</form>
</body>
</html>