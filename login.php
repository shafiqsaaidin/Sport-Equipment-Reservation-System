<?php
session_start();

// if (!isset($_SESSION['username'])) {
//   header("Location: login.php");
//   exit();
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SPERS Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="include/login.inc.php">
      <?php if(isset($_SESSION['message'])): ?>
        <div id="msgBox" class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>
      <h1 class="h3 mb-3 font-weight-normal">SPERS Login</h1>
      <input type="text" class="form-control" placeholder="Matric/Staff No" required autofocus name="user_id">
      <input type="password" class="form-control" placeholder="Password" required name="password">
      <select class="form-control p-1" name="account" required>
        <option hidden>Select Status</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      <br><br><br>
      <p>Don't Have an account ?</p>
      <a href="register.php" clas="btn btn-link">Register Now</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>
