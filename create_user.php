<?php
session_start();
//regular expression used to validate email address
?>

<html>
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="closeMess.js"></script>
  <head>
    <link rel="stylesheet" href="createustyle.css">
  </head>
  <body>
    <h1>New User Sign-Up:</h1>
    <form method="post" action="create_user_handler.php">
      <div><label for="username">Username:</label>
        <input value="<?php echo isset($_SESSION['form_input']['username']) ? $_SESSION['form_input']['username'] : ''; ?>" type="text" id="username" name="username"></div>

<div><label for="email">Email:</label>
        <input value="<?php echo isset($_SESSION['form_input']['email']) ? $_SESSION['form_input']['email'] : ''; ?>" type="text" id="email" name="email" pattern= "^[\w]{1,}[\w.+-]{0,}@[\w-]{1,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$"></div>
      <div><label for="password1">Password:</label> <input type="password" id="password1" name="password1"></div>
      <div><label for="password2">Retype Password:</label> <input type="password" id="password2" name="password2"></div>
      <?php
      if (isset($_SESSION['messages'])) {
        foreach($_SESSION['messages'] as $message) {
          echo "<div class='bad' id='message'><span class='close'>X</span>{$message}</div>";
        }
      }
      unset($_SESSION['messages']);
      unset($_SESSION['form_input']);
      ?>
      <div><input type="submit" value="Create Account"></div>
    </form>

  </body>
</html>