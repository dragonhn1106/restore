<?php
require_once('app/config/config.php');
function get_all_list_loaikinh_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM loaikinh";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        if($stmt->execute())
        {
            if($stmt->rowCount())
            {
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function get_all_list_npp_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM nhaphanphoi";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        if($stmt->execute())
        {
            if($stmt->rowCount())
            {
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function get_all_list_nsx_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM nhasanxuat";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        if($stmt->execute())
        {
            if($stmt->rowCount())
            {
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function get_info_list_all_sp_have_view_max_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai ORDER BY a.SoLuotXem DESC LIMIT 0,2";
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
?>