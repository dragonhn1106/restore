<?php
require_once('../config/config.php');
function get_list_user_admin($keyword ='')
{
    $data=array();
    $conn=connection();
    $key="%".$keyword."%";
    $sql="SELECT * FROM admin AS a WHERE (a.username LIKE :keyword OR a.email LIKE :keyword OR a.phone LIKE :keyword OR a.address LIKE :keyword) AND (a.status=1)";
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

function add_user($username, $password, $email, $phone, $address, $role_admin,$img_path = '')
{
    $checkFlag = FALSE;
    $conn   = connection();
    $status = 1;
    $create_time = date('Y-m-d H:i:s');
    $update_time = '';
    $sql  = "INSERT INTO admin(username, password, email, phone, address, role_admin, status, img_path, create_time, update_time) VALUES (:username, :password, :email, :phone, :address, :role_admin, :status, :img_path, :create_time, :update_time);";
    $stmt = $conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->bindParam(':password',$password, PDO::PARAM_STR);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone, PDO::PARAM_STR);
        $stmt->bindParam(':address',$address, PDO::PARAM_STR);
        $stmt->bindParam(':role_admin',$role_admin, PDO::PARAM_INT);
        $stmt->bindParam(':status',$status, PDO::PARAM_INT);
        $stmt->bindParam(':img_path',$img_path, PDO::PARAM_STR);
        $stmt->bindParam(':create_time',$create_time, PDO::PARAM_STR);
        $stmt->bindParam(':update_time',$update_time, PDO::PARAM_STR);
        if($stmt->execute())
        {
            $checkFlag = TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}

function delete_user_admin($id)
{
    $checkFlag = FALSE;
    $conn   = connection();
    $sql    = "UPDATE admin AS a SET a.status = 0 WHERE a.id_admin = :id ;";
    $stmt = $conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        if($stmt->execute())
        {
            $checkFlag = TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}
function get_info_by_user($id)
{
    $data=array();
    $conn=connection();
    $sql="SELECT * FROM admin AS a WHERE a.id_admin=:id LIMIT 1";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
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

function edit_user_admin($id_admin,$username, $password, $email, $phone, $address, $role_admin,$status,$img_path='')
{
    $checkFlag = FALSE;
    $data=array();
    $conn=connection();
    $create_time = '';
    $update_time = date('Y-m-d H:i:s');
    $sql="UPDATE admin AS a SET a.username=:username,a.password=:password,a.email=:email,a.phone=:phone,a.address=:address,a.role_admin=:role_admin,a.status=:status,a.img_path=:img_path,a.create_time=:create_time,a.update_time=:update_time WHERE a.id_admin=:id_admin LIMIT 1";
    $stmt=$conn->prepare($sql);
    if($stmt)
    {
        $stmt->bindParam(':id_admin',$id_admin, PDO::PARAM_INT);
        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->bindParam(':password',$password, PDO::PARAM_STR);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->bindParam(':phone',$phone, PDO::PARAM_STR);
        $stmt->bindParam(':address',$address, PDO::PARAM_STR);
        $stmt->bindParam(':role_admin',$role_admin, PDO::PARAM_INT);
        $stmt->bindParam(':status',$status, PDO::PARAM_INT);
        $stmt->bindParam(':img_path',$img_path, PDO::PARAM_STR);
        $stmt->bindParam(':create_time',$create_time, PDO::PARAM_STR);
        $stmt->bindParam(':update_time',$update_time, PDO::PARAM_STR);
        if($stmt->execute())
        {
            $checkFlag = TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}
function get_list_user_admin_by_page($start,$limit,$key='')
{
    $data=array();
    $conn=connection();
    $key="%".$key."%";
    $sql="SELECT * FROM admin AS a WHERE a.status = 1 AND a.username LIKE :keyword OR a.email LIKE :keyword OR a.phone LIKE :keyword OR a.address LIKE :keyword LIMIT :start,:limit_a";
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