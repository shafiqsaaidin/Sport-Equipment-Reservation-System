<?php
session_start();

if (isset($_POST['booking'])) {
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
    header("Location: http://localhost/spers/user/facilities.php?submit=error");
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
    header("Location: http://localhost/spers/user/facilities.php?submit=success");
    exit();
  } else {
    echo 'soon';
  }
}
