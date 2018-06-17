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
        <h1 class="text-center">Quản lý nhà phân phối&#160;&#160;<i class="fa fa-users" aria-hidden="true"></i></h1>
        <a href="?sk=nhaphanphoi&m=add" class="btn btn-success" style="margin: 20px 40px;"><i class="fa fa-plus-square" aria-hidden="true"></i>&#160;&#160;Thêm nhà phân phối</a>
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="main-content">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr >
                            <th>STT</th>
                            <th>Tên NPP</th>
                            <th>Hình ảnh</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Status</th>
                            <th>Create Time</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data as $key => $value) {
                                //echo '<pre>';var_dump($value);die();
                        ?>
                            <tr>
                                <td><?php  echo $value['id_npp']; ?></td>
                                <td><?php echo $value['TenNPP']; ?></td>
                                <td><img src="<?php echo '../../uploads/images/'.$value['img_path']; ?>" alt="Images" width="70" height="70"></td>
                                <td><?php echo $value['SDTNPP']; ?></td>
                                <td><?php echo $value['DiaChiNPP']; ?></td>
                                <td><?php echo ($value['status']==1) ? "Enable" : "Disable"; ?></td>
                                <td><?php echo $value['create_time']; ?></td>
                                <td>
                                    <a href="?sk=nhaphanphoi&m=edit&id=<?php echo $value['id_npp']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&#160;&#160;Sửa</a>
                                    <a href="?sk=nhaphanphoi&m=index&id=<?php echo $value['id_npp']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>&#160;&#160;Xóa</a>
                                </td>
                            </tr>
                        <?php  } ?>
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
            window.location.href='<?php echo BASE_URL; ?>' + '?sk=nhaphanphoi&m=index&page='+page+'&keyword='+keyword;
        });
    });
</script>