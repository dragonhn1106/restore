<style type="text/css">
    .likeQuestion{
        cursor: pointer;
        color:#00AA00;
    }
    .dislikeQuestion{
        cursor: pointer;
        color:#CC0000;
        display: none;
    }
    .ansewer{
        cursor: pointer;
        color:#3399FF;
        float:right;
    }
    .usericon{
        color:#0000FF;
    }
    #commentQuestion{
        border-radius: 5px;
        border: 1px solid #777777;
    }
    .myCaptcha{
        cursor:pointer;
    }
</style>

<div id="right">

    <section class="b-detail-holder">
        <article class="title-holder">
            <div class="span6">
                <h2><?php echo $detail_data['TenKinh']; ?></h2>
            </div>
        </article>
        <div class="book-i-caption">
            <div class="span6 b-img-holder">
                <span class='zoom' id='ex1'> <img src="<?php echo UPLOAD_IMG.$detail_data['HinhAnh'];?>" height="219" width="300" id='jack' alt=''/></span>
            </div>
            <div class="span6">
                <strong class="title">Tổng quan</strong>
                <p class="text_chi_tiet">Hãng sản xuất:&#160;<a href="?cn=home&method=nhasanxuat&idnhasanxuat=<?php echo $detail_data['id_nsx'];?>"><?php echo $detail_data['TenNSX'];?></a></p>
                <p class="text_chi_tiet">Nhà phân phối:&#160;<a href="?cn=home&method=nhaphanphoi&idnhaphanphoi=<?php echo $detail_data['id_npp'];?>"><?php echo $detail_data['TenNPP'];?></a></p>
                <p class="text_chi_tiet">Loại sản phẩm:&#160;<a href="?cn=home&method=loaiSanPham&idloaiSanPham=<?php echo $detail_data['id_loai'];?>"><?php echo $detail_data['TenLoai'];?></a></p>
                <p class="text_chi_tiet">Giá gốc:&#160;<?php echo number_format($detail_data['GiaCu']); ?>&#160;VNĐ</p>
                <p class="text_chi_tiet">Giá bán:&#160;<span class="giamoi_chitiet"><?php echo ($detail_data['GiaMoi']!=0) ? number_format($detail_data['GiaMoi']) : number_format($detail_data['GiaCu']); ?></span>&#160;VNĐ</p>
                <p class="text_chi_tiet">Lượt xem:&#160;<?php echo $detail_data['SoLuotXem']; ?></p>
                <div class="comm-nav">
                    <strong class="title2">Số lượng mua</strong>
                    <ul>
                        <form method="POST" action="">
                            <li><input name="txtSoLuong" class="txtSoLuong" type="text" value="1" required pattern="[0-9]{1,3}" title="Số lượng phải là số và nhỏ hơn 4 kí tự"/></li>
                            <li><a class="cart-btn2" href="?cn=cart&m=add&sanpham=<?php echo vn2latin($detail_data['TenKinh'], TRUE) . "-" . $detail_data['id']; ?>">Thêm vào giỏ hàng</a> <input type="submit" value="Thêm vào giỏ hàng" class="more-btn btn-success" /></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <section class="related-book">
            <div class="heading-bar">
                <h2>Sản phẩm liên quan</h2>
                <span class="h-line"></span>
            </div>
            <div class="slider6" style="width: 300px; height: 200px;">
                <?php foreach ($data_type_sanpham_same as $key => $value) {
                    ?>
                    <div class="slide">
                        <a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'],TRUE)."-".$value['id'];?>"><img src="<?php echo UPLOAD_IMG.$value['HinhAnh'];?>" alt="Images" class="pro-img"/></a>
                        <h4><a href="?cn=detail&method=index&sanpham=<?php echo vn2latin($value['TenKinh'],TRUE)."-".$value['id'];?>"><?php echo $value['TenKinh'];?></a></h4>
                        <div class="cart-price">
                            <a class="cart-btn2" href="?cn=giohang">Add to Cart</a>
                            <span class="price"><?php echo ($value['GiaMoi']!=0) ? number_format($value['GiaMoi']) : number_format($value['GiaCu']);?> VNĐ</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <section class="reviews-section">
            <figure class="left-sec">
                <div class="r-title-bar">
                    <strong>Hỏi, Đáp Về Sản Phẩm</strong>
                </div>
                <ul class="review-list">
                    <li>
                        <input name="" type="text" placeholder="Hãy đặt câu hỏi..."/>
                    </li>
                    <p class="text-success"><strong>Các câu hỏi thường gặp về sản phẩm:</strong></p>
                    <?php foreach ($data_question_popular as $key => $value) { ?>
                        <p>-&#160;<?php echo $value['content']; ?></p>
                    <?php } ?>
                    <p><span>Các câu hỏi liên quan đến sản phẩm hư hỏng, cần đổi trả, v.v ... vui lòng truy cập trang hỗ trợ</span></p>
                </ul>
                <a href="#" class="grey-btn">Gửi câu hỏi</a>
            </figure>
             <figure class="right-sec">
                    <div class="r-title-bar">
                        <strong>Khách Hàng Nhận Xét</strong>
                    </div>
                    <ul class="review-f-list">
                        <?php if(!isset($_SESSION['username'])) : ?>
                            <li>
                                <label>Tên của bạn *</label>
                                <input name="" type="text" id="txtUsername" placeholder="Họ Tên ..." style="width: 100%;" value=""/>
                            </li>
                            <li>
                                <label>Email của bạn *</label>
                                <input name="" type="text" id="txtEmail" placeholder="Email ..." style="width: 100%;" value=""/>
                            </li>
                        <?php endif; ?>
                            <li>
                                <label>Bình luận*</label>
                                <textarea name="" id="txtContent" style="min-width: 100%;" placeholder="Để lại bình luận của bạn..." value=""></textarea>
                            </li>
                            <li>
                                <label>Captcha*</label>
                                <span>Đổi Captcha:&#160;&#160;<i class="fa fa-refresh myCaptcha" aria-hidden="true"></i></span>
                                <img id="img_captcha" style="width:100%; height:100px;" src="<?php echo $captcha['image_src']  ?>" alt="">
                            </li>
                            <li>
                                <input type="text" placeholder="Nhập mã captcha..." name="txtCaptcha" id="txtCaptcha" style="width: 100% height 100px margin-top 20px;" value="">
                            </li>
                    </ul>
                    <button id="commentQuestion" class="grey-btn left-btn btn-info">Bình luận</button>
                    <div style="width: 100%; margin-top:80px; height:650px; overflow-y:auto; overflow-x:hidden;">
                        <?php foreach ($comment as $com) {  ?>
                            <div class="chat" style="padding: 10px; border: 1px solid #e5e5e5; margin: 0px 20px 10px; background-color: #FCFCFC;">
                                <p>
                                    <i class="fa fa-user usericon" aria-hidden="true"></i>&#160;&#160;<?php echo $com['username']; ?>&#160;&#160;
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>&#160;&#160;<?php echo $com['id']; ?>&#160;&#160;
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>&#160;&#160;<?php echo $com['create_time']; ?>&#160;&#160;

                                    <!--Nút dislike-->
                                    <i class="fa fa-thumbs-o-down likeQuestion" aria-hidden="true" onclick="likeQuestion(<?php echo $com['id'];?>,2);" id="dislikeQuestion_<?php echo $com['id'];?>"></i>&#160;

                                    <!--Nút like-->
                                    <i class="fa fa-thumbs-o-up likeQuestion" aria-hidden="true" onclick="likeQuestion(<?php echo $com['id'];?>,1);" id="likeQuestion_<?php echo $com['id'];?>"></i>&#160;

                                    <!--Hiển thị số lượt like-->
                                    <span id="voteQuestion_<?php echo $com['id'];?>"><?php echo $com['like_comment']; ?></span>&#160;Like&#160;

                                    <!--Nút phản hồi-->
                                    <span class="ansewer"  onclick="openAnsewer(<?php echo $com['id'];?>);">Phản hồi <i class="fa fa-commenting-o" aria-hidden="true" style="cursor:pointer;"></i></span>
                                </p>
                                <p>
                                    <strong>Admin cho mình hỏi:</strong>&#160;&#160;<?php echo $com['content']; ?>
                                </p>

                                <!--Xử lý data answer-->
                                <?php foreach ($answer as $an) :  ?>

                                    <?php if($an['question_id']==$com['id']) : ?>
                                        <?php if($an['level_user']==0) : ?>
                                            <p style="margin-left:30px;">

                                               <i style="color:#0000FF" class="fa fa-user" aria-hidden="true"></i>&#160;<?php echo $an['username'];?>&#160;&#160;

                                               <i class="fa fa-comment" aria-hidden="true"></i>&#160;<?php echo $an['id']; ?>&#160;&#160;

                                               <i class="fa fa-clock-o" aria-hidden="true"></i>&#160;<?php echo $an['create_time']; ?>&#160;&#160;

                                               <!--dislike answer button-->
                                               <i class="fa fa-thumbs-o-down likeQuestion" aria-hidden="true" onclick="likeAnswer(<?php echo $an['id'];?>,2);" id="dislikeAnswer_<?php echo $an['id'];?>"></i>&#160;

                                               <!--like answer button-->
                                               <i class="fa fa-thumbs-o-up likeQuestion" aria-hidden="true" onclick="likeAnswer(<?php echo $an['id'];?>,1);" id="likeAnswer_<?php echo $an['id'];?>"></i>&#160;

                                               <!--Hiển thị số lượt like-->
                                               <span id="voteAnswer_<?php echo $an['id'];?>"><?php echo $an['like_answer']; ?></span>&#160;Like&#160;

                                            </p>
                                            <p style="margin-left:30px;">
                                                <strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>&#160;Trả lời:</strong>&#160;<?php echo $an['content'];?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if($an['level_user']==1) : ?>
                                            <p style="margin-left:30px;color:red;">

                                                <i class="fa fa-user-secret" aria-hidden="true"></i>&#160;<strong><?php echo $an['username'];?></strong>&#160;&#160;

                                                <i class="fa fa-clock-o" aria-hidden="true"></i>&#160;<?php echo $an['create_time']; ?>&#160;&#160;

                                            </p>
                                            <p style="margin-left:30px;color:blue;">
                                              <strong><i class="fa fa-angle-double-right" aria-hidden="true"></i>&#160;Admin trả lời:</strong>&#160;<?php echo $an['content'];?>  
                                            </p>
                                        <?php endif; ?>   
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!--form answer-->
                                <div id="ansewer_<?php echo $com['id']; ?>" style="display: none; background-color: #FFFFFF; margin-top: 20px;border: 1px solid #e5e5e5;">
                                    <ul class="review-f-list">
                                    <?php if(!isset($_SESSION['username'])): ?>
                                        <li>
                                            <label>Tên của bạn *</label>
                                            <input name="" type="text" placeholder="Họ Tên ..." style="width: 100%;" id="txtUser_<?php echo $com['id']; ?>" />
                                        </li>
                                        <li>
                                            <label>Email của bạn *</label>
                                            <input name="" type="text" placeholder="Email ..." style="width: 100%;" id="txtEmail_<?php echo $com['id']; ?>" />
                                        </li>
                                    <?php endif; ?>
                                        <li>
                                            <label>Bình luận *</label>
                                            <textarea id="txtContent_<?php echo $com['id']; ?>" name="" style="min-width: 100%;" ></textarea>
                                        </li>
                                        <li>
                                            <label>Captcha *</label>
                                            <span>Đổi captcha :&nbsp;&nbsp; <i id="refresh_<?php echo $com['id']; ?>" class="fa fa-refresh myCaptcha" aria-hidden="true"></i></span>
                                            <img class="ansewerCaptcha" id="img_captcha_<?php echo $com['id']; ?>" style="width: 100%; height: 100px;" src="<?php echo $captcha['image_src']; ?>" alt="">
                                            <input placeholder="Nhập mã captcha..." type="text" name="txtCaptcha" id="txtCaptcha_<?php echo $com['id']; ?>" style="width: 100%; margin-top: 20px;">
                                        </li>
                                    </ul>
                                    <button style="padding:5px;border:1px solid #777777; border-radius:5px;" id="commentAnser_<?php echo $com['id']; ?>" class="grey-btn btn-primary" onclick="ansewerComment(<?php echo $com['id']; ?>);">Trả lời</button>
                                </div>
                            </div>
                        <?php } ?>
                        <hr/>
                </div>
            </figure>
        </section>
    </section>
    <section>
        <div>

        </div>
    </section>
</div>
</section>
<div id="dialog" style="display: none; width: 600px; height: 150px;background-color: white; border-radius: 5px; border: 1px solid blue; padding: 10px;">
    <div style="width: 500px; margin: auto;">
        <h3 style="text-align: center;margin-top: 20px;color:green;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&#160;&#160;Cảm ơn đã bình luận, bình luận của bạn sẽ được hiện thị sau 20 phút nữa.</h3>
    </div>
</div>
<script type="text/javascript">
    //check email
    function isEmail(email){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    //event phanhoi button
    function openAnsewer(id)
    {
        var tmpCheck = $('#ansewer_'+id);
        if($(tmpCheck).is(':visible')){
            $('#txtUser_'+id).val('');
            $('#txtEmail_'+id).val('');
            $('#txtContent_'+id).val('');
            $('#txtCaptcha_'+id).val('');
            $(tmpCheck).hide();
        }
        else
        {
            $(tmpCheck).show();
        }
    }
    //event like button
    function likeQuestion(id,checklike){
        $.ajax({
            url: 'app/controler/comment.php',
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {idQuestion: id, like: 1,checklike : checklike},
            success: function(data)
            {
                var obj = $.parseJSON(data);
                if(obj.errors != "")
                {
                    alert(obj.errors);
                }
                else
                {
                    if(obj.notlike != "")
                    {
                        alert(obj.notlike);
                    }
                    else
                    {
                        $("#voteQuestion_"+id).html(obj.like);
                        if(obj.checklike == 1)
                        {
                            $("#dislikeQuestion_"+id).show();
                            $("#likeQuestion_"+id).hide();
                        }
                        else
                        {
                            if(obj.checklike == 2)
                            {
                                $("#dislikeQuestion_"+id).hide();
                                $("#likeQuestion_"+id).show();
                            }
                        }

                    }
                }
            }
        });
    }

    //event like answer button
    function likeAnswer(id,checklike){
        $.ajax({
            url: 'app/controler/answer.php',
            type: 'POST',
            //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {idAnswer: id, like: 1,checklike : checklike},
            success: function(data)
            {
                var obj = $.parseJSON(data);
                if(obj.errors != "")
                {
                    alert(obj.errors);
                }
                else
                {
                    if(obj.notlike != "")
                    {
                        alert(obj.notlike);
                    }
                    else
                    {
                        $("#voteAnswer_"+id).html(obj.like);
                        if(obj.checklike == 1)
                        {
                            $("#dislikeAnswer_"+id).show();
                            $("#likeAnswer_"+id).hide();
                        }
                        else
                        {
                            if(obj.checklike == 2)
                            {
                                $("#dislikeAnswer_"+id).hide();
                                $("#likeAnswer_"+id).show();
                            }
                        }

                    }
                }
            }
        });
    }

    //event add answer
    function ansewerComment(id)
    {
        var username = $.trim($("#txtUser_" + id).val());
        var email = $.trim($("#txtEmail_" + id).val());
        var content = $.trim($("#txtContent_" + id).val());
        var captcha = $.trim($("#txtCaptcha_" + id).val());
        var checkAnsewer = "<?php echo $checkSession;?>";
        if(checkAnsewer == 0)
        {
            if(username !='' && isEmail(email) && content !='' && captcha !='')
            {
                $.ajax({
                    url: 'app/controler/answer.php',
                    type: 'POST',
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                    data: {username: username, email: email, content: content, captcha: captcha, idquestion: id},
                    success: function(data)
                    {
                        if(data=='err1')
                        {
                            alert("Có lỗi xảy ra");
                        }
                        else
                        {
                            if(data=='err2')
                            {
                                alert("Có lỗi xảy ra! Không thể thêm câu trả lời của bạn");

                            }
                            else
                            {
                                $('#dialog').bPopup({
                                    easing: 'easeOutBack',
                                    speed: 550,
                                    transition: 'slideUp',
                                });
                                return true;
                            }
                        }
                    },

                });
            }
            else
            {
                alert('Vui lòng kiểm tra lại dữ liệu');
            }
        }
        else
        {
            if(content !='' && captcha !='')
            {
                $.ajax({
                    url: 'app/controler/answer.php',
                    type: 'POST',
                    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                    data: {content: content, captcha: captcha, idquestion: id},
                    success: function(data)
                    {
                        if(data=='err1')
                        {
                            alert("Có lỗi xảy ra");
                        }
                        else
                        {
                            if(data=='err2')
                            {
                                alert("Có lỗi xảy ra! Không thể thêm câu trả lời của bạn");

                            }
                            else
                            {
                                $('#dialog').bPopup({
                                    easing: 'easeOutBack',
                                    speed: 550,
                                    transition: 'slideUp',
                                });
                                return true;
                            }
                        }
                    },

                });
            }
            else
            {
                alert("Vui lòng kiểm tra lại dữ liệu");
            }
        }
    }

    $(document).ready(function() {
        //event captcha button
        $('.myCaptcha').click(function(event) {
            $.ajax({
                type:"POST",
                url: 'app/controler/getcaptcha.php',
                data: {},
                success:function(data)
                {
                    var obj = $.parseJSON(data);
                    $('#img_captcha').attr('src',obj.image_src);
                    $('.ansewerCaptcha').attr('src',obj.image_src);
                }
            });
        });
        //event comment question button
        $('#commentQuestion').click(function(event) {
            var username = $.trim($("#txtUsername").val());
            var email = $.trim($("#txtEmail").val());
            var content = $.trim($("#txtContent").val());
            var captcha = $.trim($("#txtCaptcha").val());

            var idSanPham = <?php echo $detail_data['id'];?>;
            var checkComment = '<?php echo $checkSession;?>';

            if(checkComment == 0)
            {
                if(username !='' && isEmail(email) && content !='' && captcha !='')
                {
                    $.ajax({
                        url: 'app/controler/comment.php',
                        type: 'POST',
                        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        data: {username: username, email: email, content: content, captcha: captcha, idSanPham: idSanPham},
                        success: function(data)
                        {
                            if(data=='err1')
                            {
                                alert("Có lỗi xảy ra");
                            }
                            else
                            {
                                if(data=='err2')
                                {
                                    alert('Có lỗi xảy ra! Không thể thêm câu hỏi của bạn');
                                }
                                else
                                {
                                    $('#dialog').bPopup({
                                        easing: 'easeOutBack',
                                        speed: 550,
                                        transition: 'slideUp',
                                    });
                                    return true;
                                }
                            }
                        },

                    });
                }
                else
                {
                    alert('Vui lòng kiểm tra lại dữ liệu');
                }
            }
            else
            {
                if(content !='' && captcha !='')
                {
                    $.ajax({
                        url: 'app/controler/comment.php',
                        type: 'POST',
                        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        data: {content: content, captcha: captcha, idSanPham: idSanPham},
                        success: function(data)
                        {
                            if(data=='err1')
                            {
                                alert("Có lỗi xảy ra");
                            }
                            else
                            {
                                if(data=='err2')
                                {
                                    alert('Có lỗi xảy ra! Không thể thêm câu hỏi của bạn');
                                }
                                else
                                {
                                    $('#dialog').bPopup({
                                        easing: 'easeOutBack',
                                        speed: 550,
                                        transition: 'slideUp',
                                    });
                                    return true;
                                }
                            }
                        },

                    });
                }
                else
                {
                    alert("Vui lòng kiểm tra lại dữ liệu");
                }
            }

        });


    });
</script>