<?php
session_start();
require_once 'Dao.php';
   $dao = new Dao();
?>

<html>
  <head>
    <link rel="stylesheet" href="comments.css">
  </head>
  <body>
    <h1>Comments</h1>
    <form method="post" action="comment_handler.php">
      <div>comment: <input type="text" name="comment"></div>
      <div><input type="submit" value="Submit"></div>
      <?php
      if (isset($_SESSION['message'])) {
        $sentiment = (isset($_SESSION['good']) && ($_SESSION['good'])) ? "good" : "bad";
        echo "<div class='" . $sentiment . "' id='message'>" . $_SESSION['message'] . "</div>";
      }
      unset($_SESSION['message']);
      ?>

    </form>

   <?php
   $comments = $dao->getComments();
   echo "<table id='comments'>";
   foreach ($comments as $comment) {
     echo "<tr><td>" . htmlspecialchars($comment['comment_content']) . "</td><td>{$comment['date_created']}</td></tr>";
   }
   echo "</table>";
   ?>
  </body>
</html>