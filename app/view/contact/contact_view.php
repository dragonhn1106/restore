	<section>
		<div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="text-center" style="background-color:#98b827;color:white;"><i class="fa fa-bookmark" aria-hidden="true"></i>&#160;Liên hệ</h3>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
		<div class="container-fluid well">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 well-sm">
						<p class="text-success"><span class="glyphicon glyphicon-earphone"></span>&#160;&#160;<strong>Contact us and we'll get back to you within 24 hours.</strong></p>
                        <p><span class="glyphicon glyphicon-map-marker"></span>&#160;&#160;<strong>Address:</strong> Mai Dich, Ha Noi, Vietnamese</p>
                        <p><span class="glyphicon glyphicon-phone"></span>&#160;&#160;<strong>Hotline:</strong> +84 964014502</p>
                        <p><span class="glyphicon glyphicon-envelope"></span>&#160;&#160;<strong>Email:</strong> duongcv1006@gmail.com</p>
					</div>
					<div class="col-md-6">
						<div class="row">
				        	<div class="col-sm-6 form-group">
				          		<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
				        	</div>
				        	<div class="col-sm-6 form-group">
				          		<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
				        	</div>
				      	</div>
				      	<div class="row">
				      		<div class="col-md-12 form-group">
				      			<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
				      		</div>
				      	</div>
				      	<div class="row">
					        <div class="col-sm-12 form-group">
					        	<input type="submit" class="btn btn-success pull-right" value="Send">
					        </div>
				      	</div>
					</div>
				</div>
			</div>
		</div>
		<div id="googleMap" style="height:300px;width:100%;"></div>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
			<script>
			var myCenter = new google.maps.LatLng(21.038640, 105.771559);//tọa độ địa điểm
			function initialize() {
			var mapProp = {
  				center:myCenter,
  				zoom:12,
  				scrollwheel:true,
  				draggable:true,
  				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);	
			var marker = new google.maps.Marker({
			  	position:myCenter,
			});
			marker.setMap(map);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</section>
</section>