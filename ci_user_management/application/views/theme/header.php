<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>User Management</title>

		<!-- Bootstrap -->
		<?php 
			echo link_tag(base_url("assets/css/bootstrap.min.css")); 
			echo link_tag(base_url("assets/css/dashboard.css"));
			echo link_tag(base_url("assets/css/new.css"));
			echo link_tag("https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css");
			echo link_tag("https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css");
		?>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries 
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/fileupload.js');?>"></script>
		<script src="<?php echo base_url('assets/js/validate.js');?>"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" ></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js" ></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js" ></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".js-navbar-collapse" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo anchor('home/index', 'User Management', array('class' => "navbar-brand")); ?>
				</div>
				<div id="navbar" class="navbar-collapse collapse"><!-- Navigation Menu Start -->
					<ul class="nav navbar-nav navbar-right">
					<?php
						if($this->session->userdata('logged_in') == TRUE)
						{
					?>
							<li><?php echo anchor('home/index', 'Dashboard'); ?></li>           
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><?php echo anchor('home/profile', 'View Profile'); ?></li>
									<li><?php echo anchor('home/profile_update', 'Update Profile'); ?></li>
									<li role="separator" class="divider"></li>
									<li><?php echo anchor('home/update_bnk_detail', 'Update Bank Detail'); ?></li>
								</ul>
							</li>
							<li><?php echo anchor('home/logout', 'Logout'); ?></li>
					<?php 
						}
						else
						{ 
					?>
						<li><?php echo anchor('signup/index', 'Sign Up'); ?></li>
						<li><?php echo anchor('login/index', 'Sign In'); ?></li>
					<?php 
						} 
					?>
					</ul>
				</div><!-- Navigation Menu End -->
			</div>
		</nav>
		<div class="container"><!-- container-fluid -->
			<div class="row"><!-- row -->
				
				
				