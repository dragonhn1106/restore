<?php
require_once('app/model/home_model.php');
$method=isset($_GET['method']) ? trim($_GET['method']) : "index";
switch ($method) {
    case 'index':
        list_info_sanpham();
        break;
    case 'loaiSanPham':
        list_info_loaisanpham();
        break;
    case 'nhaphanphoi':
        list_info_nhaphanphoi();
        break;
    case 'nhasanxuat':
        list_info_nhasanxuat();
        break;
    case 'sp_theo_gia':
        list_info_money();
        break;
}

//xem danh sách sp
function list_info_sanpham()
{
    $dataCount = get_info_all_sanpham_model();
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 9;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'home','method'=>'index','page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $data_sanpham = get_info_all_sanpham_by_page_model($paginghome['start'],$paginghome['limit']);
    require_once('app/view/home/index_home.php');

}

//xem sp theo thể loại
function list_info_loaisanpham()
{
    $idloaiSanPham=isset($_GET['idloaiSanPham']) ? trim($_GET['idloaiSanPham']) : "";
    $idloaiSanPham=is_numeric($idloaiSanPham) ? $idloaiSanPham : "";

    $dataCount = get_info_all_loaisp_model($idloaiSanPham);
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 6;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'home','method'=>'loaiSanPham','idloaiSanPham'=>$idloaiSanPham,'page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $dataLoaiSanPham = get_info_all_loaisp_by_page_model($idloaiSanPham,$paginghome['start'],$paginghome['limit']);

    if(!empty($dataLoaiSanPham))
    {
        require_once('app/view/home/list_loaisp_view.php');
    }
    else
    {
        require_once('app/view/home/errors_view.php');
    }
}

//xem sp theo npp
function list_info_nhaphanphoi()
{
    $idNPP=isset($_GET['idnhaphanphoi']) ? trim($_GET['idnhaphanphoi']) : "";
    $idNPP=is_numeric($idNPP) ? $idNPP : "";
    $dataCount = get_info_all_nhaphanphoi_model($idNPP);
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 9;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'home','method'=>'nhaphanphoi','idnhaphanphoi'=>$idNPP,'page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $dataNPP = get_info_all_nhaphanphoi_by_page_model($idNPP,$paginghome['start'],$paginghome['limit']);

    if(!empty($dataNPP))
    {
        require_once('app/view/home/list_author_view.php');
    }
    else
    {
        require_once('app/view/home/errors_view.php');
    }
}

//xem sách theo giá tiền
function list_info_money()
{
    $fmoney=isset($_GET['fm']) ? trim($_GET['fm']) : "";
    $fmoney=is_numeric($fmoney) ? $fmoney : "";
    $tmoney=isset($_GET['tm']) ? trim($_GET['tm']) : "";
    $tmoney=is_numeric($tmoney) ? $tmoney : "";

    $dataCount = get_info_all_money_model($fmoney,$tmoney);
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 6;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'home','method'=>'sp_theo_gia','fm'=>$fmoney,'tm'=>$tmoney,'page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $dataMoneyBook = get_info_all_money_by_page_model($fmoney,$tmoney,$paginghome['start'],$paginghome['limit']);

    if(!empty($dataMoneyBook))
    {
        require_once('app/view/home/list_money_view.php');
    }
    else
    {
        require_once('app/view/home/errors_view.php');
    }
}

//xem sp theo nsx
function list_info_nhasanxuat()
{
    $idNSX=isset($_GET['idnhasanxuat']) ? trim($_GET['idnhasanxuat']) : "";
    $idNSX=is_numeric($idNSX) ? $idNSX : 0;

    $dataCount = get_info_all_nsx_model($idNSX);
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 4;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'home','method'=>'nsx','idNSX'=>$idNSX,'page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $dataNSX = get_info_all_nsx_by_page_model($idNSX,$paginghome['start'],$paginghome['limit']);

    if(!empty($dataNSX))
    {
        require_once('app/view/home/list_nhasanxuat_view.php');
    }
    else
    {
        require_once('app/view/home/errors_view.php');
    }
}

?>