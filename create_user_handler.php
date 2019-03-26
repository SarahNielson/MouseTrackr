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

	try {
      $dao = new Dao();
      $dao->createUser($username, $email, $password1);
    } catch (Exception $e) {
      var_dump($e);
      die;
    }
echo "CONGRATS YOU CREATE A USER";
// TODO insert stuff into a user table in the database..
exit;
?>