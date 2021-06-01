<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$dbname = "student_info";
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password);
// Selecting the DB 
 mysqli_select_db($conn,"student_info");
echo "<html><head>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
  <title>Student Record Deletion</title>
</head>";
$qr_string = $_POST["qr_code"];

$sql = "DELETE from student_info WHERE qr_string = '$qr_string'";
if (!$conn->query($sql) === TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if (!$conn->query($sql) === TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
else {  
	echo "The record deleted Successfully";	
}
echo "<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
<form action = 'delete.php'>
<center><input type='submit' value = 'DELETE ANOTHER'></center>
</form>
";
?>
