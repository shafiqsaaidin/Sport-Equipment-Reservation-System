<?php
session_start();

if (isset($_POST['booking_equipment'])) {
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
    header("Location: http://localhost/spers/admin/booking.php");
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
    header("Location: http://localhost/spers/admin/booking.php");
    exit();
  }

  $conn->close();
} elseif (isset($_POST['booking_facilities'])) {
  require("../../model/connection.php");

  $user_id = $_POST['user_id'];
  $facilities_id = $_POST['facilities'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];

  $today = time();
  $interval = strtotime($start_date) - $today;
  $day = floor($interval / 86400); // 1 day
  if($day < 7) {
    $_SESSION['message'] = "Booking must be 7 days earlier";
    $_SESSION['msg_type'] = "danger";
    header("Location: http://localhost/spers/admin/booking.php");
    exit();
  } elseif($day > 7) {
    // Insert data in database
    $sql = "INSERT INTO bookingfacilities (user_id, faci_id, start_date, end_date, start_time, end_time)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissss", $user_id, $facilities_id, $start_date, $end_date, $start_time, $end_time);
    $stmt->execute();
    $stmt->close();

    // Update data in facilities
    $sql = "UPDATE facilities SET status = 'Booked' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $facilities_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();


    $_SESSION['message'] = "Booking Successfull";
    $_SESSION['msg_type'] = "success";
    header("Location: http://localhost/spers/admin/booking.php");
    exit();
    $conn->close();
  }
}
