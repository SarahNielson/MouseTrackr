<?php
  session_start();
  // Pretend i'm looking this up in a database
  //$username_in_the_database = "abc123";
  //$password_in_the_database = "abc123";
  require_once "User.php";
	$user1 = new User("sarah", "123abc");
	$user2 = new User("other", "abc123");
 // if (($password_in_the_database != $_POST["password"])|| $username_in_the_database!= $_POST["username"]) {
  //  $_SESSION['message'] = "Error: the information was incorrect.";
  //  header("Location: about.php");
 //   exit();
//  } else {
 //   $_SESSION['logged_in'] = true;
 //   header("Location: index.php");
 // }
if ($user2->isPasswordValid("abc123")) {
  echo "access granted";
}