<div class="login">
<form action='index.php?quanly=loginmb' method='POST'>
        <eenter>
		<h2>Đăng nhập với tư cách thành viên</h2>
                Tên đăng nhập <input type = "text" name = "username" placeholder = "abc" required/>
                <br>
                Mật khẩu <input type = "password" name = "password" placeholder = "********" required/>
                <br>
                <input type = "submit" name = "login" value = "Log in"/>
		        <br>
		        Chưa có tài khoản? <a href='index.php?quanly=signupmb' title='signup'>Đăng ký ngay</a>
        </eenter>
</form>
</div>
<?php
	header('Content-Type: text/html; charset=UTF-8');
	if (isset($_POST['login'])) 
	{
	    include('connect.php');
	     
	    //Lấy dữ liệu nhập vào
	    $username = addslashes($_POST['username']);
	    $password = addslashes($_POST['password']);

	    // mã hóa pasword
	    $password = md5($password);
     
	    //Kiểm tra tên đăng nhập có tồn tại không
	    $query = mysqli_query($conn,"SELECT username,password FROM Member WHERE username='$username'");
	    if (mysqli_num_rows($query) == 0) {
			?><script>
	        alert("Không tồn tại tên đăng nhập. Vui lòng kiểm tra lại!");
			</script><?php
	        exit;
	    }
     
	    //Lấy mật khẩu trong database ra
	    $row = mysqli_fetch_array($query);
     
	    //So sánh 2 mật khẩu có trùng khớp hay không
	    if ($password != $row['password']) {
			?><script>
	        alert("Mật khẩu sai. Vui lòng kiểm tra lại!");
			</script><?php
	        exit;
	    }
     
	    //Lưu tên đăng nhập
	    $_SESSION['username'] = $username;
		$_SESSION['id'] = "member";
	    header("location: /SPTO/index.php");
		exit;
}
?>