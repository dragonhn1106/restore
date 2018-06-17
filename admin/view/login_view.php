<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../public/css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../public/css/style2.css">
    <script src="../public/js/jquery-1.12.0.min.js"></script>
</head>
<body>
    <div class="container">
            <div class="login-box animated fadeInUp" style="max-width:340px">
                <?php if(!empty($mess)){ ?>
                    <p style="text-align: center; color: red; padding-top: 20px;">Mật khẩu hoặc username không tồn tại</p>
                <?php } ?>
                <form action="index.php" method="POST" >
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
                </form>
            </div>
    </div>
</body>
</html>