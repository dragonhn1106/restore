<?php
require_once('app/model/cart_model.php');
require_once('app/lips/captcha.php');
$method=isset($_GET['method']) ? trim($_GET['method']) : "index";
switch ($method) {
    case 'index':
        list_detail();
        break;
}
function list_detail()
{
    $stringTitle = isset($_GET['sanpham']) ? trim($_GET['sanpham']) : "";
    $stringIdSanPham = explode("-", $stringTitle);
    $idSanPham = end($stringIdSanPham);
    $idSanPham = is_numeric($idSanPham) ? $idSanPham : 0;

    $detail_data = get_info_sanpham_by_id_model($idSanPham);
    if(!empty($detail_data))
    {
        $captcha=simple_php_captcha();
        $_SESSION['captcha'] = $captcha['code'];
        $checkSession = isset($_SESSION['username']) ? '1' : '0';
        update_viewer_model($idSanPham,$detail_data['SoLuotXem']);
        $data_type_sanpham_same=get_info_type_sanpham_same($idSanPham,$detail_data['id_loai']);
        //nhung cau hoi pho bien
        $data_question_popular=get_all_question_popular_model();

        $comment=get_all_question_by_idSanPham_model($idSanPham);
        //echo "<pre>"; var_dump($comment);die;
        $answer=get_all_answer_by_model();

        require_once('app/view/detail/index_view.php');
    }
    else
    {
        require_once('app/view/home/errors_view.php');
    }

}
?>