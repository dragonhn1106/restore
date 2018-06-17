<?php
require_once('../model/user_model.php');
require_once('../libs/libs.php');

$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
switch ($method) {
    case 'index':
        listUser();
        break;
    case 'add':
        add_user_admin();
        break;
    case 'edit':
        edit();
        break;
}
function get_by_ava_admin(){
    $data = get_list_user_admin();
    echo '<pre>';var_dump($data); die('xxx');
    require_once ('../view/header_view.php');
}
function add_user_admin()
{
    if(isset($_POST['btnSubmit']))
    {
        $username = isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : '';
        $username = htmlentities($username);
        $password = isset($_POST['txtPass']) ? trim($_POST['txtPass']) : '';
        $password = htmlentities($password);
        $email    = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : '';
        $email    = htmlentities($email);
        $phone    = isset($_POST['txtphone']) ? trim($_POST['txtphone']) : '';
        $phone    = htmlentities($phone);
        $address  = isset($_POST['txtadress']) ? trim($_POST['txtadress']) : '';
        $address  = htmlentities($address);
        $role     = isset($_POST['slcRole']) ? trim($_POST['slcRole']) : '';
        $file     = $_FILES['nameFileImg'];
        $img_path = upload_file($file);
        $img_path = ($img_path !== FALSE) ? $img_path : '';

        $checkAdd = validate_form_add_admin($username, $password, $email, $phone, $address, $role);

        $checkInfo = TRUE;
        foreach ($checkAdd as $key => $val) {
            if(!empty($val))
            {
                $checkInfo = FALSE;
                break;
            }
        }
        if($checkInfo)
        {
            // goi ham trong model
            $add = add_user($username, $password, $email, $phone, $address, $role,$img_path);
            if($add)
            {
                $mess = 'Thêm thành công';
            }
        }
    }
    require_once('../view/user/add_admin_view.php');
    require_once ('../view/header_view.php');
}

function listUser()
{
    $idAdmin = isset($_GET['id']) ? trim($_GET['id']) : '';
    if($idAdmin !== '' && is_numeric($idAdmin))
    {
        $delete = delete_user_admin($idAdmin);
    }
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $limit = 4;
    $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
    $keyword = htmlentities($keyword);
    $dataCount = get_list_user_admin($keyword);
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('sk'=>'user','m'=>'index','page'=>'{page}','keyword'=>$keyword));
    $pagingUser = paging($link,$total_page,$page,$limit,$keyword);
    $data = get_list_user_admin_by_page($pagingUser['start'],$pagingUser['limit'],$pagingUser['key']);
    require_once('../view/user/user_view.php');



}

function edit()
{
    $idAdmin=isset($_GET['id']) ? trim($_GET['id']) : 0;
    if(isset($_POST['btnSubmit']))
    {
        $info=get_info_by_user($idAdmin);
        $username = isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : '';
        $username = htmlentities($username);
        $password = isset($_POST['txtPass']) ? trim($_POST['txtPass']) : '';
        $password = htmlentities($password);
        $email    = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : '';
        $email    = htmlentities($email);
        $phone    = isset($_POST['txtphone']) ? trim($_POST['txtphone']) : '';
        $phone    = htmlentities($phone);
        $address  = isset($_POST['txtadress']) ? trim($_POST['txtadress']) : '';
        $address  = htmlentities($address);
        $role     = isset($_POST['slcRole']) ? trim($_POST['slcRole']) : '';
        $status   = isset($_POST['slcStatus']) ? trim($_POST['slcStatus']) : '';
        $file =isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
        $img_path = ($file !="") ? upload_file($file) : "";
        $img_path = ($img_path !==FALSE OR $img_path!="") ? $img_path : $info['img_path'];

        $checkAdd = validate_form_add_admin($username, $password, $email, $phone, $address, $role);
        $checkInfo = TRUE;
        foreach ($checkAdd as $key => $val) {
            if(!empty($val))
            {
                $checkInfo = FALSE;
                break;
            }
        }

        if($checkInfo)
        {
            // goi ham trong model
            $edit = edit_user_admin($idAdmin,$username, $password, $email, $phone, $address, $role,$status,$img_path);
            if($edit)
            {
                $mess = 'Sửa thành công';
                //header("Refresh:0");
            }
            else
            {
                $mess = "Sửa không thành công";
            }
        }
    }
    $data=get_info_by_user($idAdmin);
    if(!empty($data))
    {
        require_once('../view/user/edit_admin_view.php');
    }
    else
    {
        require_once('../view/user/errors_admin_view.php');
    }
}
?>
