<?php
session_start();
require_once 'Dao.php';
   $dao = new Dao();
?>

<html>
<body background="forumback.jpg">
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<head> 
    <link rel="stylesheet" href="style.css"> 
<link rel="stylesheet" href="comments.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="closeMess.js"></script>
<title>MouseTrackr</title> </head>

<nav>
<ul>
  <li><b><a href="index.php">MouseTrackr</a></b></li>
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
 <h2 class="comhead">Recent Comments:</h2>
<?php 
include 'footer.html';
if(!(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true)){
    echo '<span style="color:#660022;background-color:white;padding:5; margin:10;"><strong>You are not signed in. Please <a href="about.php">sign in</a> if you want to leave a comment.</strong></span>';
}else{
?>
   <form method="post" action="comment_handler.php">
  <div class= "comment">Add a comment: <input size="100" value="<?php echo isset($_SESSION['form_input']['comment']) ? $_SESSION    ['form_input']['comment'] : ''; ?>" type="text" id="comment" name="comment"></div> 
  <div class= "but"><input type="submit" value="Submit"></div>
      <?php
    if (isset($_SESSION['message'])) {
        $sentiment = (isset($_SESSION['good']) && ($_SESSION['good'])) ? "good" : "bad";
        echo "<div class='" . $sentiment . "' id='message'>" . $_SESSION['message'] . "<span class='close'>X</span></div>";
      }
      unset($_SESSION['message']);
      ?>

    </form>

  <?php   }
  
   $comments = $dao->getComments();
//echo "<h2 class="comhead">Recent Comments:</h2>";
   echo "<table id='comments'>";
   foreach ($comments as $comment) {
     echo "<tr><td>" . htmlspecialchars($comment['comment_content']) . "</td><td>{$comment['date_created']}</td>";
   }
   echo "</table>";

	?>


  </body>
</html>

