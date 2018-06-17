<?php
	session_start();
	$cn=isset($_GET['cn']) ? trim($_GET['cn']) : "home";
	define('BASE_URL','index.php');
	require_once('app/helpers/helpers.php');
	require_once('app/view/header_view.php');
	define('UPLOAD_IMG','uploads/images/');
	require_once('app/lips/vn2latin.php');
	$idLoaiSP=isset($_GET['idLoai']) ? trim($_GET['idLoai']) : "";
	$idNPP=isset($_GET['idNPP']) ? trim($_GET['idNPP']) : "";
	$idNSX=isset($_GET['idNSX']) ? trim($_GET['idNSX']) : "";
	if($cn!='cart')
	{
		require_once('app/view/menu_view.php');
	}
	switch ($cn) {
		case 'home':
			require_once('app/controler/home.php');
			break;
		case 'detail':
			require_once('app/controler/detail.php');
			break;
		case 'info':
			require_once('app/controler/info.php');
			break;
		case 'sale':
			require_once('app/controler/sale.php');
			break;
		case 'support':
			require_once('app/controler/support.php');
			break;
		case 'contact':
			require_once('app/controler/contact.php');
			break;
		case 'search':
			require_once('app/controler/search.php');
			break;
		case 'cart':
			require_once('app/controler/cart.php');
			break;	
	}
	if($cn!='cart')
	{
		require_once('app/controler/menu.php');
	}
	require_once('app/view/footer_view.php');
?>