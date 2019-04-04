<?php
  session_start();

$email = $_POST['email'];
$password = $_POST['password'];

  // Pretend i'm looking this up in a database
  //$username_in_the_database = "abc123";
  //$password_in_the_database = "abc123";

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
    echo 'You are already signed in, you can <a href="logout.php">sign out</a> if you want.';
}
require_once "Dao.php";

$errors = array(); /* declare the array for later use */
         
        if(!isset($_POST['email']))
        {
            $errors[] = 'The username field must not be empty.';
        }
         
        if(!isset($_POST['password']))
        {
            $errors[] = 'The password field must not be empty.';
        }
         
        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo 'Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        }else{
	$dao = new Dao();
	$user= $dao->getUser ($email, $password);
   	 $_SESSION['logged_in'] = true;
	$_SESSION['email']= $email;
	$_SESSION['password']=$password;
     $_SESSION['username']=htmlspecialchars($user['username']);
    	//header("Location: index.php");
echo 'Welcome, ' . $_SESSION['email'] . '. <a href="forum.php">Proceed to the forum overview</a>.';	
	echo "<table id='user'>";
   	foreach ($user as $use) {
     	echo "<tr><td>" . htmlspecialchars($use['username']) . "</td><td>{$use['password']}</td></tr>";
   }
echo "</table>";
	}
?>