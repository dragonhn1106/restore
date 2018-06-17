<?php
	require_once('../model/loaisanpham_model.php');
	require_once('../libs/libs.php');
    $method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
    switch ($method) {
        case 'index':
            list_sp();
            break;
        case 'add':
            add_loaisp();
            break;
        case 'edit':
            edit_loaisp();
            break;
    }

    function list_sp()
    {
        $id_loai=isset($_GET['id']) ? trim($_GET['id']) : "";
        if($id_loai!=="" && is_numeric($id_loai))
        {
            $delete=delete_loaisp_model($id_loai);
        }
        $page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
        $limit = 4;
        $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
        $keyword = htmlentities($keyword);
        $dataCount = get_list_loaisp_model($keyword);
        $total_page = count($dataCount);
        $link = create_link(BASE_URL, array('sk'=>'loaisanpham','m'=>'index','page'=>'{page}','keyword'=>$keyword));
        $pagingUser = paging($link,$total_page,$page,$limit,$keyword);
        $data = get_list_loaisp_by_page($pagingUser['start'],$pagingUser['limit'],$pagingUser['key']);
        require_once('../view/loaisanpham/index_view.php');
    }
    function checkNameloaisp($nametype)
    {
    	//goi trong model
    	$check = check_name_loaisp_model($nametype);
    	return $check;
    }

    function add_loaisp()
    {
    	if(isset($_POST['btnSubmit']))
    	{
    		$nametype=isset($_POST['txtUsername']) ? trim($_POST['txUsername']) : "";
    		$nametype=htmlentities($nametype);
    		$file =isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
    		$img_path=upload_file($file);
    		$img_path=($img_path!==FALSE) ? $img_path : "";
    		$checkAdd=validate_add_loaisp($nametype);
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
            	$checknametype = checkNameloaisp($nametype);
            	if($checknametype)
            	{
	                $add = add_loaisp_model($nametype,$img_path);
	                if($add)
	                {
	                    $mess = 'Thêm thành công';
	                }
	                else
	                {
	                	$mess='Thêm không thành công';
	                }
            	}
            	else
            	{
            		$mess="Loại sản phẩm đã có trong CSDL";
            	}
            }
    	}
    	require_once('../view/loaisanpham/add_loaisanpham_view.php');
    }
    function edit_loaisp()
    {
        $id_loai=isset($_GET['id']) ? trim($_GET['id']) : 0;
        if(isset($_POST['btnSubmit']))
        {
            $info=get_info_loaisp_model($id_loai);
            $nametype=isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : "";
            $nametype=htmlentities($nametype);
            $status=isset($_POST['slcStatus']) ? trim($_POST['slcStatus']) : "";
            $file=isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
            $img_path = ($file !="") ? upload_file($file) : "";
            $img_path = ($img_path !==FALSE OR $img_path!="") ? $img_path : $info['img_path'];

            $checkInfo=TRUE;
            $checkAdd=validate_edit_loaisp($nametype,$status);
            foreach ($checkAdd as $key => $value) {
                if(!empty($value))
                {
                    $checkInfo=FALSE;
                    break;
                }
            }

            if($checkInfo)
            {              
                $edit=edit_loaisp_model($id_loai,$nametype,$status,$img_path);
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
        $data=get_info_loaisp_model($id_loai);
        if(!empty($data))
        {
            require_once('../view/loaisanpham/edit_loaisanpham_view.php');
        }
        else
        {
            require_once('../view/loaisanpham/error_loaisanpham_view.php');
        }
    }
?>