<div class="pro-container">
<?php
    include('ketnoi.php');
    $sql = "SELECT * from products inner join brands on products.brand_id = brands.brand_id";
    $query = mysqli_query($conn, $sql);
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