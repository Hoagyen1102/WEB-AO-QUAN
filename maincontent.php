<div class="main">
<?php
    if(isset($_GET['quanly'])){
        $tam = $_GET['quanly'];
    }else{
        $tam ='';
    }if($tam=='danhmucsanpham'){
        include("danhmucsanpham.php");
    }elseif($tam=='phanloai'){
        include("phanloai.php");  
    }else{
        include("main.php");
    }
?>
</div>