<?php
  session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$salted = "2342453rgdfgdfsg4657" . $password . "@#!FDFfgd#@#$dfvr122";
$hashed = md5($salted);

require_once "Dao.php";

$errors = array(); /* declare the array for later use */
         
       
         
        if(0 >= strlen($password) ||(0 >= strlen($email)))
        {
             $errors[] = 'The fields must not be empty.';
             $_SESSION['form_input'] = $_POST;
             $_SESSION['good'] = false;               
             $_SESSION['message'] = "The required fields must be filled.";
	     header('Location: about.php');
	     exit;
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
		$user= $dao->getUser ($email, $hashed);
		if(empty($user)){
        		$_SESSION['form_input'] = $_POST;
			$_SESSION['good']= false;
			$_SESSION['message']= 'Invalid login credentials. Please try again or create an account.';
    			header("Location: about.php");
		}else{
			unset($_SESSION['form_input']);
			$dao1 = new Dao();
			$name = $dao1->getUsers ($email);
			foreach ($name as $names) {
    			$_SESSION['name']= $names;
  			 }
   			$_SESSION['logged_in'] = true;
			$_SESSION['email']= $email;
			$_SESSION['good']= true;
			$_SESSION['message']= 'Welcome, ' . $_SESSION['name'] . '. <a href="forum.php">Proceed to the forum overview</a>.';
    			header("Location: about.php");

	}}
?>