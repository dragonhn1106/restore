<?php
	require_once('app/model/login_model.php');
	require_once('app/helpers/helpers.php');
	$method=isset($_GET['method']) ? trim($_GET['method']) : "index";
	switch ($method) {
		case 'index':
			xl_login();
			break;
	}
	function xl_login()
	{
		if(isset($_POST['btnSubmit']))
		{
			$username=isset($_POST['txtTenDangNhap']) ? trim($_POST['txtTenDangNhap']) : "";

			$username=strip_tags($username);
			$password=isset($_POST['txtMatKhau']) ? trim($_POST['txtMatKhau']) : "";
            //var_dump($password);die();
			$password=strip_tags($password);
			$checkLogin=validate_login($username,$password);
			$checkInfo=TRUE;
			foreach ($checkLogin as $key => $value) {
				if(!empty($value))
				{
					$checkInfo=FALSE;
					break;
				}
			}
			if($checkInfo)
			{
				$login=check_login_model($username,md5($password));
				if(!empty($login))
				{
					$_SESSION['username']=$login['TenDangNhap'];
					$_SESSION['id_tk']=$login['id_tk'];
					$_SESSION['quyen']=$login['Quyen'];
					$_SESSION['email']=$login['Email'];
					$_SESSION['tenhienthi']=$login['TenHienThi'];
					$_SESSION['phone']=$login['SDT'];
					$_SESSION['address']=$login['DiaChi'];
					header("Location: index.php");
				}
				else
				{
					$mess="Tên tài khoản hoặc mật khẩu không đúng";
				}
			}
		}
		require_once('app/view/login/login_view.php');
	}
?>