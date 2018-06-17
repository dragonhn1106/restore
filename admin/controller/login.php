<?php
if(isset($_POST['btnSubmit']))
{
    $username = isset($_POST['txtTenDangNhap']) ? trim($_POST['txtTenDangNhap']) : '';
    $username = htmlentities($username);
    $password = isset($_POST['txtMatKhau']) ? trim($_POST['txtMatKhau']) : '';
    $password = htmlentities($password);

    $data = xl_login($username, $password);
    if(!empty($data))
    {
        $_SESSION['user'] = $data['username'];
        $_SESSION['role_admin'] = $data['role_admin'];
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['email'] = $data['email'];
        header("Location:controller/home.php");
    }
    else
    {
        header("Location:index.php?mess=err");
    }
}
?>