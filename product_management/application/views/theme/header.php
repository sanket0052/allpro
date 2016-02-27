<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Line Shopping | <?php echo $title; ?></title>
		<!-- Bootstrap -->
		<?php 
			// echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'); 
			echo link_tag("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css");
			echo link_tag("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
			echo link_tag(base_url("assets/css/other.css"));
			echo link_tag(base_url("assets/css/new.css"));
			echo link_tag("https://fonts.googleapis.com/css?family=Raleway");
			// echo link_tag("https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css");
		?>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		
	</head>
	<body>

		<!-- Line top navbar -->
		<nav class="navbar navbar-static-top line-navbar-one">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!-- Top navbar button -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#line-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-ellipsis-v"></span>
					</button>
					<!-- Cart button -->
					<a class="lno-cart" href="#">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<span class="cart-item-quantity"></span>
					</a>
					<!-- left navbar button -->
					<button class="lno-btn-toggle">
						<span class="fa fa-bars"></span>
					</button>
					<!-- Brand image -->
					<a class="navbar-brand" href="">
						<img alt="Brand" src="<?php echo base_url().'/assets/img/index.png'; ?>">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="line-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php $url = $this->uri->segment(1); ?>
						<li class="<?php echo $url=='home' ? 'active' : '' ?>">
						<?php 
							echo anchor('home/index', 'Home', array('title' => 'Home')); 
						?>
						</li>
						<li><a href="#">Shop</a></li>
						<li><a href="#">Blog</a></li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Legal <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">About</a></li>
								<li><a href="#">Rules </a></li>
							</ul>
						</li>
						<li><a href="#">Contact</a></li> -->
							<?php 
								$is_logged_in = $this->session->userdata('logged_in');
								if(isset($is_logged_in) || $is_logged_in == TRUE)
								{
							?>
									<li>
										<?php 
											echo anchor('home/logout', 'Logout', array('title' => 'Logout')); 
										?>
									</li>
							<?php
								}
								else
								{
							?>
									<li>
										<?php 
											/* Signup Form link */
											echo anchor('authenticate/login', 'Sign In', array('title' => 'Sign In'));
										?>
									</li>
									<li>
										<?php
											/* Signup Form link */
											echo anchor('authenticate/register', 'Sign Up', array('title' => 'Sign Up'));
										?>
									</li>
							<?php
								}
							?>
					</ul>
					<form class="navbar-form navbar-left lno-search-form visible-xs" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
					</form>
					<ul class="nav navbar-nav navbar-right lno-socials">
						<li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#" class="google-plus"><span class="fa fa-google-plus"></span></a></li>
						<li><a href="#" class="pinterest"><span class="fa fa-pinterest"></span></a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
		
		<?php 

		?>

		<!-- Line secondary navbar -->
		<nav class="navbar navbar-static-top line-navbar-two">
			<div class="container">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="line-navbar-collapse-2">
					<ul class="nav navbar-nav lnt-nav-mega">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span class="fa fa-dot-circle-o"></span>
								Categories
								<span class="caret"></span>
							</a>
							<div class="dropdown-menu" role="menu">
								<div class="lnt-dropdown-mega-menu">
									<?php 
										$main_category_list = $this->category_model->get_category_list(array('c_id','c_name', 'c_url_use_name'), array('c_parent_id' => '0'));
										foreach ($main_category_list as $key => $value)
										{
											$menuarr[] = array(
												'main_category_id' => $value['c_id'],
												'main_category_name' => $value['c_name'],
												'main_category_urlname' => $value['c_url_use_name'],
											);
										}
									?>
									<!-- List of categories -->
									<ul class="lnt-category list-unstyled">
										<?php 
											foreach ($menuarr as $key => $value)
											{
										?>
											<li class="<?php echo $key=='0' ? 'active' : '' ?>" >
												<a href="#subcategory-<?php echo $value['main_category_urlname']; ?>" ><?php echo $value['main_category_name']; ?></a>
											</li>
										<?php 
											}
										?>
										<!-- <li class="active"><a href="#subcategory-home">Home, garden and tools</a></li>
										<li><a href="#subcategory-sports">Sports and outdoors</a></li>
										<li><a href="#subcategory-music">Digital music</a></li>
										<li><a href="#subcategory-books">Books <span class="label label-danger">Hot</span></a></li>
										<li><a href="#subcategory-fashion">Fashion and beauty</a></li>
										<li><a href="#subcategory-movies">Movies and games</a></li> -->
									</ul>
									<!-- Subcategory and carousel wrap -->
									<div class="lnt-subcategroy-carousel-wrap container-fluid">
									<?php 
										foreach ($menuarr as $key => $value) {
									?>
										<div id="subcategory-<?php echo $value['main_category_urlname']; ?>" class="<?php echo $key=='0' ? 'active' : '' ?>">
										<?php 
											$sub_category_list = $this->category_model->get_category_list(array('c_id','c_name', 'c_url_use_name'), array('c_parent_id' => $value['main_category_id']));
										?>
											<!-- Sub categories list-->
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name"><?php echo $value['main_category_name']; ?></h3>
												<ul class="list-unstyled col-sm-6">
												<?php 
													foreach ($sub_category_list as $val)
													{
												?>
													<li>
														<?php echo anchor('products/index/'.$value['main_category_id'].'/'.$val['c_id'], $val['c_name']); ?>
													</li>
												<?php 
													} 
												?>
												</ul>
												<!-- <ul class="list-unstyled col-sm-6">
													<li><a href="#">Kitchen</a></li>
													<li><a href="#">Furniture</a></li>
													<li><a href="#">Wedding</a></li>
													<li><a href="#">Hardware</a></li>
													<li><a href="#">Pets</a></li>
													<li><a href="#">Bed and bath</a> <span class="label label-info">Popular</span></li>
													<li><a href="#">Fixtures</a></li>
													<li><a href="#">Home robots</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Power tools</a></li>
													<li><a href="#">Lamps</a></li>
													<li><a href="#">Redesign</a></li>
													<li><a href="#">Garden</a></li>
													<li><a href="#">Decor</a></li>
												</ul> -->
											</div>
											<!-- Carousel -->
											<div class="col-sm-4 col-md-4">
												<div id="carousel-category-home" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-home" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-home" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-home" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> <!-- /.subcategory-home -->
									<?php 
										}
									?>
										<!-- <div id="subcategory-home" class="active"> -->
											<!-- Sub categories list-->
											<!-- <div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Home, garden and tools</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="http://google.com">Home</a></li>
													<li><a href="#">Kitchen</a></li>
													<li><a href="#">Furniture</a></li>
													<li><a href="#">Wedding</a></li>
													<li><a href="#">Hardware</a></li>
													<li><a href="#">Pets</a></li>
													<li><a href="#">Bed and bath</a> <span class="label label-info">Popular</span></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Fixtures</a></li>
													<li><a href="#">Home robots</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Power tools</a></li>
													<li><a href="#">Lamps</a></li>
													<li><a href="#">Redesign</a></li>
													<li><a href="#">Garden</a></li>
													<li><a href="#">Decor</a></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-home" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-home" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-home" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-home" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.subcategory-home -->
										<!-- <div id="subcategory-sports"> -->
											<!-- Sub categories list-->
											<!-- <div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Sports and outdoors</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Exercise</a></li>
													<li><a href="#">Fitness</a></li>
													<li><a href="#">Hunting</a></li>
													<li><a href="#">Fishing</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Boating</a></li>
													<li><a href="#">Water sports</a></li>
													<li><a href="#">Hardware</a></li>
													<li><a href="#">Fan shop</a></li>
													<li><a href="#">Team sports</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Golf</a></li>
													<li><a href="#">Outdoor clothing</a></li>
													<li><a href="#">Cycling</a></li>
													<li><a href="#">Action sports</a></li>
													<li><a href="#">Game room</a> <span class="label label-danger">Hot</span></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-sports" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-sports" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-sports" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-sports" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.subcategory-sports -->
										<!-- <div id="subcategory-music"> -->
											<!-- Sub categories list-->
											<!-- <div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Digital music</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Online</a></li>
													<li><a href="#">Best</a></li>
													<li><a href="#">New releases</a></li>
													<li><a href="#">Deals</a></li>
													<li><a href="#">Top selling</a></li>
													<li><a href="#">Top grossing</a> <span class="label label-info">Popular</span></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Pop</a></li>
													<li><a href="#">Jazz</a> <span class="label label-danger">Hot</span></li>
													<li><a href="#">Country</a></li>
													<li><a href="#">Classic</a></li>
													<li><a href="#">Rock</a></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-music" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-music" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-music" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-music" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.subcategory-music -->
										<!-- <div id="subcategory-books">
											<div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Books</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Books</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Magazines</a></li>
													<li><a href="#">Children</a></li>
													<li><a href="#">Textbooks</a></li>
													<li><a href="#">Kindle</a></li>
													<li><a href="#">Audible</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Web development</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Typography</a></li>
													<li><a href="#">Design</a></li>
													<li><a href="#">Novel</a></li>
													<li><a href="#">Short story</a></li>
													<li><a href="#">Action</a></li>
													<li><a href="#">Romance</a></li>
													<li><a href="#">Political</a></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-books" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-books" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-books" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-books" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.subcategory-books -->
										<!-- <div id="subcategory-fashion"> -->
											<!-- Sub categories list-->
											<!-- <div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Fashion and beauty</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Women</a></li>
													<li><a href="#">Men</a></li>
													<li><a href="#">Girls</a></li>
													<li><a href="#">Boys</a></li>
													<li><a href="#">Baby</a></li>
													<li><a href="#">Top selling</a> <span class="label label-info">Popular</span></li>
													<li><a href="#">Cheap</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">All beauty</a></li>
													<li><a href="#">Diets</a></li>
													<li><a href="#">Baby care</a> <span class="label label-primary">Trending</span></li>
													<li><a href="#">Men's grooming</a></li>
													<li><a href="#">Health</a></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-fashion" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-fashion" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-fashion" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-fashion" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.subcategory-fashion -->
										<!-- <div id="subcategory-movies"> -->
											<!-- Sub categories list-->
											<!-- <div class="lnt-subcategory col-sm-8 col-md-8">
												<h3 class="lnt-category-name">Movies and games</h3>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Movies and TV</a></li>
													<li><a href="#">Blu-ray</a></li>
													<li><a href="#">Div-ix</a> <span class="label label-info">Popular</span></li>
													<li><a href="#">Instant movies</a></li>
													<li><a href="#">Free movies</a></li>
													<li><a href="#">Digital instruments</a></li>
												</ul>
												<ul class="list-unstyled col-sm-6">
													<li><a href="#">Online games</a></li>
													<li><a href="#">Trending</a> <span class="label label-danger">hot</span></li>
													<li><a href="#">Popular</a></li>
													<li><a href="#">Grossing</a></li>
													<li><a href="#">Game room</a></li>
												</ul>
											</div> -->
											<!-- Carousel -->
											<!-- <div class="col-sm-4 col-md-4">
												<div id="carousel-category-movies" class="carousel slide" data-ride="carousel">
													<ol class="carousel-indicators">
														<li data-target="#carousel-category-movies" data-slide-to="0" class=""></li>
														<li data-target="#carousel-category-movies" data-slide-to="1" class="active"></li>
														<li data-target="#carousel-category-movies" data-slide-to="2" class=""></li>
													</ol>
													<div class="carousel-inner" role="listbox">
														<div class="item active">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
														<div class="item">
															<img src="http://placehold.it/296x400" alt="Slide image">
														</div>
													</div>
												</div>
											</div>
										</div> --> <!-- /.category-movies -->
									</div> <!-- /.lnt-subcategroy-carousel-wrap -->
								</div> <!-- /.lnt-dropdown-mega-menu -->
							</div> <!-- /.dropdown-menu -->
						</li> <!-- /.dropdown -->
					</ul> <!-- /.lnt-nav-mega -->
					<form class="navbar-form navbar-left lnt-search-form" role="search">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-btn lnt-search-category">
									<button type="button" class="btn btn-default dropdown-toggle selected-category-btn" data-toggle="dropdown" aria-expanded="false">
										<span class="selected-category-text">All </span>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">

									<?php 
										foreach ($menuarr as $key => $value)
										{
									?>
										<li>
											<a href="#<?php echo $value['main_category_urlname']; ?>" ><?php echo $value['main_category_name']; ?></a>
										</li>
									<?php 
										}
									?>
										<!-- <li><a href="#">Fashion</a></li>
										<li><a href="#">Sport</a></li>
										<li><a href="#">Electronics</a></li>
										<li><a href="#">Home</a></li>
										<li><a href="#">Toys</a></li>
										<li><a href="#">Motors</a></li> -->
									</ul>
								</div><!-- /btn-group -->
								<input type="text" class="form-control lnt-search-input" aria-label="Search" placeholder="Search leader">
							</div><!-- /input-group -->
						</div>
						<div class="lnt-search-suggestion">
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Leader mask in <em>entertainment</em></a></li>
								<li><a href="#">Plain leader bags in <em>fashion</em></a></li>
								<li><a href="#">Black leader shoes in <em>fashion</em></a></li>
								<li><a href="#">Covers in <em>electronics</em></a></li>
								<li><a href="#">Leader overcoat in <em>fashion</em></a></li>
								<li><a href="#">Hi motor in <em>motors</em></a></li>
								<li><a href="#">Fake leader bag in <em>Electronics</em></a></li>
								<li class="lnt-search-bottom-links">
									<ul class="list-inline">
										<li><a href="#">All suggestions</a></li>
										<li><a href="#">New products</a></li>
										<li><a href="#">Popular products</a></li>
										<li><a href="#">Discounted products</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<button type="submit" class="btn btn-search"><span class="fa fa-search"></span></button>
					</form> <!-- /.lnt-search-form -->
					<ul class="nav navbar-nav navbar-right lnt-shopping-cart">
						<li class="dropdown">
							<div class="btn-group" role="group" aria-label="...">
								<button type="button" class="btn btn-default lnt-cart">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="cart-item-quantity"></span>
								</button>
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Shopping cart
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li>
											<div class="lnt-cart-products">
											2 products added. 
											<span class="lnt-cart-total">$1400</span>
											</div>
										</li>
										<li>
											<div class="lnt-cart-products">
												<img src="http://placehold.it/60x60" alt="Product title">
												<span class="lnt-product-info">
													<span class="lnt-product-name">Leader bag</span>
													<span class="lnt-product-price"><del>$790</del> &rarr; $600</span>
													<button type="button" class="lnt-product-remove btn-link">Remove?</button>
												</span>
											</div>
										</li>
										<li>
											<div class="lnt-cart-products">
												<img src="http://placehold.it/60x60" alt="Product title">
												<span class="lnt-product-info">
													<span class="lnt-product-name">Awesome pack of new clothes for you</span>
													<span class="lnt-product-price">$700</span>
													<button type="button" class="lnt-product-remove btn-link">Remove?</button>
												</span>
											</div>
										</li>
										<li class="lnt-cart-actions">
											<?php 
												/* View Cart link */
												echo anchor('home/cart', 'View Cart', array('title' => 'View Cart', 'class' => 'lnt-view-cart-btn')); 
											?>
											<!-- <a href="#" class="lnt-view-cart-btn">View cart</a> -->
											<a href="#" class="lnt-checkout-btn">Checkout</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul> <!-- /.lnt-shopping-cart -->
				</div> <!-- /.navbar-collapse -->
			</div> <!-- /.container -->
		</nav> <!-- /.line-navbar-two -->

		<!-- Line left navbar for secondary navbar on small devices -->
		<div class="line-navbar-left">
			<p class="lnl-nav-title">Categories</p>
				<ul class="lnl-nav">
					<!-- The list will be automatically cloned from mega menu via jQuery -->
				</ul>
		</div> <!-- /.line-navbar-left -->

	<!-- MAIN CONTAINER-->
	<div class="container">
		<?php 
			// $total_segs = $this->uri->segment_array();
			// if(isset($total_segs[2]) AND $total_segs[2] != 'index'){

			// $last_element=end($total_segs);
			// array_pop($total_segs);
		?>
			<!-- Breadcrumb Starts -->
			<?php 
				$breadcrumb = $this->breadcrumb->output();
				echo $breadcrumb;
			?>

				<!-- <ol class="breadcrumb">
					<?php 
						foreach ($total_segs as $key => $value) {
					?>
						<li>

						<?php 
							echo anchor($value, $value, array('title' => $value)); 
						?>

						</li>
					<?php
						}
					?>
					<li class="active"><?php echo $last_element; ?></li>
				</ol> -->
				
			<!-- Breadcrumb Ends -->
		<?php 
			// }
		?>

				
				
