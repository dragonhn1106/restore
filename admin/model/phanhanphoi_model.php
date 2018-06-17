<?php
	require_once('../config/config.php');
	function get_list_npp_model($keyword='')
	{
		$data=array();
		$conn=connection();
		$key="%".$keyword."%";
		$sql="SELECT * FROM nhaphanphoi AS a WHERE (a.TenNPP LIKE :keyword OR a.SDTNPP LIKE :keyword OR a.DiaChiNPP LIKE :keyword) AND (a.status=1)";
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
	function get_list_npp_by_page($start,$limit,$keyword='')
    {
        $data=array();
        $conn=connection();
        $key="%".$keyword."%";
        $sql="SELECT * FROM nhaphanphoi AS a WHERE a.status=1 AND a.TenNPP LIKE :keyword OR a.SDTNPP LIKE :keyword OR a.DiaChiNPP LIKE :keyword LIMIT :start,:limit_a";
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
	function delete_npp_model($idnpp)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE nhaphanphoi AS a SET a.status=0 WHERE a.id_npp=:idnpp";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnpp',$idnpp,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	function check_name_npp_model($namenpp)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM nhaphanphoi AS a WHERE a.TenNPP=:tennpp";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tennpp',$namenpp,PDO::PARAM_STR);
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
	function check_phone_npp_model($phonenpp)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM nhaphanphoi AS a WHERE a.SDTNPP=:phonenpp";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':phonenpp',$phonenpp,PDO::PARAM_STR);
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
	function add_npp_model($usernpp,$phonenpp,$addressnpp,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$status=1;
		$create_time=date('Y-m-d H:i:s');
		$update_time="";
		$sql="INSERT INTO nhaphanphoi(TenNPP,SDTNPP,DiaChiNPP,img_path,status,create_time,update_time) VALUES(:tennpp,:sodt,:diachi,:img_path,:status,:create_time,:update_time)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tennpp',$usernpp,PDO::PARAM_STR);
			$stmt->bindParam(':sodt',$phonenpp,PDO::PARAM_STR);
			$stmt->bindParam(':diachi',$addressnpp,PDO::PARAM_STR);
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

	function get_info_npp_model($idnpp)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM nhaphanphoi AS a WHERE a.id_npp=:idnpp LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnpp',$idnpp,PDO::PARAM_INT);
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

	function edit_npp_model($idnpp,$namenpp,$phonenpp,$addressnpp,$status)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time="";
		$update_time=date('Y-m-d H:i:s');
		$sql="UPDATE nhaphanphoi AS a SET a.TenNPP=:tennpp,a.SDTNPP=:sodt,a.DiaChiNPP=:diachi,a.status=:status,a.create_time=:create_time,a.update_time=:update_time WHERE a.id_npp=:idnpp";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idnpp',$idnpp,PDO::PARAM_INT);
			$stmt->bindParam(':tennpp',$namenpp,PDO::PARAM_STR);
			$stmt->bindParam(':sodt',$phonenpp,PDO::PARAM_STR);
			$stmt->bindParam(':diachi',$addressnpp,PDO::PARAM_STR);
			
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
?>