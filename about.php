<?php
session_start();
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="style.css"> 
  </head>
<nav>
<ul>
  <li><a href="index.php">Home</a></li>
  <li class="dropdown">
    <a href="wdwcalendar.php" class="dropbtn">Walt Disney World Resort</a>
    <div class="dropdown-content">
      <a href="mk.php">Magic Kingdom</a>
      <a href="epcot.php">Epcot</a>
      <a href="ak.php">Animal Kingdom</a>
      <a href="hs.php">Hollywood Studios</a>
    </div> </li>
  <li class="dropdown"><a href="dlcalendar.php">Disneyland Resort</a>
<div class="dropdown-content">
      <a href="dlp.php">Disneyland Park</a>
      <a href="ca.php">California Adventure</a>
    </div> </li></li>
  <li><a href="forum.php">Forums</a></li>
  <li style="float:right"><a class="active" href="about.php">Account</a></li>
</ul>
</nav>
  <body>
    <h1>Login Page</h1>
    <form method="post" action="handler.php">
<div><label for="email">Email:</label>
      <input type="text" id="email" name="email"></div>
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
<form method="post" action="logout.php">
<div><input type="submit" value="Logout"></div>
 </form>
  </body>

<?php require 'footer.html';?>
</html>