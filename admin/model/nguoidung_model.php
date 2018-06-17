<?php
/**
 * Created by PhpStorm.
 * User: drago
 * Date: 5/22/2018
 * Time: 10:44 AM
 */
require_once('../config/config.php');
function get_list_user($keyword = '')
{
    $data = array();
    $conn = connection();
    $key = "%" . $keyword . "%";
    $sql = "SELECT * FROM taikhoan AS a WHERE (a.TenDangNhap LIKE :keyword OR a.TenHienThi LIKE :keyword OR a.SDT LIKE :keyword OR a.DiaChi LIKE :keyword) AND (a.status=1)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function delete_user($id)
{
    $checkFlag = FALSE;
    $conn = connection();
    $sql = "UPDATE taikhoan AS a SET a.status   = 0 WHERE a.id_tk = :id ;";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $checkFlag = TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}

function get_info_by_user($id)
{
    $data = array();
    $conn = connection();
    $sql = "SELECT * FROM taikhoan AS a WHERE a.id_tk=:id LIMIT 1";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $data;
}

function edit_user($id)
{
    $checkFlag = FALSE;
    $conn = connection();
    $sql = "UPDATE taikhoan AS a SET a.status   = 1 WHERE a.id_tk = :id ;";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $checkFlag = TRUE;
        }
        $stmt->closeCursor();
    }
    disconnection($conn);
    return $checkFlag;
}

function get_list_user_by_page($start, $limit, $key = '')
{
    $data = array();
    $conn = connection();
    $key = "%" . $key . "%";
    $sql = "SELECT * FROM taikhoan AS a WHERE a.status = 1 AND a.TenDangNhap LIKE :keyword OR TenHienThi LIKE :keyword OR a.DiaChi LIKE :keyword OR a.SDT LIKE :keyword LIMIT :start,:limit_a";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':limit_a', $limit, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        $stmt->closeCursor();

    }
    disconnection($conn);
    return $data;
}

?>