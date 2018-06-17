<?php
    define('UPLOAD_IMG', '../../uploads/images/');
    //check add user
    function validate_form_add_admin($username, $password, $email, $phone, $address, $role)
    {
        $errors = array();
        //check username
        $errors['username'] = ($username == '' OR strlen($username) < 4) ? 'Username không được rỗng và nhiều hơn 3 kí tự' : '';
        //check password
        $errors['password'] = ($password == '' OR strlen($password) < 4) ? 'Password không được rỗng và nhiều hơn 3 kí tự' : '';
        //check email
        $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        $errors['email'] = ($checkEmail === FALSE ) ? 'Vui lòng nhập đúng định dạng email' : '';
        //check phone
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phone))
        {
            $errors['phone'] = '';
        }
        else
        {
            $errors['phone'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        //check address
        $errors['address'] = ($address == '' OR strlen($address) < 4) ? 'Address không được rỗng và nhiều hơn 3 kí tự' : '';
        //check role

        $errors['role'] = (!in_array($role, array('-1','1'))) ? 'Vui lòng chọn quyền user' : '';

        return $errors;
    }
    //check add author
    function validate_add_author($user,$phone,$address)
    {
        $errors=array();
        $errors['nameauthor']=($user =="" && strlen($user) < 3) ? "Tên tác giả không được rống và nhiều hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phone))
        {
            $errors['phone'] = '';
        }
        else
        {
            $errors['phone'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['address'] = ($address == '' OR strlen($address) < 4) ? 'Address không được rỗng và nhiều hơn 3 kí tự' : '';
        return $errors;
    }
    //check edit author
    function validate_edit_author($user,$phone,$address,$status)
    {
        $errors=array();
        $errors['nameauthor']=($user =="" && strlen($user) < 2) ? "Tên tác giả không được rống và nhiều hơn 2 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phone))
        {
            $errors['phone'] = '';
        }
        else
        {
            $errors['phone'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['address'] = ($address == '' OR strlen($address) < 4) ? 'Address không được rỗng và nhiều hơn 3 kí tự' : '';
        $errors['status'] = (!in_array($status, array('1','0'))) ? 'Vui lòng chọn tình trạng tác giả' : '';
        return $errors;
    }
    //check add nxb
    function validate_add_npp($usernpp,$phonenpp,$addressnpp)
    {
        $errors=array();
        $errors['TenNPP']=($usernpp =="" && strlen($usernpp) < 3) ? "Tên nhà xuất bản không được rống và nhiều hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phonenpp))
        {
            $errors['SDTNPP'] = '';
        }
        else
        {
            $errors['SDTNPP'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['DiaChiNPP'] = ($addressnpp == '' OR strlen($addressnpp) < 4) ? 'Address không được rỗng và nhiều hơn 3 kí tự' : '';
        return $errors;
    }

     function validate_add_nsx($usernsx,$phonensx,$addressnsx)
    {
        $errors=array();
        $errors['TenNSX']=($usernsx =="" && strlen($usernsx) < 3) ? "Tên nhà xuất bản không được rống và nhiều hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phonensx))
        {
            $errors['SDTNSX'] = '';
        }
        else
        {
            $errors['SDTNSX'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['DiaChiNPP'] = ($addressnsx == '' OR strlen($addressnsx) < 4) ? 'Address không được rỗng và nhiều hơn 3 kí tự' : '';
        return $errors;
    }
   
    function validate_edit_npp($usernpp,$phonenpp,$addressnpp,$status)
    {
        $errors=array();
        $errors['TenNPP']=($usernpp =="" && strlen($usernpp) < 3) ? "Tên nhà phân phối không được rống và nhiều hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phonenpp))
        {
            $errors['SDTNPP'] = '';
        }
        else
        {
            $errors['SDTNPP'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['DiaChiNPP'] = ($addressnpp == '' OR strlen($addressnpp) < 4) ? 'Địa chỉ không được rỗng và nhiều hơn 3 kí tự' : '';
        $errors['status'] = (!in_array($status, array('1','0'))) ? 'Vui lòng chọn tình trạng nhà xuất bản' : '';
        return $errors;
    }

    function validate_edit_nsx($usernsx,$phonensx,$addressnsx,$status)
    {
        $errors=array();
        $errors['TenNSX']=($usernsx =="" && strlen($usernsx) < 3) ? "Tên nhà sản xuất không được rống và nhiều hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phonensx))
        {
            $errors['SDTNSX'] = '';
        }
        else
        {
            $errors['SDTNSX'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        $errors['DiaChiNSX'] = ($addressnsx == '' OR strlen($addressnsx) < 4) ? 'Địa chỉ không được rỗng và nhiều hơn 3 kí tự' : '';
        $errors['status'] = (!in_array($status, array('1','0'))) ? 'Vui lòng chọn tình trạng nhà sản xuất' : '';
        return $errors;
    }
    
    function check_validate_add_sanpham($tensanpham,$tenhsx,$tennpp,$loaisanpham,$giasanpham,$soluong)
    {
        $errors=array();
        $errors['tenKinh']=($tensanpham == "" OR strlen($tensanpham) < 2) ? "Tên sản phẩm không được rỗng và phải lớn hơn 2 ký tự" : "";
        return $errors;
        $errors['idnsx']=(!is_numeric($tenhsx) OR $tenhsx < 0) ? "Vui lòng chọn hãng sản xuất" : "";
        $errors['idnpp']=(!is_numeric($tennpp) OR $tennpp < 0) ? "Vui lòng chọn nhà phân phối" : "";
        $errors['idloai']=(!is_numeric($loaisanpham) OR $loaisanpham < 0) ? "Vui lòng chọn loại sản phẩm" : "";
        $errors['giacu']=(!is_numeric($giasanpham) OR $giasanpham < 0) ? "Vui lòng chọn giá sản phẩm" : "";
        $errors['soluong']=(!is_numeric($soluong) OR $soluong < 0) ? "Vui lòng chọn số lượng" : "";
        return $errors;

    }
    //check edit san pham
    function check_validate_edit_sanpham($ten_sp,$ten_nsx,$ten_npp,$loai_sp,$gia_sp,$soluong,$status)
    {
        $errors=array();
        $errors['tenKinh']=($ten_sp == "" OR strlen($ten_sp) < 2) ? "Tên sản phẩm không được rỗng và phải lớn hơn 2 ký tự" : "";
        $errors['id_nsx']=(is_numeric($ten_nsx) && $ten_nsx > 0) ? "" : "Vui lòng chọn nhà sản xuất";
        return $errors;
        $errors['id_npp']=(is_numeric($ten_npp) && $ten_npp > 0) ? "" : "Vui lòng chọn tác giả";
        $errors['id_loai']=(is_numeric($loai_sp) && $loai_sp > 0) ? "" : "Vui lòng chọn loại sách";
        $errors['GiaMoi']=(is_numeric($gia_sp) && $gia_sp > 0) ? "" : "Vui lòng nhập giá sách mới";
        $errors['SoLuong']=(is_numeric($soluong) && $soluong > 0) ? "" : "Vui lòng chọn số lượng";

        $errors['status']=(!in_array($status,array("1","0"))) ? "Vui lòng chọn trạng thái sách" : "";
        return $errors;
    }
    //check add type book
    function validate_add_loaisp($nametype)
    {
        $errors=array();
        $errors['TenLoai']=($nametype =="" OR strlen($nametype) < 2) ? "Tên loại sách không được rống và nhiều hơn 2 ký tự" : "";
        return $errors;
    }
    // check edit type book
    function validate_edit_loaisp($nametype,$status)
    {
        $errors=array();
        $errors['TenLoai']=($nametype =="" OR strlen($nametype) < 2) ? "Tên loại sách không được rống và nhiều hơn 2 ký tự" : "";
        $errors['status']=(!in_array($status,array("1","0"))) ? "Vui lòng chọn tình trạng của loại sách" : "";
        return $errors;
    }
    //function upload images
    function upload_file($fileName)
    {
        if(!is_array($fileName))
        {
            return FALSE;
        }
        if($fileName['error'] == 0)
        {
            $tmp_path = $fileName['tmp_name'];
            if($tmp_path  != '')
            {
                $new_path = UPLOAD_IMG . $fileName['name'];
                if(move_uploaded_file($tmp_path, $new_path))
                {
                    return $fileName['name'];
                }
            }
        }
        return FALSE;
    }
?>