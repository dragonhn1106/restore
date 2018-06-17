<?php
	require_once('app/config/config.php');
	function check_login_model($username,$password)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM taikhoan AS a WHERE a.TenDangNhap=:username AND a.MatKhau=:pass AND a.status=1 LIMIT 1";
		$stmt=$conn->prepare($sql);

		if($stmt)
		{
			$stmt->bindParam(':username',$username,PDO::PARAM_STR);
			$stmt->bindParam(':pass',$password,PDO::PARAM_STR);
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$data=$stmt->fetch(PDO::FETCH_ASSOC);
                    //var_dump($data);die();
				}
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $data;
	}
?>