<?php
	require_once('../model/comment_model.php');
	$method=isset($_GET['m']) ? trim($_GET['m']) : "index";
	switch ($method) {
		case 'index':
			list_comment();
			break;
		case 'action':
			action_question();
			break;
		case 'actionanswer':
			action_answer();
			break;
		case 'addanswer':
			answer_admin();
			break;
	}
	function list_comment()
	{
		$question=get_all_question_model();
		$answer=get_all_answer_model();
		require_once('../view/comment/comment_view.php');
	}
	function action_question()
	{
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
        =='xmlhttprequest')
		{
			$idquestion=isset($_POST['idQuestion']) ? trim($_POST['idQuestion']) : 0;
			$checkaction=isset($_POST['checkaction']) ? trim($_POST['checkaction']) : 0;
			$check=in_array($checkaction, array('1','2')) ? TRUE : FALSE;
			if($check && $idquestion > 0)
			{
				$update=update_status_question_model($idquestion,$checkaction);
				if($update)
				{
					echo 'ok';
				}
				else
				{
					echo 'fail';
				}
			}
			else
			{
				echo 'err';
			}
		}
	}

	function action_answer()
	{
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
        =='xmlhttprequest')
		{
			$idanswer=isset($_POST['idAnswer']) ? trim($_POST['idAnswer']) : 0;
			$checkaction=isset($_POST['checkaction']) ? trim($_POST['checkaction']) : 0;
			$check=in_array($checkaction, array('1','2')) ? TRUE : FALSE;
			if($check && $idanswer > 0)
			{
				$update=update_status_answer_model($idanswer,$checkaction);
				if($update)
				{
					echo 'ok';
				}
				else
				{
					echo 'fail';
				}
			}
			else
			{
				echo 'err';
			}
		}
	}

	function answer_admin()
	{
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
        =='xmlhttprequest')
		{
			$idquestion=isset($_POST['idQuestion']) ? trim($_POST['idQuestion']) : 0;
			$username=get_session_uname();
			$email=get_session_email_admin();
			$content=isset($_POST['content']) ? trim($_POST['content']) : "";

			$chk=TRUE;
			if($chk)
			{
				$add_answer_admin = add_all_answer_admin_model($idquestion,$username,$email,$content);
				if($add_answer_admin)
				{
					echo "ok";
				}
				else
				{
					echo "fail";
				}
			}
			else
			{
				echo "err";
			}

		}
	}
?>