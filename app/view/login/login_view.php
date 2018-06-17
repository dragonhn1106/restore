<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="public/css/style2.css">
    <script src="public/js/jquery-1.12.0.min.js"></script>
</head>
<body>
    <div class="container">
            <div class="login-box animated fadeInUp" style="max-width:340px">
                <form action="login.php" method="POST" >
                    <div class="box-header">
                        <h2>Đăng nhập</h2>
                    </div>
                    <label for="username">Tên đăng nhập</label>
                    <br/>
                    <input type="text" name="txtTenDangNhap" id="username">
                    <br/>
                    <label for="password">Mật khẩu</label>
                    <br/>
                    <input type="password" name="txtMatKhau" id="password">
                    <br/>
                    <input type="submit" name="btnSubmit" value="Đăng nhập"/>
                    <input type="reset" name="btnReset" value="reset"/>
                    <br/>
                    <a href="register.php" title="">Đăng ký</a>
                    <span>|</span>
                    <a href="index.php" title="">Trang chủ</a>
                </form>
                <?php if(!empty($mess)) { ?>
                    <p class="text-center" style="color:red;"><strong><?php echo $mess; ?></strong></p>
                <?php } ?>
                <?php if(isset($checkInfo) && !$checkInfo) { ?>
                    <?php foreach ($checkLogin as $key => $val) {
                        if(!empty($val))
                        {
                    ?>
                        <p style="color:red;"><strong><?php echo $val; ?></strong></p>
                    <?php }} ?>
                <?php } ?>
            </div>
    </div>
</body>
</html>