<?php
    include('ketnoi.php');
    $id = $_GET['id'];
    $sql="SELECT * FROM products inner join brands on products.brand_id = brands.brand_id where brands.brand_id = $id";
    $query = mysqli_query($conn, $sql);
?>  
<div class="pro-container">
<?php
        while($row = mysqli_fetch_assoc($query))
        {
    ?>
            <div class="pro" onclick="window.location.href='#';">
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
?>
</div>