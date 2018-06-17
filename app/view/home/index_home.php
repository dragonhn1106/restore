<!-- phần slide hãng kính -->
<div class="hotdeal-today">
    <div class="dealtoday owl-carousel owl-theme">
        <div class="owl-item item">
            <a href=""><img src="public/images/slider3.jpg" alt=""></a>
        </div>
        <div class="owl-item item">
            <a href=""><img src="public/images/slider5.jpg" alt=""></a>
        </div>
        <div class="owl-item item">
            <a href=""><img src="public/images/slider2.jpg" alt=""></a>
        </div>
        <div class="owl-item item">
            <a href=""><img src="public/images/slider7.png" alt=""></a>
        </div>
        <div class="owl-item item">
            <a href=""><img src="public/images/slider4.png" alt=""></a>
        </div>
    </div>
</div>
<!--hết phần slide hãng kính-->
<div id="right">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h3 class="" style="background-color:#f3f3f3;color:#5e0001;border-left: 4px solid #5e0001; margin-right: -15px;">&#160; SẢN PHẨM TIÊU BIỂU</h3>
            </div>
        </div>
    </div>
    <section class="grid-holder features-books">
        <?php foreach ($data_sanpham as $key => $value) {
            ?>
            <figure class="span4 slide first chinh1" style="position:relative;">
                <?php $date_time = explode(" ", trim($value['create_time'])); ?>
                <?php if (strtotime($date_time[0]) === strtotime(date('Y-m-d'))) { ?>
                    <img src="public/images/New_icons.gif" style="width:35px;height:20px;position:absolute;" alt="Images">
                <?php } ?>
                <a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'], TRUE) . "-" . $value['id']; ?>"><img
                            src="<?php echo UPLOAD_IMG . $value['HinhAnh']; ?>" alt="Images" class="pro-img"/></a>
                <p style="text-align: center">
                        <span class="title">
                            <a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'], TRUE) . "-" . $value['id']; ?>" style="font-weight: bold"><?php echo $value['TenKinh']; ?></a>
                        </span>
                </p>
                <p>Nhà phân phối:
                    <a class="nxb" href="?cn=home&method=nhaphanphoi&idnhaphanphoi=<?php echo $value['id_npp']; ?>"><?php echo $value['TenNPP']; ?></a>
                </p>
                <p>Loại Sản phẩm:
                    <a class="nxb" href="?cn=home&method=loaisanpham&idloaisanpham=<?php echo $value['id_loai']; ?>"><?php echo $value['TenLoai']; ?></a>
                </p>
                <p>Nhà sản xuất:
                    <a class="nxb" href="?cn=home&method=nhasanxuat&idnhasanxuat=<?php echo $value['id_nsx']; ?>"><?php echo $value['TenNSX']; ?></a>
                </p>
                <p>
                    <i class="fa fa-eye" aria-hidden="true"></i>&#160;Lượt xem: <?php echo $value['SoLuotXem']; ?>
                </p>
                <div class="cart-price">
                    <a class="cart-btn2"
                       href="?cn=cart&m=add&sanpham=<?php echo vn2latin($value['TenKinh'], TRUE) . "-" . $value['id']; ?>">Thêm vào giỏ hàng</a>
                    <span class="price"><?php echo number_format($value['GiaCu']); ?>&#160;VNĐ</span>
                </div>
            </figure>
        <?php } ?>
    </section>
</div>
<div class="col-md-12">
    <?php echo $paginghome['html']; ?>
</div>
</section>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("#btnSearch").click(function (event) {
            var page = '<?php echo $page;?>';
            window.location.href = '<?php echo BASE_URL;?>' + '?cn=home&method=index&page=' + page;
        });
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 500,
        autoplayHoverPause: true
    });
    $('.play').on('click', function () {
        owl.trigger('play.owl.autoplay', [500])
    })
    $('.stop').on('click', function () {
        owl.trigger('stop.owl.autoplay')
    })
</script>