<?php
include('ketnoi.php');
$id=$_GET['id'];
if (isset($_SESSION['username']) && $_SESSION['username']) {
    $username = $_SESSION['username'];
}else{
    $username = "khách";
}
$sql = "DELETE from cart where prd_id=$id and username='$username'";
$query = mysqli_query($conn, $sql);
header('location: index.php?quanly=giohang');
?>