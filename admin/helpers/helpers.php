<?php
    function check_login()
    {
        $uname = get_session_uname();
        $id    = get_session_id_admin();
        if($uname =='' && $id == '')
        {
            session_destroy();
            header("Location:../index.php");
            exit();
        }
    }

    function get_session_uname()
    {
        $username = isset($_SESSION['user']) ? trim($_SESSION['user']) : '';
        return $username;
    }

    function get_session_id_admin()
    {
        $id = isset($_SESSION['id_admin']) ? trim($_SESSION['id_admin']) : '';
        return $id;
    }

    function get_role_admin()
    {
        $role = isset($_SESSION['role_admin']) ? trim($_SESSION['role_admin']) : '';
        return $role;
    }

    function get_session_email_admin()
    {
        $email = isset($_SESSION['email']) ? trim($_SESSION['email']) : '';
        return $email;
    }

    //tao chuoi phan trang
    function create_link($uri,$filter = array())
    {
        $string = "";
        foreach ($filter as $key => $value) {
            $string .= "&{$key}={$value}";
        }
        return $uri.($string ? '?' . ltrim($string,'&') : "");
    }
    //ham phan trang
    function paging($link,$total_records,$current_page,$limit,$keyword='')
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
            //neu la trang hien tai thif hien thi active
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
            'key'=>$keyword,
            'html'=>$html,
        );
    }
?>