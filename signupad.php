<div class="signup">
<form action='index.php?quanly=signupad' method='POST'>
        <eenter>
            <h2>Đăng ký với quyền quản lý</h2>
                Tên đăng nhập <input type = "text" name = "username" placeholder = "abc" required/>
                <br>
                Mật khẩu<input type = "password" name = "password" placeholder = "********" required/>
                <br>
                Email <input type = "text" name = "email" placeholder = "abc@xyz.com" required/>
                <br>
                Mã <input type = "text" name = "code" placeholder = "abcxy" required/>
                <br>
                Số điện thoại<input type = "text" name = "phonenumber" placeholder = "XXXXXXXXXX" required/>
                <br>
                <input type = "submit" name="signup" value = "Đăng ký"/>
                <br>
                Đã sở hữu tài khoản? <a href='index.php?quanly=loginad' tittle='login'>Đăng nhập ➝ </a>
</form>
</div>
<?php
	header('Content-Type: text/html; charset=UTF-8');
 
	if (isset($_POST['signup'])) 
	{
	    include('ketnoi.php');
	     
	    //Lấy dữ liệu nhập vào
	    $username = addslashes($_POST['username']);
	    $password = addslashes($_POST['password']);
        $email   = addslashes($_POST['email']);
        $phonenumber   = addslashes($_POST['phonenumber']); 
        $code   = addslashes($_POST['code']);      
        // Mã khóa mật khẩu
        $password = md5($password);
        
        //Kiểm tra tên đăng nhập này đã có người dùng chưa
        if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM admin WHERE username='$username'")) > 0){
            ?>
            <script>
            alert("Tên đăng nhập đã được sử dụng. Vui lòng nhập tên khác!");
            </script>
            <?php
            exit;
        }
    
        //Kiểm tra email có đúng định dạng hay không
        if (!preg_match("/[_a-z0-9-]*@[a-z0-9-]*(\.[a-z]{2,4})$/", $email))
        {
            ?>
            <script>
            alert("Email không hợp lệ. Vui lòng kiểm tra lại!");
            </script>
            <?php
        }
    
        if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM admin WHERE email='$email'")) > 0){
            ?>
            <script>
            alert("Email đã có người sử dụng. Vui lòng nhập email khác!");
            </script>
            <?php
            exit;
        }
        if ($code != "admin") {
			?><script>
	        alert("Sai mã quản lý. Vui lòng kiểm tra lại!");
			</script><?php
	        exit;
	    }
        
        
        //Lưu thông tin thành viên vào bảng
        $addmember = mysqli_query($conn,"
            INSERT INTO admin(username,password,email,phonenumber)
            VALUES (
                '{$username}',
                '{$password}',
                '{$email}',
                '{$phonenumber}'
            )");
	    //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
	    header("location: /WEB-AO-QUAN/index.php?quanly=loginad");
		exit;
}
?>