<?php
	require_once('app/config/config.php');
	function get_all_sanpham_keyword_model($keyword)
	{
		$data=array();
		$conn=connection();
		$key="%".$keyword."%";
		$sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.TenKinh LIKE :keyword OR b.TenNSX LIKE :keyword OR c.TenNPP LIKE :keyword OR d.TenLoai LIKE :keyword ORDER BY a.create_time DESC";
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

	
?>