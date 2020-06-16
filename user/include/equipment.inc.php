<?php
session_start();

if (isset($_POST['booking'])) {
  require("../../model/connection.php");

  $user_id = $_POST['user_id'];
  $equipment_id = $_POST['equipment_id'];
  $quantity = $_POST['quantity'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];

  $sql = "SELECT * FROM equipment WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $equipment_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_array($result);
  $stmt->close();

  if ($quantity > $row['equip_quantity']) {
    $_SESSION['message'] = "Quantity is to much";
    $_SESSION['msg_type'] = "danger";
    header("Location: http://localhost/spers/user/equipment.php?submit=error");
    exit();
  } else {
    $sql = "INSERT INTO bookingequipment (user_id, equip_id, quantity, booking_date, deadline_date, booking_time, deadline_time)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $user_id, $equipment_id, $quantity, $start_date, $end_date, $start_time, $end_time);
    $stmt->execute();
    $stmt->close();

    $_SESSION['message'] = "Booking Successfull";
    $_SESSION['msg_type'] = "success";
    header("Location: http://localhost/spers/user/equipment.php?submit=success");
    exit();
  }

  $conn->close();
}
