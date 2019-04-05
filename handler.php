<?php
  session_start();

$email = $_POST['email'];
$password = $_POST['password'];


require_once "Dao.php";

$errors = array(); /* declare the array for later use */
         
       
         
        if(0 >= strlen($password) ||(0 >= strlen($email)))
        {
            $errors[] = 'The fields must not be empty.';
          $_SESSION['form_input'] = $_POST;
             $_SESSION['good'] = false;               
            $_SESSION['message'] = "The the required fields must be filled.";
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
		$user= $dao->getUser ($email, $password);
		if(empty($user)){
        		$_SESSION['form_input'] = $_POST;
			$_SESSION['good']= false;
			$_SESSION['message']= 'Invalid login credentials';
    			header("Location: about.php");
		}else{
   			 $_SESSION['logged_in'] = true;
			$_SESSION['email']= $email;
			$_SESSION['password']=$password;
   		      //$_SESSION['username']=htmlspecialchars($user['username']);
			$_SESSION['good']= true;
			$_SESSION['message']= 'Welcome, ' . $_SESSION['email'] . '. <a href="forum.php">Proceed to the forum 			overview</a>.';
    			header("Location: about.php");

	}}
?>