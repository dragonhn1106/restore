<?php
session_start();
define('BASE_URL', 'home.php');
require_once('../helpers/helpers.php');
require_once('../libs/libs.php');
check_login();
$c = isset($_GET['sk']) ? trim($_GET['sk']) : '';
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
        !=='xmlhttprequest')
{
    require_once('../view/header_view.php');
}

switch ($c) {
	case 'nhaphanphoi':
        require_once('nhaphanphoi.php');
        break;
    case 'sanpham':
        require_once('sanpham.php');
        break;
    case 'loaisanpham':
        require_once('loaisanpham.php');
        break;
    case 'nhasanxuat':
        require_once('nhasanxuat.php');
        break;
    case 'donhang':
        require_once('donhang.php');
        break;
    case 'member':
        require_once('user.php');
        break;
    case 'comment':
        require_once('comment.php');
        break;
    case 'nguoidung':
        require_once('nguoidung.php');
        break;
    default:
        require_once('../view/home_view.php');
        break;
     
}
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']))
{
    require_once('../view/footer_view.php');
}
?>

