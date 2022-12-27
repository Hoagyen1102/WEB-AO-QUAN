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
    }elseif($tam=='login'){
        include("login.php");  
    }elseif($tam=='logout'){
        include("logout.php");  
    }elseif($tam=='signup'){
        include("signup.php");  
    }else{
        include("main.php");
    }
?>
</div>