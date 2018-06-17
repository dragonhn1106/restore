<?php
	require_once('../config/config.php');
	function get_all_question_model()
	{
		$data=array();
		$conn=connection();
		$lstQuestion=array();
		$sql="SELECT a.id AS idQuestion,a.username,a.email,a.content,a.create_time,a.id_kinh AS idKinh, a.status,a.like_comment,b.TenKinh,b.HinhAnh FROM questions AS a INNER JOIN kinh AS b ON a.id_kinh=b.id";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}

		disconnection($conn);

		foreach ($data as $key => $val) {
			$lstQuestion[$val['idKinh']]['TenKinh']=$val['TenKinh'];
			$lstQuestion[$val['idKinh']]['hinhAnh']=$val['HinhAnh'];
			$lstQuestion[$val['idKinh']]['question'][]=$val;
		}
		return $lstQuestion;
	}

	function update_status_question_model($idQuestion,$action)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE questions AS a SET a.status = :action WHERE a.id = :id_question";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':action',$action,PDO::PARAM_INT);
			$stmt->bindParam(':id_question',$idQuestion,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

	function update_status_answer_model($idanswer,$action)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE answers AS a SET a.status = :action WHERE a.id = :id_answer";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':action',$action,PDO::PARAM_INT);
			$stmt->bindParam(':id_answer',$idanswer,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

	function get_all_answer_model()
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM answers AS a";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $data;
	}

	function add_all_answer_admin_model($idquestion,$username,$email,$content)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$status=1;
		$level_user=1;
		$create_time=date('Y-m-d H:i:s');
		$like_answer=0;
		$sql="INSERT INTO answers(question_id,status,username,email,level_user,create_time,like_answer,content) VALUES(:question_id,:status,:username,:email,:level_user,:create_time,:like_answer,:content)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':question_id',$idquestion,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':username',$username,PDO::PARAM_STR);
			$stmt->bindParam(':email',$email,PDO::PARAM_STR);
			$stmt->bindParam(':level_user',$level_user,PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':like_answer',$like_answer,PDO::PARAM_INT);
			$stmt->bindParam(':content',$content,PDO::PARAM_STR);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

?>