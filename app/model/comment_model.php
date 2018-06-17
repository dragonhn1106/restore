<?php
	require_once('../config/config.php');
	function add_comment_model($idSanPham,$username,$email,$content)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time=date('Y-m-d H:i:s');
		$status=1;
		$like_comment=0;
		$sql="INSERT INTO questions(username,email,content,create_time,id_kinh,status,like_comment) VALUES(:user,:email,:content,:create_time,:idkinh,:status,:like_comment)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':user',$username,PDO::PARAM_STR);
			$stmt->bindParam(':email',$email,PDO::PARAM_STR);
			$stmt->bindParam(':content',$content,PDO::PARAM_STR);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':idkinh',$idSanPham,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':like_comment',$like_comment,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

	function get_info_question_model($id_question)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM questions AS a WHERE a.id=:idquestion LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idquestion',$id_question,PDO::PARAM_INT);
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

	function update_like_question($idquestion,$luotlike,$checkLike)
	{
		if($checkLike == 1)
		{
			$luotlike++;
		}
		elseif ($checkLike == 2) {
			($checkLike > 0) ? $luotlike-- : 0;
		}
        $conn=connection();
        $sql="UPDATE questions AS a SET a.like_comment= :like_comment WHERE a.id = :idquestion";
        $stmt = $conn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':like_comment',$luotlike,PDO::PARAM_INT);
            $stmt->bindParam(':idquestion',$idquestion,PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }
        disconnection($conn);
        return $luotlike;
	}


?>