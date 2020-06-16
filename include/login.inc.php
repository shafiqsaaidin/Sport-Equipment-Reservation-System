<?php
session_start();

if (isset($_POST['login'])) {
  require '../model/connection.php';

  $user_id = $_POST['user_id'];
  $password = $_POST['password'];
  $account = $_POST['account'];

  if (empty($username) || empty($password)) {
    header("Location: ../login.php?error=emptyfields");
    exit();
  } else {
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = mysqli_fetch_array($result)) {
      $pwd_check = password_verify($password, $row['password']);

      if ($pwd_check == false) {
        $_SESSION['message'] = "Wrong Password";
        $_SESSION['msg_type'] = "danger";
        header("Location: http://localhost/spers/login.php?login=error");
        exit();
      } elseif ($pwd_check == true) {
        if ($account == 'admin' && $row['user_type'] == 'admin') {
          $_SESSION['user_id'] = $row['user_id'];

          header("Location: http://localhost/spers/admin/index.php");
          exit();
        } elseif ($account == 'user' && $row['user_type'] == 'user') {
          $_SESSION['user_id'] = $row['user_id'];

          header("Location: http://localhost/spers/user/index.php");
          exit();
        } else {
          header("Location: http://localhost/spers/login.php?login=error");
          exit();
        }
      } else {
        header("Location: http://localhost/spers/login.php?login=error");
        exit();
      }
    }
  }
} else {
  header("Location: ../login.php");
  exit();
}
?>
