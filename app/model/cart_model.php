<?php
require_once('app/config/config.php');
function get_info_sanpham_by_id_model($idSanPham)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE a.id=:idBook ORDER BY a.create_time DESC LIMIT 1";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idBook',$idSanPham,PDO::PARAM_INT);
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
function update_viewer_model($idSanPham,$view)
{
    $conn=connection();
    $view++;
    $sql="UPDATE kinh AS a SET a.SoLuotXem=:soluot WHERE a.id=:idbook LIMIT 1";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':soluot',$view,PDO::PARAM_INT);
        $stmt->bindParam(':idbook',$idSanPham,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }
    disconnection($conn);
}
function get_info_type_sanpham_same($idSanPham,$idLoaiSP)
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.id,a.TenKinh,b.id_nsx,b.TenNSX,c.id_npp,c.TenNPP,a.HinhAnh,a.GiaCu,a.GiaMoi,d.id_loai,d.TenLoai,a.status,a.SoLuong,a.SoLuotXem,a.create_time,a.date_time FROM kinh AS a INNER JOIN nhasanxuat AS b ON a.id_nsx=b.id_nsx INNER JOIN nhaphanphoi AS c ON a.id_npp=c.id_npp INNER JOIN loaikinh AS d ON a.id_loai=d.id_loai WHERE d.id_loai=:idloai AND a.id <> :idBook ORDER BY a.create_time DESC";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idBook',$idSanPham,PDO::PARAM_INT);
        $stmt->bindParam(':idloai',$idLoaiSP,PDO::PARAM_INT);
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
function get_all_question_by_idSanPham_model($idSanPham)
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM questions AS a WHERE a.status=1 AND a.id_kinh=:idSanPham ORDER BY a.like_comment DESC";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idSanPham',$idSanPham,PDO::PARAM_INT);
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

function get_all_answer_by_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM answers AS a WHERE a.status=1 ORDER BY a.like_answer DESC";
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

function get_all_question_popular_model()
{
    $data=array();
    $conn=connection();
    $sql="SELECT a.content FROM questions AS a ORDER BY a.like_comment DESC LIMIT 0,6";
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

//add đơn hàng
function add_orders_customer($idSanPham,$fullname,$phone,$email,$address,$note,$qty,$money)
{
    $checkFlag=FALSE;
    $conn=connection();
    $status=0;
    $create_time=date('Y-m-d H:i:s');
    $update_time="";
    $sql="INSERT INTO donhang(id_kinh,TenKH,SDT,Email,DiaChi,GhiChu,SoLuong,ThanhTien,TrangThai,create_time,update_time) VALUES(:idSanPham,:fullname,:phone,:email,:address,:note,:qty,:thanhtien,:status,:create_time,:update_time)";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':idSanPham',$idSanPham,PDO::PARAM_INT);
        $stmt->bindParam(':fullname',$fullname,PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone,PDO::PARAM_STR);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':address',$address,PDO::PARAM_STR);
        $stmt->bindParam(':note',$note,PDO::PARAM_STR);
        $stmt->bindParam(':qty',$qty,PDO::PARAM_INT);
        $stmt->bindParam(':thanhtien',$money,PDO::PARAM_INT);
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