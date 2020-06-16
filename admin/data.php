<?php
header('Content-Type: application/json');

require_once('../model/connection.php');


if (isset($_GET['month'])) {
  $month = $_GET['month'];

  $sql = "SELECT b.name, COUNT(b.name) as total FROM bookingfacilities a INNER JOIN facilities b ON a.faci_id = b.id WHERE MONTH(start_date) = ? GROUP BY a.faci_id ";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $month);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();

  $data = array();

  foreach ($result as $row) {
    $data[] = $row;
  }

  echo json_encode($data);

} elseif (isset($_GET['pie'])) {
  $sql = "SELECT
          sum(case when status = 'booked' then 1 else 0 end) AS booked,
          sum(case when status = 'available' then 1 else 0 end) AS availble
          FROM facilities";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();

  $data2 = array();

  foreach ($result as $row) {
    $data2[] = $row;
  }

  echo json_encode($data2);
}
