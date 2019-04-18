<?php
session_start();

$comment = $_POST['comment'];

// Good place to validate
if (140 < strlen($comment)) {
  //echo "comment was too long. please shorten it.";
  $_SESSION['message'] = "Comment was too long. Please shorten it.";
  $_SESSION['good'] = false;
//header("Location: forum.php");
  exit;
}
if (0 >= strlen($comment)) {
  $_SESSION['good'] = false;
  $_SESSION['message'] = "Please enter a comment";
 // header("Location: forum.php");
  exit;
}
  
require_once 'Dao.php';
$dao = new Dao();
$dao->saveComment($comment); 
   
$_SESSION["logged_in"] = true;         
$_SESSION['message'] = "Thanks for posting!";
$_SESSION['good'] = true;
//header('Location: forum.php');
exit;