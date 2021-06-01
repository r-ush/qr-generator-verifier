<?php
echo "
<html>
<head>
<link rel = 'stylesheet' type = 'text/css' href = 'mycss.css'>
<link rel = 'icon' href = 'css.jpg' type = 'image/icon type'>
  <title>Add New Student</title>
</head>
<body>
<form action = 'add_details.php' method='post'>
<center>
<p>
<label>First Name
<input type='text' name='first_name' required>
</label> 
</p>
<p>
<label>Last Name 
<input type='text' name='last_name' required>
</label>
</p>
<p>Contact
<input type='text' name='contact' required>
</label>
</p>
<p>Email
<input type='text' name='email' required>
</label>
</p>
<br>
</center>
<center><input type='submit' value = 'ADD STUDENT'>&nbsp &nbsp &nbsp &nbsp &nbsp <input type='reset' value = 'CLEAR'></center>
</form>
<br>
<form action = 'index.php'>
<center><input type='submit' value = 'GO TO HOME'></center>
</form>
</body>
</html>";

?>