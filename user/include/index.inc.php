<?php
session_start();

if (isset($_POST['delete_event'])) {
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
  header("Location: http://localhost/spers/user/index.php");
  exit();

} elseif (isset($_POST['delete_equip'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "DELETE FROM bookingequipment WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Delete Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/user/index.php");
  exit();

} elseif (isset($_POST['delete_faci'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "DELETE FROM bookingfacilities WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Delete Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/user/index.php");
  exit();
}
