<?php
include('ketnoi.php');
$sql_brand="SELECT * from brands";
$query_brand = mysqli_query($conn, $sql_brand);
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $price = addslashes($_POST['price']);
    $quantily = $_POST['quantily'];
    $description = ($_POST['description']);
    $brand_id = $_POST['brand_id'];
    $sql = "INSERT into products (prd_name, image, price, quantily, description, brand_id)
    values ( '$prd_name', '$image','$price', $quantily,'$description',$brand_id)";
$query = mysqli_query($conn, $sql);
move_uploaded_file($image_tmp, $image );
header("location: /CNPM/qlsp.php");
}
?>
<!DOCTYPE html>
<html lang="en"></html>

<head>
    <meta charset ="UTF-8">
    <meta http-equiv="'X-UA-Compatible" content="IE=edge">
    <title>Tech2ect Ecommerce Tutorial</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<div class="container-fluid">
<div class="card">
<div class="card-header"> 
    <h6><strong>THÊM SẢN PHẨM</h6></strong>
</div> 
<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">Tên sản phẩm</label>
    <input type="text" name="prd_name" class="form-control" required>
</div>
<div class="form-group">
    <label for="">Ảnh sản phẩm</label>
    <input type="file" name="image">
</div>
<div class="form-group">
    <label for="">Giá sản phẩm</label>
    <input type="text" name="price" class="form-control" required>
</div>
<div class="form-group">
    <label for="">Số lượng sản phẩm</label>
    <input type="number" name="quantily" class="form-control" required>
</div>
<div class="form-group">
    <label for="">Mô tả sản phẩm</label>
    <textarea name="description" class="form-control" required></textarea>
</div>

<div class="form-group">
    <label for="">Phân loại sản phẩm</label>
    <select class="form-control" name="brand_id">
<?php
    while($row_brand = mysqli_fetch_assoc($query_brand)){?>
<option value ="<?php echo $row_brand['brand_id'];?>"> <?php echo $row_brand['brand_name'];?></option>}
 <?php }?>
</select>
</div>
<button name= "sbm" class ="btn btn-success" type="submit">Thêm</button>
</form>
</div>
</div>
</div>