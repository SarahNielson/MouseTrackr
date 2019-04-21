<?php
session_start();
require 'nava.html';
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


  <body background="loginback.jpg">
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
	<div><label for="email">Email:     </label>
      <input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type="text" 	id="email" name="email"></div>
      <div>Password: <input type="password" id="password" name="password"></div>
		
      <div><input type="submit" value="Login"></div>
  	  </form>
<form method="post" action="create_user.php">
<div id="new"> <span id="create"> New here? <a style="color:white;" href="create_user.php">Create An Account</a> </span></div>
 	</form>

	<?php
}
      		
     		 ?>
  </body>

<?php require 'footer.html';?>
</html>