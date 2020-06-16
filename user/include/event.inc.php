<?php
session_start();

if(isset($_POST["booking"]) && !empty($_FILES["file"]["name"])){
  require("../../model/connection.php");

  $user_id = $_POST['user_id'];
  $name = $_POST['name'];
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActulExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActulExt, $allowed)) {
    if ($fileError === 0 ) {
      if ($fileSize < 500000) {
        $fileNameNew = uniqid('', true).".".$fileActulExt;
        $fileDestination = 'uploads/'.$fileNameNew;

        $stmt = $conn->prepare("INSERT INTO event (user_id, name, image) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user_id, $name, $fileDestination);
        $stmt->execute();
        $stmt->close();

        move_uploaded_file($fileTmpName, "../".$fileDestination);

        $_SESSION['message'] = "Upload Successfull";
        $_SESSION['msg_type'] = "success";
        header("Location: http://localhost/spers/user/event.php?upload=success");
        exit();
      } else {
        $_SESSION['message'] = "File size is to big";
        $_SESSION['msg_type'] = "danger";
        header("Location: http://localhost/spers/user/event.php?upload=error");
      }
    } else {
      echo "There was an arror uploading your file!";
    //   $msgClass = "red";
    }
  }

}else{
    $statusMsg = 'Please select a file to upload.';
}
