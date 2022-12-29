<?php
include('ketnoi.php');
$prd_id=$_GET['id'];
if (isset($_SESSION['username']) && $_SESSION['username']) {
    $username = $_SESSION['username'];
}else{
    $username = "khách";
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from cart where prd_id=$prd_id and username='$username'"));
$quantity = $row['quantity'] + 1;
$sql_up = "UPDATE cart SET quantity = $quantity where prd_id = $prd_id and username='$username'";
$query_up = mysqli_query($conn, $sql_up);
header('location: index.php?quanly=giohang')
?>