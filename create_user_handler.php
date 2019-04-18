<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$valid = true;
$messages = array();

require_once 'Dao.php';
$dao = new Dao();
$rows=$dao->checkUser ($email, $password1);
if($rows>0){
	$messages[] = "There is already an account associated with that email.";
  	$valid = false;
}
if (empty($username)) {
  $messages[] = "Please enter a username";
  $valid = false;
}
if (empty($email)) {
  $messages[] = "Please enter an email";
  $valid = false;
}
if (empty($password1)) {
  $messages[] = "Please set a password";
  $valid = false;
}
if ($password1 != $password2) {
  $messages[] = "Passwords don't match";
  $valid = false;
}
if (!$valid) {
    $_SESSION['messages'] = $messages;
    $_SESSION['form_input'] = $_POST;
    header("Location: create_user.php");
    exit();
}

<<<<<<< HEAD
$salted = "2342453rgdfgdfsg4657".$password1."fg67drtgr5r6y4gt5";
$hashed = password_hash($salted, PASSWORD_BCRYPT);
$dao->createUser ($username, $email, $hashed);
=======
$dao->createUser ($username, $email, $password1);
>>>>>>> 88d9b485ca40cfd89270ba29fa477e3cb2f6ea56
header("Location: about.php");

exit;
?>