<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$dbname = "student_info";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<html><head>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
  <title img = 'css.jpg'>Welcome To QR Code Generation</title>
</head>";
echo "<br><br><br>";
 
 mysqli_select_db($conn,"student_info");
 

$sql = "SELECT student_id, 
			   student_first_name, 
			   student_last_name, 
			   student_contact, 
			   student_email,
			   student_adding_date,
			   qr_string
			   FROM student_info order by student_id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	echo "<html> 
 
</head> 

<body> 
<center>
<h2>Student Info QR Generation</h2></center>
<form action = 'generate_qr.php' method = 'post'>
<table style='width:70%' align = 'center'>
	
		<tr> 
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact</th> 
			<th>Email</th>
			<th>QR Code</th>
		</tr> ";

while($row = $result->fetch_assoc()) {
	
	$student_id = $row["student_id"];
	$student_first_name = $row["student_first_name"];
	$student_last_name = $row["student_last_name"];
	$student_contact = $row["student_contact"];
	$student_email = $row["student_email"];
	$student_adding_date = $row["student_adding_date"];
	$qr_string = $row["qr_string"];			 
	echo
	"<tr> 
			<td>$student_id</td>
			<td>$student_first_name</td> 
			<td>$student_last_name</td>
			<td>$student_contact</td>
			<td>$student_email</td>
			<td><input type = 'radio' name = 'qr_code' value = $qr_string required></td>
		</tr> ";
}
echo 
"</table>
<br><br>
<center><input type='submit' value = 'GENERATE QR'>&nbsp &nbsp &nbsp &nbsp<input type='reset' value = 'CLEAR'></center>
</form>
<br>
<center>
<form action = 'add.php' method = 'post'>
<input type='submit' value = 'ADD'>
</form>
<form action = 'delete.php' method = 'post'>
<input type='submit' value = 'DELETE'>
</form>
<form action = 'update.php' method = 'post'>
<input type='submit' value = 'UPDATE'>
</form>
<form action = 'qr_verify.php' method = 'post'>
<input type='submit' value = 'VERIFY'>
</form>
<form action = 'about.php' method = 'post'>
<input type='submit' value = 'ABOUT'>
</form>
</center>
</body> 
</html>";
}
?>