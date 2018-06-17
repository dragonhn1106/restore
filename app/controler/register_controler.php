<?php
	require_once('app/model/signup_model.php');
	require_once('app/lips/sendmail.php');
	require_once('app/lips/Myencryptdecrypt.php');
	require_once('app/helpers/helpers.php');
	$method=isset($_GET['method']) ? trim($_GET['method']) : 'index';
	switch ($method) {
		case 'index':
			signUp();
			break;
		case 'active':
			activeUser();
			break;
	}
	function activeUser()
	{
		$id_user=isset($_GET['id']) ? trim($_GET['id']) : 0;
		$id_decode=decode($id_user);
		$id_decode=is_numeric($id_decode) ? $id_decode : 0;
		$authen=isset($_GET['auth']) ? trim($_GET['auth']) : 0;
		$authen_decode=decode($authen);
		$authen_decode=is_numeric($authen_decode) ? $authen_decode : 0;
		$today=date("Y-m-d H:i:s");
		if(strtotime($authen_decode) < strtotime($today))
		{
			$mess="Link active tài khoản đã hết hạn";
		}
		else
		{
			$infoUser = get_info_user_by_id_model($id_decode);
			if(!empty($infoUser))
			{
				$mess="Tài khoản không tồn tại";
			}
			elseif ($infoUser['status'] == 1) {
				$mess="Tài khoản đã được kích hoạt";
			}
			else
			{
				if ($authen===$infoUser['authen_key']) {
					$active=update_user($id_decode);
					if($active)
					{
						$mess="Tài khoản đã được kích hoạt. Hãy đăng nhập";
					}
					else
					{
						$mess="Có lỗi xảy ra";
					}
				}
				else
				{
					$mess="Mã kích hoạt không đúng";
				}
			}
		}
		require_once('app/view/register/active_user_view.php');
	}
	
	function signUp()
	{
		if(isset($_POST['btnSubmit']))
		{
			$username=isset($_POST['txtTenDangNhap']) ? trim($_POST['txtTenDangNhap']) : "";
			$username=htmlentities($username);
			$password=isset($_POST['txtMatKhau']) ? trim($_POST['txtMatKhau']) : "";
			$password=htmlentities($password);
			$email=isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : "";
			$email=htmlentities($email);
			$hoten=isset($_POST['txtHoTen']) ? trim($_POST['txtHoTen']) : "";
			$hoten=htmlentities($hoten);
			$diachi=isset($_POST['txtAddress']) ? trim($_POST['txtAddress']) : "";
			$diachi=htmlentities($diachi);
			$phone=isset($_POST['txtPhone']) ? trim($_POST['txtPhone']) : "";
			$phone=htmlentities($phone);

			$checkInfo=TRUE;
			$checkAdd= validate_signup($username,$password,$email,$hoten,$diachi,$phone);
			foreach ($checkAdd as $key => $value) {
				if(!empty($value))
				{
					$checkInfo=FALSE;
					break;
				}
			}
			
			if($checkInfo)
			{
				$authen_key=encode(date('Y-m-d H:i:s',strtotime("+3 days")));
				$idInsert=add_user_model($username,md5($password),$email,$hoten,$diachi,$phone,$authen_key);
				if($idInsert!=0)
				{
					$infoUser = get_info_user_by_id_model($idInsert);
					if(!empty($infoUser))
					{
						$auth=$infoUser['authen_key'];
						$id=encode($idInsert);
						// $subject='Kích hoạt tài khoản';
						// $link='http://localhost:81/book/register.php?method=active&id='.$id.'&auth='.$auth;
						// $send=xl_sendmail($email,$subject,$link);
						// if($send==TRUE)
						// {
						// 	$mess="Đăng ký thành công, vui lòng vào địa chỉ email để kích hoạt tài khoản";
						// }
						// else
						// {
						// 	$mess="Không thể gửi mail";
						// }
					}
				}
				else
				{
					$mess="Có lỗi xảy ra vui lòng thực hiện lại";
				}
			}
		}
		require_once('app/view/register/register_view.php');//tìm hiểu hàm get_last_insert_id trong SQL lấy id của cái insert cuối cùng và lấy ra trường create_time
	}

?>