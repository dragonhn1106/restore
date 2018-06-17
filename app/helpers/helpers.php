<?php

    function get_session_username()
    {
        $username=isset($_SESSION['username']) ? trim($_SESSION['username']) : "";
        return $username;
    }
    function get_session_id_tk()
    {
        $id_tk=isset($_SESSION['id_tk']) ? trim($_SESSION['id_tk']) : "";
        return $id_tk;
    }
    function get_session_role()
    {
        $role=isset($_SESSION['quyen']) ? trim($_SESSION['quyen']) : "";
        return $role;
    }
    function get_session_email()
    {
        $email=isset($_SESSION['email']) ? trim($_SESSION['email']) : "";
        return $email;
    }
    function get_session_phone()
    {
        $phone=isset($_SESSION['phone']) ? trim($_SESSION['phone']) : "";
        return $phone;
    }
    function get_session_address()
    {
        $address=isset($_SESSION['address']) ? trim($_SESSION['address']) : "";
        return $address;
    }
    function get_session_name_user()
    {
        $name_user=isset($_SESSION['tenhienthi']) ? trim($_SESSION['tenhienthi']) : "";
        return $name_user;
    }
function get_session_img_user()
{
    $img_path=isset($_SESSION['img_path']) ? trim($_SESSION['img_path']) : "";
    return $img_path;
}
    //check dang ky
    function validate_signup($user,$pass,$email,$name,$add,$phone)
    {
        $errors=array();
        $errors['user']=($user=="" OR strlen($user) < 3) ? "Vui lòng nhập username và phải lớn hơn 3 ký tự" : "";
        $errors['pass']=($pass=="" OR strlen($pass) < 3) ? "Vui lòng nhập password và phải lớn hơn 3 ký tự" : "";
        $check=filter_var($email,FILTER_VALIDATE_EMAIL);
        $errors['email']=($check==FALSE) ? "Vui lòng nhập đúng định dạng email" : "";
        $errors['add']=($add=="" OR strlen($add) < 3) ? "Vui lòng nhập address và phải lớn hơn 3 ký tự" : "";
        if(preg_match("/^[0][1]\d{9}$|^[0][9]\d{8}$/", $phone))
        {
            $errors['phone'] = '';
        }
        else
        {
            $errors['phone'] = 'Vui lòng nhập định dạng số điện thoại: 09xxxxxxxx và 01xxxxxxxxx';
        }
        return $errors;
    }
    //check_login
    function validate_login($username,$password)
    {
        $errors=array();
        $errors['username']=($username=='') ? "Vui nhập vào Tên đăng nhập của bạn" : "";
        $errors['password']=($password=='') ? "Vui nhập vào Mật khẩu của bạn" : "";
        return $errors;
    }
	function create_link($uri,$filter = array())
    {
        $string = "";
        foreach ($filter as $key => $value) {
            $string .= "&{$key}={$value}";
        }
        return $uri.($string ? '?' . ltrim($string,'&') : "");
    }
    //ham phan trang
    function paging($link,$total_records,$current_page,$limit)
    {
        //tinh tong so trang
        $total_page=ceil($total_records/$limit);
        //gioi han current_page trong khoang 1 den total_page
        if($current_page>$total_page){
            $current_page=$total_page;
        }
        elseif ($current_page < 1) {
            $current_page=1;
        }
        //tim start
        $start = ($current_page - 1) * $limit;
        //su dung template bootrap phan trang
        $html = "<div class='text-center'>";
        $html .= "<nav aria-label='Page navigation'>";
        $html .= "<ul class='pagination'>";
        //neu current_page > 1 va total_page > 1 moi hien thi nut preview
        if($current_page > 1 && $total_page > 1){
            $html .= '<li><a href="'.str_replace('{page}', $current_page-1, $link).'" aria-lable="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        //lặp khoảng giữa(Lay ra toan bo so trang can phan trang)
        for($i=1;$i<=$total_page;$i++){
            //neu la trang hien tai thi hien thi active
            //nguoc lai hien thi the a khong active
            if($i== $current_page)
            {
                $html .= '<li class="active"><a>'.$i.'<span class="sr-only"></span></a></li>';
            }
            else
            {
                $html .= '<li><a href="'.str_replace('{page}', $i, $link).'">'.$i.'</a></li>';
            }
        }
        //neu $current_page < $total_page va total_page > 1 thi moi hien thi nut next
        if($current_page < $total_page && $total_page > 1){
            $html .= '<li><a href="'.str_replace('{page}', $current_page+1, $link).'" aria-lable="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
        $html .="</ul>";
        $html .="</nav>";
        $html .="</div>";
        //tra ve ket qua
        return array(
            'start'=>$start,
            'limit'=>$limit,
            'html'=>$html,
        );
    } 
?>