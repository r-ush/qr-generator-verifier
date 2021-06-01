<?php
// Include the qrlib file 
include 'phpqrcode/qrlib.php'; 
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
  <title>QR Code Generated</title>
</head>";
$qr_code = $_POST["qr_code"];

$text = "QR Code : ". $qr_code; 

// $path variable store the location where to 
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = 'images/'; 
$file = $path.uniqid().".png"; 

// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 8; 
$frame_Size = 8; 

// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 

// Displaying the stored QR code from directory 
echo "<center><img src='".$file."'></center>"; 
echo "<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>";

?> 
