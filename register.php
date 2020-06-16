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
    <title>SPERS Registration Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="css/signin.css" rel="stylesheet"> -->
  </head>

  <body>
    <div class="col-lg">
      <div class="col-md-6 offset-md-3">
        <h1 class="text-center mb-4">SPERS Registration Form</h1>
        <?php if(isset($_SESSION['message'])): ?>
          <div id="msgBox" class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            ?>
          </div>
        <?php endif ?>

        <form method="post" action="include/register.inc.php">
          <div class="mb-3">
            <label for="fullName">Matric / Staff ID</label>
            <input type="text" class="form-control" id="fullName" name="userID" placeholder="Matric / Staff ID" required>
          </div>

          <div class="mb-3">
            <label for="fullName">Full Name <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name">
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="userName" placeholder="Username" required>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
          </div>
          <div class="mb-3">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Your Password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="password">Comfirm Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirm Password" name="password_2" required>
          </div>

          <div class="mb-3">
            <label>Account Type</label>
            <select class="form-control p-1" name="account" required>
              <option hidden>Select Status</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
          <br>
          <center>
            <p>Already register ?</p>
            <a href="login.php" clas="btn btn-link">Login</a>
          </center>
        </form>
      </div>
    </div>






  </body>
</html>
