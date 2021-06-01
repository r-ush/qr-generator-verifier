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
//echo "Connected successfully";
echo "<html><head>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
  <title>Updation Submit</title>
</head>";
echo "<br>";
 
 mysqli_select_db($conn,"student_info");
 
    $student_first_name = $_POST["student_first_name"];
	$student_last_name = $_POST["student_last_name"];
	$student_contact = $_POST["student_contact"];
	$student_email = $_POST["student_email"];
	$qr_string = $_POST["qr_string"];
	
	$sql = "UPDATE student_info SET 
				student_first_name = '$student_first_name', 
				student_last_name = '$student_last_name', 
				student_contact = '$student_contact',
				student_email = '$student_email'
			WHERE qr_string = '$qr_string'";
			
if (!$conn->query($sql) === TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    
	echo "Record Updated Successfully";
}

echo "<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
<form action = 'update.php'>
<center><input type='submit' value = 'UPDATE ANOTHER'></center>
</form>
";
$conn->close();
 
?>