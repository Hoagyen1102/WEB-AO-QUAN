<?php
include('ketnoi.php');
$id = $_GET['id'];
$sql_brand="SELECT * from brands";
$query_brand = mysqli_query($conn, $sql_brand);
$sql_up ="SELECT * from products where prd_id = $id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);
if(isset($_POST['sbm'])){ 
    $prd_name = $_POST['prd_name'];
    if($_FILES['image']['name']==''){
        $image = $row_up['image'];
    }else{
        $image = $row_up['image'];}
    $price = $_POST['price'];
    $quantily = $_POST['quantily'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];
    $sql = "UPDATE products SET prd_name = '$prd_name', image = '$image', price = '$price', 
    quantily = $quantily, description = '$description' , brand_id = $brand_id WHERE prd_id = $id";
    $query = mysqli_query($conn, $sql);
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
    <h6><strong>SỬA SẢN PHẨM</strong></h6> 
</div> 
<div class="card-body">
    <form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">Tên sản phẩm</label>
    <input type="text" name="prd_name" class="form-control" required value="<?php  echo $row_up['prd_name'];?>">
</div>
<div class="form-group">
    <label for="">Ảnh sản phẩm</label> 
    <input type="file" name="image">
</div>
<div class="form-group">
    <label for="">Giá sản phẩm</label>
    <input type="text" name="price" class="form-control" required value="<?php echo  $row_up['price'];?>">
</div>
<div class="form-group">
    <label for="">Số lượng sản phẩm</label>
    <input type="number" name="quantily" class="form-control" required value="<?php  echo $row_up['quantily'];?>">
</div>
<div class="form-group">
    <label for="">Mô tả sản phẩm</label>
    <textarea name="description" class="form-control" required><?php echo $row_up['description'];?></textarea>
</div>
<div class="form-group">
    <label for="">Phân loại sản phẩm</label>
    <select class="form-control" name="brand_id">
<?php
    while($row_brand = mysqli_fetch_assoc($query_brand)){?>
    <option value ="<?php echo $row_brand['brand_id'];?>"> <?php echo $row_brand['brand_name'];?></option>}
<?php } ?>
</select>
</div>
<button name= "sbm" class ="btn btn-success" type="submit">Sửa</button>
</form>
</div>
</div>
</div>