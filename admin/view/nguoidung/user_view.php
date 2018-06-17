<style type="text/css">
    .table > thead > tr > th {
        text-align: center;
    }
    .table > tbody > tr > td {
        text-align: center;
    }
</style>
<div class="content-wrapper right_col" id="right1">
    <div style="margin: 0px 20px">
        <div class="row">
            <div class="row" >
                <input  type="text" placeholder="Nhập từ khóa" name="txtSearch" id="txtSearch" size="50" value="<?php echo htmlentities($keyword);?>" style="text-indent:10px;border: 2px solid white; border-radius: 12px; height: 34px; margin-left: 65%;margin-top: 1%; ">
                <button id="btnSearch" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>&#160;&#160;Tìm kiếm</button>
            </div>

            <h1 class="text-center">Quản lý người dùng&#160;&#160;<i class="fa fa-users" aria-hidden="true"></i></h1>
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr >
                            <th>STT</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Mật Khẩu</th>
                            <th>Tên Hiển Thị</th>
                            <th>Địa Chỉ</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Trạng Thái</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $key => $val)
                        {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $val['TenDangNhap']; ?></td>
                                <td><?php echo $val['MatKhau']; ?></td>
                                <td><?php echo $val['TenHienThi']; ?></td>
                                <td><?php echo $val['DiaChi']; ?></td>
                                <td><?php echo $val['SDT']; ?></td>
                                <td><?php echo $val['Email']; ?></td>
                                <td><?php echo ($val['status'] == 1) ? 'active' : 'block'; ?></td>
                                <td>
                                    <a href="?sk=nguoidung&m=active&id=<?php echo $val['id_tk']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&#160;&#160;active</a>
                                </td>
                                <td>
                                    <a href="?sk=nguoidung&m=index&id=<?php echo $val['id_tk']; ?>"><i class="fa fa-trash-o" aria-hidden="true">&#160;&#160;Xóa</i></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="col-md-12 well">
                        <?php echo $pagingUser['html']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $("#btnSearch").click(function(event) {
            var keyword = $.trim($("#txtSearch").val());
            var page ='<?php echo $page; ?>';
            window.location.href='<?php echo BASE_URL; ?>' + '?sk=nguoidung&m=index&page='+page+'&keyword='+keyword;
        });
    });
</script>