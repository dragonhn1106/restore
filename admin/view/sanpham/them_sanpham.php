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
            <a href="?sk=sanpham&m=index" class="btn btn-info" style="margin: 10px;"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Xem sản phẩm</a>
            <h1 class="text-center">Thêm sản phẩm &nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></h1>
            <?php if(isset($mess) && !empty($mess)) { ?>
            <p class="text-center" style="font-weight: bold;"><?php echo $mess; ?></p>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <form class="form-horizontal" action="?sk=sanpham&m=add" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="them_sanpham">
                    <div class="form-group">
                        <label for="txtTenSP" class="col-sm-offset-2 col-sm-2 control-label">Tên Sản Phẩm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtTenSP" placeholder="Tên sản phẩm" name="txtTenSP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcHSX" class="col-sm-offset-2 col-sm-2 control-label">Hãng Sản Xuất</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcNXB" name="slcNXB">
                                <option value="">-- Chọn Hãng Sản Xuất --</option>
                                <?php foreach($data_nsx as $key => $val) {
                                ?>
                                    <option value="<?php echo $val['id_nsx']; ?>"><?php echo $val['TenNSX']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcNPP" class="col-sm-offset-2 col-sm-2 control-label">Nhà Phân Phối</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcNPP" name="slcNPP">
                                <option value="">-- Chọn Nhà Phân Phối --</option>
                                <?php foreach($data_npp as $key => $val) {
                                ?>
                                    <option value="<?php echo $val['id_npp']; ?>"><?php echo $val['TenNPP']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slcLoaiSP" class="col-sm-offset-2 col-sm-2 control-label">Loại Sản Phẩm</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="slcLoaiSP" name="slcLoaiSP">
                                <option value="">-- Chọn loại sản phẩm --</option>
                                <?php foreach ($data_loaikinh as $key => $val) {
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSP" class="col-sm-offset-2 col-sm-2 control-label">Giá sản phẩm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtGiaSP" placeholder="Giá của sản phẩm" name="txtGiaSP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtSoLuong" class="col-sm-offset-2 col-sm-2 control-label">Số lượng</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtSoLuong" placeholder="Số lượng" name="txtSoLuong">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <input type="submit" name="btnSubmit" class="btn btn-success" value="Add" />
                            <input type="reset" name="btnReset" class="btn btn-primary" value="Reset" />
                        </div>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>