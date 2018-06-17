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
            <a href="?sk=loaisanpham&m=index" class="btn btn-success" style="margin: 10px;"><i class="fa fa-th-list" aria-hidden="true"></i>&#160;&#160;Xem danh sách loại sản phẩm</a>
            <h1 class="text-center">Thêm sản phẩm &nbsp;&nbsp;<i class="fa fa-book" aria-hidden="true"></i></h1>
            <?php if(isset($mess) && !empty($mess)) { ?>
            <p class="text-center" style="font-weight: bold;"><?php echo $mess; ?></p>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                <form class="form-horizontal" action="?sk=loaisanpham&m=add" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="frmAddUserAdmin">
                    <div class="form-group">
                        <label for="txtUsername" class="col-sm-offset-2 col-sm-2 control-label">Tên loại sản phẩm</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="txtUsername" placeholder="Tên loại sản phẩm" name="txtUsername">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtFile" class="col-sm-offset-2 col-sm-2 control-label">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" id="txtFile" name="nameFileImg">
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