<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$dbname = "student_info";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password);
// Selecting the DB 
 mysqli_select_db($conn,"student_info");

$qr_string = $_POST["qr_code"];
$sql = "SELECT student_id, 
			   student_first_name, 
			   student_last_name, 
			   student_contact, 
			   student_email,
			   student_adding_date,
			   qr_string
			   FROM student_info WHERE qr_string = '$qr_string'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	
	$student_id = $row["student_id"];
	$student_first_name = $row["student_first_name"];
	$student_last_name = $row["student_last_name"];
	$student_contact = $row["student_contact"];
	$student_email = $row["student_email"];
	$student_adding_date = $row["student_adding_date"];
	$qr_string = $row["qr_string"];
}
echo "
<html>
<head>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
  <title>Student Record Updation</title>
</head>
<body>
<form action = 'update_submit.php' method='post'>
<input type = 'hidden' name = 'qr_string' value = '$qr_string'>
<center>
<p>
<label>First Name<input type = 'text' name = 'student_first_name' value = '$student_first_name'>
<p>
<label>Last Name
<input type='text' name='student_last_name' value = '$student_last_name'>
</label> 
</p>
<p>
<label>Contact 
<input type='text' name='student_contact' value = '$student_contact'>
</label>
</p>
<p>Email
<input type='text' name='student_email' value = '$student_email'>
</label>
</p>
<br>
</center>
<center><input type='submit' value = 'SUBMIT'>&nbsp &nbsp &nbsp &nbsp &nbsp <input type='reset' value = 'CLEAR'></center>
</form>
<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
</body>
</html>";

?> 
