<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Đăng ký thành viên</title>
    <link rel="stylesheet" href="public/css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="public/css/style2.css">
    <script src="public/js/jquery-1.12.0.min.js"></script>
</head>
<body>
    <div class="container">
            <div class="login-box animated fadeInUp" style="max-width:500px">
                <?php if( isset($checkInfo) && !$checkInfo){ ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
                            <ul>
                            <?php foreach ($checkAdd as $key => $val)
                            {
                                if(!empty($val))
                                {
                            ?>
                                <li><?php echo $val; ?></li>
                            <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($mess) && !empty($mess)){ ?>
                    <div class="row" style="padding:5px;">
                        <p><?php echo $mess;?></p>
                    </div>
                <?php } ?>
                <form action="register.php?method=index" method="POST" >
                    <div class="box-header">
                            <h2>Đăng Ký</h2>
                    </div>
                    <label for="username">Tên đăng nhập</label>
                    <br/>
                    <input type="text" name="txtTenDangNhap" id="username">
                    <br/>
                    <label for="password">Mật khẩu</label>
                    <br/>
                    <input type="password" name="txtMatKhau" id="password">
                    <br/>
                    <label for="txtEmail">Email</label>
                    <br/>
                    <input type="email" name="txtEmail" id="txtEmail">
                    <br/>
                    <label for="txtHoTen">Họ Tên</label>
                    <br/>
                    <input type="text" name="txtHoTen" id="txtHoTen">
                    <br/>
                    <label for="txtAddress">Địa chỉ</label>
                    <br/>
                    <input type="text" name="txtAddress" id="txtAddress">
                    <br/>
                    <label for="txtPhone">Số Điện Thoại</label>
                    <br/>
                    <input type="text" name="txtPhone" id="txtPhone">
                    <br/>
                    <input type="submit" name="btnSubmit" value="Đăng ký"/>
                    <input type="reset" name="btnReset" value="reset"/>
                    <br/>
                    <a href="login.php" title="">Đăng nhập</a>
                    <span>|</span>
                    <a href="index.php" title="">Trang chủ</a>
                </form>
            </div>
    </div>
</body>
</html>