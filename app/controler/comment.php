<?php
	session_start(); // Vi co captcha su dung session
	require_once('../model/comment_model.php');
	require_once('../helpers/helpers.php');



	function validate_data_comment($user,$email,$content,$captcha,$idBook)
	{
		$errors=array();
        $errors['user']=($user == '' OR strlen($user) < 3)? 'Vui lòng nhập vào họ tên của bạn' : '';
        $check=filter_var($email,FILTER_VALIDATE_EMAIL);
        $errors['email']=($check==FALSE) ? 'Vui lòng nhập đúng định dạng email' : '';
        $errors['content']=($content=='') ? 'Vui lòng nhập vào bình luận của bạn' : '';
        $errors['captcha']=($captcha !== $_SESSION['captcha']) ? 'Mã captcha không đúng' : ''; // Lay Session Captcha tu comment.php 
        $errors['idSanPham']=(is_numeric($idBook) && $idBook > 0) ? '' : 'Có lỗi xảy ra!';
        return $errors;
	}

	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
		=='xmlhttprequest')
	{
		$checkAction=isset($_POST['like']) ? trim($_POST['like']) :0;
		 //Phan them cau hoi 
		if($checkAction == 1)
		{
			$data=array();
			$data['errors']='';
			$data['notlike']='';
			$data['like']='';
			$idquestion=isset($_POST['idQuestion']) ? trim($_POST['idQuestion'])  : '';
			$checklike=isset($_POST['checklike']) ? trim($_POST['checklike'])  : '';
			$checklike=(is_numeric($checklike) && (in_array($checklike, array('1','2')))) ? $checklike : 1;
			$data['checklike']=$checklike;
			if(is_numeric($idquestion) && $idquestion >0)
			{
				$info=get_info_question_model($idquestion);

				$uplike=update_like_question($idquestion,$info['like_comment'],$checklike);
				$data['like']=$uplike;
			}
			else
			{
				$data['errors']="Có lỗi xảy ra";
			}
			echo json_encode($data);
		} 
		elseif($checkAction == 0)
		{
			if(isset($_SESSION['username'])) 
			{
				$username=get_session_username();
				$email=get_session_email();

			} 
			else 
			{
				$username=isset($_POST['username']) ? trim($_POST['username'])  : '';
				$email=isset($_POST['email']) ? trim($_POST['email']) : '';
			} 

			$content=isset($_POST['content']) ? trim($_POST['content']) : '';
			$captcha=isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
			$idSanPham=isset($_POST['idSanPham']) ? trim($_POST['idSanPham']) : '';
            $idSanPham=is_numeric($idSanPham) ? $idSanPham : 0;

			$checkData=validate_data_comment($username,$email,$content,$captcha,$idSanPham);
			$chk=TRUE;
			foreach ($checkData as $key => $val) {
				if(!empty($val))
				{
					$chk=FALSE;
					break;
				}
				# code...
			}
			if($chk)
			{
				$addComment=add_comment_model($idSanPham,$username,$email,$content);

				if($addComment)
				{
					echo "ok";
				}
				else 
				{
					echo "err1";
				}
			}
			else
			{
				echo "err2";
			}

		}
	}
 ?>