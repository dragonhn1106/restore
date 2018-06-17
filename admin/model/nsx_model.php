<?php
	require_once('../config/config.php');
	function get_list_nsx_model($keyword='')
	{
		$data=array();
		$conn=connection();
		$key="%".$keyword."%";
		$sql="SELECT * FROM nhasanxuat AS a WHERE (a.TenNSX LIKE :keyword OR a.SDTNSX LIKE :keyword OR a.DiaChiNSX LIKE :keyword) AND (a.status=1)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':keyword',$key,PDO::PARAM_STR);
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
	function get_list_nsx_by_page($start,$limit,$keyword='')
    {
        $data=array();
        $conn=connection();
        $key="%".$keyword."%";
        $sql="SELECT * FROM nhasanxuat AS a WHERE a.status=1 AND a.TenNSX LIKE :keyword OR a.SDTNSX LIKE :keyword OR a.DiaChiNSX LIKE :keyword LIMIT :start,:limit_a";
        $stmt=$conn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':keyword',$key,PDO::PARAM_STR);
            $stmt->bindParam(':start',$start,PDO::PARAM_INT);
            $stmt->bindParam(':limit_a',$limit,PDO::PARAM_INT);
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
	function delete_nsx_model($idnsx)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE nhasanxuat AS a SET a.status=0 WHERE a.id_nsx=:idnsx";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnsx',$idnsx,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	function check_name_nsx_model($namensx)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM nhasanxuat AS a WHERE a.TenNSX=:namensx";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':namensx',$namensx,PDO::PARAM_STR);
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$checkFlag=FALSE;
				}
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	function check_phone_nsx_model($phonensx)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM nhasanxuat AS a WHERE a.SDTNSX=:phonensx";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':phonensx',$phonensx,PDO::PARAM_STR);
			if($stmt->execute())
			{
				if($stmt->rowCount()>0)
				{
					$checkFlag=FALSE;
				}
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	function add_nsx_model($usernsx,$phonensx,$addressnsx,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$status=1;
		$create_time=date('Y-m-d H:i:s');
		$update_time="";
		$sql="INSERT INTO nhasanxuat(TenNSX,SDTNSX,DiaChiNSX,img_path,status,create_time,update_time) VALUES(:tennsx,:sodt,:diachi,:img_path,:status,:create_time,:update_time)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tennsx',$usernsx,PDO::PARAM_STR);
			$stmt->bindParam(':sodt',$phonensx,PDO::PARAM_STR);
			$stmt->bindParam(':diachi',$addressnsx,PDO::PARAM_STR);
			$stmt->bindParam(':img_path',$img_path,PDO::PARAM_STR);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$update_time,PDO::PARAM_STR);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

	function get_info_nsx_model($idnsx)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM nhasanxuat AS a WHERE a.id_nsx=:idnsx LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnsx',$idnsx,PDO::PARAM_INT);
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

	function edit_nsx_model($idnsx,$namensx,$phonensx,$addressnsx,$status,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time="";
		$update_time=date('Y-m-d H:i:s');
		$sql="UPDATE nhasanxuat AS a SET a.TenNSX=:tennsx,a.SDTNSX=:sodt,a.DiaChiNSX=:diachi,a.img_path=:img,a.status=:status,a.create_time=:create_time,a.update_time=:update_time WHERE a.id_nsx=:idnsx";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnsx',$idnsx,PDO::PARAM_INT);
			$stmt->bindParam(':tennsx',$namensx,PDO::PARAM_STR);
			$stmt->bindParam(':sodt',$phonensx,PDO::PARAM_STR);
			$stmt->bindParam(':diachi',$addressnsx,PDO::PARAM_STR);
			$stmt->bindParam(':img',$img_path,PDO::PARAM_STR);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':update_time',$update_time,PDO::PARAM_STR);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}