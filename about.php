<?php
session_start();
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <h1>Login Page</h1>
    <form method="post" action="handler.php">
<div><label for="username">Username:</label>
      Username: <input type="text" id="username" name="username"></div>
      <div>Password: <input type="password" id="password" name="password"></div>
		<?php
      		if (isset($_SESSION['message'])) {
        	echo "<div id='message'>" . $_SESSION['message'] . "</div>";
     		 }
      		unset($_SESSION['message']);
     		 ?>
      <div><input type="submit" value="Login"></div>
    </form>
<form method="post" action="create_user.php">
<div><input type="submit" value="New User"></div>
 </form>
  </body>


</html>