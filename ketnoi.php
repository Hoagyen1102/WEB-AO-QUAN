<?php
$conn = mysqli_connect("127.0.0.1:3307","root","","CNPM");
if ($conn -> connect_errno) {
  echo "Kết nối mysqli lỗi:". $conn -> connect_error;
  exit();
}
?>