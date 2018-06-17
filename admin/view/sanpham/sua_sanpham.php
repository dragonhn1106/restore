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
    </div>
        <div class="row">
            <a href="?sk=sanpham&m=index" class="btn btn-info" style="margin: 10px;"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Xem sản phẩm</a>
            <h1 class="text-center">Sửa thông sản phẩm &nbsp;&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></h1>
            <?php if(isset($mess) && !empty($mess)) { ?>
                <p class="text-center" style="font-weight: bold;"><?php echo $mess; ?></p>
            <?php } ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <form class="form-horizontal" action="?sk=sanpham&m=edit&id=<?php echo $id_sp; ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="frmAddBook">
                    <div class="form-group">
                        <label for="txtTenSP" class="col-sm-offset-2 col-sm-2 control-label">Tên sản phẩm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtTenSP" placeholder="Tên sản phẩm" name="txtTenSP" value="<?php echo $data['TenKinh']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcNSX" class="col-sm-offset-2 col-sm-2 control-label">Nhà sản xuất</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcNSX" name="slcNSX">
                                <option value="<?php echo $data['id_nsx'];?>"><?php echo $data['TenNSX']; ?></option>
                                <?php foreach($data_nsx as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['id_nsx'];?>"><?php echo $val['TenNSX']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcNPP" class="col-sm-offset-2 col-sm-2 control-label">Nhà phân phối</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcNPP" name="slcNPP">
                                <option value="<?php echo $data['id_npp'];?>"><?php echo $data['TenNPP']; ?></option>
                                <?php foreach($data_npp as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['id_npp']; ?>"><?php echo $val['TenNPP']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcLoaiSP" class="col-sm-offset-2 col-sm-2 control-label">Loại sản phẩm</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcLoaiSP" name="slcLoaiSP">
                                <option value="<?php echo $data['id_loai'];?>"><?php echo $data['TenLoai']; ?></option>
                                <?php foreach ($data_loaisp as $key => $val) {
                                    ?>
                                    <option value="<?php echo $val['id_loai']; ?>"><?php echo $val['TenLoai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtFile" class="col-sm-offset-2 col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" id="txtFile" name="nameFileImg">
                            <br>
                            <img src="<?php echo UPLOAD_IMG.$data['HinhAnh'];?>" alt="Images" width="70" height="70">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSP" class="col-sm-offset-2 col-sm-2 control-label">Giá sản phẩm(VNĐ)</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtGiaSP" placeholder="Giá sản phẩm Mới" name="txtGiaSP" value="<?php echo $data['GiaMoi'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtSoLuong" class="col-sm-offset-2 col-sm-2 control-label">Số lượng</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtSoLuong" placeholder="Số lượng" name="txtSoLuong" value="<?php echo $data['SoLuong'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcStatus" class="col-sm-offset-2 col-sm-2 control-label">Status</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcStatus" name="slcStatus">
                                <option value="">-- Choose --</option>
                                <option value="1" <?php echo ($data['status']==1) ? "selected='selected'" : ""; ?>>Enable</option>
                                <option value="0" <?php echo ($data['status']==0) ? "selected='selected'" : ""; ?>>Disable</option>
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
