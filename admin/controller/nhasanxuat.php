<?php
	require_once('../model/nsx_model.php');
	require_once('../libs/libs.php');
	$m=isset($_GET['m']) ? trim($_GET['m']) : "index";
	switch ($m) {
		case 'index':
			listNSX();
			break;
		case 'add':
			add_nsx();
			break;
		case 'edit':
			edit_nsx();
			break;
	}
	function listNSX()
	{
		$idnsx=isset($_GET['id_nsx']) ? trim($_GET['id_nsx']) : "";
        if($idnsx!=="" && is_numeric($idnsx))
        {
            $delete=delete_nsx_model($idnsx);
        }
		$page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
        $limit = 4;
        $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
        $keyword = htmlentities($keyword);
        $dataCount = get_list_nsx_model($keyword);
        $total_page = count($dataCount);
        $link = create_link(BASE_URL, array('sk'=>'nhasanxuat','m'=>'index','page'=>'{page}','keyword'=>$keyword));
        $pagingUser = paging($link,$total_page,$page,$limit,$keyword);
        $data = get_list_nsx_by_page($pagingUser['start'],$pagingUser['limit'],$pagingUser['key']);
        require_once('../view/nhasanxuat/index_nhasanxuat_view.php');
	}
	function check_name($namensx)
	{
		$check=check_name_nsx_model($namensx);
		return $check;
	}
	function check_phone($phonensx)
	{
		$check=check_phone_nsx_model($phonensx);
		return $check;
	}
	function add_nsx()
	{
		if(isset($_POST['btnSubmit']))
		{
			$usernsx=isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : "";
			$usernsx=htmlentities($usernsx);
			$phonensx=isset($_POST['txtPhone']) ? trim($_POST['txtPhone']) : "";
			$phonensx=htmlentities($phonensx);
			$addressnsx=isset($_POST['txtadress']) ? trim($_POST['txtadress']) : "";
			$addressnsx=htmlentities($addressnsx);
			$file=isset($_FILE['nameFileImg']) ? $_FILE['nameFileImg'] : "";
			$img_path=upload_file($file);
			$img_path=($img_path!==FALSE) ? $img_path : "";

			$checkInfo=TRUE;
			$checkAdd=validate_add_nsx($usernsx,$phonensx,$addressnsx);
			foreach ($checkAdd as $key => $value) {
				if(!empty($value))
				{
					$checkInfo=FALSE;
					break;
				}
			}
			if($checkInfo)
			{
				$checknamensx=check_name($usernsx);
				$checphonensx=check_phone($phonensx);
				if($checknamensx)
				{
					if($checphonensx)
					{
						$add=add_nsx_model($usernsx,$phonensx,$addressnsx,$img_path);
						if($add)
						{
							$mess="Thêm thành công";
						}
						else
						{
							$mess="Thêm thành không công";
						}
					}
					else
					{
						$mess="Số điện thoại đã được sử dụng bởi nhà sản xuất khác";
					}
				}
				else
				{
					$mess="Nhà sản xuất đã tồn tại ";
				}
			}

		}
		require_once('../view/nhasanxuat/add_nhasanxuat_view.php');
	}

	 function edit_nsx()
    {
        $idnsx=isset($_GET['id_nsx']) ? trim($_GET['id_nsx']) : 0;
        if(isset($_POST['btnSubmit']))
        {
            $info=get_info_nsx_model($idnsx);
            $namensx=isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : "";
            $namensx=htmlentities($namensx);
            $phonensx=isset($_POST['txtPhone']) ? trim($_POST['txtPhone']) : "";
            $phonensx=htmlentities($phonensx);
            $addressnsx=isset($_POST['txtadress']) ? trim($_POST['txtadress']) : "";
            $addressnsx=htmlentities($addressnsx);
            $status=isset($_POST['slcStatus']) ? trim($_POST['slcStatus']) : "";
            $file =isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
    		$img_path=upload_file($file);
    		$img_path=($img_path!==FALSE) ? $img_path : "";

            $checkInfo=TRUE;
            $checkAdd=validate_edit_nsx($namensx,$phonensx,$addressnsx,$status);
            foreach ($checkAdd as $key => $value) {
                if(!empty($value))
                {
                    $checkInfo=FALSE;
                    break;
                }
            }
            if($checkInfo)
            {    
            
                $edit=edit_nsx_model($idnsx,$namensx,$phonensx,$addressnsx,$status,$img_path);
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

        $data=get_info_nsx_model($idnsx);
        if(!empty($data))
        {
            require_once('../view/nhasanxuat/edit_nhasanxuat_view.php');
        }
        else
        {
            require_once('../view/nhasanxuat/error_nhasanxuat_view.php');
        }
    }
