<!DOCTYPE HTML>
<html>
    <head>
        <title>Cửa hàng kính của Dương Chu Văn</title>
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta charset="UTF-8"/>

        <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
        <meta name="viewport" content="width=device-width"/>
        <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bs.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="public/js/lib.js"></script>
        <script type="text/javascript" src="public/js/bxslider.js"></script>
        <script src="public/js/range-slider.js"></script>
        <script src="public/js/jquery.zoom.js"></script>
        <script type="text/javascript" src="public/js/bookblock.js"></script>
        <script type="text/javascript" src="public/js/custom.js"></script>
        <script type="text/javascript" src="public/js/social.js"></script>
        <script src="public/js/formValidation.min1.js" type="text/javascript"></script>
        <script src="public/js/formValidation.min2.js" type="text/javascript"></script>
        <script src="public/js/index1.js" type="text/javascript"></script>
        <script src="public/js/jquery.bpopup.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="public/OwlCarousel2-2.2.1/dist/assets/owl.carousel.css">
        <link rel="stylesheet" href="public/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.css">
        <script src="public/OwlCarousel2-2.2.1/dist/owl.carousel.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
          $('.social_active').hoverdir( {} );
          $('#ex1').zoom();
        });
        </script>
        
    </head>
    <body>
        <div class="wrapper">
            <header id="main-header">
                <section class="container-fluid container" >
                    <section class="row-fluid">
                        <section class="span4">
                            <h1 id="logo"> <a href="?cn=home"><img src="public/images/Untitled-2.png"/></a> </h1>
                        </section>
                        <section class="span8">
                            <ul class="top-nav2">
                                <?php if(!isset($_SESSION['username'])) : ?>
                                    <li><a href="login.php" title="Đăng nhập">Đăng nhập</a></li>
                                <?php endif; ?>
                                <?php if(isset($_SESSION['username'])) : ?>
                                    <li><strong>Xin chào: <?php echo $_SESSION['tenhienthi']; ?></strong></li>
                                    <li><a href="logout.php" title="Đăng xuất">Đăng xuất</a></li>
                                <?php endif; ?>
                                    <li><a href="register.php" title="Đăng ký">Đăng ký</a></li>
                                    <li><a href="?cn=cart" title="Giỏ hàng">Giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="qty" style="color: red"> &nbsp;&nbsp;&nbsp;<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;  ?></span></a></li>
                            </ul>
                            <div class="col-xs-12 ">

                                <input class="col-md-6 col-xs-10" id="txtSearch" name="search" type="text" style="" placeholder="Nhập từ khóa" />
                                <button class="btn btn-info" id="btnSearch" type="submit" style="height: 35px;"><i class="fa fa-search" aria-hidden="true"></i>&#160;Tìm kiếm</button>
                            </div>
                        </section>
                    </section>
                </section>
                <button id="menu1" style="font-size: 23px;height: 40px;line-height: 40px; width: 40px; text-align: center  " class="navbar-toggler pull-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target=".menu1" aria-expanded="false">
                    ☰
                </button>
                <nav id="nav">
                    <nav class="navbar menu1">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav">
                                <li <?php echo ($cn=== 'home') ? "class='active'" : ""; ?>> <a href="?cn=home&method=index">Trang chủ</a> </li>
                                <li <?php echo ($cn=== 'info') ? "class='active'" : ""; ?>><a href="?cn=info&method=index">Giới thiệu</a></li>
                                <li <?php echo ($cn=== 'sale') ? "class='active'" : ""; ?>><a href="?cn=sale">Chính sách bảo hành</a></li>
                                <li <?php echo ($cn=== 'support') ? "class='active'" : ""; ?>><a href="?cn=support">Hỗ trợ khách hàng</a></li>
                                <li <?php echo ($cn=== 'contact') ? "class='active'" : ""; ?>><a href="?cn=contact">Liên hệ & Địa chỉ</a></li>
                            </ul>
                        </div>
                    </nav>
                </nav>
            </header>
            <section id="content-holder" class="container-fluid container">
                <section class="row-fluid">
                    <div class="blog-sec-slider">

                    </div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
       $('#btnSearch').click(function(event) {
            var keyword=$.trim($('#txtSearch').val());
            keyword=keyword.replace(/\s+/g,"+");
            if(keyword.length>3)
            {
                window.location.href='index.php?cn=search&s='+keyword;
            }
            else
            {
                alert("Vui lòng nhập từ khóa và nhiều hơn 3 ký tự");
            }
            
       }); 
    });
</script>