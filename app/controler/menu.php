<?php
require_once('app/model/menu_right_model.php');
$data_loaikinh=get_all_list_loaikinh_model();
$data_npp=get_all_list_npp_model();
$data_nsx=get_all_list_nsx_model();
$data_max_viewer=get_info_list_all_sp_have_view_max_model();
require_once('app/view/menu_right_vew.php');
?>