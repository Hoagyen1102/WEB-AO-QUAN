<div class="pro-container">
<?php
    include('ketnoi.php');
    $search = addslashes($_GET['timkiem']);
    if (empty($search)){
        echo "Yêu cầu nhập dữ liệu vào ô trống";
    }else{
        $query = "select * from products where prd_name like '%$search%'";
        $sql = mysqli_query($conn,$query);
        $num = mysqli_num_rows($sql);
        if ($num > 0 && $search != ""){
    $i=1;
    while($row = mysqli_fetch_assoc($sql))
        {
    ?>
            <div class="pro" onclick="window.location.href='index.php?quanly=xulygiohang&id=<?php echo $row['prd_id'];?>';">
                <img src="img/<?php echo $row['image'];?>">
                <div class="des">
                    <span><?php echo nl2br($row['description']);?></span>
                    <h3><?php echo $row['prd_name'];?></h3>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Giá bán: <?php echo $row ['price'];?> $</h3>
                </div>
            </div>
<?php
        } 
    }else {
        echo "Khong tim thay ket qua!";}
}
?>
</div>