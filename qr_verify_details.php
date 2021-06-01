<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$dbname = "student_info";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
echo "<html><head>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
  <title>QR Code Verification</title>
</head>";
echo "<br>";
 $qr_string = $_POST["qr_string"];
 mysqli_select_db($conn,"student_info");

$sql = "SELECT count(*) as counts FROM student_info WHERE qr_string = '$qr_string'";
$result2 = $conn->query($sql);
while($row = $result2->fetch_assoc()) 
{
	$counts = $row["counts"];
}
if ($counts == 0)
{
	
	echo "Wrong QR Code";
}
	
if ($counts <> 0)
	{
	echo "Student is Verified";
	$sql = "SELECT student_id, 
			   student_first_name, 
			   student_last_name, 
			   student_contact, 
			   student_email,
			   student_adding_date,
			   qr_string
			   FROM student_info WHERE qr_string = '$qr_string'";
$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
		echo "<html> 
	<head> 
		<style> 
			table, th, td { 
				border: 1px solid black; 
				border-collapse: collapse; 
			} 
			
			th, td { 
				padding: 10px; 
			} 
			
			th, td { 
				text-align: center; 
			} 
		</style> 
	</head> 
	
	<body>
	<br><br>
	<center><h2>Student Info Update</h2></center></center> 
	<table style='width:50%' align = 'center'>
			<tr> 
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Contact</th> 
				<th>Email</th>
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
			</tr> ";
	}
	echo 
	"</table>
	<br><br>
	<br>";
	}
}

echo"
<form action = 'qr_verify.php' method = 'post'>
<center><input type='submit' value = 'VERIFY ANOTHER'></center>
</form>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
</body> 
</html>"; 
?>