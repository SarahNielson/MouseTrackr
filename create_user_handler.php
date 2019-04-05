<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$valid = true;
$messages = array();
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
require_once 'Dao.php';
$dao = new Dao();
$rows=$dao->getUser ($email, $password1);
if($rows>0){
	$messages[] = "There is already an account associated with that email. You can <a href="about.php">sign in</a> if you want.";
  	$valid = false;
}else{
$dao->createUser ($username, $email, $password1);
header("Location: about.php");
}
exit;
?>