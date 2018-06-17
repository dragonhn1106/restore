<style type="text/css">
    .table > tbody > tr > td {
        vertical-align: middle;
    }

    .myinput {
        width: 320px;
    }
</style>
<?php if (isset($checkInfo) && !$checkInfo) : ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
            <ul>
                <?php foreach ($checkAdd as $key => $val) {
                    if (!empty($val)) {
                        ?>
                        <li><?php echo $val; ?></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($mess) && !empty($mess)) : ?>
    <div class="row">
        <h3 class="text-center"><?php echo $mess; ?></h3>
    </div>
<?php endif; ?>
<div class="heading-bar" style="margin-bottom:3em;">
    <a class="more-btn">Tiến hành kiểm tra</a>
</div>
<div class="table_gio_hang well">
    <form method="POST" action="?cn=cart&m=edit" id="form_gio_hang">
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
            <table class="table table-hover table-striped" style="margin: 0px;padding: 0px;">
                <tr>
                    <th class="center1">STT</th>
                    <th class="center1">Hình ảnh</th>
                    <th class="center1">Tên sản phẩm</th>
                    <th class="center1">Giá (VNĐ)</th>
                    <th class="center1">Số lượng</th>
                    <th class="center1">Thành tiền (VNĐ)</th>
                    <th class="center1">Xóa</th>
                </tr>

                <?php
                $i = 1;
                foreach ($_SESSION['cart'] as $key => $val) {
                    ?>
                    <tr>
                        <td class="center1"><?php echo $i; ?></td>
                        <td class="center1">
                            <img src="<?php echo UPLOAD_IMG . $val['HinhAnh']; ?>" alt="Images">
                        </td>
                        <td class="center1"><?php echo $val['TenKinh']; ?></td>
                        <td class="center1"><?php echo number_format($val['GiaCu']); ?></td>
                        <td class="center1"><input class="soluong1" required pattern="[0-9]{1,3}"
                                                   title="Số lượng phải là chữ số và nhỏ hơn 4 kí tự"
                                                   name="txtSoLuong[<?php echo $val['id']; ?>]" size="2" type="text"
                                                   value="<?php echo $val['qty']; ?>"/></td>
                        <td class="center1 img_gio_hang"><?php echo number_format($val['qty'] * $val['GiaCu']); ?></td>
                        <td class="center1 xoaHang"><a href="?cn=cart&m=delete&id=<?php echo $val['id']; ?>"> <i
                                        class="icon-trash"></i></a></td>
                    </tr>
                    <?php $i++;} ?>

                <tr>
                    <td>Tổng tiền:<?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $val){
                            $subtotal =($val['qty'] * $val['GiaCu']);
                            $total = ($total + $subtotal);
                        }?>
                        <h3><?php echo  number_format($total) ;?></h3>
                    </td>
                    <td colspan="7" style="text-align: right">

                        <button type="submit" name="btnSubmit" style="" class="btn btn-info">Cập nhật giỏ hàng</button>
                        <a href="?cn=cart&m=remove" class="btn btn-warning xoaHang">Xóa tất cả</a>
                    </td>
                </tr>
            </table>
        <?php endif; ?>
    </form>
</div>
<div class="heading-bar" style="margin-bottom:3em;">
    <a class="more-btn">Tiến hành đặt hàng</a>
</div>
<div class="table_gio_hang well">
    <form id="enableForm3" action="?cn=cart&m=orders" method="POST" class="form-horizontal">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-1 control-label">Họ Tên (*)</label>
                    <div class="col-md-6 col-md-offset-1">
                        <input class="myinput" type="text" placeholder="Nhập vào họ tên..."
                               value="<?php echo $fullname; ?>" class="form-control" name="txtHoTen"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-1 control-label">Số điện thoại (*)</label>
                    <div class="col-md-6 col-md-offset-1">
                        <input class="myinput" type="text" placeholder="Nhập vào số điện thoại..."
                               value="<?php echo $phone; ?>" class="form-control" name="txtSoDienThoai"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 col-md-offset-1 control-label">Email (*)</label>
                    <div class="col-md-6 col-md-offset-1">
                        <input class="myinput" type="email" placeholder="Nhập vào email..."
                               value="<?php echo $email; ?>" class="form-control" name="txtEmail"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label class="col-md-5 control-label">Địa chỉ (*)</label>
                    <div class="col-md-7">
                        <input class="myinput" type="text" placeholder="Nhập vào địa chỉ..."
                               value="<?php echo $address; ?>" class="form-control" name="txtDiaChi"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label">Ghi chú (Nếu có)</label>
                    <div class="col-md-7">
                        <textarea style="width: 500px;" placeholder="Để lại ghi chú..." name="txtGhiChu"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="form-group">
                    <a style="width:30%; margin-top: 3em; font-size:1.3em;" href="?cn=cart&m=printf" class="btn  xoaHang">In Hóa Đơn</a>
                    <input type="submit" name="btnOrder" class="btn btn-primary btn-block"
                           style="width:30%; margin-top: 3em; font-size:1.3em;" value="Đặt hàng"/>
                </div>
            </div>
        </div>
    </form>
</div>
</section>
</section>