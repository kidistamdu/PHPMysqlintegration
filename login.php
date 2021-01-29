<?php include (server.php)?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	
  <form method="post" action="login.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Login</button>
  	</div>
  	<p>
  		Not a user? <a href="login.php"><b>Register here</b></a>
  	</p>
  </form>
</body>
</html>