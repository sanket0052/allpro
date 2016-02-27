
<!-- Breadcrumb Starts -->
	<ol class="breadcrumb">
		<li><a href="home/index">Home</a></li>
		<li><a href="index.html"></a></li>
		<li class="active">Register</li>
	</ol>
<!-- Breadcrumb Ends -->

<div class="row single-product">
	<div class="col-md-5 single-top">	
		<div class="flexslider">
			<!-- FlexSlider -->
				<script src="<?php echo base_url('assets/js/imagezoom.js'); ?>"></script>
				<script defer src="<?php echo base_url('assets/js/jquery.flexslider.js'); ?>"></script>
				<?php echo link_tag(base_url("assets/css/flexslider.css")); ?>

				<script>
				// Can also be used with $(document).ready()
				$(window).load(function() {
				  $('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				  });
				});
				</script>
			<!-- //FlexSlider-->
				<ul class="slides">
					<li data-thumb="https://p.w3layouts.com/demos/mihstore/web/images/s11.jpg">
						<div class="thumb-image"> <img src="https://p.w3layouts.com/demos/mihstore/web/images/s1.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="https://p.w3layouts.com/demos/mihstore/web/images/s12.jpg">
						<div class="thumb-image"> <img src="https://p.w3layouts.com/demos/mihstore/web/images/s2.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="https://p.w3layouts.com/demos/mihstore/web/images/s13.jpg">
						<div class="thumb-image"> <img src="https://p.w3layouts.com/demos/mihstore/web/images/s3.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="https://p.w3layouts.com/demos/mihstore/web/images/s14.jpg">
						<div class="thumb-image"> <img src="https://p.w3layouts.com/demos/mihstore/web/images/s4.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
				</ul>
			<div class="clearfix"></div>
		</div>	
	</div>	
	<div class="col-md-7 single-top-in">
		<div class="single-para">
			<h4 class="product-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
				<ul class="option">
					<li>
						<span class="product-brand">by <a href="#" class="cart-an ">Puma</a></span>
					</li>
					<li>
						<div class="star-at">
							<div class="starrr"> 1 <span> Ratings </span></div>
						</div>
					</li>
					<li>
						<i class="fa fa-pencil"></i><a href="#" class=""> Write A Review </a>
					</li>
				</ul>
			<div class="para-grid product-detail">
				<ul>
					<li>
						<label>Price : </label>
						<span class="old-price"><i class="fa fa-inr"></i> 699 </span>
						<b> You Save <i class="fa fa-inr"></i> 200 </b>
						<h2 class="price product-title"><i class="fa fa-inr"></i>499</h2>
					</li>
					<li>
						<label>Availability : </label>
						<span class="label label-primary add-to"> In Stock</span>
						<span class="label label-danger add-to"> Out of Stock</span>
					</li>
					<li>
						<label>Available Options : </label>
						<select>
							<option>Large</option>
							<option>Medium</option>
							<option>small</option>
							<option>Large</option>
							<option>small</option>
						</select>
					</li>
					<li>
						<label>Available Color : </label>
						<ul class="w_nav2">
							<li><a class="color1" href="#"></a></li>
							<li><a class="color2" href="#"></a></li>
							<li><a class="color3" href="#"></a></li>
							<li><a class="color4" href="#"></a></li>
							<li><a class="color5" href="#"></a></li>
							<li><a class="color6" href="#"></a></li>
							<li><a class="color7" href="#"></a></li>
							<li><a class="color8" href="#"></a></li>
							<li><a class="color9" href="#"></a></li>
							<li><a class="color10" href="#"></a></li>
							<li><a class="color12" href="#"></a></li>
							<li><a class="color13" href="#"></a></li>
							<li><a class="color14" href="#"></a></li>
						</ul>
					</li>
				</ul>
				<div class="clearfix"></div>
				<a href="#" class="cart-an ">More details</a>
			</div><br/>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Qty. : </label>
						<select>
							<option value="1" >1</option>
							<option value="2" >2</option>
							<option value="3" >3</option>
							<option value="4" >4</option>
							<option value="5" >5</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<a href="#" class="btn btn-primary">Add to Cart</a>
					<span></span>
					<a href="#" class="btn btn-primary">Add to Wishlist</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<hr/>
	<div class="product-slider">
		<ul id="flexiselDemo1">
			<li>
				<img src="https://p.w3layouts.com/demos/mihstore/web/images/pi.jpg" />
				<div class="grid-flex">
					<a class="product-title" href="#">Lorem</a>
					<p>Rs 850</p>
				</div>
			</li>
			<li>
				<img src="https://p.w3layouts.com/demos/mihstore/web/images/pi1.jpg" />
				<div class="grid-flex">
					<a class="product-title" href="#">Amet</a>
					<p>Rs 850</p>
				</div>
			</li>
			<li>
				<img src="https://p.w3layouts.com/demos/mihstore/web/images/pi2.jpg" />
				<div class="grid-flex">
					<a class="product-title" href="#">Simple</a>
					<p>Rs 850</p>
				</div>
			</li>
			<li>
				<img src="https://p.w3layouts.com/demos/mihstore/web/images/pi3.jpg" />
				<div class="grid-flex">
					<a class="product-title" href="#">Text</a>
					<p>Rs 850</p>
				</div>
			</li>
			<li>
				<img src="https://p.w3layouts.com/demos/mihstore/web/images/pi4.jpg" />
				<div class="grid-flex">
					<a class="product-title" href="#">Sit</a>
					<p>Rs 850</p>
				</div>
			</li>
		</ul>
	</div>
	<hr/>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
		});
	</script>
	<script defer src="<?php echo base_url('assets/js/jquery.flexisel.js'); ?>"></script>
</div>