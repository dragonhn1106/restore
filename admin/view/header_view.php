<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cửa hàng bán kính của DươngCV</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link href="../../public/css/styleadmin.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../public/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../public/css/_all-skins.min.css">
        <!-- jquery -->
        <script src="../../public/js/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../../public/js/app.min.js"></script>
        <script src="../../public/js/admin1.js"></script>
        <script src="../../public/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../../public/js/methods.min.js" type="text/javascript"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>ADMIN</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="#" class="user-image" alt="">
                                    <span class="hidden-xs"><label>Xin Chào:</label> <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : ''; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php var_dump($data['HinhAnh'])?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : ''; ?>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">

                            <img src="#" class="img-circle" alt="User Image">

                        </div>
                        <div class="pull-left info">
                            <p style="width: 100%; height: auto;">Trang Quản Trị</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!-- <li>
                            <a href="#"></i>Danh Mục Quản Lý</a>
                        </li> -->
                        <li <?php echo ($c=='sanpham') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=sanpham&m=index"><i class="fa fa-book"></i>Quản lý sản phẩm </a>
                        </li>
                        <li <?php echo ($c=='nhaphanphoi') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=nhaphanphoi&m=index"><i class="fa fa-th"></i>Nhà phân phối </a>
                        </li>
                        <li <?php echo ($c=='loaisanpham') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=loaisanpham&m=index"><i class="fa fa-th"></i>Loại Sản phẩm</a>
                        </li>
                        <li <?php echo ($c=='nhasanxuat') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=nhasanxuat&m=index"><i class="fa fa-th"></i>Hãng sản xuất</a>
                        </li>
                        <li>
                            <a href="?sk=donhang"><i class="fa fa-th"></i>Đơn hàng</a>
                        </li>
                        <li <?php echo ($c=='member') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=member&m=index"><i class="fa fa-th"></i>Thành viên quản trị</a>
                        </li>
                        <li <?php echo ($c=='comment') ? "class='active'" : "class=''";  ?>>
                            <a href="?sk=comment&m=index" ><i class="fa fa-th"></i>Quản lý bình luận</a>
                        </li >
                        <li <?php echo ($c=='nguoidung') ? "class='active'" : "class=''";  ?> >
                            <a href="?sk=nguoidung&m=index" ><i class="fa fa-th"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a><i class="fa fa-th"></i>Thống kê</a>
                        </li>
                        <li>
                            <a><i class="fa fa-th"></i>Báo cáo</a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

