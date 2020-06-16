<?php
session_start();

if (isset($_POST['new'])) {
  require("../../model/connection.php");

  $name = $_POST['name'];
  $quantity = $_POST['quantity'];

  $sql = "INSERT INTO equipment (equip_name, equip_quantity)
          VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $name, $quantity);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Add Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/equipment.php?add=success");
  exit();

} elseif (isset($_POST['delete'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];

  $sql = "DELETE FROM equipment WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Delete Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/equipment.php?delete=success");
  exit();
} elseif (isset($_POST['edit'])) {
  require("../../model/connection.php");

  $id = $_POST['id'];
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];

  $sql = "UPDATE equipment SET equip_name = ?, equip_quantity = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $name, $quantity, $id);
  $stmt->execute();
  $stmt->close();
  $conn->close();

  $_SESSION['message'] = "Update Successfull";
  $_SESSION['msg_type'] = "success";
  header("Location: http://localhost/spers/admin/equipment.php?add=success");
  exit();
}
