<?php
	require_once('../config/config.php');
	function get_list_loaisp_model($keyword ='')
	{
	    $data=array();
	    $conn=connection();
	    $key="%".$keyword."%";
	    $sql="SELECT * FROM loaikinh AS a WHERE (a.TenLoai LIKE :keyword) AND (a.status=1)";
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

	function get_info_loaisp_model($idloai)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM loaikinh AS a WHERE a.id_loai=:idloai LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idloai',$idloai,PDO::PARAM_INT);
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

	function delete_loaisp_model($idloai)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE loaikinh AS a SET a.status=0 WHERE a.id_loai=:idloai";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':idloai',$idloai,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}

	function add_loaisp_model($nametype,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time=date('Y-m-d H:i:s');
		$update_time="";
		$status=1;
		$sql="INSERT INTO loaikinh(TenLoai,img_path,status,create_time,update_time) VALUES(:tenloai,:img,:status,:create_time,:update_time)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tenloai',$nametype,PDO::PARAM_STR);
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

	function edit_loaisp_model($id_loai,$nametype,$status,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time="";
		$update_time=date('Y-m-d H:i:s');
		$sql="UPDATE loaikinh AS a SET a.TenLoai=:tenloai,a.img_path=:img,a.status=:status,a.create_time=:create_time,a.update_time=:update_time WHERE a.id_loai=:id_loai";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id_loai',$id_loai,PDO::PARAM_INT);
			$stmt->bindParam(':tenloai',$nametype,PDO::PARAM_STR);
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

	function check_name_loaisp_model($tenloaisp)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM loaikinh AS a WHERE a.TenLoai=:tenloai";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tenloai',$tenloaisp,PDO::PARAM_STR);
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

	function get_list_loaisp_by_page($start,$limit,$keyword='')
    {
        $data=array();
        $conn=connection();
        $key="%".$keyword."%";
        $sql="SELECT * FROM loaikinh AS a WHERE a.status=1 AND a.TenLoai LIKE :keyword LIMIT :start,:limit_a";
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
?>