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
    }elseif($tam=='loginmb'){
        include("loginmb.php");  
    }elseif($tam=='loginad'){
        include("loginad.php");  
    }elseif($tam=='signupmb'){
        include("signupmb.php");  
    }elseif($tam=='signupad'){
        include("signupad.php");  
    }else{
        include("main.php");
    }
?>
</div>