<?php
session_start();

?>
<html>
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="closeMess.js"></script>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="login.css">

    <link rel="stylesheet" href="style.css"> 
  </head>
<nav>
<ul>
  <li><b><a href="index.php">MouseTrackr</a></b></li>
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
  <li><a href="forum.php">Discussion</a></li>
  <li style="float:right"><a class="active" href="about.php">Account</a></li>
</ul>
</nav>

  <body>
    <h1>Login:</h1>
    
<?php
		if (isset($_SESSION['message'])) {
                	$sentiment = (isset($_SESSION['good']) && ($_SESSION['good'])) ? "good" : "bad";
        		echo "<div class='" . $sentiment . "' id='message'>" . $_SESSION['message'] . "<span class='close'>X</span></div>";
     		 }
      		unset($_SESSION['message']);
// Check if the user is already logged in, if yes then redirect him to welcome page
if((isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)){
    echo 'You are already signed in, but you can <a style= "color:#00BFFF;" href="logout.php">sign out</a> if you want.';
}else{ ?>
	 <form method="post" action="handler.php">
	<div><label for="email">Email:</label>
      <input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type="text" 	id="email" name="email"></div>
      <div>Password: <input type="password" id="password" name="password"></div>
		
      <div><input type="submit" value="Login"></div>
  	  </form>
<form method="post" action="create_user.php">
	<div id="new"><label id="create">New here? </label><input style= "background-color:A29B9B;" type="submit" value="Create New User"></div>
 	</form>

	<?php
}
      		
     		 ?>
  </body>

<?php require 'footer.html';?>
</html>