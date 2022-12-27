<div class=edit>
<a href="index.php?quanly=login">&larr;&ensp; Back to login permission page</a>
</div>
<div class="login">
<form action='index.php?quanly=loginmb' method='POST'>
        <eenter>
		<h2>&ensp;Logged in as a member</h2>
                <img src="Img/ava.png" alt="iconavatar">
                <br>
                Username &nbsp;<input type = "text" name = "username" placeholder = "abc" required/>
                <br>
                Password &ensp;<input type = "password" name = "password" placeholder = "********" required/>
                <br>
                <input type = "submit" name = "login" value = "Log in"/>
		        <br>
		        Don't have an account? <a href='index.php?quanly=signupmb' title='signup'>Sign up now</a>
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
	        alert("This username does not exist. Please check again!");
			</script><?php
	        exit;
	    }
     
	    //Lấy mật khẩu trong database ra
	    $row = mysqli_fetch_array($query);
     
	    //So sánh 2 mật khẩu có trùng khớp hay không
	    if ($password != $row['password']) {
			?><script>
	        alert("Incorrect password. Please check again!");
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