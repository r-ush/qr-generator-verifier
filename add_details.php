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
  <title>Record Addition</title>
</head>";
echo "<br>";
 
 mysqli_select_db($conn,"student_info");
 
    $first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$sql = "INSERT INTO student_info (student_first_name,student_last_name,student_contact,student_email) 
				VALUES ('$first_name','$last_name','$contact','$email')";

if (!$conn->query($sql) === TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    
	echo "New Student Added Successfully";
	
}
echo "<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
<form action = 'add.php'>
<center><input type='submit' value = 'ADD ANOTHER'></center>
</form>"
;

$conn->close();
 
 
?>