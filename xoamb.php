<?php
include('ketnoi.php');
$username=$_GET['username'];
$sql = "DELETE FROM member WHERE username='$username'";
$query = mysqli_query($conn, $sql);
header('location: qlmb.php');
?>