<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Admin | <?php echo $title; ?></title>

		<!-- Bootstrap Core CSS -->
		<?php echo link_tag(base_url("assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css")); ?>

		<!-- MetisMenu CSS -->
		<?php echo link_tag(base_url("assets/admin/bower_components/metisMenu/dist/metisMenu.min.css")); ?>

		<!-- Custom CSS -->
		<?php echo link_tag(base_url("assets/admin/dist/css/sb-admin-2.css")); ?>

		<!-- Custom Fonts -->
		<?php echo link_tag(base_url("assets/admin/bower_components/font-awesome/css/font-awesome.min.css")); ?>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<?php echo heading('Please Sign In', 5	, array('class'=>'panel-title', 'style'=>'font-size:18px;')); ?>
						</div>
						<div class="panel-body">
							<?php 
								echo form_open('admin/login');
								echo form_fieldset();
							?>

							<!-- Display flashdata -->
							<?php if(!empty($this->session->flashdata('msg'))) { ?>

								<div class="<?php echo $this->session->flashdata('class'); ?>"  role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
								
							<?php } ?>
							<!-- Display flashdata -->
							
							<div class="form-group">
								<?php 
									$admin_username = array(
											'placeholder' => 'Username',
											'name' => 'u_username',
											'autofocus' => 'autofocus',
											'class' => 'form-control'
										);
									echo form_input($admin_username);
									echo form_error('u_username');
								?>
							</div>
							<div class="form-group">
								<?php 
									$admin_password = array(
											'placeholder' => 'Password',
											'name' => 'u_password',
											'class' => 'form-control'
										);
									echo form_password($admin_password);
									echo form_error('u_password');
								?>
							</div>

							<?php 
								$submit = array(
										'class' => 'btn btn-lg btn-success btn-block', 
										'value' => 'Login'
									);
								echo form_submit($submit);      
							   /* Submit button of sign in form */

							   echo form_close();
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js');?>"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?php echo base_url('assets/admin/bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>

		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url('assets/admin/dist/js/sb-admin-2.js');?>"></script>

	</body>

</html>
