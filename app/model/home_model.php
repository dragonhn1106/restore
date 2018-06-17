<?php
require_once('app/config/config.php');
function get_info_all_sanpham_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai ORDER BY a.create_time DESC";
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

function get_info_all_loaisp_model($id_loai)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.id_loai=:idloai ORDER BY a.create_time DESC";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idloai',$id_loai,PDO::PARAM_INT);
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

function get_info_all_nhaphanphoi_model($idNPP)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.id_npp=:idtg ORDER BY a.create_time DESC";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idtg',$idNPP,PDO::PARAM_INT);
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

function get_info_all_nsx_model($idnsx)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.id_nsx=:id_nxb ORDER BY a.create_time DESC";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id_nxb',$idnsx,PDO::PARAM_INT);
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

function get_info_all_money_model($fmoney,$tmoney)
{

    $data=array();
    $conn=connection();
    if($tmoney>0)
    {
        $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.GiaCu BETWEEN :fmoney AND :tmoney ORDER BY a.create_time DESC";
    }
    else
    {
        $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.GiaCu > :fmoney ORDER BY a.create_time DESC";
    }
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':fmoney',$fmoney,PDO::PARAM_INT);
        if($tmoney>0)
        {
            $stmt->bindParam(':tmoney',$tmoney,PDO::PARAM_INT);
        }
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

function get_info_all_sanpham_by_page_model($start,$limit)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
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

function get_info_all_loaisp_by_page_model($id_loai,$start,$limit)
{
    $start=0;
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE d.id_loai=:idloai ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idloai',$id_loai,PDO::PARAM_INT);
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

function get_info_all_nhaphanphoi_by_page_model($id_npp,$start,$limit)
{
    $start=0;
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE c.id_npp=:idtg ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {

        $stmt->bindParam(':idtg',$id_npp,PDO::PARAM_INT);
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

function get_info_all_nsx_by_page_model($id_nsx,$start,$limit)
{
    $start = 1;
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE b.id_nsx=:id_nsx ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id_nsx',$id_nsx,PDO::PARAM_INT);
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

function get_info_all_money_by_page_model($fmoney,$tmoney,$start,$limit)
{
    $start=0;
    $data=array();
    $conn=connection();
    if($tmoney>0)
    {
        $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.GiaCu BETWEEN :fmoney AND :tmoney ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    }
    else
    {
        $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.GiaCu > :fmoney ORDER BY a.create_time DESC LIMIT :start,:limit_a";
    }
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':fmoney',$fmoney,PDO::PARAM_INT);
        if($tmoney>0)
        {
            $stmt->bindParam(':tmoney',$tmoney,PDO::PARAM_INT);
        }
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