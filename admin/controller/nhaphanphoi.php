<?php
	require_once('../model/phanhanphoi_model.php');
	require_once('../libs/libs.php');
	$m=isset($_GET['m']) ? trim($_GET['m']) : "index";
	switch ($m) {
		case 'index':
			listNPP();
			break;
		case 'add':
			add_npp();
			break;
		case 'edit':
			edit_NPP();
			break;
	}

	function listNPP()
	{
		$idnpp=isset($_GET['id']) ? trim($_GET['id']) : "";
        if($idnpp!=="" && is_numeric($idnpp))
        {
            $delete=delete_npp_model($idnpp);
        }
		$page = (isset($_GET['page'])) ? trim($_GET['page']) : 1;
        $limit = 4;
        $keyword = (isset($_GET['keyword'])) ? trim($_GET['keyword']) : "";
        $keyword = htmlentities($keyword);
        $dataCount = get_list_npp_model($keyword);
        $total_page = count($dataCount);
        $link = create_link(BASE_URL, array('sk'=>'nhaphanphoi','m'=>'index','page'=>'{page}','keyword'=>$keyword));
        $pagingUser = paging($link,$total_page,$page,$limit,$keyword);
        $data = get_list_npp_by_page($pagingUser['start'],$pagingUser['limit'],$pagingUser['key']);
        require_once('../view/nhaphanphoi/index_view.php');
	}
	function check_name($namenpp)
	{
		$check=check_name_npp_model($namenpp);
		return $check;
	}
	function check_phone($phonenpp)
	{
		$check=check_phone_npp_model($phonenpp);
		return $check;
	}
	function add_npp()
	{
		if(isset($_POST['btnSubmit']))
		{
			$usernpp=isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : "";
			$usernpp=htmlentities($usernpp);
			$phonenpp=isset($_POST['txtPhone']) ? trim($_POST['txtPhone']) : "";
			$phonenpp=htmlentities($phonenpp);
			$addressnpp=isset($_POST['txtadress']) ? trim($_POST['txtadress']) : "";
			$addressnpp=htmlentities($addressnpp);
			$file=isset($_FILE['nameFileImg']) ? $_FILE['nameFileImg'] : "";
			$img_path=upload_file($file);
			$img_path=($img_path!==FALSE) ? $img_path : "";

			$checkInfo=TRUE;
			$checkAdd=validate_add_npp($usernpp,$phonenpp,$addressnpp);
			foreach ($checkAdd as $key => $value) {
				if(!empty($value))
				{
					$checkInfo=FALSE;
					break;
				}
			}
			if($checkInfo)
			{
				$checknamenpp=check_name($usernpp);
				$checphonenpp=check_phone($phonenpp);
				if($checknamenpp)
				{
					if($checphonenpp)
					{
						$add=add_npp_model($usernpp,$phonenpp,$addressnpp,$img_path);
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
						$mess="Số điện thoại đã được sử dụng bởi nhà phân phối khác";
					}
				}
				else
				{
					$mess="Nhà phân phối đã tồn tại trong CSDL";
				}
			}

		}
		require_once('../view/nhaphanphoi/add_npp_view.php');
	}

	 function edit_npp()
    {
        $idnpp=isset($_GET['id']) ? trim($_GET['id']) : 0;
        if(isset($_POST['btnSubmit']))
        {
            $info=get_info_npp_model($idnpp);
            $namenpp=isset($_POST['txtUsername']) ? trim($_POST['txtUsername']) : "";
            $namenpp=htmlentities($namenpp);
            $phonenpp=isset($_POST['txtPhone']) ? trim($_POST['txtPhone']) : "";
            $phonenpp=htmlentities($phonenpp);
            $addressnpp=isset($_POST['txtadress']) ? trim($_POST['txtadress']) : "";
            $addressnpp=htmlentities($addressnpp);
            $status=isset($_POST['slcStatus']) ? trim($_POST['slcStatus']) : "";
            //$file=isset($_FILES['nameFileImg']) ? $_FILES['nameFileImg'] : "";
            //$img_path = ($file !="") ? upload_file($file) : "";
            // $img_path = ($img_path !==FALSE OR $img_path!="") ? $img_path : $info['img_path'];

            $checkInfo=TRUE;
            $checkAdd=validate_edit_npp($namenpp,$phonenpp,$addressnpp,$status);
            foreach ($checkAdd as $key => $value) {
                if(!empty($value))
                {
                    $checkInfo=FALSE;
                    break;
                }
            }

            if($checkInfo)
            {    
                $edit=edit_npp_model($idnpp,$namenpp,$phonenpp,$addressnpp,$status);
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
        $data=get_info_npp_model($idnpp);
        if(!empty($data))
        {
            require_once('../view/nhaphanphoi/edit_npp_view.php');
        }
        else
        {
            require_once('../view/nhaphanphoi/error_npp_view.php');
        }
    }
?>