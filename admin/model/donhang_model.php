<?php
require_once('../config/config.php');
function get_list_orders_customer_model()
{
    $data=array();
    $conn=connection();
    $lstOrders=array();
    $sql="SELECT a.id_hd,a.id_kinh AS id_kinh,a.TenKH,a.SDT,a.Email,a.DiaChi,a.GhiChu,a.SoLuong,a.ThanhTien,a.TrangThai,a.create_time,a.update_time,b.TenKinh,b.HinhAnh FROM donhang AS a INNER JOIN kinh  AS b ON a.id_kinh=b.id";
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

    foreach ($data as $key => $val) {
        $lstOrders[$val['id_kinh']]['nameSanPham']=$val['TenKinh'];
        $lstOrders[$val['id_kinh']]['hinhAnh']=$val['HinhAnh'];
        $lstOrders[$val['id_kinh']]['customer'][]=$val;
    }
    return $lstOrders;

}


function update_status_orders_model($id_hd,$checkaction)
{
    $checkFlag=FALSE;
    $conn=connection();
    $sql="UPDATE donhang AS a SET a.TrangThai = :action WHERE a.id_hd = :id_hd";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':action',$checkaction,PDO::PARAM_INT);
        $stmt->bindParam(':id_hd',$id_hd,PDO::PARAM_INT);
        if($stmt->execute())
        {
            $checkFlag=TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}

function get_orders_status($id)
{
    $data = array();
    $conn = connection();
    $sql="SELECT a.TrangThai FROM donhang AS a WHERE a.id_hd= :id LIMIT 1";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        if($stmt->execute())
        {
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function add_orders_success_model($id_hd,$status)
{
    $checkFlag=FALSE;
    $conn=connection();
    $create_time=date('Y-m-d H:i:s');
    $update_time="";
    $sql="INSERT INTO chitiethoadon(id_dh,status,create_time,update_time) VALUES(:id_dh,:status,:create_time,:update_time)";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id_dh',$id_hd,PDO::PARAM_INT);
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