<div id="right">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-5">
                <h3 class="text-center" style="background-color:#98b827;color:white;"><i class="fa fa-bookmark" aria-hidden="true"></i>&#160;Sản phẩm theo nhà sản xuất</h3>
            </div>
        </div>
    </div>
    <section class="grid-holder features-books">
        <?php foreach ($dataNSX as $key => $value) {
            ?>
            <figure class="span4 slide first chinh1" style="position:relative;">
                <?php $date_time=explode(" ",trim($value['create_time']));?>
                <?php if(strtotime($date_time[0])===strtotime(date('Y-m-d'))) { ?>
                    <img src="public/images/New_icons.gif" style="width:35px;height:20px;position:absolute;" alt="Images">
                <?php } ?>
                <a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'],TRUE)."-".$value['id'];?>"><img src="<?php echo UPLOAD_IMG.$value['HinhAnh'];?>" alt="Images" class="pro-img"/></a>
                <p>
                        <span class="title">
                            <a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'],TRUE)."-".$value['id'];?>" style="font-weight: bold"><?php echo $value['TenKinh'];?></a>
                        </span>
                </p>
                <p>Nhà phân phối:
                    <a class="nxb" href="?cn=home&method=nhaphanphoi&idnhaphanphoi=<?php echo $value['id_npp'];?>"><?php echo $value['TenNPP'];?></a>
                </p>
                <p>Loại sản phẩm:
                    <a class="nxb" href="?cn=home&method=loaisanpham&idloaisanpham=<?php echo $value['id_loai'];?>"><?php echo $value['TenLoai'];?></a>
                </p>
                <p>Hãng sản xuất:
                    <a class="nxb" href="?cn=home&method=nhasanxuat&idnhasanxuat=<?php echo $value['id_nsx'];?>"><?php echo $value['TenNSX'];?></a>
                </p>
                <p>
                    <i class="fa fa-eye" aria-hidden="true"></i>&#160;Lượt xem: <?php echo $value['SoLuotXem']; ?>
                </p>
                <div class="cart-price">
                    <a class="cart-btn2" href="?cn=cart&m=add&sanpham=<?php echo vn2latin($value['TenKinh'], TRUE) . "-" . $value['id']; ?>">Thêm vào giỏ hàng</a>
                    <span class="price"><?php echo number_format($value['GiaCu']);?>&#160;VNĐ</span>
                </div>
            </figure>
        <?php } ?>
    </section>
</div>
<div class="col-md-12">
    <?php echo $paginghome['html'];?>
</div>
</section>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $("#btnSearch").click(function(event) {
            var page ='<?php echo $page;?>';
            var idNSX='<?php echo idNSX;?>'
            window.location.href='<?php echo BASE_URL;?>' + '?cn=home&method=nhasanxuat&idnhasanxuat=' + idNSX + '&page=' + page;
        });
    });
</script>