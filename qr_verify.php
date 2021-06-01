<?php
echo "
<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
  <title>Add New Student</title>
</head>
<body>
<center>
<h2>Student Info QR Verification</h2></center>
<br><br>
<form action = 'qr_verify_details.php' method='post'>
<center>
<p>
<label>QR Code
<input type='text' name='qr_string' required>
</label> 
</p>
<br>
</center>
<center><input type='submit' value = 'VERIFY'>&nbsp &nbsp &nbsp &nbsp &nbsp <input type='reset' value = 'CLEAR'></center>
</form>
<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
</body>
</html>";

?>