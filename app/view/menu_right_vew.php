
        <section class="span3">
            <div class="side-holder">
                <article class="banner-ad">
                    <img src="public/images/khuyenmai.png" alt=""/>
                </article>
            </div>
            <div class="side-holder">
                <article class="shop-by-list">
                    <h2>Danh mục sản phẩm</h2>
                    <div class="side-inner-holder">
                        <strong class="title">Hãng sản xuất</strong>
                        <ul class="side-list">
                            <?php foreach ($data_nsx as $key => $value) {
                                ?>
                                <li><a href="?cn=home&method=nhasanxuat&idnhasanxuat=<?php echo $value['id_nsx'];?>"><?php echo $value['TenNSX'];?></a></li>
                            <?php } ?>
                        </ul>
                        <strong class="title">Giá</strong>
                        <ul class="side-list">
                            <li><a href="?cn=home&method=sp_theo_gia&fm=1000&tm=500000">Từ 1000đ - 500000đ</a></li>
                            <li><a href="?cn=home&method=sp_theo_gia&fm=500000&tm=1000000">Từ 500,000đ - 1,000,000đ</a></li>
                            <li><a href="?cn=home&method=sp_theo_gia&fm=1000000">Lớn hơn 1,000,000đ</a></li>
                        </ul>
                        <strong class="title">Loại sản phẩm</strong>
                        <ul class="side-list">
                            <?php foreach ($data_loaikinh as $key => $value) {
                                ?>
                                <li <?php echo ($idLoaiSP===$value['id_loai']) ? 'style="background-color:#ccc;"': ""; ?>><a href="?cn=home&method=loaiSanPham&idloaiSanPham=<?php echo $value['id_loai'];?>"><?php echo $value['TenLoai'];?></a></li>
                            <?php } ?>
                        </ul>
                        <strong class="title">Nhà Phân Phối</strong>
                        <ul class="side-list">
                            <?php foreach ($data_npp as $key => $value) {
                                ?>
                                <li  <?php echo ($idNPP===$value['id_npp']) ? 'style="background-color:#ccc;"': ""; ?>><a href="?cn=home&method=nhaphanphoi&idnhaphanphoi=<?php echo $value['id_npp'];?>"><?php echo $value['TenNPP'];?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="side-holder">
                <article class="l-reviews">
                    <h2>Sách xem nhiều nhất</h2>
                    <div class="side-inner-holder">
                        <article class="r-post sach_xem_nhieu">
                            <?php foreach ($data_max_viewer as $key => $value) {
                            ?>
                            <div class="r-img-title">
                                <a href="?cn=detail&method=index&sanpham=<?php echo $value['id'];?>"><img src="<?php echo UPLOAD_IMG.$value['HinhAnh'];?>"/></a>
                                <div class="r-det-holder span6">
                                    <strong class="r-author">Tên sản phẩm: <a href="?cn=detail&method=index&sanpham=<?php echo $value['id'];?>"><?php echo $value['TenKinh'];?></a></strong>
                                </div>
                                <div class="r-det-holder span6">
                                    <span class="r-by">Tên nhà phân phối:<a href="?cn=home&method=nhaphanphoi&idnhaphanphoi=<?php echo $value['id_npp'];?>"><?php echo $value['TenNPP'];?></a></span>
                                    <span class="r-by">Giá:<?php echo ($value['GiaMoi']!=0) ? number_format($value['GiaMoi']) : number_format($value['GiaCu']);?>&#160;VNĐ</span>
                                    <span class="r-by">Số lượt xem: <?php echo $value['SoLuotXem']; ?></span>
                                </div>
                            </div>
                            <?php } ?>
                        </article>
                    </div>
                </article>
            </div>

            <!-- Page Facebook-->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  // js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <div class="fb-page" data-href="https://www.facebook.com/duongcv1006/" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/duongcv1006/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/duongcv1006/">Của hàng DươngCV</a></blockquote>
            </div>

            <!-- Page Facebook-->
        </section>
    </section>
</section>