<div class="login">
<form action='index.php?quanly=signupmb' method='POST'>
        <eenter>
        <h2>&emsp;&nbsp;Đăng ký với quyền thành viên</h2>
                Tên đăng nhập <input type = "text" name = "username" placeholder = "abc" required/>
                <br>
                Mật khẩu <input type = "password" name = "password" placeholder = "********" required/>
                <br>
                Email <input type = "text" name = "email" placeholder = "abc@xyz.com" required/>
                <br>
                Số điện thoại <input type = "text" name = "phonenumber" placeholder = "XXXXXXXXXX" required/>
                <br>
                <input type = "submit" name="signup" value = "Đăng ký"/>
                <br>
                Đã sở hữu tài khoản? <a href='index.php?quanly=loginmb' tittle='login'>Đăng nhập ➝ </a> 
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
        $sex   = addslashes($_POST['phonenumber']);      
        // Mã khóa mật khẩu
        $password = md5($password);
        
        //Kiểm tra tên đăng nhập này đã có người dùng chưa
        if (mysqli_num_rows(mysqli_query($conn,"SELECT username FROM Member WHERE username='$username'")) > 0){
            ?>
            <script>
            alert("Tên đăng nhập này đã có người sử dụng. Vui lòng chọn tên khác!");
            </script>
            <?php
            exit;
        }
    
        //Kiểm tra email có đúng định dạng hay không
        if (!preg_match("/[_a-z0-9-]*@[a-z0-9-]*(\.[a-z]{2,4})$/", $email))
        {
            ?>
            <script>
            alert("Email không đúng. Vui lòng kiểm tra lại!");
            </script>
            <?php
        }
    
        if (mysqli_num_rows(mysqli_query($conn,"SELECT email FROM Member WHERE email='$email'")) > 0){
            ?>
            <script>
            alert("Email này đã có người sử dụng. Vui lòng nhập email khác!");
            </script>
            <?php
            exit;
        }
        
              
        //Lưu thông tin thành viên vào bảng
        $addmember = mysqli_query($conn,"
            INSERT INTO Member(username,password,email,phonenumber)
            VALUES (
                '{$username}',
                '{$password}',
                '{$email}',
                '{$phonenumber}'
            )");
	    //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
	    header("location: /WEB-AO-QUAN/index.php?quanly=loginmb");
		exit;
}
?>