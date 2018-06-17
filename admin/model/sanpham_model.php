<?php
	require_once('../config/config.php');
	//hàm lấy dữ liệu nhà sản xuất
	function get_all_list_nsx_model($keyword ='')
	{
		$data=array();
		$conn=connection();
		$key="%".$keyword."%";
		$sql="SELECT * FROM nhasanxuat where status=1";
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
	// hàm lấy ra dữ liệu nhà phân phối
	function get_all_list_nhaphanphoi_model()
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM nhaphanphoi where status=1";
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
	//hàm lấy ra dữ liệu loại kính
	function get_all_list_loaikinh_model()
	{
		$data=array();
		$conn=connection();
		$sql="SELECT * FROM loaikinh where status=1";
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
	//hàm lấy dữ liệu san phẩm kính
	function list_all_sanpham_model($keyword='')
	{
		$data=array();
		$conn=connection();
		$key="%".$keyword."%";
            $sql="SELECT a.id, a.TenKinh,b.TenNPP,a.status,c.TenNSX,a.HinhAnh,a.GiaCu,a.GiaMoi,d.TenLoai,a.SoLuong,a.SoLuotXem FROM kinh AS a INNER JOIN nhaphanphoi AS b ON a.id_npp=b.id_npp INNER JOIN nhasanxuat AS c ON a.id_nsx=c.id_nsx INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE (a.status=1 AND a.TenKinh LIKE :keyword OR b.TenNPP LIKE :keyword OR c.TenNSX LIKE :keyword OR d.TenLoai LIKE :keyword) AND (a.status=1)";
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
	//ham phân trang
	function get_list_sanpham_by_page($start,$limit,$keyword='')
    {

        $data=array();
        $conn=connection();
        $key="%".$keyword."%";

        //$sql="SELECT a.id, a.TenKinh,b.TenNPP,a.status,c.TenNSX,a.HinhAnh,a.GiaCu,a.GiaMoi,d.TenLoai,a.SoLuong,a.SoLuotXem FROM kinh AS a INNER JOIN nhaphanphoi AS b ON a.id_npp=b.id_npp INNER JOIN nhasanxuat AS c ON a.id_nsx=c.id_nsx INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.status=1 AND a.TenKinh LIKE :keyword OR b.TenNPP LIKE :keyword OR c.TenNSX LIKE :keyword OR d.TenLoai LIKE :keyword LIMIT :start,:limit_a";
        $sql = "SELECT a.id,a.TenKinh,b.TenNPP,a. STATUS,c.TenNSX,a.HinhAnh,a.GiaCu,a.GiaMoi,d.TenLoai,a.SoLuong,a.SoLuotXem FROM kinh AS a INNER JOIN nhaphanphoi AS b ON a.id_npp = b.id_npp INNER JOIN nhasanxuat AS c ON a.id_nsx = c.id_nsx INNER JOIN loaikinh AS d ON a.id_loai = d.id_loai WHERE a. STATUS = 1 AND a.TenKinh LIKE :keyword OR b.TenNPP LIKE  :keyword  OR c.TenNSX LIKE :keyword OR d.TenLoai LIKE  :keyword LIMIT  :start , :limit_a";
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
    //check tên sản phẩm kính
	function check_name_sanpham($tenKinh)
	{
		$checkFlag=TRUE;
		$conn=connection();
		$sql="SELECT * FROM kinh AS a WHERE a.TenKinh=:tenKinh";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tenKinh',$tenKinh,PDO::PARAM_STR);
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
	//xóa sản phẩm theo id
	function delete_sanpham_model($id_sp)
	{
		$checkFlag=FALSE;
		$conn=connection();
		$sql="UPDATE kinh AS a SET a.status=0 WHERE a.id=:id_sp";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id_sp',$id_sp,PDO::PARAM_INT);
			if($stmt->execute())
			{
				$checkFlag=TRUE;

			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	//thêm loại sản phẩm
	function add_sanpham_model($tenKinh,$nhaPhanPhoi,$nhaSanXuat,$kieuKinh,$giaCu,$soLuong,$img_path='')
	{
		$checkFlag=FALSE;
		$conn=connection();
		$create_time=date('Y-m-d H:i:s');
		$date_time="";
		$status=1;
		$giaMoi=0;
		$luotxem=0;
		$sql="INSERT INTO kinh(TenKinh,id_npp,id_nsx,HinhAnh,GiaCu,GiaMoi,id_loai,status,SoLuong,SoLuotXem,create_time,date_time) VALUES(:tenKinh,:idnpp,:idnsx,:hinhanh,:giacu,:giamoi,:idloai,:status,:soluong,:soluotxem,:create_time,:date_time)";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':tenKinh',$tenKinh,PDO::PARAM_STR);
			$stmt->bindParam(':idnpp',$nhaPhanPhoi,PDO::PARAM_STR);
			$stmt->bindParam(':idnsx',$nhaSanXuat,PDO::PARAM_STR);
			$stmt->bindParam(':hinhanh',$img_path,PDO::PARAM_STR);
			$stmt->bindParam(':giacu',$giaCu,PDO::PARAM_INT);
			$stmt->bindParam(':giamoi',$giaMoi,PDO::PARAM_INT);
			$stmt->bindParam(':idloai',$kieuKinh,PDO::PARAM_STR);
			$stmt->bindParam(':status',$status,PDO::PARAM_INT);
			$stmt->bindParam(':soluong',$soLuong,PDO::PARAM_INT);
			$stmt->bindParam(':soluotxem',$luotxem,PDO::PARAM_INT);
			$stmt->bindParam(':create_time',$create_time,PDO::PARAM_STR);
			$stmt->bindParam(':date_time',$date_time,PDO::PARAM_STR);
			if($stmt->execute())
			{
				$checkFlag=TRUE;
			}
			$stmt->closeCursor();
		}
		disconnection($conn);
		return $checkFlag;
	}
	// chỉnh sửa sản phẩm
	function edit_sanpham_model($id,$tenKinh,$id_nsx,$id_npp,$img_path='',$GiaMoi,$id_loai,$status,$SoLuong)
	{
		$checkFlag =FALSE;
		$conn = connection();
		$giacu=0;
		$soluotxem=0;
		$date_time=date('Y-m-d H:i:s');
		$sql = "UPDATE kinh AS a SET a.TenKinh = :tenKinh, a.id_nsx = :id_nsx, a.id_npp= :id_npp,a.HinhAnh=:img_path, a.GiaCu=:GiaCu, a.GiaMoi=:GiaMoi, a.id_loai=:id_loai,a.status=:status, a.SoLuong=:SoLuong, a.SoLuotXem=:SoLuotXem,a.date_time=:date_time WHERE a.id=:id LIMIT 1";
		$stmt = $conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id',$id, PDO::PARAM_STR);
			$stmt->bindParam(':tenKinh',$tenKinh, PDO::PARAM_STR);
	        $stmt->bindParam(':id_nsx',$id_nsx, PDO::PARAM_INT);
	        $stmt->bindParam(':id_npp',$id_npp, PDO::PARAM_INT);
	        $stmt->bindParam(':img_path',$img_path, PDO::PARAM_STR);
	        $stmt->bindParam(':GiaCu',$giacu, PDO::PARAM_INT);
	        $stmt->bindParam(':GiaMoi',$GiaMoi, PDO::PARAM_INT);
	        $stmt->bindParam(':id_loai',$id_loai, PDO::PARAM_INT);
	        $stmt->bindParam(':status',$status, PDO::PARAM_INT);
	        $stmt->bindParam(':SoLuong',$SoLuong, PDO::PARAM_INT);
	        $stmt->bindParam(':SoLuotXem',$soluotxem, PDO::PARAM_INT);
	        $stmt->bindParam(':date_time',$date_time, PDO::PARAM_STR);
	        if($stmt->execute())
	        {
	        	$checkFlag=TRUE;
	        }
	        $stmt->closeCursor();	        
		}
		disconnection($conn);
		return $checkFlag;
	}
	//lấy info sản phẩm kính
	function get_info_sanpham_model($id_sp)
	{
		$data=array();
		$conn=connection();
		$sql="SELECT a.id, a.TenKinh,b.id_nsx,b.TenNSX,a.status,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.id=:id LIMIT 1";
		$stmt=$conn->prepare($sql);
		if($stmt)
		{
			$stmt->bindParam(':id',$id_sp,PDO::PARAM_INT);
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
	

?>