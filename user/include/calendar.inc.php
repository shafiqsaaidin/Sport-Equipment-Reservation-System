<?php
header('Content-Type: application/json');

require("../../model/connection.php");

$data = array();
$sql = "SELECT * FROM bookingfacilities INNER JOIN facilities ON faci_id = facilities.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultSet = $stmt->get_result();
$result = $resultSet->fetch_all(MYSQLI_ASSOC);

// print_r($result);

foreach($result as $row) {
  $data[] = array (
    'resourceId' => 'SPERS',
    'title' => $row['name'],
    // 'description' => $row['location'],
    'start' => $row["start_date"]."T".$row["start_time"],
    'end' => $row['end_date']."T".$row['end_time'],
  );
}

echo json_encode($data);
