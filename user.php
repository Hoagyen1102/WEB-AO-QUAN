<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username']){
    echo "<a href='index.php?quanly=user'>".'<li> Profile '.$_SESSION['username'].'!</a></li>'."<br/>";
?>
<div class="user">
<?php
}
else{
?>
    <p>Bạn chưa đăng nhập</p>
    <a href='index.php?quanly=login' title='loginmb'>
    <input type= "button" name = "login" value = "login">
	</a>
    <a href='index.php?quanly=signup' title='loginmb'>
    <input type= "button" name = "signup" value = "signup">
	</a>
    <br><br>
<?php
}
?>
</div>