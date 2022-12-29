<?php
include('ketnoi.php');
$id=$_GET['id'];
$sql = "DELETE from products where prd_id=$id";
$query = mysqli_query($conn, $sql);
header("location: /WEB-AO-QUAN/qlsp.php");
?>