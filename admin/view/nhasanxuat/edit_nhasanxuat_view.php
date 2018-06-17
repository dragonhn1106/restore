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
            <a href="?sk=nhasanxuat&m=index" class="btn btn-success" style="margin: 10px;"><i class="fa fa-th-list" aria-hidden="true"></i>&#160;&#160;Xem danh sách hãng sản xuất</a>
            <h1 class="text-center">Sửa thông hãng sản xuất&nbsp;&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></h1>
            <?php if(isset($mess) && !empty($mess)) { ?>
            <p class="text-center" style="font-weight: bold;"><?php echo $mess; ?></p>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <form class="form-horizontal" action="?sk=nhasanxuat&m=edit&id_nsx=<?php echo $idnsx; ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="frmAddUserAdmin">
                    <div class="form-group">
                        <label for="txtUsername" class="col-sm-offset-2 col-sm-2 control-label">Tên hãng sản xuất</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtUsername" placeholder="Tên hãng sản xuất" name="txtUsername" value="<?php echo $data['TenNSX'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtPhone" class="col-sm-offset-2 col-sm-2 control-label">Số điện thoại</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtPhone" placeholder="Phone" name="txtPhone" value="<?php echo $data['SDTNSX']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtFile" class="col-sm-offset-2 col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" id="txtFile" name="nameFileImg">
                            <br>
                            <img src="<?php echo UPLOAD_IMG.$data['img_path'];?>" width="100" height="100" alt="Images">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtadress" class="col-sm-offset-2 col-sm-2 control-label">Địa chỉ</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtadress" placeholder="Address" name="txtadress" value="<?php echo $data['DiaChiNSX']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcStatus" class="col-sm-offset-2 col-sm-2 control-label">Status</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcStatus" name="slcStatus">
                                <option value="">-- choose --</option>
                                <option value="1" <?php echo ($data['status']==1) ? "selected='selected'" : ""; ?>>Hiển thị</option>
                                <option value="0" <?php echo ($data['status']==0) ? "selected='selected'" : ""; ?>>Không hiển thị</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <input type="submit" name="btnSubmit" class="btn btn-success" value="Edit" />
                            <input type="reset" name="btnReset" class="btn btn-primary" value="Reset" />
                        </div>                  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>