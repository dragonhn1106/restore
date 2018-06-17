
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Hóa Đơn Thanh Toán Sản Phẩm</title>
  </head>
  <body onload="window.print()" ">

    <div class="container" >
		<div class="row m-auto p-4" >
			<div class="col-12">
					<div class="title--page text-center mb-3">
							<h4>Cửa Hàng Bán Kính Mắt Glorious & Antoree</h4>
							<p>Địa Chỉ: 104 Mai Dịch - Cầu Giấy - Hà Nội</p>
							<p>ĐT: 0964014502</p>
							<h4>Hóa Đơn Bán Hàng</h4>
						<h6 class="float-right mt-1">Hà nội.Ngày <?php echo date("d")?> tháng <?php echo date("m")?> năm <?php echo date("Y")?></h6>
					</div>
					<div class="content--page " style="margin-top: 40px">
						<nav>
								<span>Tên Khách Hàng:</span>
								<span> <?php echo ($_SESSION['tenhienthi']) ?></span>
								<p>Địa Chỉ:<span> <?php echo $_SESSION['address'] ?></span></p>
						</nav>
                        <?php (isset($_SESSION['cart']) && !empty($_SESSION['cart']))  ?>
						<table style="width: 100%;" class="table-bordered text-center table--page">
							<tr>
								<th>STT</th>
								<th>Tên sản phẩm</th>
								<th>Đơn Vị Tính</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
								<th>Bảo Hành</th>
							</tr>
                            <?php
                            $i = 1;
                            foreach ($_SESSION['cart'] as $key => $val) {
                                ?>
                                <tr>
                                    <td class="center1"><?php echo $i; ?></td>
                                    <td class="center1"><?php echo $val['TenKinh']; ?></td>
                                    <td class="center1"><?php echo ("Cái") ?></td>
                                    <td class="center1"><?php echo $val['qty'] ?></td>
                                    <td class="center1"><?php echo number_format($val['GiaCu']); ?></td>
                                    <td class="center1">12 tháng</td>
                                </tr>


                                <?php $i++;}
                                ?>
                                <td colspan="2">Tổng tiền:</td>
                            <td colspan="4">
                                <?php $total = 0;
                                foreach ($_SESSION['cart'] as $key => $val){
                                $subtotal =($val['qty'] * $val['GiaCu']);
                                $total = ($total + $subtotal);
                                }echo  number_format($total) ;
                                ?>
                            </td>
                        </table>
					</div>

					<!-- footer page -->
					<div class="footer--page" style="margin-top: 20px; width: 100%; height: 100%;">
						<span>
								<h6>Ghi Chú:</h6>
								<p>- Bảo hành đúng tiêu chuẩn của nhà sản xuất. Tại địa chỉ 104 Mai Dịch - Cầu Giấy - Hà Nội.</p>
								<p style="font-weight: bold">Cửa hàng không chịu trách nhiệm bảo hành với các trường hợp sau:</p>
								<p>- Tem bảo hành bì dán đè, tẩy xóa, sản phẩm bị rơi, cong vênh, sứt mẻ hoặc mất tem của cửa hàng.</p>
								<p>- Không có phiếu bảo hành.</p>
								<p>-Linh kiện bị thay thế không đúng với linh kiện ban đầu của nhà sản xuất</p>
								<p>- Xin quý khách kiểm tra kỹ sản phẩm trước khi mua sản phẩm</p>

						</span>
						<div>
								<p style="float: right; margin-top: -20px; margin-bottom: 60px;"></p>
						</div>
						<div class="row justify-content-between text-center" style="margin-top: 70px;">
							<div class="col-4">
								<h6>Khách Hàng</h6>
								<span>(Ký và ghi rõ họ tên)</span>
							</div>
							<div class="col-4">
								<h6>Người Bán</h6>
								<span>(Ký và ghi rõ họ tên)</span>
								<p>Chu Văn Dương</p>
							</div>
						</div>
					</div>
			</div>
	</div>
</div>



  </body>
</html>