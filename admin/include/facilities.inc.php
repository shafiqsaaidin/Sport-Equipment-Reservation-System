<?php
session_start();

if (isset($_POST['new'])) {
  require("../../model/connection.php");

  $name = $_POST['name'];
  $status = $_POST['status'];

  $sql = "INSERT INTO facilities (name, status)
          VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $name, $status);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Add Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/facilities.php?add=success");
  exit();

} elseif (isset($_POST['delete'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "DELETE FROM facilities WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Delete Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/facilities.php?delete=success");
  exit();
} elseif (isset($_POST['edit'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];
  $name = $_POST['name'];
  $status = $_POST['status'];

  $sql = "UPDATE facilities SET name = ?, status = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $name, $status, $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Update Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/facilities.php?add=success");
  exit();
}
