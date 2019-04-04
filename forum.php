<?php
session_start();
require_once 'Dao.php';
   $dao = new Dao();
?>

<html>
<body background="forumback.jpg">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<head> 
    <link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="comments.css"> 
<title>MouseTrackr</title> </head>

<nav>
<ul>
  <li><a href="index.php">Home</a></li>
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
  <li><a class="active" href="forum.php">Discussion</a></li>
  <li style="float:right"><a href="about.php">Account</a></li>
</ul>
</nav>
 
<?php require 'footer.html';?>
<h2 class="comhead">Recent Comments:</h2>

 <?php
   $comments = $dao->getComments();
   echo "<table id='comments'>";
   foreach ($comments as $comment) {
     echo "<tr><td>" . htmlspecialchars($comment['comment_content']) . "</td><td>{$comment['date_created']}</td></tr>";
   }
   echo "</table>";
if(!(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)){
    echo '<span style="color:#383838;background-color:white;padding:10;"><strong>You are not signed in. You can <a href="about.php">sign in</a> if you want to leave a comment.</strong></span>';

}else{
   ?>
<form method="post" action="comment_handler.php">
<div class="comment">Add a comment: <input type="text" name="comment">
</div> <div class= "but"><input type="submit" value="Submit"></div>';
      <?php
    if (isset($_SESSION['message'])) {
        $sentiment = (isset($_SESSION['good']) && ($_SESSION['good'])) ? "good" : "bad";
        echo "<div class='" . $sentiment . "' id='message'>" . $_SESSION['message'] . "</div>";
      }
      unset($_SESSION['message']);
      ?>

    </form>

  <?php   }?>
  </body>
</html>

