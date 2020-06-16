<?php
session_start();

if (isset($_POST['approve'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "UPDATE event SET status = 'approved' WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Update Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/event.php?update=success");
  exit();
} elseif (isset($_POST['pending'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "UPDATE event SET status = 'pending' WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Update Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/event.php?update=success");
  exit();
} elseif (isset($_POST['delete'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "DELETE FROM event WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Delete Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/event.php?delete=success");
  exit();
}
