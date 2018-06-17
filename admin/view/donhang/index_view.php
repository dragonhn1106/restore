<div class="content-wrapper right_col" style="">
    <style type="text/css" media="screen">
        th, td {
            border-bottom: 1px solid #ddd;
        }
    </style>
    <div class="row well">
        <h2 class="text-center text-primary"><strong>Danh sách đơn hàng</strong></h2>
    </div>
    <div class="row" style="overflow:auto; height: 100%;">
        <?php foreach ($list_orders_customer as $key => $value) : ?>
            <div class="col-md-12" style="border-bottom: 2px dotted #3C8DBC ; margin: 20px 0px;">
                <div class="col-md-2">
                    <p>
                        <img width="100%" src="<?php echo UPLOAD_IMG.$value['hinhAnh'];?>" alt="Images">
                    </p>
                    <h3 class="text-center" style="color:red;"><i class="fa fa-book" aria-hidden="true"></i>&#160;<?php echo $value['nameSanPham']; ?></h3>
                </div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr style="color:blue;">
                                <th class="text-center">STT</th>
                                <th class="text-center">Họ tên</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Thành tiên (VNĐ)</th>
                                <th class="text-center">Create Time</th>
                                <th class="text-center">Ghi chú</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach ($value['customer'] as $key => $val) {  ?>

                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $val['TenKH']; ?></td>
                                    <td class="text-center"><?php echo $val['SDT']; ?></td>
                                    <td class="text-center"><?php echo $val['Email']; ?></td>
                                    <td class="text-center"><?php echo $val['DiaChi']; ?></td>
                                    <td class="text-center"><?php echo $val['SoLuong']; ?></td>
                                    <td class="text-center"><?php echo number_format($val['ThanhTien']); ?></td>
                                    <td class="text-center"><?php echo $val['create_time']; ?></td>
                                    <td class="text-center"><?php echo $val['GhiChu']; ?></td>
                                    <td>
                                        <?php if($val['TrangThai']==1) : ?>
                                            <p class="text-center"><i class="fa fa-check" aria-hidden="true"></i></p>
                                        <?php endif ?>
                                        <?php if($val['TrangThai']==2) : ?>
                                            <p class="text-center">Đã xóa&#160;<i class="fa fa-trash-o" aria-hidden="true"></i></p>
                                        <?php endif ?>
                                        <?php if($val['TrangThai']==0) : ?>
                                            <button type="button" name="btnactive" class="btn btn-success active" onclick="actionOrders(<?php echo $val['id_hd'];?>,1);">Active</button>&#160;&#160;
                                            <button type="button" name="btndelete" class="btn btn-danger" onclick="actionOrders(<?php echo $val['id_hd'];?>,2);">Delete</button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script type="text/javascript">
    function actionOrders(id,checkaction)
    {
        $.ajax({
            url: '?sk=donhang&m=action',
            type: 'POST',
            dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {idHD: id,checkaction: checkaction},

            success: function(data)
            {
                if(data=='err')
                {
                    alert('Vui lòng kiểm tra lại dữ liệu!');
                }
                else
                {
                    if(data=='fail')
                    {
                        alert('Hành động lỗi!');
                    }
                    else
                    {
                        alert('Đã active!');
                        window.location.reload(true);
                    }
                }
            }
        });

    }
    $('.active').click(function () {
        location.reload();
        $('.inHoaDon').show();

    });
</script>