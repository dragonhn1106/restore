<div class="content-wrapper right_col" id="right1">
    <div style="margin: 0px 20px">
    <?php if( isset($checkInfo) && !$checkInfo){ ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
                <ul>
                <?php foreach ($checkAdd as $key => $val)
                {
                    if(!empty($val))
                    {
                ?>
                    <li><?php echo $val; ?></li>
                <?php
                    }
                }
                ?>
                </ul>
            </div>
        </div>
    <?php } ?>
        <div class="row">
            <a href="?sk=member&m=index" class="btn btn-info" style="margin: 10px;"><i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;&nbsp;Xem danh sách thành viên</a>
            <h1 class="text-center">Sửa thành viên &nbsp;&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1>
            <?php if(isset($mess) && !empty($mess)) { ?>
            <p class="text-center" style="font-weight: bold;"><?php echo $mess; ?></p>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <form class="form-horizontal" action="?sk=member&m=edit&id=<?php echo $idAdmin; ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="frmAddUserAdmin">
                    <div class="form-group">
                        <label for="txtUsername" class="col-sm-offset-2 col-sm-2 control-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtUsername" placeholder="Username" name="txtUsername" value="<?php echo $data['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtPass" class="col-sm-offset-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="txtPass" placeholder="Password" name="txtPass" value="<?php echo $data['password']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtEmail" class="col-sm-offset-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="txtEmail" placeholder="Email..." name="txtEmail" value="<?php echo $data['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtFile" class="col-sm-offset-2 col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" id="txtFile" name="nameFileImg">
                            </br>
                            <img src="<?php echo UPLOAD_IMG.$data['img_path']; ?>" height="100" width="100" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtphone" class="col-sm-offset-2 col-sm-2 control-label">Phone</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtphone" placeholder="Phone..." name="txtphone" value="<?php echo $data['phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtadress" class="col-sm-offset-2 col-sm-2 control-label">Address</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtadress" placeholder="Address..." name="txtadress" value="<?php echo $data['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcRole" class="col-sm-offset-2 col-sm-2 control-label">Role</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcRole" name="slcRole">
                                <option value="">-- choose --</option>
                                <option value="-1" <?php echo ($data['role_admin']==-1) ? "selected='selected'" : ""; ?>>Super Admin</option>
                                <option value="1" <?php echo ($data['role_admin']==1) ? "selected='selected'" : ""; ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="slcStatus" class="col-sm-offset-2 col-sm-2 control-label">Status</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcStatus" name="slcStatus" value="<?php echo $data['status']; ?>">
                                <option value="1" <?php echo ($data['status']==1) ? "selected='selected'" : ""; ?>>Active</option>
                                <option value="0" <?php echo ($data['status']==0) ? "selected='selected'" : ""; ?>>Block</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <input type="submit" name="btnSubmit" class="btn btn-success" value="Edit" />
                            <input type="reset" name="btnReset" class="btn btn-primary" value="Reset" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>