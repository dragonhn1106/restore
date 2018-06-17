<?php
	require_once('../config/config.php');
	function add_answer_model($idQuestion,$user,$email,$content)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$status=0;
		$level_user=0;
		$create_time=date('Y-m-d H:i:s');
		$like_answer=0;
		$sql="INSERT INTO answers(question_id,status,username,email,level_user,create_time,	like_answer,content) VALUES(:id_question,:status,:user,:email,:level_user,:create_time,:like_answer,:content)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id_question',$idQuestion,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':user',$user,PDO::PARAM_STR);
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

	function get_info_answer_model($id_answer)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM answers AS a WHERE a.id=:idanswer LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idanswer',$id_answer,PDO::PARAM_INT);
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$data=$stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $data;
	}

	function update_like_answer($id_answer,$like_answer,$checkLike)
	{
		if($checkLike == 1)
		{
			$like_answer++;
		}
		elseif ($checkLike == 2) {
			($checkLike > 0) ? $like_answer-- : 0;
		}
        $conn=connection();
        $sql="UPDATE answers AS a SET a.like_answer= :like_answer WHERE a.id = :id_answer";
        $stmt = $conn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':like_answer',$like_answer,PDO::PARAM_INT);
            $stmt->bindParam(':id_answer',$id_answer,PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }
        disconnection($conn);
        return $like_answer;
	}

?>