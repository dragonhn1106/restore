    <style type="text/css">
    .table > thead > tr > th{
        text-align: center;
    }
     .table > tbody > tr > td{
        text-align: center;
    }
</style>
<div class="content-wrapper right_col" id="right1">
    <div class="row">
        <input  type="text" placeholder="Nhập từ khóa" name="txtSearch" id="txtSearch" size="50" value="<?php echo htmlentities($keyword);?>" style="text-indent:10px;border: 2px solid white; border-radius: 12px; height: 34px; margin-left: 65%;margin-top: 1%; ">
        <button id="btnSearch" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>&#160;&#160;Tìm kiếm</button>
        <h1 class="text-center">Quản lý sản phẩm&#160;&#160;<i class="fa fa-users" aria-hidden="true"></i></h1>
        <a href="?sk=sanpham&m=add" class="btn btn-success" style="margin: 20px 40px;"><i class="fa fa-plus-square" aria-hidden="true"></i>&#160;&#160;Thêm sản phẩm</a>
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr >
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hãng Sản Xuất</th>
                            <th>Nhà Phân Phối</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Trạng thái hiển thị</th>
                            <th>Giá Cũ</th>
                            <th>Giá Mới</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                            foreach ($data as $key => $value) {
                        ?>
                            <tr></td>
                                <td><?php echo $i ?></td>
                                <td><?php echo $value['TenKinh']; ?></td>
                                <td><?php echo $value['TenNSX']; ?></td>
                                <td><?php echo $value['TenNPP']; ?></td>
                                <td><?php echo $value['TenLoai']; ?></td>
                                <td>
                                    <img src="<?php echo '../../uploads/images/'.$value['HinhAnh']; ?>" alt="Images" width="70" height="70">

                                </td>
                                <td><?php echo $value['SoLuong']; ?></td>
                                <td><?php echo ($value['STATUS']==1) ? "Hiển thị" : "Không hiển thị"; ?></td>
                                <td><?php echo $value['GiaCu']; ?></td>
                                <td><?php echo $value['GiaMoi']; ?></td>
                                <td>
                                    <a href="?sk=sanpham&m=edit&id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&#160;&#160;Sửa</a>
                                </td>
                                <td>
                                    <a href="?sk=sanpham&m=index&id=<?php echo $value['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&#160;&#160;Xóa</a>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                <?php echo $pagingUser['html']; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $("#btnSearch").click(function(event) {
            var keyword = $.trim($("#txtSearch").val());
            var page ='<?php echo $page; ?>';
            window.location.href='<?php echo BASE_URL; ?>' + '?sk=sanpham&m=index&page='+page+'&keyword='+keyword;
            console.log(BASE_URL);
        });
    });
</script>