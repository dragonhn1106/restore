<?php
require_once('../model/nguoidung_model.php');
require_once('../libs/libs.php');


$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
switch ($method) {
    case 'index':
        listUser();
        break;
    case 'active':
        active_user();
        break;
}


function listUser()
{
    $idAdmin = isset($_GET['id']) ? trim($_GET['id']) : '';
    if ($idAdmin !== '' && is_numeric($idAdmin)) {
        $delete = delete_user($idAdmin);
    }
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $limit = 20;
    $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
    $keyword = htmlentities($keyword);
    $dataCount = get_list_user($keyword);
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('sk' => 'nguoidung', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword));
    $pagingUser = paging($link, $total_page, $page, $limit, $keyword);
    $data = get_list_user_by_page($pagingUser['start'], $pagingUser['limit'], $pagingUser['key']);
    require_once('../view/nguoidung/user_view.php');


}



function active_user()
{
    $idAdmin = isset($_GET['id']) ? trim($_GET['id']) : '';
    if ($idAdmin !== '' && is_numeric($idAdmin)) {
        $active = edit_user($idAdmin);
    }
    $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
    $limit = 6;
    $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
    $keyword = htmlentities($keyword);
    $dataCount = get_list_user($keyword);
    $total_page = count($dataCount);
    $link = create_link(BASE_URL, array('sk' => 'nguoidung', 'm' => 'index', 'page' => '{page}', 'keyword' => $keyword));
    $pagingUser = paging($link, $total_page, $page, $limit, $keyword);
    $data = get_list_user_by_page($pagingUser['start'], $pagingUser['limit'], $pagingUser['key']);
    require_once('../view/nguoidung/user_view.php');

}


?>
