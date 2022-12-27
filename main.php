<?php
include('ketnoi.php');
$sql = "SELECT * from products inner join brands on products.brand_id = brands.brand_id";
$query = mysqli_query($conn, $sql);
?>
    <div class="banner">
        <div class="slider">
        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
        <div class="slide first">
            <a href ="#anh1"><img src="img/anh1.jpg" alt=""></a>
        </div>
        <div class="slide">
            <a href ="#anh2"><img src="img/anh2.jpg" alt=""></a>
        </div>
        </div>
    </div>
    <div class="text"><h2>TẤT CẢ SẢN PHẨM</h2></div>
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

<script type="text/javascript">
    var counter = 1;
    setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 2){
            counter = 1;
        }
    }, 3000);
</script>