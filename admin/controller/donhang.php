<?php
require_once('../model/donhang_model.php');
$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
switch ($method) {
    case 'index':
        list_orders();
        break;
    case 'action':
        action_orders();
        success_orders();
        break;
}

function list_orders()
{
    $list_orders_customer = get_list_orders_customer_model();
    require_once('../view/donhang/index_view.php');
}


function action_orders()
{
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])
        =='xmlhttprequest')
    {
        $id_hd=isset($_POST['idHD']) ? trim($_POST['idHD']) : 0;
        $checkaction=isset($_POST['checkaction']) ? trim($_POST['checkaction']) : 0;
        $check=in_array($checkaction, array('1','2')) ? TRUE : FALSE;
        if($check && $id_hd > 0)
        {
            $update=update_status_orders_model($id_hd,$checkaction);
            if($update)
            {
                echo 'ok';
                $info=get_orders_status($id_hd);
                $status = $info['TrangThai'];
                list_orders();

                if($status==1)
                {
                    $add_cthd = add_orders_success_model($id_hd,$status);
                    list_orders();
                }
            }
            else
            {
                echo 'fail';
                list_orders();
            }
        }
        else
        {
            echo 'err';
            list_orders();
        }
        list_orders();
    }
}

?>