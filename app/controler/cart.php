<?php
require_once('app/model/cart_model.php');
$method = isset($_GET['m']) ? trim($_GET['m']) : 'index';
switch ($method) {
    case 'index':
        show_cart();
        break;
    case 'add':
        add_cart();
        break;
    case 'delete':
        delete_cart();
        break;
    case 'remove':
        remove_all_cart();
        break;
    case 'edit':
        update_cart();
        break;
    case 'orders':
        orders_customer();
        break;
    case 'printf':
        in_hoa_don();
        break;
}

//Xem giỏ hàng
function show_cart()
{
    $fullname = get_session_name_user();
    $phone = get_session_phone();
    $email = get_session_email();
    $address = get_session_address();
    require_once('app/view/cart/index_view.php');
}

//Thêm sản phẩm vào giỏ hàng
function add_cart()
{
    $stringTitle = isset($_GET['sanpham']) ? trim($_GET['sanpham']) : "";
    $stringIdSanPham = explode("-", $stringTitle);
    $idSanPham = end($stringIdSanPham);
    $idSanPham = is_numeric($idSanPham) ? $idSanPham : 0;
    $detail_data = get_info_sanpham_by_id_model($idSanPham);

    $qty = isset($_POST['qty']) ? trim($_POST['qty']) : 1;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        if (isset($_SESSION['cart'][$idSanPham]) && $_SESSION['cart'][$idSanPham] == $idSanPham) {
                $_SESSION['cart'][$idSanPham]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$idSanPham]['id'] = $idSanPham;
            $_SESSION['cart'][$idSanPham]['TenKinh'] = $detail_data['TenKinh'];
            $_SESSION['cart'][$idSanPham]['HinhAnh'] = $detail_data['HinhAnh'];
            $_SESSION['cart'][$idSanPham]['GiaCu'] = $detail_data['GiaCu'];
            $_SESSION['cart'][$idSanPham]['qty'] = $qty;
        }
    } else {
        $_SESSION['cart'][$idSanPham]['id'] = $idSanPham;
        $_SESSION['cart'][$idSanPham]['TenKinh'] = $detail_data['TenKinh'];
        $_SESSION['cart'][$idSanPham]['HinhAnh'] = $detail_data['HinhAnh'];
        $_SESSION['cart'][$idSanPham]['GiaCu'] = $detail_data['GiaCu'];
        $_SESSION['cart'][$idSanPham]['qty'] = $qty;
    }

    show_cart();
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo "<script>$('.qty').text('   '+ $count +'')</script>";

}

//Xóa 1 sản phẩm trong giỏ hàng
function delete_cart()
{
    $idSanPham = isset($_GET['id']) ? trim($_GET['id']) : 0;
    if (is_numeric($idSanPham) && $idSanPham > 0) {
        if (isset($_SESSION['cart'][$idSanPham]['id']) && $_SESSION['cart'][$idSanPham]['id'] == $idSanPham) {
            unset($_SESSION['cart'][$idSanPham]);
        }
    }
    show_cart();
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo "<script>$('.qty').text('   '+ $count +'')</script>";
}

//Xóa tất cả sản phẩm trong giỏ hàng
function remove_all_cart()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
    show_cart();
    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    echo "<script>$('.qty').text('   '+ $count +'')</script>";

}

//Cập nhật giỏ hàng
function update_cart()
{
    if (isset($_POST['btnSubmit'])) {
        $qty = isset($_POST['txtSoLuong']) ? $_POST['txtSoLuong'] : 1;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($qty as $key => $val) {
                $_SESSION['cart'][$key]['qty'] = $val;
            }
        }
    }
    show_cart();
}

//Kiểm tra dữ liệu người dùng nhập vào
function validate_infomation_customer($fullname, $phone, $email, $address)
{
    $errors = array();
    $errors['fullname'] = ($fullname == "") ? "Vui lòng nhập vào tên của bạn" : "";
    if (preg_match("/^[0][9]\d{8}$|^[0][1]\d{9}$/", $phone)) {
        $errors['phone'] = "";
    } else {
        $errors['phone'] = "Vui lòng nhập số điện thoại là: 09xxxxxxxx hoặc 01xxxxxxxxx";
    }
    $checkemail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $errors['email'] = ($checkemail == FALSE) ? "Vui lòng nhập đúng định dạng email" : "";
    $errors['address'] = ($address == "") ? "Vui lòng nhập vào địa chỉ của bạn" : "";
    return $errors;
}

//Đặt hàng
function orders_customer()
{
    if (isset($_POST['btnOrder'])) {
        $fullname = isset($_POST['txtHoTen']) ? trim($_POST['txtHoTen']) : "";
        $fullname = htmlentities($fullname);
        $phone = isset($_POST['txtSoDienThoai']) ? trim($_POST['txtSoDienThoai']) : "";
        $phone = htmlentities($phone);
        $email = isset($_POST['txtEmail']) ? trim($_POST['txtEmail']) : "";
        $email = htmlentities($email);
        $address = isset($_POST['txtDiaChi']) ? trim($_POST['txtDiaChi']) : "";
        $address = htmlentities($address);
        $note = isset($_POST['txtGhiChu']) ? trim($_POST['txtGhiChu']) : "";
        $note = htmlentities($note);

        $checkInfo = TRUE;
        $checkAdd = validate_infomation_customer($fullname, $phone, $email, $address);
        foreach ($checkAdd as $key => $value) {
            if (!empty($value)) {
                $checkInfo = FALSE;
                break;
            }
        }

        if ($checkInfo) {
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $money = ($value['qty'] * $value['GiaCu']);
                    $add = add_orders_customer($value['id'], $fullname, $phone, $email, $address, $note, $value['qty'], $money);
                }
                if ($add) {
                    $mess = "Đặt hàng thành công! Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. Trân trọng cảm ơn!";
                     if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                    }
                    $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                    echo "<script>$('.qty').text('   '+ $count +'')</script>";
                } else {
                    $mess = "Có lỗi xảy ra! Vui lòng thử lại";
                }
            }
        }
    }
    require_once('app/view/cart/index_view.php');
}
function in_hoa_don(){
    require_once('app/view/cart/phieuIn.php');
}
?>