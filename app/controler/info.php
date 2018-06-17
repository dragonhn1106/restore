<?php
require_once('app/model/home_model.php');
$method=isset($_GET['method']) ? trim($_GET['method']) : "index";
switch ($method) {
    case 'index':
        list_info_nhasanxuat();
        break;
    }
function list_info_nhasanxuat()
{
    $idNSX=isset($_GET['idnhasanxuat']) ? trim($_GET['idnhasanxuat']) : "";
    $idNSX=is_numeric($idNSX) ? $idNSX : 0;

    $dataCount = get_info_all_nsx_model($idNSX);
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $page=is_numeric($page) ? $page : 1;
    $limit = 6;
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('cn'=>'info','method'=>'index','page'=>'{page}'));
    $paginghome = paging($link,$total_page,$page,$limit);
    $dataNSX = get_info_all_nsx_by_page_model($idNSX,$paginghome['start'],$paginghome['limit']);
    require_once('app/view/info/info_loaisp_view.php');
}

?>