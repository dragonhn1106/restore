<?php
	require_once('app/config/config.php');
	function add_user_model($username,$password,$email,$hoten,$diachi,$phone,$authen_key)
	{
		$lastId=0;
		$conn=connection();
		$create_time=date('Y-m-d H:i:s');
		$update_time="";
		$role=1;
		$status=0;
		$sql="INSERT INTO taikhoan(TenDangNhap,MatKhau,TenHienThi,DiaChi,SDT,Email,Quyen,status,authen_key,create_time,update_time) VALUES(:username,:password,:hoten,:diachi,:phone,:email,:quyen,:status,:authen_key,:create_time,:update_time)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':username',$username,PDO::PARAM_STR);
			$stmt->bindParam(':password',$password,PDO::PARAM_STR);
			$stmt->bindParam(':hoten',$hoten,PDO::PARAM_STR);
			$stmt->bindParam(':diachi',$diachi,PDO::PARAM_STR);
			$stmt->bindParam(':phone',$phone,PDO::PARAM_STR);
			$stmt->bindParam(':email',$email,PDO::PARAM_STR);
			$stmt->bindParam(':quyen',$role,PDO::PARAM_INT);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':authen_key',$authen_key,PDO::PARAM_STR);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$update_time,PDO::PARAM_STR);
			if($stmt->execute())
			{
				$lastId=$conn->lastInsertId();
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $lastId;
	}
	
	function get_info_user_by_id_model($idInsert)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM taikhoan AS a WHERE a.id_tk=:id LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id',$idInsert,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$data=$stmt->fetch(PDO::FETCH_ASSOC);
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $data;
	}

	function update_user($id_decode)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$active=1;
		$sql="UPDATE taikhoan AS a SET a.status=:active WHERE a.id_tk= :id";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':active',$active,PDO::PARAM_INT);
			$stmt->bindParam(':id',$id_decode,PDO::PARAM_INT);
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