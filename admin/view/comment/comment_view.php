<style type="text/css">
	.review-f-list{
		list-style-type: none;
		margin:10px 10px;
	}
</style>
<div class="content-wrapper right_col">
	<div class="row">
        <h1 class="text-center">Quản lý bình luận&#160;&#160;<i class="fa fa-users" aria-hidden="true"></i></h1>
		<?php foreach ($question as $key => $val) : ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:30px 30px;border-bottom:1px solid #000000;">
				<div class="col-md-2" style="float:left;">
					<p style="text-align: center">
						<img src="<?php echo UPLOAD_IMG.$val['hinhAnh']; ?>" alt="" width="150" height="150" >
					</p>
					<p class="text-primary" style="font-size:20px;">
						<strong><i class="fa fa-book" aria-hidden="true"></i>&#160;<?php echo $val['TenKinh']; ?></strong>
					</p>
				</div>
				<?php foreach ($val['question'] as $key => $value) : ?>
					<div class="col-md-10 well" style="float:right;">
						<p>
							<i  class="fa fa-user" aria-hidden="true"></i>&#160;&#160;<?php echo $value['username']; ?>&#160;&#160;
						 	<i class="fa fa-clock-o" aria-hidden="true"></i>&#160;&#160;<?php echo $value['create_time']; ?>&#160;&#160;
						 	<i class="fa fa-envelope" aria-hidden="true"></i>&#160;&#160;<?php echo $value['email']; ?>

						 	<!--Nút phản hổi của admin-->
						 	<?php if($value['status']==1) : ?>
						 		<span style="margin-left:120px; font-size:20px;cursor:pointer;"class="ansewer"  onclick="openAnsewer(<?php echo $value['idQuestion'];?>);">Phản hồi <i class="fa fa-commenting-o" aria-hidden="true"></i></span>
						 	<?php endif; ?>

						</p>
						<p style="margin:10px;">

							<span><?php echo $value['content']; ?></span>

							<?php if($value['status']!=1) : ?>
								&#160;&#160;<button type="button" name="btnactive" class="btn btn-success" onclick="actionQuestion(<?php echo $value['idQuestion'];?>,1);">Active</button>&#160;&#160;
								<button type="button" name="btndelete" class="btn btn-danger" onclick="actionQuestion(<?php echo $value['idQuestion'];?>,2);">Delete</button>
							<?php endif;?>

						</p>

						<hr/>

							<!--Hiển thị câu trả lời-->
						 	<?php foreach ($answer as $key => $an) : ?>
						 		<?php  if($an['question_id']==$value['idQuestion']) : ?>
							 		<?php if($an['level_user']==0) : ?>
								 		<p style="margin-left:50px;">
								 			<i  class="fa fa-user" aria-hidden="true"></i>&#160;&#160;<?php echo $an['username']; ?>&#160;&#160;
								 			<i class="fa fa-clock-o" aria-hidden="true"></i>&#160;&#160;<?php echo $an['create_time']; ?>&#160;&#160;
								 			<i class="fa fa-envelope" aria-hidden="true"></i>&#160;&#160;<?php echo $an['email']; ?>
								 		</p>
								 		<p style="margin-left:50px;">
								 			<span><i class="fa fa-comments-o" aria-hidden="true"></i>&#160;<?php echo $an['content']; ?></span>
								 			<?php if($an['status']!=1) : ?>
												&#160;&#160;<button type="button" name="btnactive" class="btn btn-success" onclick="actionAnswer(<?php echo $an['id'];?>,1);">Active</button>&#160;&#160;
												<button type="button" name="btndelete" class="btn btn-danger" onclick="actionAnswer(<?php echo $an['id'];?>,2);">Delete</button>
											<?php endif;?>
								 		</p>
							 		<?php endif; ?>
							 		<?php if($an['level_user']==1) : ?>
							 			<p style="margin-left:50px;color:blue;">
							 				<strong>
							 					<i class="fa fa-user-secret" aria-hidden="true"></i>&#160;&#160;<?php echo $an['username']; ?>&#160;&#160;
								 				<i class="fa fa-clock-o" aria-hidden="true"></i>&#160;&#160;<?php echo $an['create_time']; ?>&#160;&#160;
								 				<i class="fa fa-envelope" aria-hidden="true"></i>&#160;&#160;<?php echo $an['email']; ?>
							 				</strong>
								 		</p>
								 		<p style="margin-left:50px;color:blue;">
								 			<strong>
								 				<span><i class="fa fa-comments-o" aria-hidden="true"></i>&#160;<?php echo $an['content']; ?></span>
								 			</strong>
								 		</p>
							 		<?php endif; ?>
						 		<?php endif; ?>
						 	<?php endforeach; ?>
						 	<!--Hết hiển thị câu trả lời-->

						 	<hr/>
						 	<!--form trả lời-->
						 	<div id="ansewer_<?php echo $value['idQuestion']; ?>" style="display:none; background-color: #f5f5f5; margin-top: 20px; width:50%;">
                                <ul class="review-f-list">
                                    <li>
                                        <textarea placeholder="Admin trả lời..." id="txtContent_<?php echo $value['idQuestion']; ?>" name="" style="min-width: 90%; height:60px; text-indent:20px; border-radius: 10px;" ></textarea>
                                    </li>
                                </ul>
                                <button style="margin-left:50px; margin-bottom:10px;  padding:5px;border:1px solid #777777; border-radius:5px;" id="commentAnser_<?php echo $value['idQuestion']; ?>" class="grey-btn btn-primary" onclick="ansewerComment(<?php echo $value['idQuestion']; ?>);">Trả lời</button>
                            </div>

                            <!--hết form trả lời-->

					</div>
					<br/>
					<br/>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<script type="text/javascript">
	
	function openAnsewer(id)
    {
        var tmpCheck = $('#ansewer_'+id);
        if($(tmpCheck).is(':visible')){
            $('#txtContent_'+id).val('');
            $(tmpCheck).hide();
        }
        else
        {
            $(tmpCheck).show();
        }
    }

	function actionQuestion(idQuestion,checkaction)
	{
		$.ajax({
			url: '?sk=comment&m=action',
			type: 'POST',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {idQuestion: idQuestion,checkaction: checkaction},
			success: function(data)
			{
				if(data=='err')
				{
					alert('Vui lòng kiểm tra lại dữ liệu!');
				}
				else
					{
						if(data=='fail')
						{
							alert('Hành động lỗi!');
						}
						else
						{
							alert('Đã kích hoạt!');
							window.location.reload(true);
						}
					}
			}
		});
		
	}

	function actionAnswer(idAnswer,checkaction)
	{
		$.ajax({
			url: '?sk=comment&m=actionanswer',
			type: 'POST',
			//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {idAnswer: idAnswer,checkaction: checkaction},
			success: function(data)
			{
				if(data=='err')
				{
					alert('Vui lòng kiểm tra lại dữ liệu!');
				}
				else
					{
						if(data=='fail')
						{
							alert('Hành động lỗi!');
						}
						else
						{
							alert('Đã kích hoạt!');
							window.location.reload(true);
						}
					}
			}
		});
		
	}

	function ansewerComment(id)
	{
		var content = $.trim($('#txtContent_' + id).val());
		if(content.length && id > 0)
		{
			$.ajax({
				url: '?sk=comment&m=addanswer',
				type: 'POST',
				//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {idQuestion: id, content: content},
				success: function(data)
				{
					if(data=='err')
					{
						alert("Vui lòng kiểm tra lại dữ liệu");
					}
					else
					{
						if(data=='fail')
						{
							alert('Có lỗi xảy ra! Vui lòng thực hiện lại');
						}
						else
						{
							alert('Đã trả lời!');
							window.location.reload(true);
						}
					}
				}
			});
		}
		else
		{
			alert('Có lỗi xảy ra!');
		}
	}

</script>