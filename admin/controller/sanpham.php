<?php
require_once('../model/sanpham_model.php');
require_once('../libs/libs.php');

$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
switch ($method) {
    case 'index':
        list_sp();
        break;
    case 'add':
        add_sp();
        break;
    case 'edit':
        edit_sp();
        break;
}
function list_sp()
{
    $idsp=isset($_GET['id']) ? trim($_GET['id']) : "";
    if($idsp!=="" && is_numeric($idsp))
    {
        $delete=delete_sanpham_model($idsp);
    }
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $limit = 5;
    $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
    $keyword = htmlentities($keyword);
    $dataCount = list_all_sanpham_model($keyword);
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('sk'=>'sanpham','m'=>'index','page'=>'{page}','keyword'=>$keyword));
    $pagingUser = paging($link,$total_page,$page,$limit,$keyword);
    $data = get_list_sanpham_by_page($pagingUser['start'],$pagingUser['limit'],$pagingUser['key']);
    require_once('../view/sanpham/index_view.php');
}
function checkNameSanPham($tenKinh)
{
    $checkNameSP=check_name_sanpham($tenKinh);
    return $checkNameSP;
}
function add_sp()
{
    if(isset($_POST['btnSubmit']))
    {
        $ten_sp=isset($_POST['txtTenSP']) ? trim($_POST['txtTenSP']) : "";
        $ten_sp=htmlentities($ten_sp);

        $ten_nsx=isset($_POST['slcNXB']) ? trim($_POST['slcNXB']) : "";
        $ten_nsx=htmlentities($ten_nsx);

        $ten_npp=isset($_POST['slcNPP']) ? trim($_POST['slcNPP']) : "";
        $ten_npp=htmlentities($ten_npp);

        $loai_sp=isset($_POST['slcLoaiSP']) ? trim($_POST['slcLoaiSP']) : "";
        $loai_sp=htmlentities($loai_sp);

        $file =isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
        $img_path=upload_file($file);
        $img_path=($img_path!==FALSE) ? $img_path : "";

        $gia_sp=isset($_POST['txtGiaSP']) ? trim($_POST['txtGiaSP']) : "";
        $gia_sp=htmlentities($gia_sp);

        $soluong=isset($_POST['txtSoLuong']) ? trim($_POST['txtSoLuong']) : "";
        $soluong=htmlentities($soluong);

        $checkInfo = TRUE;
        $checkAdd = check_validate_add_sanpham($ten_sp,$ten_nsx,$ten_npp,$loai_sp,$gia_sp,$soluong);
        foreach ($checkAdd as $key => $val) {
            if(!empty($val))
            {
                $checkInfo = FALSE;
                break;
            }
        }
        if($checkInfo)
        {
            $checknamesanphamadd=checkNameSanPham($ten_sp);
            if($checknamesanphamadd)
            {
                $add=add_sanpham_model($ten_sp,$ten_nsx,$ten_npp,$loai_sp,$gia_sp,$soluong,$img_path);
                if($add)
                {
                    $mess="Thêm thành công";
                }
                else
                {
                    $mess="Thêm không thành công";
                }
            }
            else
            {
                $mess="Tên sản phẩm đã tồn tại";
            }
        }

    }
    $data_loaikinh = get_all_list_loaikinh_model();
    $data_npp = get_all_list_nhaphanphoi_model();
    $data_nsx = get_all_list_nsx_model();
    require_once('../view/sanpham/them_sanpham.php');
}

function edit_sp()
{
    $id_sp=isset($_GET['id']) ? trim($_GET['id']) : 0;
    if(isset($_POST['btnSubmit']))
    {
        $ten_sp=isset($_POST['txtTenSP']) ? trim($_POST['txtTenSP']) : "";
        $ten_sp=htmlentities($ten_sp);

        $ten_nsx=isset($_POST['slcNSX']) ? trim($_POST['slcNSX']) : "";
        $ten_nsx=htmlentities($ten_nsx);

        $ten_npp=isset($_POST['slcNPP']) ? trim($_POST['slcNPP']) : "";
        $ten_npp=htmlentities($ten_npp);

        $loai_sp=isset($_POST['slcLoaiSP']) ? trim($_POST['slcLoaiSP']) : "";
        $loai_sp=htmlentities($loai_sp);

        $file =isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
        $img_path=upload_file($file);
        $img_path=($img_path!==FALSE) ? $img_path : "";

        $gia_sp=isset($_POST['txtGiaSP']) ? trim($_POST['txtGiaSP']) : "";
        $gia_sp=htmlentities($gia_sp);

        $soluong=isset($_POST['txtSoLuong']) ? trim($_POST['txtSoLuong']) : "";
        $soluong=htmlentities($soluong);

        $status=isset($_POST['slcStatus']) ? trim($_POST['slcStatus']) : "";

        $checkInfo = TRUE;
        $checkAdd = check_validate_edit_sanpham($ten_sp,$ten_nsx,$ten_npp,$loai_sp,$gia_sp,$soluong,$status);
        //echo '<pre>';var_dump($checkAdd);die();
        foreach($checkAdd as $key => $val) {
            if(!empty($val))
            {
                $checkInfo = FALSE;
                break;
            }
        }
        if($checkInfo)
        {
            $edit=edit_sanpham_model($id_sp,$ten_sp,$ten_nsx,$ten_npp,$img_path,$gia_sp,$loai_sp,$status,$soluong);
            if($edit)
            {
                $mess="Sửa thành công";
            }
            else
            {
                $mess="Sửa không thành công";
            }
        }

    }
    $data_sanpham = list_all_sanpham_model();
    $data_npp = get_all_list_nhaphanphoi_model();
    $data_nsx = get_all_list_nsx_model();
    $data_loaisp = get_all_list_loaikinh_model();
    $data=get_info_sanpham_model($id_sp);
//    echo'<pre>';
//    var_dump($data);die();
    if(!empty($data))
    {
        require_once('../view/sanpham/sua_sanpham.php');
    }
    else
    {
        require_once('../view/sanpham/error_sanpham.php');
    }
}

?>