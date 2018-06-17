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
            <input  type="text" placeholder="Nhập từ khóa" name="txtSearch" id="txtSearch" size="50" value="<?php echo htmlentities($keyword);?>" style="text-indent:10px;border: 2px solid white; border-radius: 12px; height: 34px; margin-left: 65%;margin-top: 1%; ">
            <button id="btnSearch" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>&#160;&#160;Tìm kiếm</button>
            <h1 class="text-center">Quản lý thành viên quản trị&#160;&#160;<i class="fa fa-users" aria-hidden="true"></i></h1>
            <a href="?sk=member&m=add" class="btn btn-success" style="margin: 20px 40px;"><i class="fa fa-plus-square" aria-hidden="true"></i>&#160;&#160;Thêm thành viên quản trị</a>
            <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr >
                                <th>STT</th>
                                <th>Username</th>
                                <th>Ảnh</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Create_time</th>
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
                                <td><?php echo $val['username']; ?></td>
                                <td>
                                    <img width="70" height="70" src="<?php echo '../../uploads/images/'.$val['img_path']; ?>">
                                </td>
                                <td><?php echo $val['email']; ?></td>
                                <td><?php echo $val['phone']; ?></td>
                                <td><?php echo $val['address']; ?></td>
                                <td><?php echo ($val['role_admin'] == -1) ? 'superadmin' : 'admin'; ?></td>
                                <td><?php echo ($val['status'] == 1) ? 'active' : 'block'; ?></td>
                                <td><?php echo $val['create_time']; ?></td>
                                <td>
                                    <a href="?sk=member&m=edit&id=<?php echo $val['id_admin']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&#160;&#160;Sửa</a>
                                    <a href="?sk=member&m=index&id=<?php echo $val['id_admin']; ?>"><i class="fa fa-trash-o" aria-hidden="true">&#160;&#160;Xóa</i></a>
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
            window.location.href='<?php echo BASE_URL; ?>' + '?sk=member&m=index&page='+page+'&keyword='+keyword;
        });
    });
</script>