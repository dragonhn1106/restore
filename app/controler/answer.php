<?php
	session_start(); // Vi co captcha su dung session
	require_once('../model/answer_model.php');
	require_once('../helpers/helpers.php');

	function validate_data_answer($user,$email,$content,$captcha,$idQuestion)
	{
		$errors=array();
        $errors['user']=($user == '' OR strlen($user) < 3)? 'Vui lòng nhập vào họ tên của bạn' : '';
        $check=filter_var($email,FILTER_VALIDATE_EMAIL);
        $errors['email']=($check==FALSE) ? 'Vui lòng nhập đúng định dạng email' : '';
        $errors['content']=($content=='') ? 'Vui lòng nhập vào bình luận của bạn' : '';
        $errors['captcha']=($captcha !== $_SESSION['captcha']) ? 'Mã captcha không đúng' : ''; // Lay Session Captcha tu comment.php 
        $errors['idQuestion']=(is_numeric($idQuestion) && $idQuestion> 0) ? '' : 'Có lỗi xảy ra!';
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
			$idanswer=isset($_POST['idAnswer']) ? trim($_POST['idAnswer'])  : '';
			$checklike=isset($_POST['checklike']) ? trim($_POST['checklike'])  : '';
			$checklike=(is_numeric($checklike) && (in_array($checklike, array('1','2')))) ? $checklike : 1;
			$data['checklike']=$checklike;
			if(is_numeric($idanswer) && $idanswer >0)
			{
				$info=get_info_answer_model($idanswer);

				$uplike=update_like_answer($idanswer,$info['like_answer'],$checklike);
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
			$idQuestion=isset($_POST['idquestion']) ? trim($_POST['idquestion']) : '';
			$idQuestion=is_numeric($idQuestion) ? $idQuestion :0;

			$checkData=validate_data_answer($username,$email,$content,$captcha,$idQuestion);
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
				$addAnswer=add_answer_model($idQuestion,$username,$email,$content);

				if($addAnswer)
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