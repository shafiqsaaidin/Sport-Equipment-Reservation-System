<?php
session_start();


if (isset($_POST['register'])) {
  require '../model/connection.php';

  $user_id = $_POST['userID'];
  $fullName = $_POST['fullName'];
  $userName = $_POST['userName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_2 = $_POST['password_2'];
  $account = $_POST['account'];

  if (empty($user_id) || empty($password) || empty($password_2)) {
    header("Location: ../register.php?error=emptyfields");
    exit();
  } elseif ($password !== $password_2) {
    $_SESSION['message'] = "Password not match";
    $_SESSION['msg_type'] = "danger";
    header("Location: http://localhost/spers/register.php");
    exit();
  } else {
    // Check if the username already exist
    $sql = "SELECT user_id FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $result_check = $stmt->num_rows;

    if ($result_check > 0) {
      $_SESSION['message'] = "User ID already exist";
      $_SESSION['msg_type'] = "danger";
      header("Location: http://localhost/spers/register.php");
      exit();
    } else {
      // password hashing
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO user (user_id, username, password, user_type, user_email, fullname) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssssss", $user_id, $userName, $hashed_password, $account, $email, $fullName);
      $stmt->execute();
      $stmt->close();

      $_SESSION['message'] = "Register Complete";
      $_SESSION['msg_type'] = "success";
      header("Location: ../login.php");
      exit();
    }
  }
  $stmt->close();
  $conn->close();
} else {
  // header("Location: ../register.php");
  // exit();
}

?>
